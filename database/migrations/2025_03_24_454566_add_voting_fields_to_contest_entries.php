<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create votes table
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contest_entry_id')->constrained()->onDelete('cascade');
            $table->string('voter_ip');
            $table->string('voter_fingerprint')->nullable();
            $table->timestamps();

            // Prevent multiple votes from same IP for same entry
            $table->unique(['contest_entry_id', 'voter_ip']);
        });

        // Add share_token to existing contest_entries table
        Schema::table('contest_entries', function (Blueprint $table) {
            $table->string('share_token')->unique()->nullable()->after('votes_count');
        });
    }

    public function down()
    {
        Schema::dropIfExists('votes');

        Schema::table('contest_entries', function (Blueprint $table) {
            $table->dropColumn('share_token');
        });
    }
};