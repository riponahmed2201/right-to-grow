@extends('admin.master')

@section('custom_css')
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">

                    @if (isset($budget))
                        <h3 class="card-title">Edit development expense budget</h3>
                    @else
                        <h3 class="card-title">Create development expense budget</h3>
                    @endif

                    <div class="card-tools">
                        <a href="{{ route('development.expense.budget.index') }}" class="btn btn-success">
                            <i class="fas fa-list-alt"></i>
                            View List
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form
                    action="{{ isset($budget) ? route('development.expense.budget.update', $budget->id) : route('development.expense.budget.store') }}"
                    method="post">
                    @csrf

                    @isset($budget)
                        @method('PUT')
                    @endisset

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Financial Year:</label>
                                    <select class="form-control select2bs4 @error('financial_year') is-invalid @enderror"
                                        name="financial_year">
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach ($financialYearList as $financial)
                                            <option
                                                @isset($budget) {{ $budget->financial_year == $financial->year_name ? 'selected' : '' }} @endisset
                                                value="{{ $budget->financial_year ?? $financial->year_name }}">
                                                {{ $financial->year_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('financial_year'))
                                        <p class="text-danger mt-1">{{ $errors->first('financial_year') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Union Name:</label>
                                    <select class="form-control select2bs4 @error('union_name') is-invalid @enderror"
                                        name="union_name">
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach ($unions as $union)
                                            <option
                                                @isset($budget) {{ $budget->union_id == $union->id ? 'selected' : '' }} @endisset
                                                value="{{ $budget->union_id ?? $union->id }}">{{ $union->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('union_name'))
                                        <p class="text-danger mt-1">{{ $errors->first('union_name') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expense category:</label>
                                    <select class="form-control select2bs4 @error('expense_category') is-invalid @enderror"
                                        name="expense_category">
                                        <option selected="selected" value="">----Please select----</option>
                                        @foreach ($expense_categories as $expense_category)
                                            <option
                                                @isset($budget) {{ $budget->expense_category_id == $expense_category->id ? 'selected' : '' }} @endisset
                                                value="{{ $budget->expense_category_id ?? $expense_category->id }}">
                                                {{ $expense_category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('expense_category'))
                                        <p class="text-danger mt-1">{{ $errors->first('expense_category') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Current Year Budget:</label>
                                    <input type="number" name="current_year_budget"
                                        value="{{ $budget->current_year_budget ?? old('current_year_budget') }}"
                                        class="form-control @error('current_year_budget') is-invalid @enderror"
                                        placeholder="Enter current_year_budget">
                                    @if ($errors->has('current_year_budget'))
                                        <p class="text-danger mt-1">{{ $errors->first('current_year_budget') }}</p>
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
