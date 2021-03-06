@extends("admin.layouts.app")

@section("content")
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
      @if(count($errors)>0)
          <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $error)
                      <li>
                          {{$error}}
                      </li>
                  @endforeach
              </ul>
          </div>
      @endif

        <!-- Table -->
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Articles</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Article Information</h6>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name</label>
                                        @error('name')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="description">Description</label>
                                        @error('description')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <textarea class="form-control" name="description" id="description"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                      <img src="" width="100%" height="100px" alt="">
                                      <label class="form-control-label" for="name">Image</label>
                                      @error('image')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                      @enderror
                                      <input type="file" name="image" accept="image/*">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="category_id">Category</label>
                                        @error('category_id')
                                        <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                        <select class="form-control" name="category_id" id="category_id">
                                            <option value="">Select Category</option>
                                                @foreach($categories as $key => $value)
                                                    <option value="{{ $value->id }}" > {{ $value->name }} </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-1">
                                    <label class="form-control-label" for="active">{{ trans('Active') }}</label>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="custom-toggle">
                                        <input type="checkbox" id="active" name="active" value="1"  >
                                        <span class="custom-toggle-slider rounded-circle"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <button type="submit" href="#" class="btn  btn-outline-primary m-b-5  m-t-5"><i class="fa fa-save"></i> {{trans('save')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
