<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Article;
use App\Product;
use App\Tag;
use App\Picture;
use App\Gallery;
use App\Category;

class ProductsController extends Controller {

	public function __construct() {

		$this->middleware('auth', [ 'only' => array('create', 'edit', 'store', 'update')]);
		$this->middleware('adminUser', ['only' => array('create', 'edit', 'store', 'update')]);
		$this->middleware('createCart');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::latest('published_at')->published()->paginate(2);

		$products->setPath('products');

		return view('products.index')->with('products',$products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$tags = Tag::lists('name','id');
        $categories = Category::all();
        $pictures = Picture::all();

		return view('products.create')->with([
			'tags' => $tags,
			'pictures' => $pictures,
			'categories' => $categories
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateProductRequest $request)
	{
		$this->createProduct($request);

		flash()->success('New Product has been added');

       	return redirect('products');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  Product $product
	 * @return Response
	 */
	public function show(Product $product)
	{
		return view('products.show')->with('product',$product);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Product $product
	 * @return Response
	 */
	public function edit(Product $product)
	{
		$tags = Tag::lists('name','id');
		$categories = Category::all();

		return view('products.edit')->with([
            'product'=> $product, 
            'tags' => $tags,
            'categories' => $categories

        ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Product $product
	 * @return Response
	 */
	public function update(Product $product, Requests\UpdateProductRequest $request)
	{

		$product->update($request->all());

		$tags = $request->input('tag_list');

		$tags = Tag::createTag($tags);

        $this->syncTags($product, $tags);
        
		$pic = $request->input('featured_image');

		$this->syncPictures($product, $pic);

		if ( $request->input('gallery')) {
			$gallery_pics = $request->input('gallery');
		} else {
			$gallery_pics = [];
		}	

		$gallery = $product->gallery[0];

		$this->syncGallery($gallery, $gallery_pics);

		if ($categories = $request->input('category')) {

			$this->syncCategories($product, $categories);

		}

		return redirect('products');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Product $product)
	{
		$product->delete();

		return redirect('products'); 
	}


	private function createProduct(Requests\CreateProductRequest  $request){


		$product = \Auth::user()->products()->create($request->all());

		$tags = $request->input('tag_list');

		$tags = Tag::createTag($tags);

        $this->syncTags($product, $tags);
        
		$pic = $request->input('featured_image');

		$this->syncPictures($product, $pic);

		if ( $request->input('gallery')) {
			$gallery_pics = $request->input('gallery');
		} else {
			$gallery_pics = [];
		}		

		$gallery = Gallery::createGallery($product->slug);

		$product->gallery()->save($gallery);

		$this->syncGallery($gallery, $gallery_pics);

		if ($categories = $request->input('category')) {

			$this->syncCategories($product, $categories);

		}		

	}

	private function syncCategories(Product $product, array $categories) {

		$product->categories()->sync($categories);

	}

	private function syncGallery(Gallery $gallery, array $gallery_pics) {

		$gallery->pictures()->sync($gallery_pics);

	}

	private function syncPictures(Product $product, $pic ) {

		if ( $pic_collection = Picture::where('filename', $pic)->first() ) {

			$product->pictures()->sync([$pic_collection->id]);

		}
	}


	private function syncTags(Product $product, array $tags){

		$product->tags()->sync($tags);
	}

}
