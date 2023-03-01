@extends('master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Wash and Nutrition</h3>
                        </div>
                        <form action="{{ route('user.getWashAndNutritionTracking') }}" method="GET">

                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Financial Name:</label>
                                            <select
                                                class="form-control mt-2 select2bs4 @error('financial_year_name') is-invalid @enderror"
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
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Union Name:</label>
                                            <select
                                                class="form-control mt-2 select2bs4 @error('union_name') is-invalid @enderror"
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

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="submit"
                                                style="margin-top: 31px">Filter</button>
                                        </div>
                                    </div>

                                </div>
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
