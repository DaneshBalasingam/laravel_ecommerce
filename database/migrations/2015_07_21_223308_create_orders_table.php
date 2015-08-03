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
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')
				  ->references('id')
				  ->on('users');
			$table->timestamps();
		});

		Schema::create('order_product', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned()->index();
			$table->foreign('product_id')->references('id')->on('products');

			$table->integer('order_id')->unsigned()->index();
			$table->foreign('order_id')->references('id')->on('orders');

			$table->integer('quantity')->unsigned()->nullable();

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
		Schema::drop('order_product');
		Schema::drop('orders');
	}

}
