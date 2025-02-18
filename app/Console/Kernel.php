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
        // $schedule->command('inspire')->hourly();
        $schedule->command('transactions:check-validity')->daily();

        $schedule->call(function()
        {
            $creditActiveUser = ProductTransaction::where('status', 1)->get();

            foreach ($creditActiveUser as $data) {
                $create = TodayIncome::create([
                    'user_id' => $data->user_id,
                    'amount' => $data->daily_income,
                ]);
            }

        })->daily();


        $schedule->call(function () {

            // Log to indicate the start of the task
            Log::info('Scheduled task started.');

            // Retrieve the total team income from product transactions
            $teamIncome = DB::table('referral')
                ->join('product_transaction', 'referral.user_id', '=', 'product_transaction.user_id')
                ->selectRaw('SUM(product_transaction.daily_income) as daily_income')
                ->where('product_transaction.status', 1)
                ->first();

            // Log to track the retrieval of team income
            Log::info('Team income retrieved: ' . json_encode($teamIncome));

            // Check if team income exists
            if ($teamIncome) {
                $dailyIncome = $teamIncome->daily_income;

                // Log to indicate the start of processing team members
                Log::info('Processing team members.');

                // Retrieve team members who have valid product transactions
                $teamMembers = DB::table('referral')
                    ->select('users.*')
                    ->join('users', 'referral.user_id', '=', 'users.id')
                    ->whereExists(function ($query) {
                        $query->select(DB::raw(1))
                            ->from('product_transaction')
                            ->whereColumn('referral.user_id', 'product_transaction.user_id')
                            ->where('product_transaction.status', 1);
                    })
                    ->get();

                // Log to track the retrieval of team members
                Log::info('Team members retrieved: ' . json_encode($teamMembers));

                // Process team members and update their wallets
                foreach ($teamMembers as $member) {

                    $userWallet = Wallet::where('user_id', $member->id)->first();
                    // Check if user wallet exists
                    if ($userWallet) {
                        $teamIncomePercentage = $dailyIncome * 0.05;

                        // Log to track the wallet update process
                        Log::info('Updating wallet for user ' . $member->id . ' with income percentage: ' . $teamIncomePercentage);

                        $userWallet->balance += $teamIncomePercentage;
                        $userWallet->save(); // Save the updated balance to the database
                    }
                }
            }

            // Log to indicate the end of the task
            Log::info('Scheduled task completed.');

        })->daily();




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
        // Other commands...
        \App\Console\Commands\CheckTransactionValidity::class,
    ];

}

