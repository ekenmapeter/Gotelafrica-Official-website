<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CheckTransactionValidity extends Command
{
    protected $signature = 'transactions:check-validity';

    protected $description = 'Check and update validity status of product transactions';

    public function handle()
    {
        // Get the current time once to avoid repeated calls
        $currentTime = Carbon::now();

        // Use a single query to update all expired transactions
        $updatedCount = ProductTransaction::where('status', 1)
            ->where('validity_period', '<=', $currentTime)
            ->update(['status' => 0]);

        $this->info("Updated $updatedCount product transaction(s) to expired status.");
    }
}
