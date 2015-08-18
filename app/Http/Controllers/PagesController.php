<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use App\Tag;
use App\Publishable;
use Request;
use App\Banner;

class PagesController extends Controller {

	public function __construct() {

		$this->middleware('auth', [ 'only' => array('showAdmin')]);
		$this->middleware('adminUser', [ 'only' => array('showAdmin')]);
		$this->middleware('createCart');
	}

	public function showAbout()
	{

		return view('pages/about');
	}

	public function showContact()
	{
		return view('pages/contact');
	}

	public function showHome()
	{
		$banners = Banner::all();
		
		return view('pages/home')->with([
			'banners' => $banners
		]);
	}

	public function showAdmin()
	{
		return view('pages/admin');
	}

	public function showSearchResult() {

		$input = Request::all();
		
		$search_items = explode(" ", $input['search_text']);

		$all_publishable = collect([]);

		foreach ( $search_items as $search_item ) {

			$tag = \App\Tag::where('name', $search_item)->first();

			if ( $tag ) {
				$publishables = Publishable::searchByTag($tag);
			} else {
				$publishables = collect([]);
			}
			$all_publishable = $all_publishable->merge($publishables);
		}

		$searchText = $input['search_text'];

		return view('pages.search')->with([
			'all_publishable' => $all_publishable,
			'searchText' => $searchText
		]);

	}



}
