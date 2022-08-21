@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Category head create</h3>
                    <div class="card-tools">
                        <a href="{{route('category.head.index')}}" class="btn btn-primary">
                          Category head list
                        </a>
                    </div>
                </div>
                <form action="{{route('category.head.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Category Name</label>
                                    <select class="form-control select2" name="category_name" >
                                        <option selected="selected">----Please select----</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_name'))
                                        <strong class="text-danger">{{ $errors->first('category_name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Head Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter head name">
                                    @if ($errors->has('name'))
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
