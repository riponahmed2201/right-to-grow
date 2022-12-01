<header class="container-fluid">
    <nav class="navbar navbar-default" role="navigation">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a class="{{ request()->is('/') ? 'active-color' : '' }}"
                        href="{{ url('/') }}">হোম</a>
                </li>
                <li>
                    <a class="{{ request()->is('form-ka-list') ? 'active-color' : '' }}"
                        href="{{ route('show.getKaFormList') }}">ফরম "ক" ডাটা</a>
                </li>
                <li>
                    <a class="{{ request()->is('form-kha') ? 'active-color' : '' }}"
                        href="{{ route('show.form.kha') }}">ফরম "খ"</a>
                </li>

                <li>
                    <a class="{{ request()->is('list-form-kha') ? 'active-color' : '' }}"
                        href="{{ route('user.getKhaFormList') }}">ফরম "খ" ডাটা</a>
                </li>
                <li>
                    <a class="{{ request()->is('all-form-kha-data') ? 'active-color' : '' }}"
                        href="{{ route('user.getAllKhaFormData') }}">ইউনিয়ন ভিত্তিক ডাটা</a>
                </li>
                <li>
                    <a class="{{ request()->is('all-form-kha-data') ? 'active' : '' }}"
                        href="{{ route('user.showMapTracking') }}">ট্র্যাকিং</a>
                </li>
                <li>

                    @if (session('user_role') !== null)
                        <a href="{{ route('logout') }}">লগ আউট</a>
                    @else
                        <a class="{{ request()->is('user-login') ? 'active-color' : '' }}"
                            href="{{ route('user.showLoginForm') }}">লগইন</a>
                    @endif

                </li>
            </ul>
        </div>
    </nav>
</header>