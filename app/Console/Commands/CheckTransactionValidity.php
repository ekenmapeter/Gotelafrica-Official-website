<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductTransaction;
use Carbon\Carbon;

class CheckTransactionValidity extends Command
{
    protected $signature = 'transactions:check-validity';

    protected $description = 'Check and update validity status of product transactions';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $transactions = ProductTransaction::where('status', 1)->get();

        foreach ($transactions as $transaction) {
            $currentTime = Carbon::now();
            $validityPeriod = Carbon::parse($transaction->validity_period);
            if ($currentTime->greaterThanOrEqualTo($validityPeriod)) {
                $transaction->status = 0;
                $transaction->save();
            }
        }

        $this->info('Product transaction validity status updated successfully.');
    }
}
