<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;
use App\Product;
use App\Publishable;
use App\Article;
use Carbon\Carbon;

class TagsController extends Controller {

	public function show($tagName) {

		$tag = \App\Tag::where('name', $tagName)->first();

		if ( $tag ) {
			$publishables = Publishable::searchByTag($tag);
		} else {
			$publishables = collect([]);
		}

		

		return view('tags.show')->with([
			'publishables' => $publishables,
			'tagName' => $tagName
		]);
	}






}
