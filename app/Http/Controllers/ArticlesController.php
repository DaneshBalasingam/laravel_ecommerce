<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Cart;
use App\Picture;
use App\Gallery;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

//use Illuminate\Http\Request;
use Request;

use Image;




class ArticlesController extends Controller {

	public function __construct() {

		$this->middleware('auth', [ 'only' => array('create', 'edit', 'store', 'update')]);
		$this->middleware('adminUser', ['only' => array('create', 'edit', 'store', 'update')]);
		$this->middleware('createCart');
	}

	public function index()
	{

		$articles = Article::latest('published_at')->published()->paginate(2);

		$articles->setPath('articles');

		return view('articles.index')->with('articles',$articles);
	}


	public function show(Article $article)
	{

		return view('articles.show')->with('article',$article);

	}

	public function create()
	{

        $tags = Tag::lists('name','id');
        $categories = Category::all();
        $pictures = Picture::all();

		return view('articles.create')->with([
			'tags' => $tags,
			'pictures' => $pictures,
			'categories' => $categories
		]);


	}

	public function store(Requests\CreateArticleRequest $request)
	{

		$this->createArticle($request);

		flash()->success('Your article has been created');

       	return redirect('articles');

	}



	public function edit(Article $article)
	{

		 $tags = Tag::lists('name','id');
		 $categories = Category::all();

		return view('articles.edit')->with([
            'article'=> $article, 
            'tags' => $tags,
            'categories' => $categories

         ]);

	}	

	public function update(Article $article, Requests\UpdateArticleRequest $request)
	{


		$article->update($request->all());

		$tags = $request->input('tag_list');

		$tags = Tag::createTag($tags);

        $this->syncTags($article, $tags);
        
		$pic = $request->input('featured_image');

		$this->syncPictures($article, $pic);

		if ( $request->input('gallery')) {
			$gallery_pics = $request->input('gallery');
		} else {
			$gallery_pics = [];
		}	

		$gallery = $article->gallery[0];

		$this->syncGallery($gallery, $gallery_pics);

		if ($categories = $request->input('category')) {

			$this->syncCategories($article, $categories);

		}

		return redirect('articles');

	}

	public function destroy(Article $article) {

		$article->delete();

		return redirect('articles');
	}


	private function createArticle(Requests\CreateArticleRequest  $request){


		$article = \Auth::user()->articles()->create($request->all());

		$tags = $request->input('tag_list');

		$tags = Tag::createTag($tags);

        $this->syncTags($article, $tags);
        
		$pic = $request->input('featured_image');

		$this->syncPictures($article, $pic);

		if ( $request->input('gallery')) {
			$gallery_pics = $request->input('gallery');
		} else {
			$gallery_pics = [];
		}		

		$gallery = Gallery::createGallery($article->slug);

		$article->gallery()->save($gallery);

		$this->syncGallery($gallery, $gallery_pics);

		if ($categories = $request->input('category')) {

			$this->syncCategories($article, $categories);

		}		

	}

	private function syncCategories(Article $article, array $categories) {

		$article->categories()->sync($categories);

	}



	private function syncGallery(Gallery $gallery, array $gallery_pics) {

		$gallery->pictures()->sync($gallery_pics);
	}


	private function syncPictures(Article $article, $pic ) {

		if ( $pic_collection = Picture::where('filename', $pic)->first() ) {

			$article->pictures()->sync([$pic_collection->id]);

		}
	}


	private function syncTags(Article $article, array $tags){

		$article->tags()->sync($tags);
	}



}
