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

	public function show(Tag $tag) {

		$publishables = Publishable::searchByTag($tag);

		return view('tags.show')->with([
			'publishables' => $publishables,
			'tag' => $tag
		]);
	}






}
