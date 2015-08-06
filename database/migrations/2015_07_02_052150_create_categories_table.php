<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('type');
			$table->string('slug'); 
			$table->timestamps();
		});

		Schema::create('article_category', function(Blueprint $table)
		{
			$table->integer('article_id')->unsigned()->index();
			$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

			$table->integer('category_id')->unsigned()->index();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

			$table->timestamps();
		});

		Schema::create('category_subCategory', function(Blueprint $table)
	    {
	      $table->increments('id');
	      $table->integer('category_id');
	      $table->integer('subCategory_id');
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
		Schema::drop('category_subCategory');
		Schema::drop('article_category');
		Schema::drop('categories');
	}

}
