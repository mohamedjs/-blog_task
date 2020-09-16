<?php


namespace App\Http\Services;

use App\Http\Repository\CommentRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CommentStoreService
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * CommentServices constructor.
     * CommentRepository constructor.
     */
    public function __construct(CommentRepository $commentRepository)
    {
        $this->commentRepository  = $commentRepository;
    }
    /**
     * handle function that make update for comment
     * @param array $request
     * @return Comment
     */
    public function handle($request)
    {

        $comment = $this->commentRepository->create($request);

        return $comment;
    }


}
