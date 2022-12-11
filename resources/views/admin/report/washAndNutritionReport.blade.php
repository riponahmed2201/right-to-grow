@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #5314b1;">
                            <h3 class="card-title">Filter</h3>
                        </div>
                        <form action="{{ route('admin.getWashAndNutritionReportData') }}" method="GET">

                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Financial Name:</label>
                                            <select
                                                class="form-control select2bs4 @error('financial_year_name') is-invalid @enderror"
                                                name="financial_year_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($financialYears as $financialYear)
                                                    <option value="{{ $financialYear->year_name }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('financial_year_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('financial_year_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Union Name:</label>
                                            <select
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

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
