<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link of CSS files -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/fontawsome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/fonts/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}">

    <title>Right2Grow</title>
    <link rel="icon" type="image/png" href="{{asset('assets/admin/logo/right2grow.png')}}">
</head>
<body>
{{--<div id="pre-loader">--}}
{{--    <img class="preloader-img" src="/assets/frontend/images/preloader1.gif" alt="gif">--}}
{{--</div>--}}

<!-- Navigation area start -->
<div class="navbar-area navbar-area-3">
    <!-- Menu For Mobile Device -->
    <div class="main-responsive-nav">
        <div class="container-fluid container-large">
            <div class="mobile-nav">
                <a href="{{url('/')}}" class="logo"><img style="width: 109px; height: 30px" src="{{asset('assets/admin/logo/right2grow.png')}}" alt="logo"></a>
                <ul class="menu-sidebar menu-small-device">
                    <li>
                        <button class="popup-button"><i class="flaticon-magnifying-glass"></i></button>
                    </li>
                    <li><a class="default-button" href="login.html"><span>Login</span></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container-fluid container-large">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img style="width: 109px; height: 30px" src="{{asset('assets/admin/logo/right2grow.png')}}" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a href="{{url('/')}}" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Form-Kha</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Form-Kha-Data</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
                    </ul>
                    <div class="menu-sidebar">
                        <ul>
                            <li>
                                <button class="popup-button"><i class="flaticon-magnifying-glass"></i></button>
                            </li>
                            <li><a class="default-button" href="#"><span>Login Now</span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navigation area end -->

<!-- Banner Area Start -->
<div class="banner ptb-100">
    <div class="container-fluid container-large">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-text-area banner-text-area-3">
                    <h6>Alumni Association</h6>
                    <h1>Alumni Reunion Event -2023</h1>
                    <p>Mque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda
                        est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum.</p>
                    <a class="default-button" href="#"><span>Register Now</span></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-img-3">
                    <img src="{{asset('assets/frontend/images/banner/banner-3.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner Area End -->

<!-- Sponsors Area Start -->
<div class="sponsors ptb-100 bg-f9f9f9">
    <div class="container">
        <div class="default-section-title default-section-title-middle">
            <span>Our Sponsors</span>
            <h3>Event Sponsorship</h3>
        </div>
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
<div class="footer-group footer-group-3">
    <div class="footer-content ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6 col-12">
                    <div class="footer-logo-area">
                        <a href="{{url('/')}}"><img src="{{asset('assets/frontend/images/white-logo.png')}}" alt="image"></a>
                        <p>On the other hand, we denounce whteous indignation and dislike men wh beguiled and
                            demoralized er hand, we denounce indignation and dislike.</p>
                        <div class="footer-social-icons">
                            <ul>
                                <li><a href="https://www.facebook.com/" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.pinterest.com/" target="_blank"><i
                                            class="fab fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6 col-12">
                    <div class="footer-links flp footer-quick-links">
                        <h3>Quick Links</h3>
                        <ul>
                            <li><i class="flaticon-next"></i> <a href="webiners.html">Career</a></li>
                            <li><i class="flaticon-next"></i> <a href="privacy.html">Legal Information</a></li>
                            <li><i class="flaticon-next"></i> <a href="events-committee.html">Credits</a></li>
                            <li><i class="flaticon-next"></i> <a href="speakers.html">Speakers</a></li>
                            <li><i class="flaticon-next"></i> <a href="events.html">Events</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6 col-12">
                    <div class="footer-links flp">
                        <h3>Other Pages</h3>
                        <ul>
                            <li><i class="flaticon-next"></i> <a href="courses.html">Courses</a></li>
                            <li><i class="flaticon-next"></i> <a href="login.html">Log In</a></li>
                            <li><i class="flaticon-next"></i> <a href="events-committee.html">Committee</a></li>
                            <li><i class="flaticon-next"></i> <a href="testimonial.html">Testimonials</a></li>
                            <li><i class="flaticon-next"></i> <a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6 col-12">
                    <div class="footer-links footer-contact">
                        <h3>Get In Touch</h3>
                        <div class="footer-contact-card">
                            <i class="flaticon-phone"></i>
                            <p><a href="tel:8002162020">(800) 216 2020</a></p>
                        </div>
                        <div class="footer-contact-card">
                            <i class="flaticon-email"></i>
                            <p><a href="/cdn-cgi/l/email-protection#4920272f260928253c27672a2624"><span
                                        class="__cf_email__" data-cfemail="9cf5f2faf3dcfdf0e9f2b2fff3f1">[email&#160;protected]</span></a>
                            </p>
                        </div>
                        <div class="footer-contact-card">
                            <i class="flaticon-pin"></i>
                            <p><a href="https://goo.gl/maps/RJt1BZ7aryTcnXeK7" target="_blank">No. 12, Ribon Building,
                                    Walse street, Australia</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright bg-F4F9FD">
        <div class="container">
            <p>© Developed by <a href="#" target="_blank">SR</a></p>
        </div>
    </div>
</div>
<!-- Footer Area End -->

<!-- Copyright Area Start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
<!-- Copyright Area End -->

<!-- popup area start -->
<div class="popup">
    <div class="popup-content">
        <div class="close-btn" id="popup-close">
            <span></span>
            <span></span>
        </div>
        <form>
            <div class="input-group search-box">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<!-- popup area end -->

<!-- Link of JS files -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{asset('assets/frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/meanmenu.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.carousel2.thumbs.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/TweenMax.js')}}"></script>
<script src="{{asset('assets/frontend/js/nice-select.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/form-validator.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/contact-form-script.js')}}"></script>
<script src="{{asset('assets/frontend/js/ajaxchimp.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/appear.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/countdown.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/tilt.js')}}"></script>
<script src="{{asset('assets/frontend/js/odometer.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/custom.js')}}"></script>
</body>
</html>
