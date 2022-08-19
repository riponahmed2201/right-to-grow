@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">District create</h3>
                    <div class="card-tools">
                        <a href="{{route('district.index')}}" class="btn btn-primary">
                            District list
                        </a>
                    </div>
                </div>
                <form action="{{route('district.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select division Name</label>
                                    <select class="form-control select2" name="division_name" >
                                        <option selected="selected">----Please select----</option>
                                        @foreach($disisions as $disision)
                                            <option value="{{$disision->id}}">{{$disision->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter head name">
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
