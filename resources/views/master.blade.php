<!DOCTYPE html>

<html lang="en">

<head>
    @include('frontend.layouts.stylesheet')
</head>

<body style="background-color: #ebebeb">
    <div class="container-fluid contant">
        <div class="row">
            <div class="col-md-12">
                <header style="color: white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="#">
                                        <img src="{{ asset('assets/frontend/assets/images/right2grow.png') }}"
                                            class="img-responsive" width="200px" alt="right2grow.org">
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <img src="{{ asset('assets/frontend/assets/images/kingdom-of-the-netherlands.svg') }}"
                                            class="img-responsive text-center" width="200px" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>

                        @include('frontend.layouts.header')

                    </div>

                    {{-- <div class='row g-0'>
                        <div class="btn-group w-auto ms-auto pt-20" role="group">
                            <a href="javascript:void(0)" type="button" id="bn" class="btn">বাংলা</a>
                            <a href="javascript:void(0)" type="button" id="en"
                                class="btn btn-default">English</a>
                        </div>
                    </div> --}}

                </header>

                <br> <br>

                @yield('main-content')

            </div>
        </div>
    </div>

    <div>
        @include('frontend.layouts.footer')

    </div>

    @include('frontend.layouts.script')

</body>

</html>
