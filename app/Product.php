<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Publishable {

	use SoftDeletes;

	protected $fillable = array(
		'title', 
		'body',
		'excerpt',
		'published_at',
		'slug',
		'price',
		'stock',

	);

	protected $dates = ['published_at', 'deleted_at'];

	public function scopePublished($query) {

		$query->where('published_at', '<=', Carbon::now());
	}


	public function scopeUnpublished($query) {

		$query->where('published_at', '>', Carbon::now());
	}
	

	public function setPublishedAtAttribute($date) {

		$this->attributes['published_at'] = carbon::CreateFromFormat('Y-m-d', $date);

	}

	public function carts(){

		return $this->belongsToMany('App\Cart')->withPivot('quantity')->withTimestamps();
		//return $this->belongsToMany('App\Cart')->withTimestamps();

	}

	public function categories(){

		return $this->belongsToMany('App\Category')->withTimestamps();

	}


	public function gallery(){

		return $this->morphMany('App\Gallery', 'galleryable');

	}

	public function orders(){

		return $this->belongsToMany('App\Order')->withPivot('quantity')->withTimestamps();

	}



	public function pictures(){

		return $this->belongsToMany('App\Picture')->withTimestamps();

	}


	public function tags(){

		return $this->belongsToMany('App\Tag')->withTimestamps();

	}


	public function getTagListAttribute(){

		return $this->tags->lists('id');

	}


	public function user(){

		return $this->belongsTo('App\User');

	}



}
