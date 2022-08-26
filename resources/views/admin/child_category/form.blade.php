@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">

                    @if(isset($childCategory))
                        <h3 class="card-title">Edit Child Category</h3>
                    @else
                        <h3 class="card-title">Child Category create</h3>
                    @endif

                    <div class="card-tools">
                        <a href="{{route('childCategory.index')}}" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i>
                            View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form
                    action="{{isset($childCategory) ? route('childCategory.update',$childCategory->id) : route('childCategory.store')}}"
                    method="post">
                    @csrf
                    @isset($childCategory)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Parent Category</label>
                                    <select
                                        class="form-control select2bs4 @error('parent_category_name') is-invalid @enderror"
                                        name="parent_category_name">
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach($parentCategoryList as $category)
                                            <option
                                                @isset($childCategory)
                                                    {{ $childCategory->parent_category_id == $category->id ? 'selected' : '' }}
                                                @endisset
                                                value="{{$category->id}}">{{$category->parent_category_name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_category_name'))
                                        <p class="text-danger mt-1">{{ $errors->first('parent_category_name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Child Category Name</label>
                                    <input type="text" name="child_category_name"
                                           class="form-control @error('child_category_name') is-invalid @enderror"
                                           value="{{ $childCategory->child_category_name ?? old('child_category_name') }}"
                                           placeholder="Enter child category">
                                    @if ($errors->has('child_category_name'))
                                        <p class="text-danger mt-1">{{ $errors->first('child_category_name') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom_js')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
