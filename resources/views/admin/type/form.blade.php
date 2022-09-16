@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">

                    @if (isset($typeInfo))
                        <h3 class="card-title">Type Edit</h3>
                    @else
                        <h3 class="card-title">Type Create</h3>
                    @endif

                    <div class="card-tools">
                        <a href="{{ route('type.index') }}" class="btn btn-success">
                            <i class="fas fa-list-alt"></i>
                            View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form action="{{ isset($typeInfo) ? route('type.update', $typeInfo->id) : route('type.store') }}"
                    method="post">

                    @csrf

                    @isset($typeInfo)
                        @method('PUT')
                    @endisset

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Type:</label>
                                    <input type="text" name="name" value="{{ $typeInfo->name ?? old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter type">
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
