<?php


namespace App\Http\Services;

use App\Http\Repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class CategoryStoreService
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
    private $CategoryRepository;

    /**
     * CategoryServices constructor.
     * CategoryRepository constructor.
     */
    public function __construct(CategoryRepository $CategoryRepository, UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
        $this->CategoryRepository  = $CategoryRepository;
    }
    /**
     * handle function that make update for Category
     * @param array $request
     * @return Category
     */
    public function handle($request)
    {
        if(isset($request['image'])) {
            $request = array_merge($request, [
                'image' => $this->handleFile($request['image'])
            ]);
        }

        $Category = $this->CategoryRepository->create($request);

        return $Category;
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
