<?php namespace App\Http\Controllers;

use App\Category;
use App\Picture;
use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
//use Illuminate\Http\Request;
use Request;

class CategoriesController extends Controller {

	public function __construct() {

		$this->middleware('auth', [ 'only' => array('create', 'edit', 'store', 'update')]);
		$this->middleware('adminUser', ['only' => array('create', 'edit', 'store', 'update')]);
		$this->middleware('createCart');
	}

	public function index() {

	}

	public function create() {

		$categories = Category::all();
		//$categories = Category::lists('name','id');
		$pictures = Picture::all();

		return view('categories.create')->with([
			'pictures' => $pictures,
			'categories' => $categories
		]);

	}

	public function store() {

		$input = Request::all();
		$parent = $input['parent'];
		
		$input['created_at'] = Carbon::now();
		$category = Category::create($input);
		
		if ( $parent != "none" ) {
			$parent_array = [$parent];
			$category->parentCategories()->sync($parent_array);
		}
		

		flash()->success('New category has been created');
		return redirect('admin');


	}

	public function show(Category $category) {


		$articles = $category->articles()->published()->paginate(2);

		$articles->setPath('articles');

		return view('articles.index')->with('articles',$articles);
	}

	public function update() {



	}

	private function syncCategory () {


	}

}