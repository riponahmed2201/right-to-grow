
<!DOCTYPE html>

<html lang="en">

<head>
    @include('frontend.layouts.stylesheet')
</head>

<body>
<div class="container contant">
    <div class="row">
        <div class="col-md-12">
            <header>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="#">
                                    <img src="{{asset('assets/frontend/assets/images/right2grow.png')}}" class="img-responsive" width="200px" alt="right2grow.org">
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <img src="{{asset('assets/frontend/assets/images/kingdom-of-the-netherlands.svg')}}" class="img-responsive text-center" width="200px" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{url('/')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('show.form.kha')}}">Form - Kha</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('show_form_kha_data')}}">Kha Data</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
{{--                <div class='row g-0'>--}}
{{--                    <div class="btn-group w-auto ms-auto pt-20" role="group">--}}
{{--                        <a href="javascript:void(0)" type="button" id="bn" class="btn">বাংলা</a>--}}
{{--                        <a href="javascript:void(0)" type="button" id="en" class="btn btn-default">English</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </header>
            <div class="main-containt">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <h2 class="page-title text-center mb-25">Right 2 Grow Project Consortium, Bangladesh</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="ict_survey_div">
                                <div class="col-md-4 offset-md-4 mt-3">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-primary">Form - Kha</a>
                                        <a href="#" class="btn btn-primary">Form - Kha
                                            Data</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    jQuery("#lform").validate({
                        rules: {
                            surveyType: {
                                required: true
                            }
                        },
                        errorPlacement: function(error, element) {
                            if (element.is(":radio")) {
                                error.prependTo($(".emag"));
                            } else {
                                error.insertAfter(element);
                            }
                        }
                    });
                </script>
            </div>

            @include('frontend.layouts.sponsor')

        </div>
    </div>
</div>

@include('frontend.layouts.footer')

@include('frontend.layouts.script')

</body>

</html>
