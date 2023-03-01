@extends('master')

@section('main-content')
    <div class="main-containt">

        <div class="card">
            <div class="card-header">
                <h4>Development Expense Budget Filter</h4>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="{{ route('user.getDevelopmentExpenseBudgetTracking') }}" method="GET">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Financial Year</label>
                                    <select class="form-control mt-2" name="financial_year" id="financial_year" required>
                                        <option value="-1">--select union name--</option>
                                        @foreach ($financialYearList as $financialYear)
                                            <option value="{{ $financialYear->year_name }}">{{ $financialYear->year_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Union Name</label>
                                    <select class="form-control mt-2" name="union_name" id="union_name" required>
                                        <option value="-1">--select union name--</option>
                                        @foreach ($unions as $union)
                                            <option value="{{ $union->id }}">{{ $union->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" style="margin-top: 32px;">
                                    <button type="submit" class="btn btn-success">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection
