@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center">ইউনিয়ন পরিষদ বাজেট ফরম "খ"</h2>
            </div>
        </div>

        <br><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/L</th>
                                    <th>Financial Year</th>
                                    <th>Division</th>
                                    <th>District</th>
                                    <th>Upazila</th>
                                    <th>Union</th>
                                    <th style="width: 60px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($userInfo && $userInfo > 0)
                                    @foreach($userInfo as $user)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$user->financial_year}}</td>
                                            <td>{{$user->division_name}}</td>
                                            <td>{{$user->district_name}}</td>
                                            <td>{{$user->upazila_name}}</td>
                                            <td>{{$user->union_name}}</td>
                                            <td style="width: 60px">
                                                <a href="{{route('show_form_kha_data')}}" class="btn btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td style="text-align: center; color: red" colspan="7">No Data Found!</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
