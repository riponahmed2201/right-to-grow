<nav class="navbar navbar-expand-lg" style="background-color: #5314b1;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="color: white" class="nav-link {{ request()->is('/') ? 'active-color' : '' }}"
                        href="{{ url('/') }}">হোম</a>
                </li>
                <li class="nav-item">
                    <a style="color: white" class="nav-link {{ request()->is('form-ka-list') ? 'active-color' : '' }}"
                        href="{{ route('show.getKaFormList') }}">ফরম "ক" ডাটা</a>
                </li>
                <li class="nav-item">
                    <a style="color: white" class="nav-link {{ request()->is('form-kha') ? 'active-color' : '' }}"
                        href="{{ route('show.form.kha') }}">ফরম "খ"</a>
                </li>

                <li class="nav-item">
                    <a style="color: white" class="nav-link {{ request()->is('list-form-kha') ? 'active-color' : '' }}"
                        href="{{ route('user.getKhaFormList') }}">ফরম "খ" ডাটা</a>
                </li>
                <li class="nav-item">
                    <a style="color: white"
                        class="nav-link {{ request()->is('all-union-vittik-data') ? 'active-color' : '' }}"
                        href="{{ route('user.getAllUnionVittikData') }}">ইউনিয়ন ভিত্তিক ডাটা</a>
                </li>
                <li class="nav-item dropdown">
                    <a style="color: white" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        ট্র্যাকিং
                    </a>
                    <ul class="dropdown-menu">
                        <li><a style="color: black" class="dropdown-item" href="#">Health Comparison</a></li>
                        <li><a style="color: black" class="dropdown-item" href="#">Health & Nutrition</a></li>
                        <li><a style="color: black" class="dropdown-item" href="{{ route('user.viewDevelopmentExpenseBudgetTracking') }}">Development Expense Budget</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a style="color: white"
                        class="nav-link {{ request()->is('show-map-tracking') ? 'active-color' : '' }}"
                        href="{{ route('user.showMapTracking') }}">ম্যাপ</a>
                </li>
                <li class="nav-item">

                    @if (session('user_role') !== null)
                        <a style="color: white" class="nav-link" href="{{ route('logout') }}">লগ আউট</a>
                    @else
                        <a style="color: white"
                            class="nav-link {{ request()->is('user-login') ? 'active-color' : '' }}"
                            href="{{ route('user.showLoginForm') }}">লগইন</a>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>
