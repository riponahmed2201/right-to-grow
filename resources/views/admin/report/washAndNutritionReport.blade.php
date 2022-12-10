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
                        <form action="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Financial Name:</label>
                                            <select
                                                class="form-control select2bs4 @error('from_financial_name') is-invalid @enderror"
                                                name="from_financial_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($financialYears as $financialYear)
                                                    <option value="{{ $financialYear->year_name }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('from_financial_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('from_financial_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Union Name:</label>
                                            <select
                                                class="form-control select2bs4 @error('to_union_name') is-invalid @enderror"
                                                name="to_union_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($unions as $union)
                                                    <option value="{{ $union->id }}">
                                                        {{ $union->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('to_union_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('to_union_name') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Wash and Nutrition Budget Report</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="subcategoryTableId" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Wash and Nutrition Budget Head 2022-23</th>
                                        <th>Total Budget</th>
                                        <th>Expense Budget</th>
                                        <th>Remaining Budget</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Total Wash</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Total Nutrition</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right">Total Wash and Nutrition 2022-23</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
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
