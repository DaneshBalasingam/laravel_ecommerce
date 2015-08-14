<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Article;
use App\Product;
use DB;

Abstract class Publishable extends Model {

	public static function searchByTag($tag) {

		$products = $tag->products;

		$articles = $tag->articles;

		$publishables = $products->merge($articles);

		return $publishables;
	}

}
