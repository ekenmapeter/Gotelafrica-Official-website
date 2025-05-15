<?php

namespace App\Console;

use App\Models\Wallet;
use App\Models\TodayIncome;
use App\Models\ProductTransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Check and update transaction validity at 8:00 AM daily
        $schedule->command('transactions:check-validity')
            ->dailyAt('08:00')
            ->appendOutputTo(storage_path('logs/transaction-validity.log'));

        // Credit daily income to active users at 9:00 AM daily
        $schedule->call(function () {
            $this->creditDailyIncome();
        })->dailyAt('15:27')
          ->appendOutputTo(storage_path('logs/daily-income.log'));

        // Distribute team income to team members at 10:00 AM daily
        $schedule->call(function () {
            $this->distributeTeamIncome();
        })->dailyAt('15:29')
          ->appendOutputTo(storage_path('logs/team-income.log'));

        // You can also set specific times for specific days
        // For example, run team income distribution at 2:00 PM on Mondays and Fridays
        $schedule->call(function () {
            $this->distributeTeamIncome();
        })->mondays()->fridays()->at('15:30')
          ->appendOutputTo(storage_path('logs/team-income-weekly.log'));

        // Or run at specific intervals
        // For example, check transaction validity every 4 hours
        $schedule->command('transactions:check-validity')
            ->everyFourHours()
            ->appendOutputTo(storage_path('logs/transaction-validity-interval.log'));


    }

    /**
     * Credit daily income to active users.
     */
    protected function creditDailyIncome(): void
    {
        Log::info('Starting daily income credit process at: ' . now());

        $activeTransactions = ProductTransaction::where('status', 1)->get();
        Log::info('Found ' . $activeTransactions->count() . ' active transactions');

        $todayIncomes = $activeTransactions->map(function ($transaction) {
            Log::info("Processing transaction ID: {$transaction->id} for user {$transaction->user_id} with daily income: {$transaction->daily_income}");

            return [
                'user_id' => $transaction->user_id,
                'amount' => $transaction->daily_income,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        try {
            TodayIncome::insert($todayIncomes->toArray());
            Log::info('Successfully credited daily income to ' . count($todayIncomes) . ' users');

            // Log total amount credited
            $totalAmount = $todayIncomes->sum('amount');
            Log::info("Total amount credited: ₦" . number_format($totalAmount, 2));
        } catch (\Exception $e) {
            Log::error('Error crediting daily income: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
        }

        Log::info('Daily income credit process completed at: ' . now());
    }

    /**
     * Distribute team income to team members.
     */
    protected function distributeTeamIncome(): void
    {
        Log::info('Starting team income distribution at: ' . now());

        // Retrieve the total team income from product transactions
        $teamIncome = DB::table('referral')
            ->join('product_transaction', 'referral.user_id', '=', 'product_transaction.user_id')
            ->selectRaw('SUM(product_transaction.daily_income) as daily_income')
            ->where('product_transaction.status', 1)
            ->first();

        Log::info('Total team income retrieved: ₦' . number_format($teamIncome->daily_income ?? 0, 2));

        if ($teamIncome && $teamIncome->daily_income > 0) {
            $dailyIncome = $teamIncome->daily_income;

            // Retrieve team members who have valid product transactions
            $teamMembers = DB::table('referral')
                ->select('users.id', 'users.first_name', 'users.email')
                ->join('users', 'referral.user_id', '=', 'users.id')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('product_transaction')
                        ->whereColumn('referral.user_id', 'product_transaction.user_id')
                        ->where('product_transaction.status', 1);
                })
                ->get();

            Log::info('Found ' . $teamMembers->count() . ' eligible team members');

            // Calculate team income percentage
            $teamIncomePercentage = $dailyIncome * 0.05;
            Log::info('Team income percentage per member: ₦' . number_format($teamIncomePercentage, 2));

            // Update wallets for team members
            $teamMembers->each(function ($member) use ($teamIncomePercentage) {
                try {
                    Wallet::where('user_id', $member->id)->increment('balance', $teamIncomePercentage);
                    Log::info("Successfully credited team income to user {$member->first_name} ({$member->email}) - Amount: ₦" . number_format($teamIncomePercentage, 2));
                } catch (\Exception $e) {
                    Log::error("Error crediting team income to user {$member->first_name} ({$member->email}): " . $e->getMessage());
                }
            });

            Log::info('Total team income distributed: ₦' . number_format($teamIncomePercentage * $teamMembers->count(), 2));
        } else {
            Log::info('No team income to distribute');
        }

        Log::info('Team income distribution completed at: ' . now());
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }

    protected $commands = [
        \App\Console\Commands\CheckTransactionValidity::class,
    ];
}

