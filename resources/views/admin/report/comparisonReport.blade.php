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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>From Financial Name:</label>
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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>To Financial Name:</label>
                                            <select
                                                class="form-control select2bs4 @error('to_financial_name') is-invalid @enderror"
                                                name="to_financial_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($financialYears as $financialYear)
                                                    <option value="{{ $financialYear->year_name }}">
                                                        {{ $financialYear->year_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('to_financial_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('to_financial_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>From Union Name:</label>
                                            <select
                                                class="form-control select2bs4 @error('from_union_name') is-invalid @enderror"
                                                name="from_union_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($unions as $union)
                                                    <option value="{{ $union->id }}">
                                                        {{ $union->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('from_union_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('from_union_name') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>To Union Name:</label>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Income source statement:</label>
                                            <select
                                                class="form-control select2bs4 @error('category_name') is-invalid @enderror"
                                                name="category_name">
                                                <option selected="selected" value="">----Please select----</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_name'))
                                                <p class="text-danger mt-1">{{ $errors->first('category_name') }}</p>
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
                            <h3 class="card-title">Comparison Report</h3>
                            <div class="card-tools">
                                {{-- Print --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="subcategoryTableId" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="3">Income source statement: খ। স্বাস্থ্য ও সমাজকল্যাণঃ (স্বাস্থ্যগত
                                            পরিচ্ছন্নতা ও পরিবার পরিকল্পনা, প্রাথমিক স্বাস্থ্য পরিচর্যা ও পুষ্টি, ইপিআই
                                            কর্মসূচি, যুবক ও মহিলা কল্যাণসহ সমাজ কল্যালমূলক কর্মকান্ড) </th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th>From Financial Year: 2021-2022</th>
                                        <th>To Financial Year: 2022-2023</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th>From Union Name</th>
                                        <td>10%</td>
                                        <td>8%</td>
                                    </tr>
                                    <tr>
                                        <th>To Union Name</th>
                                        <td>12%</td>
                                        <td>15%</td>
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
