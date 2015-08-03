<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {

	protected $fillable = array(
			'name'		
		);

	public function pictures(){

		return $this->belongsToMany('App\Picture');
		
	}

	/*public function article(){

		return $this->belongsTo('App\Article');
		//return $this->morphTo('App\Article');

	}*/

	public function galleryable(){

		return $this->morphTo();

	}

	public static function createGallery($name) {

		$gallery = new Gallery;
		$gallery->name = $name;	

		return $gallery;

	}



}
