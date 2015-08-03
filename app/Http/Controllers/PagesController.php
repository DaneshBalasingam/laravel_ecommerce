<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function __construct() {

		$this->middleware('auth', [ 'only' => array('showAdmin')]);
		$this->middleware('adminUser', [ 'only' => array('showAdmin')]);
		$this->middleware('createCart');
	}

	public function showAbout()
	{
		$data = [];

		$data['first'] = 'Danesh';
		$data['last'] = 'Balasingam';

        $data['people'] =[];
        
		$data['people'] = [

			'Steely Dan', 
			'Herbie Hancock', 
			'Chick Corea',
			'Howard Alden',
			'Steve Vai'

		];

		return view('pages/about', $data);
	}

	public function showContact()
	{
		return view('pages/contact');
	}

	public function showAdmin()
	{
		return view('pages/admin');
	}



}
