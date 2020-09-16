<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\CommentStoreService;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\Api\CommentStoreRequest;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @var CommentStoreService
     */
    private $commentStoreService;

    /**
     * CategoryController constructor.
     * @param CommentStoreService $commentStoreService
     */
    public function __construct(CommentStoreService $commentStoreService)
    {
        $this->commentStoreService = $commentStoreService;
    }
    /**
     * Store Comment Data
     * @param CommentStoreRequest $request
     * Response
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = $this->commentStoreService->handle($request->validated());

        return response()->json(['status' => 'success', 'data' => new CommentResource($comment), 'message' => 'get All Comment']);
    }

}
