<?php
namespace App\Http\Repository;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleRepository
{
    private $article;
    
    /**
     * __construct
     *
     * @param  Article $article
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }
    
    /**
     * __call
     *
     * @param  function $method
     * @param  mixed $arguments
     * @return Closure
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->article, $method], $args);
    }
}
