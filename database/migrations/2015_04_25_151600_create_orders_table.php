<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->integer('options');
            $table->integer('count');
            $table->date('delivery_date');
            $table->dateTime('delivery_time');
            $table->text('desc');
            $table->integer('total');
            $table->boolean('status');
            $table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
