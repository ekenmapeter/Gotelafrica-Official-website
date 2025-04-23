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
        // Check and update transaction validity daily
        $schedule->command('transactions:check-validity')->daily();

        // Credit daily income to active users
        $schedule->call(function () {
            $this->creditDailyIncome();
        })->daily();

        // Distribute team income to team members
        $schedule->call(function () {
            $this->distributeTeamIncome();
        })->daily();
    }

    /**
     * Credit daily income to active users.
     */
    protected function creditDailyIncome(): void
    {
        $activeTransactions = ProductTransaction::where('status', 1)->get();

        $todayIncomes = $activeTransactions->map(function ($transaction) {
            return [
                'user_id' => $transaction->user_id,
                'amount' => $transaction->daily_income,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        });

        TodayIncome::insert($todayIncomes->toArray());
    }

    /**
     * Distribute team income to team members.
     */
    protected function distributeTeamIncome(): void
    {
        Log::info('Scheduled task started.');

        // Retrieve the total team income from product transactions
        $teamIncome = DB::table('referral')
            ->join('product_transaction', 'referral.user_id', '=', 'product_transaction.user_id')
            ->selectRaw('SUM(product_transaction.daily_income) as daily_income')
            ->where('product_transaction.status', 1)
            ->first();

        Log::info('Team income retrieved: ' . json_encode($teamIncome));

        if ($teamIncome && $teamIncome->daily_income > 0) {
            $dailyIncome = $teamIncome->daily_income;

            Log::info('Processing team members.');

            // Retrieve team members who have valid product transactions
            $teamMembers = DB::table('referral')
                ->select('users.id')
                ->join('users', 'referral.user_id', '=', 'users.id')
                ->whereExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('product_transaction')
                        ->whereColumn('referral.user_id', 'product_transaction.user_id')
                        ->where('product_transaction.status', 1);
                })
                ->get();

            Log::info('Team members retrieved: ' . json_encode($teamMembers));

            // Calculate team income percentage
            $teamIncomePercentage = $dailyIncome * 0.05;

            // Update wallets for team members
            $teamMembers->each(function ($member) use ($teamIncomePercentage) {
                Wallet::where('user_id', $member->id)->increment('balance', $teamIncomePercentage);
            });
        }

        Log::info('Scheduled task completed.');
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

