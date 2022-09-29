@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">

                    @if (isset($financialYear))
                        <h3 class="card-title">Edit Financial Year</h3>
                    @else
                        <h3 class="card-title">Create Financial Year</h3>
                    @endif

                    <div class="card-tools">
                        <a href="{{ route('financialYear.index') }}" class="btn btn-success">
                            <i class="fa fa-list mr-1"></i> View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form
                    action="{{ isset($financialYear) ? route('financialYear.update', $financialYear->id) : route('financialYear.store') }}"
                    method="post">
                    @csrf
                    @isset($financialYear)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Financial Year Name</label>
                                    <input type="text" name="financial_year_name"
                                        class="form-control @error('financial_year_name') is-invalid @enderror"
                                        value="{{ $financialYear->year_name ?? old('financial_year_name') }}"
                                        placeholder="Enter financial year">
                                    @if ($errors->has('financial_year_name'))
                                        <p class="text-danger mt-1">{{ $errors->first('financial_year_name') }}</p>
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
