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
                            <table class="table table-bordered table-hover" id="frontendDatatable">
                                <thead>
                                    <tr>
                                        <th style="width: 80px">ক্রমিক নং</th>
                                        <th>অর্থ বছর</th>
                                        <th>বিভাগ</th>
                                        <th>জেলা</th>
                                        <th>উপজেলা</th>
                                        <th>ইউনিয়ন</th>
                                        <th>Status</th>
                                        <th style="width: 250px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($userInfo))
                                        @foreach ($userInfo as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->financial_year }}</td>
                                                <td>{{ $user->division_name }}</td>
                                                <td>{{ $user->district_name }}</td>
                                                <td>{{ $user->upazila_name }}</td>
                                                <td>{{ $user->union_name }}</td>
                                                <td>
                                                    @if ($user->approved_status == 5)
                                                        <span class="badge bg-success text-dark">Approved</span>
                                                    @elseif ($user->approved_status == 6)
                                                        <span class="badge bg-danger text-dark">Declined</span>
                                                    @else
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">

                                                    <div class="btn-group">

                                                        @if ($user->approved_status != 5)
                                                            <a href="{{ route('user.editFormKha', ['user_id' => $user->id, 'union_id' => $user->union_id, 'financial_year' => $user->financial_year]) }}"
                                                                class="btn"
                                                                style="background-color: #f76300; color: white">Edit</a>
                                                        @endif

                                                        <a href="{{ route('show_form_kha_data', ['user_id' => $user->id, 'union_id' => $user->union_id, 'financial_year' => $user->financial_year]) }}"
                                                            class="btn"
                                                            style="background-color: #5314b1; color: white">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td style="text-align: center; color: red" colspan="8">No Data Found!</td>
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
