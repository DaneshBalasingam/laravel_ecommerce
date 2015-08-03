<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model {

	protected $fillable = array(
			'filename', 
			'type'		
		);

	public function articles(){
		
		return $this->hasMany('App\Article');
	}

	public function products(){
		
		return $this->hasMany('App\Product');
	}

	public function galleries(){

		return $this->belongsToMany('App\Gallery');
		
	}

}
