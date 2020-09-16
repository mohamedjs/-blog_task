<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\ArticleRepository;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Http\Filters\GlobalSearch;
use App\Http\Filters\ToDateSearch;
use App\Http\Filters\FromDateSearch;
use App\Http\Filters\CategoryFilter;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * ArticleController constructor.
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(Request $request)
    {
        $articles = $this->articleRepository
                    ->with('comments')
                    ->filter($this->filters())   
                    ->active() 
                    ->paginate(request('per_page',12));

        return response()->json(['status' => 'success', 'data' => new ArticleCollection($articles), 'message' => 'get All Article']);
    }

    public function show(Article $article)
    {
        return  response()->json(['status' => 'success', 'data' => new ArticleResource($article), 'message' => 'get All Article']);
    }

    public function filters()
    {
        return [
            'from'                => new FromDateSearch ,
            'to'                  => new ToDateSearch ,
            'category_id'         => new CategoryFilter ,
            'global_search'       => new GlobalSearch(['name','description'])
        ];
    }

}
