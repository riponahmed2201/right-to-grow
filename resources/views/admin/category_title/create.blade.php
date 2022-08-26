@extends('admin.master')

@section('custom_css')

@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Category Title Create</h3>
                    <div class="card-tools">
                        <a href="{{route('categoryTitle.index')}}" class="btn btn-success">
                            <i class="fas fa-list-alt"></i>
                          View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form action="{{route('categoryTitle.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Type:</label>
                                    <select class="form-control select2bs4 @error('category_type') is-invalid @enderror" name="category_type" >
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach($category_types as $type)
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_type'))
                                        <p class="text-danger mt-1">{{ $errors->first('category_type') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Category Title:</label>
                                    <input type="text" name="category_title" class="form-control @error('category_title') is-invalid @enderror" placeholder="Enter title">
                                    @if ($errors->has('category_title'))
                                        <p class="text-danger mt-1">{{ $errors->first('category_title') }}</p>
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
