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
                    <li><a class="default-button" href="#"><span>Login</span></a></li>
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
                        <li class="nav-item"><a href="{{route('show.form.kha')}}" class="nav-link">Form-Kha</a></li>
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
