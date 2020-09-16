<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\ArticleRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Requests\Admin\ArticleStoreRequest;
use App\Http\Requests\Admin\ArticleUpdateRequest;
use App\Http\Services\ArticleStoreService;
use App\Http\Services\ArticleUpdateService;
use App\Http\Filters\AdminGlobalSearch;
use App\Http\Filters\ToDateSearch;
use App\Http\Filters\FromDateSearch;
use App\Http\Filters\StatusFilter;
use App\Http\Filters\CategoryFilter;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller implements FilterRequest
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var ArticleStoreService
     */
    private $articleStoreService;
    /**
     * @var ArticleUpdateService
     */
    private $articleUpdateService;

    /**
     * __construct
     *
     * inject needed data in constructor
     *
     * @param  ArticleRepository $articleRepository
     * @param  CategoryRepository $categoryRepository
     * @param  ArticleStoreService $articleStoreService
     * @param  ArticleUpdateService $articleUpdateService
     */
    public function __construct(
        ArticleStoreService $articleStoreService,
        ArticleUpdateService $articleUpdateService,
        ArticleRepository $articleRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->articleRepository    = $articleRepository;
        $this->articleStoreService  = $articleStoreService;
        $this->articleUpdateService = $articleUpdateService;
        $this->categoryRepository   = $categoryRepository;
    }

    /**
     * index
     * Get All Articles Data
     * @param  Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $list = $this->articleRepository
                ->with('category')
                ->filter($this->filters())
                ->paginate(request('per_page',10));

        $list->appends($request->all());

        $categories = $this->categoryRepository->get();

        return view('admin.articles.index', compact('list','categories'));
    }

    /**
     * create
     * get Create Article Page
     * @return View
     */
    public function create()
    {
        $categories = $this->categoryRepository->get();
        return view('admin.articles.create',compact('categories'));
    }

    /**
     * store
     *
     * @param  ArticleStoreRequest $request
     * @return Redirect
     */
    public function store(ArticleStoreRequest $request)
    {
        $article = $this->articleStoreService->handle($request->validated());

        $request->session()->flash('success','Article Added Successfully');

        return redirect(route('admin.articles.index'));
    }

    /**
     * edit
     * edit article
     * @param  Article $article
     * @return View
     */
    public function edit(Article $article)
    {
        $categories = $this->categoryRepository->get();
        return view('admin.articles.edit', compact('article','categories'));
    }

    /**
     * update
     *
     * @param  Article $article
     * @param  ArticleUpdateRequest $request
     * @return Redirect
     */
    public function update(Article $article, ArticleUpdateRequest $request)
    {

        $this->articleUpdateService->handle($request->validated(), $article);

        \Session::flash('success','Article updated successfully');

        return redirect(route('admin.articles.index'));
    }

    /**
     * destroy
     *
     * @param  Article $article
     * @return Redirect
     */
    public function destroy(Article $article)
    {

        $article->delete();

        \Session::flash('success','Article has been deleted successfully');

        return redirect(route('admin.articles.index'));
    }
    /**
     * remove_all
     * @param  Request $request
     * @return Redirect
     */
    public function remove_all(Request $request)
    {
      $article = $this->articleRepository
              ->whereIn('id',explode(',',$request->article_ids))
              ->delete();
      return back()->with('success', "Delete ".count(explode(',',$request->article_ids))." Article Successfully");
    }

    /**
     * filters
     * function that have array of filter key that wanted to filter with it and value of array is instance from Filter interface
     * @return array
     */
    public function filters()
    {
        return [
            'from'                => new FromDateSearch ,
            'to'                  => new ToDateSearch ,
            'active'              => new StatusFilter ,
            'category_id'         => new CategoryFilter ,
            'admin_global_search' => new AdminGlobalSearch(['name','description'])
        ];
    }

}
