<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProductRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}



	/**
	 * Get the validation rules that apply to the request.
	 * 
	 * @return array
	 */
	public function rules()
	{


		return [

			'title' => 'required|min:3',
			'excerpt' => 'required|max:100',
			'body' => 'required',
			'published_at' => 'required|date',
			'slug' => 'required|alpha_dash|unique:articles',
			'price' => 'required|numeric',
			'stock' => 'required|numeric',
		];
	}

	

}