<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = array(
		'name',
		'type',
		'slug'
	);

	public function parentCategories()
	{
	  return $this->belongsToMany('App\Category', 'category_subcategory', 'subcategory_id', 'category_id');
	}

	public function subCategories()
	{
	  return $this->belongsToMany('App\Category', 'category_subcategory', 'category_id', 'subcategory_id');
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
