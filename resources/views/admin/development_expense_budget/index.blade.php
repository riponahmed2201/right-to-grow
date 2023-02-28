@extends('admin.master')

@section('custom_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Development expense budget List</h3>
                            <div class="card-tools">
                                <a href="{{ route('development.expense.budget.create') }}" class="btn btn-success">
                                    <i class="fas fa-plus-circle"></i>
                                    Create
                                </a>
                            </div>
                        </div>

                        <!-- show message -->
                        @include('message')

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="categoryTableId" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S/L</th>
                                        <th>Financial Year</th>
                                        <th>Union Name</th>
                                        <th>Expense Category Name</th>
                                        <th>Current Year Budget</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($budgets as $budgets)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $budgets->financial_year }}</td>
                                            <td>{{ $budgets->union_name }}</td>
                                            <td>{{ $budgets->expense_category_name }}</td>
                                            <td>{{ $budgets->current_year_budget }}</td>
                                            <td>
                                                <a href="{{ route('development.expense.budget.edit', $budgets->budget_id) }}"
                                                    title="Edit Budget" class="btn btn-sm btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    {{-- <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script> --}}

    <!-- Page specific script -->
    <script>
        $(function() {

            $('#categoryTableId').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
