@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    @if (isset($subcategory))
                        <h3 class="card-title">Edit Subcategory</h3>
                    @else
                        <h3 class="card-title">Create Subcategory</h3>
                    @endif

                    <div class="card-tools">
                        <a href="{{ route('subcategory.index') }}" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i>
                            View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form
                    action="{{ isset($subcategory) ? route('subcategory.update', $subcategory->id) : route('subcategory.store') }}"
                    method="post">
                    @csrf

                    @isset($subcategory)
                        @method('PUT')
                    @endisset

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Category Name:</label>
                                    <select class="form-control select2bs4 @error('category_name') is-invalid @enderror"
                                        name="category_name">
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach ($categories as $category)
                                            <option
                                                @isset($subcategory) {{ $subcategory->category_id == $category->id ? 'selected' : '' }} @endisset
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_name'))
                                        <p class="text-danger mt-1">{{ $errors->first('category_name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" value="{{ $subcategory->name ?? old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter subcategory">
                                    @if ($errors->has('name'))
                                        <p class="text-danger mt-1">{{ $errors->first('name') }}</p>
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
