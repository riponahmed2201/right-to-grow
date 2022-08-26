@extends('admin.master')

@section('custom_css')

    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet"
          href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@endsection

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Parent Category List</h3>
                            <div class="card-tools">
                                <a href="{{route('parentCategory.create')}}" class="btn btn-success">
                                    <i class="fas fa-plus-circle"></i>
                                    Create
                                </a>
                            </div>
                        </div>

                        <!-- show message -->
                        @include('message')

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="parentCategoryTableId" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>Category Title</th>
                                    <th>Parent Category</th>
                                    <th>Slug</th>
                                    <th style="width: 50px" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($parentCategoryList as $parentCategory)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td> {{$parentCategory->category_title}}</td>
                                        <td> {{$parentCategory->parent_category_name}}</td>
                                        <td>{{$parentCategory->slug}}</td>
                                        <td class="text-center">
                                            <a href="#" title="Edit Category Title" class="btn btn-sm btn-warning">Edit</a>
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
    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Page specific script -->
    <script>
        $(function () {

            $('#parentCategoryTableId').DataTable({
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
