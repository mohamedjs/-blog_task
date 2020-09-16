<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\UserRepository;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Services\UserStoreService;
use App\Http\Services\UserUpdateService;
use App\Http\Filters\AdminGlobalSearch;
use App\Http\Filters\ToDateSearch;
use App\Http\Filters\FromDateSearch;
use App\Http\Filters\StatusFilter;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller implements FilterRequest
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserStoreService
     */
    private $userStoreService;
    /**
     * @var UserUpdateService
     */
    private $userUpdateService;

    /**
     * __construct
     *
     * inject needed data in constructor
     *
     * @param  UserRepository $userRepository
     * @param  UserStoreService $userStoreService
     * @param  UserUpdateService $userUpdateService
     */
    public function __construct(UserStoreService $userStoreService, UserUpdateService $userUpdateService, UserRepository $userRepository)
    {
        $this->userRepository    = $userRepository;
        $this->userStoreService  = $userStoreService;
        $this->userUpdateService = $userUpdateService;
    }

    /**
     * index
     * Get All Users Data
     * @param  Request $request
     * @return View
     */
    public function index(Request $request)
    {
        $list = $this->userRepository
                ->where('email','!=',auth()->user()->email)
                ->filter($this->filters())
                ->paginate(request('per_page',10));

        $list->appends($request->all());

        return view('admin.users.index', compact('list'));
    }

    /**
     * create
     * get Create User Page
     * @return View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * store
     *
     * @param  UserStoreRequest $request
     * @return Redirect
     */
    public function store(UserStoreRequest $request)
    {
        $user = $this->userStoreService->handle($request->validated());

        $request->session()->flash('success','User Added Successfully');

        return redirect(route('admin.users.index'));
    }

    /**
     * edit
     * edit user
     * @param  Integer $id
     * @return View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * update
     *
     * @param  User $user
     * @param  UserUpdateRequest $request
     * @return Redirect
     */
    public function update(User $user, UserUpdateRequest $request)
    {

        $this->userUpdateService->handle($request->validated(), $user);

        \Session::flash('success','User updated successfully');

        return redirect(route('admin.users.index'));
    }

    /**
     * destroy
     *
     * @param  User $user
     * @return Redirect
     */
    public function destroy(User $user)
    {

        $user->delete();

        \Session::flash('success','User has been deleted successfully');

        return redirect(route('admin.users.index'));
    }
    /**
     * remove_all
     * @param  Request $request
     * @return Redirect
     */
    public function remove_all(Request $request)
    {
      $user = $this->userRepository
              ->whereIn('id',explode(',',$request->user_ids))
              ->delete();
      return back()->with('success', "Delete ".count(explode(',',$request->user_ids))." User Successfully");
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
            'admin_global_search' => new AdminGlobalSearch(['first_name','last_name','email','phone'])
        ];
    }

}
