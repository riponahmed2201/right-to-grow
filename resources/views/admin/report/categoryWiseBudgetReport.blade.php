@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Wise Budget Report</h3>
                        </div>
                        <form action="#" method="GET">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Financial Name:</label>
                                            <select
                                                class="form-control select2bs4 @error('financial_year_name') is-invalid @enderror"
                                                name="financial_year_name">
                                                <option selected="selected" value="">----Please select----</option>
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
