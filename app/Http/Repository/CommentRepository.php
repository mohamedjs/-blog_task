<?php
namespace App\Http\Repository;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentRepository
{
    private $comment;
    
    /**
     * __construct
     *
     * @param  Comment $comment
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
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
        return call_user_func_array([$this->comment, $method], $args);
    }
}
