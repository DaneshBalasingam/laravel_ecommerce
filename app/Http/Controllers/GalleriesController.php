<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Picture;

//use Request;

use Image;

class GalleriesController extends Controller {

	public function create()
	{

		$pictures = Picture::latest()->get();
		return view('galleries.create')->with('pictures',$pictures);

	}

	/*
		Altered to only store pictures. Neccessary for seperate redirect when uploading
		pictures for a gallery as opposed to featured image.
		Actual gallery store is via articles controller
	*/

	public function store(Requests\CreatePictureRequest $request)
	{

		/*if ($file = $request->file('image'))
		{


			$filename = preg_replace('/(\W+)/', '-', Carbon::now()->toRfc3339String()) . '.' . $file->getClientOriginalExtension();
			
			$path = public_path() . '/images/uploads/';

			$picture = [
                'filename' => $filename,
                'type' => $file->getClientMimeType()

			];

			$newPic = Picture::create($picture);
			
			$img = Image::make($request->file('image')->getRealPath());

			$img->resize(600,null, function ($constraint) { $constraint->aspectRatio(); })
			    ->save($path . $filename)
			    ->crop(150, 150)
			    ->save($path. 'thumbnail-'. $filename);
		}*/

		//return redirect('galleries/create');
	}

}
