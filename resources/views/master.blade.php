<!DOCTYPE html>
<html lang="en">
<head>

   @include('frontend.layouts.stylesheet')

</head>
<body>
{{--<div id="pre-loader">--}}
{{--    <img class="preloader-img" src="/assets/frontend/images/preloader1.gif" alt="gif">--}}
{{--</div>--}}

<!-- Navigation area start -->

    @include('frontend.layouts.header')

<!-- Navigation area end -->

<!-- Banner Area Start -->

    @include('frontend.layouts.banner')

<!-- Banner Area End -->

<!-- Sponsors Area Start -->
<div class="sponsors pt-5 pb-5 bg-f9f9f9">
    <div class="container">
{{--        <div class="default-section-title default-section-title-middle">--}}
{{--            <span>Our Sponsors</span>--}}
{{--            <h3>Event Sponsorship</h3>--}}
{{--        </div>--}}
        <div class="section-content">
            <div class="sponsor-card-slider-area owl-carousel">
                <div class="sponsor-card sponsor-card-3">
                    <img src="{{asset('assets/frontend/images/brand/br1.png')}}" alt="image">
                    <h4>Noso</h4>
                </div>
                <div class="sponsor-card sponsor-card-3">
                    <img src="{{asset('assets/frontend/images/brand/br2.png')}}" alt="image">
                    <h4>Barxa</h4>
                </div>
                <div class="sponsor-card sponsor-card-3">
                    <img src="{{asset('assets/frontend/images/brand/br3.png')}}" alt="image">
                    <h4>Bimu</h4>
                </div>
                <div class="sponsor-card sponsor-card-3">
                    <img src="{{asset('assets/frontend/images/brand/br4.png')}}" alt="image">
                    <h4>Oxva</h4>
                </div>
                <div class="sponsor-card sponsor-card-3">
                    <img src="{{asset('assets/frontend/images/brand/br5.png')}}" alt="image">
                    <h4>Raxa</h4>
                </div>
                <div class="sponsor-card sponsor-card-3">
                    <img src="{{asset('assets/frontend/images/brand/br6.png')}}" alt="image">
                    <h4>Edot</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sponsors Area End -->

<!-- Footer Area Start -->
    @include('frontend.layouts.footer')
<!-- Footer Area End -->

<!-- Copyright Area Start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
<!-- Copyright Area End -->

<!-- Link of JS files -->

    @include('frontend.layouts.script')

</body>
</html>
