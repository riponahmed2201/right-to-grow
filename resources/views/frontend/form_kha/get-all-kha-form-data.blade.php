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
            <div class="card-header">
                <h4>Filter</h4>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Financial Year</label>
                                    <select class="form-control mt-2" name="" id="">
                                        <option value="">--select financial year--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Union Name</label>
                                    <select class="form-control mt-2" name="" id="">
                                        <option value="">--select union name--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" style="margin-top: 32px;">
                                    <button class="btn btn-success">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="frontendDatatable">
                                <thead>
                                    <tr>
                                        <th style="width: 80px">ক্রমিক নং</th>
                                        {{-- <th>অর্থ বছর</th> --}}
                                        <th>বিভাগ</th>
                                        <th>জেলা</th>
                                        <th>উপজেলা</th>
                                        <th>ইউনিয়ন</th>
                                        <th style="width: 60px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($userInfo))
                                        @foreach ($userInfo as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td>{{ $user->financial_year }}</td> --}}
                                                <td>{{ $user->division_name }}</td>
                                                <td>{{ $user->district_name }}</td>
                                                <td>{{ $user->upazila_name }}</td>
                                                <td>{{ $user->union_name }}</td>
                                                <td style="width: 60px">

                                                    <form action="{{ route('getKhaFormDataDetails') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                                        <input type="hidden" name="union_id" value="{{ $user->union_id }}">
                                                        <input type="hidden" name="financial_year"
                                                            value="{{ $user->financial_year }}">
                                                        <button type="submit" class="btn"
                                                            style="background-color: #5314b1; color: white">View</button>
                                                    </form>
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
    <br><br><br><br>
@endsection
