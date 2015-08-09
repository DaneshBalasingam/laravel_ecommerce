<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;
use App\Article;

class TagsController extends Controller {

	public function show(Tag $tag) {

		$products = $tag->products()->latest('published_at')->published();

		$articles = $tag->articles()->latest('published_at')->published();

		return view('tags.show')->with([
			'articles' => $articles,
			'products' => $products,
			'tag' => $tag
		]);
	}






}
