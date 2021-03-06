<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateArticleRequest extends Request {

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
		
		$article = $this->route('articles');

		return [

			'title' => 'required|min:3',
			'excerpt' => 'required|max:200',
			'body' => 'required',
			'published_at' => 'required|date',
			'slug' => "required|alpha_dash|unique:articles,slug,$article->id",
		];
	}

}
