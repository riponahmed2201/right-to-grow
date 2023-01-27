@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Filter</h3>
                        </div>
                        <form action="{{ route('admin.getHealthComparisonReport') }}" method="GET">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Union Name:</label>
                                            <select required id="union_name"
                                                class="form-control select2bs4 @error('union_name') is-invalid @enderror"
                                                name="union_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($unions as $union)
                                                    <option value="{{ $union->id }}">
                                                        {{ $union->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('union_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('union_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>From Financial Year:</label>
                                            <select required id="from_financial_year"
                                                class="form-control select2bs4 @error('from_financial_year') is-invalid @enderror"
                                                name="from_financial_year">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($financialYears as $financialYear)
                                                    <option value="{{ $financialYear->financial_year_name }}">
                                                        {{ $financialYear->financial_year_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('from_financial_year'))
                                                <p class="text-danger mt-1">{{ $errors->first('from_financial_year') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>To Financial Year:</label>
                                            <select required id="to_financial_year"
                                                class="form-control select2bs4 @error('to_financial_year') is-invalid @enderror"
                                                name="to_financial_year">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($financialYears as $financialYear)
                                                    <option value="{{ $financialYear->financial_year_name }}">
                                                        {{ $financialYear->financial_year_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('to_financial_year'))
                                                <p class="text-danger mt-1">{{ $errors->first('to_financial_year') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit"
                                                style="margin-top: 32px">Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
