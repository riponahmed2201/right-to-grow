@extends('admin.master')

@section('main-content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">User create</h3>
                    <div class="card-tools">
                        <a href="{{route('user.index')}}" class="btn btn-primary">
                            User list
                        </a>
                    </div>
                </div>
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name"
                                           value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email"
                                           value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter phone"
                                           value="{{old('phone')}}">
                                    @if ($errors->has('phone'))
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                           placeholder="Enter designation" value="{{old('designation')}}">
                                    @if ($errors->has('designation'))
                                        <strong class="text-danger">{{ $errors->first('designation') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Division Name</label>
                                    <select class="form-control select2bs4" id="division_name" name="division_name">
                                        <option selected="selected">----Please select----</option>
                                        @foreach($districts as $district)
                                            <option
                                                @selected(old('division_name') == $district->id) value="{{$district->id}}">{{$district->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('division_name'))
                                        <strong class="text-danger">{{ $errors->first('division_name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>District Name</label>
                                    <select class="form-control select2bs4" id="district_name" name="district_name">

                                    </select>
                                    @if ($errors->has('district_name'))
                                        <strong class="text-danger">{{ $errors->first('district_name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Upazila Name</label>
                                    <select class="form-control select2bs4" id="upazila_name" name="upazila_name">

                                    </select>
                                    @if ($errors->has('upazila_name'))
                                        <strong class="text-danger">{{ $errors->first('upazila_name') }}</strong>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Union Name</label>
                                    <select class="form-control select2bs4" id="union_name" name="union_name">

                                    </select>
                                    @if ($errors->has('union_name'))
                                        <strong class="text-danger">{{ $errors->first('union_name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" class="form-control"
                                           placeholder="Enter password">
                                    @if ($errors->has('password'))
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input type="file" name="photo" class="form-control-file">
                                    @if ($errors->has('photo'))
                                        <strong class="text-danger">{{ $errors->first('photo') }}</strong>
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
        });

        // when division select then call this function and return to the district data list
        $("#division_name").change("change", function () {

            const division_id = $("#division_name").val();

            const token = "{{ csrf_token() }}";
            const url = "{{ route('user_district_select_data') }}";

            $.ajax({
                method: "GET",
                url: url,
                dataType: "json",
                data: {
                    _token: token,
                    division_id: division_id,
                },
                success: function (data) {

                    if (data) {

                        $('#district_name').empty().focus().append('<option value="">----please select----</option>');

                        $.each(data, function (key, value) {
                            $('select[name="district_name"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    } else {
                        $('#district_name').empty();
                    }
                }
            });
        });

        // when district select then call this function and return to the upazila data list
        $("#district_name").change("change", function () {

            const district_id = $("#district_name").val();

            const token = "{{ csrf_token() }}";
            const url = "{{ route('user_upazila_select_data') }}";

            $.ajax({
                method: "GET",
                url: url,
                dataType: "json",
                data: {
                    _token: token,
                    district_id: district_id,
                },
                success: function (data) {

                    if (data) {

                        $('#upazila_name').empty().focus().append('<option value="">----please select----</option>');

                        $.each(data, function (key, value) {
                            $('select[name="upazila_name"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    } else {
                        $('#upazila_name').empty();
                    }
                }
            });
        });

        // when upazila select then call this function and return to the union data list
        $("#upazila_name").change("change", function () {

            const upazila_id = $("#upazila_name").val();

            const token = "{{ csrf_token() }}";
            const url = "{{ route('user_union_select_data') }}";

            $.ajax({
                method: "GET",
                url: url,
                dataType: "json",
                data: {
                    _token: token,
                    upazila_id: upazila_id,
                },
                success: function (data) {

                    if (data) {

                        $('#union_name').empty().focus().append('<option value="">----please select----</option>');

                        $.each(data, function (key, value) {
                            $('select[name="union_name"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });

                    } else {
                        $('#union_name').empty();
                    }
                }
            });
        });

        // when upload the image or photo then instant preview the image or photo view
        function readURL(input) {

            if (input.files && input.files[0]) {

                const reader = new FileReader();

                reader.onload = function (e) {
                    $('#image_preview').css('display', 'block').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function () {
            readURL(this);
        });

    </script>
@endsection
