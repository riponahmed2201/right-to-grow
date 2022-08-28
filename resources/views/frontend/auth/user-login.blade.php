@extends('master')
@section('main-content')
    <br> <br>
    <div class="row">
        <div class="col-md-4 offset-4">
            <div class="card">
                <div class="card-body">
                    <form class="form-signin" action="{{ route('user.userLoginCheck') }}" method="post">
                        @csrf
                        <div class="text-center">
                            <img style="object-fit: contain; width: 200px; height: 73px; text-align: center" class="mb-4"
                                 src="{{ asset('assets/admin/logo/right2grow.png') }}" alt=""
                            >
                        </div>
                        <h1 class="h3 mb-3 font-weight-normal text-center"> <u>Please Login</u> </h1>
                        <label for="email" class="sr-only mt-2">Email address:</label>
                        <input type="email" class="form-control mt-2" name="email" placeholder="Email address"
                               required
                               autofocus>
                        <label for="password" class="sr-only mt-2">Password:</label>
                        <input type="password" name="password" class="form-control mt-2" placeholder="Password"
                               required>
                        <button class="btn btn-success btn-block mt-4" type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
