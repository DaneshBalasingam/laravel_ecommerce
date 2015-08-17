<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {

	protected $fillable = array(
		'title',
		'excerpt',
		'published_at',
		'image_name',
		'image_type',
		'link'
	);

}
