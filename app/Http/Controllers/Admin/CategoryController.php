<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\CategoryRepository;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Http\Services\CategoryStoreService;
use App\Http\Services\CategoryUpdateService;
use App\Http\Filters\AdminGlobalSearch;
use App\Http\Filters\ToDateSearch;
use App\Http\Filters\FromDateSearch;
use App\Http\Filters\StatusFilter;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller implements FilterRequest
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var CategoryStoreService
     */
    private $categoryStoreService;
    /**
     * @var CategoryUpdateService
     */
    private $categoryUpdateService;

    /**
     * __construct
     *
     * inject needed data in constructor
     *
     * @param  CategoryRepository $categoryRepository
     * @param  CategoryStoreService $categoryStoreService
     * @param  CategoryUpdateService $categoryUpdateService
     */
    public function __construct(CategoryStoreService $categoryStoreService, CategoryUpdateService $categoryUpdateService, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository    = $categoryRepository;
        $this->categoryStoreService  = $categoryStoreService;
        $this->categoryUpdateService = $categoryUpdateService;
    }

    /**
     * index
     * Get All Categorys Data
     * @param  Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $list = $this->categoryRepository
                ->filter($this->filters())
                ->paginate(request('per_page',10));

        $list->appends($request->all());

        return view('admin.categories.index', compact('list'));
    }

    /**
     * create
     * get Create Category Page
     * @return View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * store
     *
     * @param  CategoryStoreRequest $request
     * @return Redirect
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = $this->categoryStoreService->handle($request->validated());

        $request->session()->flash('success','Category Added Successfully');

        return redirect(route('admin.categories.index'));
    }

    /**
     * edit
     * edit category
     * @param  Category $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * update
     *
     * @param  Category $category
     * @param  CategoryUpdateRequest $request
     * @return Redirect
     */
    public function update(Category $category, CategoryUpdateRequest $request)
    {

        $this->categoryUpdateService->handle($request->validated(), $category);

        \Session::flash('success','Category updated successfully');

        return redirect(route('admin.categories.index'));
    }

    /**
     * destroy
     *
     * @param  Category $category
     * @return Redirect
     */
    public function destroy(Category $category)
    {

        $category->delete();

        \Session::flash('success','Category has been deleted successfully');

        return redirect(route('admin.categories.index'));
    }
    /**
     * remove_all
     * @param  Request $request
     * @return Redirect
     */
    public function remove_all(Request $request)
    {
      $category = $this->categoryRepository
              ->whereIn('id',explode(',',$request->category_ids))
              ->delete();
      return back()->with('success', "Delete ".count(explode(',',$request->category_ids))." Category Successfully");
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
            'admin_global_search' => new AdminGlobalSearch(['name'])
        ];
    }

}
