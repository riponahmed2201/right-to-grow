<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' :''}}" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('form-kha') ? 'active' :''}}" href="{{route('show.form.kha')}}">Form
                        - Kha</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('show-form-kha') ? 'active' :''}}"
                       href="{{route('show_form_kha_data')}}">Kha Data</a>
                </li>

                <li class="nav-item">

                    @if(session('user_role') !== null)
                        <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    @else
                        <a class="nav-link {{ request()->is('user-login') ? 'active' :''}}"
                           href="{{route('user.showLoginForm')}}">Login</a>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>
