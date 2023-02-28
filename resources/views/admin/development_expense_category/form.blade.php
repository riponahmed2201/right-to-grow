@extends('admin.master')

@section('custom_css')
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">

                    @if (isset($expense_categories))
                        <h3 class="card-title">Edit development expense category</h3>
                    @else
                        <h3 class="card-title">Create development expense category</h3>
                    @endif

                    <div class="card-tools">
                        <a href="{{ route('development.expense.category.index') }}" class="btn btn-success">
                            <i class="fas fa-list-alt"></i>
                            View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form action="{{ isset($expense_categories) ? route('development.expense.category.update', $expense_categories->id) : route('development.expense.category.store') }}"
                    method="post">
                    @csrf

                    @isset($expense_categories)
                        @method('PUT')
                    @endisset

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" value="{{ $expense_categories->name ?? old('name') }}"
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
