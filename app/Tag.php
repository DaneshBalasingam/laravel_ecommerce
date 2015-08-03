<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = array(
		'name' 
	);

	public function articles(){

		return $this->belongsToMany('App\Article');

	}

	public function products(){

		return $this->belongsToMany('App\Product');

	}

	public static function createTag(array $tags) {

		foreach ( $tags as $key => $tag) {

			if ( !Tag::where('id', $tag)->first()){
				

					$tag_array = [ 'name' => $tag ];

					$newTag = Tag::create($tag_array);

					$tags[$key] = $newTag->id;
				
			}

		}

		return $tags;


	}



}
