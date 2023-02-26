@extends('master')

@section('main-content')
    <div class="main-containt">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h2 class="page-title text-center">ইউনিয়ন পরিষদ বাজেট ফরম "খ"</h2>
            </div>
        </div>

        <br><br>

        @include('message')

        <div class="card">
            <div class="card-header">
                <h4>Filter</h4>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <form action="{{ route('user.getAllUnionVittikData') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Union Name</label>
                                    <select class="form-control mt-2" name="union_name" id="union_name" required>
                                        <option value="-1">--select union name--</option>
                                        @foreach ($unions as $union)
                                            <option value="{{ $union->union_id }}">{{ $union->union_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" style="margin-top: 32px;">
                                    <button type="submit" class="btn btn-success">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                <h4>ইউনিয়ন ভিত্তিক ডাটা</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="frontendDatatable1">
                                <thead>
                                    <tr>
                                        <th style="width: 100px" class="text-center">ক্রমিক নং</th>
                                        <th class="text-center">বিভাগ</th>
                                        <th class="text-center">জেলা</th>
                                        <th class="text-center">উপজেলা</th>
                                        <th class="text-center">ইউনিয়ন</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($unions))
                                        @foreach ($unions as $union)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center"> {{ $union->division_name }}</td>
                                                <td class="text-center"> {{ $union->district_name }}</td>
                                                <td class="text-center"> {{ $union->upazila_name }}</td>
                                                <td class="text-center">
                                                    <a
                                                        href="{{ route('user.getAllKhaFormData', $union->union_id) }}">{{ $union->union_name }}</a>
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
