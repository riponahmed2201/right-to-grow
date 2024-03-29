@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Wash and nutrition budget edit</h3>
                    <div class="card-tools">
                        <a href="{{ route('wash_and_nutrition.index') }}" class="btn btn-primary">
                            <i class="fa fa-list mr-1"></i> Wash and nutrition budget list
                        </a>
                    </div>
                </div>

                <!-- show message -->
                @include('message')

                <form action="{{ route('wash_and_nutrition.update', $wash_nutrition->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Financial Year</label> <span class="text-danger">*</span>
                                    <select class="form-control select2bs4" name="financial_year_name">
                                        <option selected="selected">----Please select----</option>
                                        @foreach ($financialYears as $financialYear)
                                            <option
                                                {{ $wash_nutrition->financial_year_name == $financialYear->year_name ? 'selected' : '' }}
                                                value="{{ $financialYear->year_name }}">{{ $financialYear->year_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('financial_year_name'))
                                        <strong class="text-danger">{{ $errors->first('financial_year_name') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Union Name</label> <span class="text-danger">*</span>
                                    <select class="form-control select2bs4" name="union_name">
                                        <option selected="selected">----Please select----</option>
                                        @foreach ($unions as $union)
                                            <option {{ $wash_nutrition->union_id == $union->id ? 'selected' : '' }}
                                                value="{{ $union->id }}">{{ $union->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('union_name'))
                                        <strong class="text-danger">{{ $errors->first('union_name') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Category Name</label><span class="text-danger">*</span>
                                    <select class="form-control select2bs4" onchange="load_subcat()" id="category_name"
                                        name="category_name">
                                        <option selected="selected">----Please select----</option>
                                        @foreach ($categories as $category)
                                            @if ($category->id == 20 || $category->id == 21)
                                                <option
                                                    {{ $wash_nutrition->category_id == $category->id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_name'))
                                        <strong class="text-danger">{{ $errors->first('category_name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Select Subcategory Name</label><span class="text-danger">*</span>
                                    <select class="form-control select2bs4" id="subcategory_name" name="subcategory_name">

                                    </select>
                                    @if ($errors->has('subcategory_name'))
                                        <strong class="text-danger">{{ $errors->first('subcategory_name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Total Budget Amount</label><span class="text-danger">*</span>
                                    <input type="text" name="total_budget" class="form-control"
                                        placeholder="Enter total budget amount"
                                        value="{{ $wash_nutrition->total_budget }}">
                                    @if ($errors->has('total_budget'))
                                        <strong class="text-danger">{{ $errors->first('total_budget') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expense Budget Amount</label>
                                    <input type="text" name="expense_budget" class="form-control"
                                        placeholder="Enter expense budget amount"
                                        value="{{ $wash_nutrition->expense_budget }}">
                                    @if ($errors->has('expense_budget'))
                                        <strong class="text-danger">{{ $errors->first('expense_budget') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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

        $(document).ready(function() {
            load_subcat();
        });

        function load_subcat() {

            // e.preventDefault();
            var category_name = $("#category_name").val();
            var subcategory_name = $("#subcategory_name").val();

            var subcategory_name1 = '<?php echo $wash_nutrition->subcategory_id; ?>';

            var token = "{{ csrf_token() }}";
            var url_data = "{{ url('/health-nutrition-subcategory-select-data') }}";

            $.ajax({
                method: "GET",
                url: url_data,
                dataType: "json",
                data: {
                    _token: token,
                    category_name: category_name,
                },
                success: function(data) {

                    if (data) {
                        $('#subcategory_name').empty();
                        $('#subcategory_name').focus;
                        $('#subcategory_name').append(
                            '<option value="">-- select subcategory name--</option>');
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_name"]').append('<option value="' +
                                value.id + '">' + value.name + '</option>');
                            $("#subcategory_name").val(subcategory_name1);
                        });
                    } else {
                        $('#subcategory_name').empty();
                    }
                }
            });
        }
    </script>
@endsection
