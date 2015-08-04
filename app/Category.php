<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = array(
		'name',
		'type'
	);

	public function parentCategories()
	{
	  return $this->belongsToMany('App\Category', 'category_subCategory', 'subCategory_id', 'category_id');
	}

	public function subCategories()
	{
	  return $this->belongsToMany('App\Category', 'category_subCategory', 'category_id', 'subCategory_id');
	}

	public function articles(){

		return $this->belongsToMany('App\Article');

	}

	public function products(){

		return $this->belongsToMany('App\Product');

	}

	public function hasParentCategories() {

		if ($this->has('parentCategories' , '>', 0)) {

			return true;

		} else {

			return false;

		}
	}

	public function hasSubCategories() {

		if ($this->has('subCategories' , '>', 0)) {

			return true;

		} else {

			return false;
			
		}
	}

}
