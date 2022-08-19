@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Union create</h3>
                    <div class="card-tools">
                        <a href="{{route('union.index')}}" class="btn btn-primary">
                            Union list
                        </a>
                    </div>
                </div>
                <form action="{{route('union.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Upazila Name</label>
                                    <select class="form-control select2" name="upazila_name" >
                                        <option selected="selected">----Please select----</option>
                                        @foreach($upazilas as $upazila)
                                            <option value="{{$upazila->id}}">{{$upazila->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter union name">
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
