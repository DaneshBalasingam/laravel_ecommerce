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

		$categories = Category::all();

		return view('categories.index')->with('categories',$categories);
		
	}

	public function create() {

		$categories = Category::all();
		
		$pictures = Picture::all();

		return view('categories.create')->with([
			'pictures' => $pictures,
			'categories' => $categories
		]);

	}

	public function store() {

		$input = Request::all();
		$parent = $input['parent'];

		$input['slug'] = $input['name'] . '-' . $input['type'];
		
		$input['created_at'] = Carbon::now();
		$category = Category::create($input);
		
		if ( $parent != "none" ) {
			$parent_array = [$parent];
			$category->parentCategories()->sync($parent_array);
		}
		

		flash()->success('New category has been created');
		return redirect('categories');


	}

	public function show(Category $category) {

		if ( $category->type == "article") {
			$articles = $category->articles()->published()->paginate(6);

			$articles->setPath('articles');

			return view('articles.index')->with([
				'articles' => $articles, 
				'category' => $category->name
			]);
		} else {

			$products = $category->products()->published()->paginate(6);

			$products->setPath('products');

			return view('products.index')->with([
				'products' => $products,
				'category' => $category->name
			]);

		}
	}

	public function edit(Category $category) {

		return view('categories.edit')->with('category', $category);

	}

	public function update() {



	}

	private function syncCategory () {


	}

}
