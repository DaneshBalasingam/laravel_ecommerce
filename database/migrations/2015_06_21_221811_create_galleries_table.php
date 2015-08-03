<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries', function(Blueprint $table)
		{
			$table->increments('id');
			//$table->integer('article_id')->unsigned();
			$table->integer('galleryable_id')->unsigned();
			$table->string('galleryable_type');

			$table->string('name');
			$table->timestamps();


			/*$table->foreign('article_id')
				  ->references('id')
				  ->on('articles')
				  ->onDelete('cascade');*/

		});

		Schema::create('gallery_picture', function(Blueprint $table)
		{
			$table->integer('gallery_id')->unsigned()->index();
			$table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
			$table->integer('picture_id')->unsigned()->index();
			$table->foreign('picture_id')->references('id')->on('pictures')->onDelete('cascade');
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
		Schema::drop('gallery_picture');
		Schema::drop('galleries');
	}

}
