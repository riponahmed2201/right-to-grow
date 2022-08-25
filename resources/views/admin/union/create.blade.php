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
                                    <select class="form-control select2bs4" name="upazila_name" >
                                        <option selected="selected">----Please select----</option>
                                        @foreach($upazilas as $upazila)
                                            <option value="{{$upazila->id}}">{{$upazila->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('upazila_name'))
                                        <strong class="text-danger">{{ $errors->first('upazila_name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter union name">
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

@section('custom_js')
    <script>
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>
@endsection
