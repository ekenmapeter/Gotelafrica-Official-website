<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contest_entries', function (Blueprint $table) {
            $table->integer('votes_count')->default(0);
            $table->decimal('duration', 8, 2)->nullable(); // Duration in seconds
            $table->string('share_token', 32)->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contest_entries', function (Blueprint $table) {
            $table->dropColumn(['votes_count', 'duration', 'share_token']);
        });
    }
};
