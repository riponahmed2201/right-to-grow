@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Division Create</h3>
                    <div class="card-tools">
                        <a href="{{ route('division.index') }}" class="btn btn-primary">
                            <i class="fa fa-list mr-1"></i> Division List
                        </a>
                    </div>
                </div>
                <form action="{{ route('division.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter division name">
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
