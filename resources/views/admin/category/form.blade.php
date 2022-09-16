@extends('admin.master')

@section('custom_css')
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">

                    @if (isset($category))
                        <h3 class="card-title">Edit Category</h3>
                    @else
                        <h3 class="card-title">Create Category</h3>
                    @endif

                    <div class="card-tools">
                        <a href="{{ route('category.index') }}" class="btn btn-success">
                            <i class="fas fa-list-alt"></i>
                            View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                    method="post">
                    @csrf

                    @isset($category)
                        @method('PUT')
                    @endisset

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type:</label>
                                    <select class="form-control select2bs4 @error('type') is-invalid @enderror"
                                        name="type">
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach ($types as $type)
                                            <option
                                                @isset($category) {{ $category->type_id == $type->id ? 'selected' : '' }} @endisset
                                                value="{{ $category->type_id ?? $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type'))
                                        <p class="text-danger mt-1">{{ $errors->first('type') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" value="{{ $category->name ?? old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter name">
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
