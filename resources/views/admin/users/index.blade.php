@extends("admin.layouts.app")

@section("content")
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">

            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    @include('admin.layouts.alerts')


    <div class="row">
        <div class="col">
            <div class="card bg-secondary shadow">
                <div class="card-header">
                    <form action="{{ route("admin.users.index") }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <select class="form-control" name="admin_global_search">
                                            <option value="">Search By</option>
                                            <option value="id" {{ request()->get("admin_global_search") == 'id' ? 'selected' : null }}>ID</option>
                                            <option value="first_name" {{ request()->get("admin_global_search") == 'first_name' ? 'selected' : null }}>First Name</option>
                                            <option value="last_name" {{ request()->get("admin_global_search") == 'last_name' ? 'selected' : null }}>Last Name</option>
                                            <option value="email" {{ request()->get("admin_global_search") == 'email' ? 'selected' : null }}>Email</option>
                                            <option value="phone" {{ request()->get("admin_global_search") == 'phone' ? 'selected' : null }}>Phone</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                        </div>
                                        <input class="form-control" value="{{request()->get('query')}}" name="query" placeholder="Search" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <select class="form-control" name="per_page">
                                            @for($i=10 ; $i <= 100 ; $i+=10) <option value="{{$i}}"
                                              {{ (request()->filled('per_page') && (int)request()->get('per_page') === $i) || (!request()->filled('per_page') && $i ==10) ? 'selected':'' }}>{{$i}}</option>
                                                @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker" autocomplete="off" value="{{request()->get('from')}}" name="from" data-date-format="yyyy-mm-dd" placeholder="Select From date" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker" autocomplete="off" value="{{request()->get('to')}}" name="to" data-date-format="yyyy-mm-dd" placeholder="Select To date" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group mb-4">
                                        <select class="form-control" name="active">
                                            <option value="">All Statues</option>
                                            @foreach($status::getList() as $key => $value)
                                            <option value="{{ $key }}" {{ request()->filled('active') && (int)request()->get('active') === $key ? 'selected':'' }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <button type="submit" href="#" class="btn btn-block btn-outline-primary"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group"></div>

    <!-- Table -->
    <div class="row">
        <div class="col" data-check-all-container>
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <h3 class="mb-0">Users</h3>
                        </div>
                        <div class="col-7 text-right">

                            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-icon btn-outline-primary float-right">Create <span class="btn-inner--icon"><i class="fa fa-plus"></i></span></a>

                            <button type="submit mr-2" onclick="remove_all()" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>

                            <span class="btn btn-sm btn-primary mr-2"> 
                                Count: <span data-check-all-count>0</span> 
                            </span>
                            <form id="delete_all" class="d-none" action="{{route('admin.users.delete.all')}}" method="post">
                                @csrf
                                <input type="hidden" class="user_ids" name="user_ids" value="">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input data-check-all type="checkbox" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                </th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $item)
                            <tr>
                                <td>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input data-check-all-item class="choise_checkbox" value="{{ $item->id }}" type="checkbox" aria-label="Checkbox for following text input">
                                        </div>
                                    </div>
                                </td>
                                <th scope="row">
                                    {{ $item->id }}
                                </th>
                                <td>
                                    {{ $item->first_name.' '. $item->last_name }}
                                </td>
                                <td>
                                    {{ $item->phone }}
                                </td>     
                                <td>
                                    {{ $item->email }}
                                </td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item has-icon" href="{{ route("admin.users.edit", ['user' => $item]) }}"><i class="fa fa-edit"></i> Show & Edit</a>

                                            <button type="button" class="dropdown-item has-icon" data-toggle="modal" data-target="#delete_model_{{ $item->id }}">
                                                <i class="fa fa-trash"></i> Remove
                                            </button>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach($list as $item)
                <div class="modal fade" id="delete_model_{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="example-Modal3">{{trans('Delete')}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('admin.users.destroy', ['user' => $item]) }}" method="Post">
                                @method('DELETE')
                                @csrf
                                <div class="modal-body">
                                    Are you sure? The operation can't be undone.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">{{trans('Close')}}</button>
                                    <button type="submit" class="btn btn-primary">{{trans('Delete')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="card-footer py-4">
                    {{ $list->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

</div>

@endsection

@section("script")
<script type="text/javascript" src="{{ asset('assets/js/check-all.umd.js') }}"></script>
<script type="text/javascript">
    var x = checkAll.default(document.querySelector('[data-check-all-container]'))

    function remove_all() {
        var str = ''
        $('.choise_checkbox').each(function() {
            if (this.checked) {
                str += $(this).val() + ','
            }
        });
        $('.user_ids').val(str.slice(0, -1))
        if (confirm("are you Sure ?")) {
            $('#delete_all').submit()
        }
    }

    function setUserId() {
        var str = ''
        $('.choise_checkbox').each(function() {
            if (this.checked) {
                str += $(this).val() + ','
            }
        });
        $('.notify_user_ids').val(str.slice(0, -1))
    }
</script>
@endsection
