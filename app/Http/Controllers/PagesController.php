<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
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



}
