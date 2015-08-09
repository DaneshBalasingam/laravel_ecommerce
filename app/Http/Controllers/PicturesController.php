<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Response;

//use Illuminate\Http\Request;

use App\Picture;

use Request;

use Image;

class PicturesController extends Controller {

	public function __construct() {

		$this->middleware('auth', [ 'only' => array('create', 'edit', 'store', 'update')]);
		$this->middleware('adminUser', ['only' => array('create', 'edit', 'store', 'update')]);
	}

	/**
	 * Display a listing of all pictures.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pictures = Picture::all();
		//return Response::json($pictures);
		//return $pictures;
		return view('pictures.index')->with('pictures',$pictures);

	}

	/**
	 * Show the form for creating a new picture.
	 *
	 * @return Response
	 */
	public function create()
	{
		$pictures = Picture::latest()->get();
		return view('pictures.create')->with('pictures',$pictures);
	}

	/**
	 * Store a newly created picture in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreatePictureRequest $request)
	{

		if ($file = $request->file('image'))
		{

			$filename = preg_replace('/(\W+)/', '-', Carbon::now()->toRfc3339String()) . '.' . $file->getClientOriginalExtension();
			
			$path = public_path() . '/images/uploads/';

			$picture = [
                'filename' => $filename,
                'type' => $file->getClientMimeType()

			];

			$newPic = Picture::create($picture);
			
			$img = Image::make($request->file('image')->getRealPath());

			$img->resize(null,500, function ($constraint) { $constraint->aspectRatio(); })
				->resize(400,null, function ($constraint) { $constraint->aspectRatio(); })
				->save($path . 'large-' . $filename)
			    ->resize(200,null, function ($constraint) { $constraint->aspectRatio(); })
			    ->resize(null,300, function ($constraint) { $constraint->aspectRatio(); })
			    ->save($path. 'thumbnail-'. $filename)
			    ->resize(80,null, function ($constraint) { $constraint->aspectRatio(); })
			    ->crop(80,80)
			    ->save($path. 'small-'. $filename);
		}

		return $newPic->id;

	}

	/**
	 * Display the specified picture.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Picture $picture)
	{

		return view('pictures.show')->with('picture',$picture);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Picture $picture)
	{
		return "edit page";
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
