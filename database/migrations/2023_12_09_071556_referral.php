<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral', function(Blueprint $table) {
			$table->increments('id');
			$table->string('user_id', 225);
			$table->string('phone', 225);
			$table->string('user_from', 225);
            $table->integer('status', 2);
			$table->string('email', 225);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('referral');
	}
};
