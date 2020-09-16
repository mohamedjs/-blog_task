<?php


namespace App\Http\Services;

use App\Http\Repository\ArticleRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ArticleUpdateService
{
    /**
     * @var IMAGE_PATH
     */
    const IMAGE_PATH = 'articles';
    /**
     * @var UploaderService
     */
    private $uploaderService;
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * ArticleServices constructor.
     * ArticleRepository constructor.
     */
    public function __construct(ArticleRepository $articleRepository, UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
        $this->articleRepository  = $articleRepository;
    }
    /**
     * handle function that make create for article
     * @param array $request
     * @return Article
     */
    public function handle($request, $article)
    {
        if(isset($request['image'])) {
            $request = array_merge($request, [
                'image' => $this->handleFile($request['image'])
            ]);
        }

        $article = tap($article , function($article)  use ($request){
            $article->update($request);
        });

        return $article;
    }
    /**
     * handle image file that return file path
     * @param File $file
     * @return string
     */
    public function handleFile(UploadedFile $file)
    {
        return $this->uploaderService->upload($file, self::IMAGE_PATH);
    }

}
