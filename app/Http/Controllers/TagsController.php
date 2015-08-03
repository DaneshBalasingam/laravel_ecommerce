<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tag;
use App\Article;

class TagsController extends Controller {

	public function show(Tag $tag) {

		$articles = $tag->articles()->published()->paginate(2);

		$articles->setPath('articles');

		return view('articles.index')->with('articles',$articles);
	}






}
