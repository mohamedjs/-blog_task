<?php


namespace App\Http\Services;

use App\Http\Repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CategoryUpdateService
{
    /**
     * @var IMAGE_PATH
     */
    const IMAGE_PATH = 'categories';
    /**
     * @var UploaderService
     */
    private $uploaderService;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryServices constructor.
     * CategoryRepository constructor.
     */
    public function __construct(CategoryRepository $categoryRepository, UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
        $this->categoryRepository  = $categoryRepository;
    }
    /**
     * handle function that make create for category
     * @param array $request
     * @return Category
     */
    public function handle($request, $category)
    {
        if(isset($request['image'])) {
            $request = array_merge($request, [
                'image' => $this->handleFile($request['image'])
            ]);
        }

        $category = tap($category , function($category)  use ($request){
            $category->update($request);
        });

        return $category;
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
