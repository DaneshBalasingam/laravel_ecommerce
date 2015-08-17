<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Carbon\Carbon;
use Request;
use App\Banner;

use Image;

class BannersController extends Controller {

	public function __construct() {

		$this->middleware('auth', [ 'only' => array('index', 'create', 'edit', 'store', 'update')]);
		$this->middleware('adminUser', ['only' => array('index','create', 'edit', 'store', 'update')]);
		$this->middleware('createCart');
	}

	 /* Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$banners = Banner::all();

		return view('banners.index')->with('banners',$banners);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('banners.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateBannerRequest $request)
	{
		if ($file = $request->file('image'))
		{

			$filename = preg_replace('/(\W+)/', '-', Carbon::now()->toRfc3339String()) . '.' . $file->getClientOriginalExtension();
			
			$path = public_path() . '/images/uploads/';

			$request->merge(['image_type' => $file->getClientMimeType() ]);
			$request->merge(['image_name' => $filename]);
			
			$img = Image::make($request->file('image')->getRealPath());

			$img->save($path . 'banner-' . $filename);
			    
		}

		$newBanner = Banner::create($request->all());

		flash()->success('New Banner has been created');

       	return redirect('admin');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
