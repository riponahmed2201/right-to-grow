@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Parent Category create</h3>
                    <div class="card-tools">
                        <a href="{{route('parentCategory.index')}}" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i>
                            View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form action="{{route('parentCategory.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Category Title</label>
                                    <select class="form-control select2bs4 @error('category_title') is-invalid @enderror" name="category_title">
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach($categoryList as $category)
                                            <option value="{{$category->id}}">{{$category->category_title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_title'))
                                        <p class="text-danger mt-1">{{ $errors->first('category_title') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Parent Category Name</label>
                                    <input type="text" name="parent_category_name" class="form-control @error('parent_category_name') is-invalid @enderror" placeholder="Enter parent category">
                                    @if ($errors->has('parent_category_name'))
                                        <p class="text-danger mt-1">{{ $errors->first('parent_category_name') }}</p>
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
