<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;


class Article extends Model {

		use SoftDeletes;

		protected $fillable = array(
			'title', 
			'body',
			'excerpt',
			'published_at',
			'slug'
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
			//$this->attributes['published_at'] = carbon::parse($date);

		}


		public function categories(){

			return $this->belongsToMany('App\Category')->withTimestamps();

		}


		public function gallery(){

			//return $this->hasOne('App\Gallery');
			return $this->morphMany('App\Gallery', 'galleryable');

		}



		public function pictures(){

			return $this->belongsToMany('App\Picture')->withTimestamps();
			//return $this->belongsTo('App\Picture');

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
