@extends('master')

@section('main-content')
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
                                <a href="{{ route('show.form.kha') }}" class="btn"
                                    style="background-color: #154273; color:white">ফরম "খ"</a>
                                <a href="{{ route('user.getKhaFormList') }}" class="btn"
                                    style="background-color: #154273; color:white">ফরম "খ"
                                    ডাটা</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--                <script type="text/javascript"> --}}
        {{--                    jQuery("#lform").validate({ --}}
        {{--                        rules: { --}}
        {{--                            surveyType: { --}}
        {{--                                required: true --}}
        {{--                            } --}}
        {{--                        }, --}}
        {{--                        errorPlacement: function(error, element) { --}}
        {{--                            if (element.is(":radio")) { --}}
        {{--                                error.prependTo($(".emag")); --}}
        {{--                            } else { --}}
        {{--                                error.insertAfter(element); --}}
        {{--                            } --}}
        {{--                        } --}}
        {{--                    }); --}}
        {{--                </script> --}}
    </div>

    @include('frontend.layouts.sponsor')
@endsection
