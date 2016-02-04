<?php namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
Use Carbon\Carbon;

class ArticlesController extends Controller {


	/**
	 * Create a new article controller instance
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'index']);
	}

	public function index()
	{
		$articles = Article::latest('published_at')->published()->get();
		
		$latest = Article::latest()->first();

		return view('articles.index', compact('articles', 'latest') );
	}

	public function show(Article $article)
	{
		return view('articles.show', compact('article'));

	}

	public function create()
	{
		$tags = Tag::lists('name' , 'id');
		return view('articles.create', compact('tags'));
	}
	
	/**
	 * Save A New Article
	 * @param  ArticleRequest $request
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
		$this->createArticle($request);

		flash()->success("Your article has been created");
		
		return redirect('articles');
	}

	/**
	 * Edit an existing article
	 * @param  Article $article
	 * @return [type]
	 */
	public function edit(Article $article)
	{
		$tags = Tag::lists('name' , 'id');

		return view('articles.edit', compact('article', 'tags'));

	}

	public function update(Article $article, ArticleRequest $request)
	{
		$article->update($request->all());
		$this->syncTags($article, $request->input('tag_list'));
		
		return redirect('articles');
	}

	private function syncTags(Article $article, array $tags)
	{
		$article->tags()->sync($tags);
		//attach detach sync
	}

	/**
	 * Create a new article
	 * @param  ArticleRequest $request
	 * @return mixed
	 */
	private function createArticle(ArticleRequest $request)
	{
		$article = Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return $article;
	}

}
