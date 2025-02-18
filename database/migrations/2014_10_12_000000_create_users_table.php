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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('other_name')->nullable();
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->integer('roles');
            $table->timestamp('last_login')->nullable();
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('invite')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
