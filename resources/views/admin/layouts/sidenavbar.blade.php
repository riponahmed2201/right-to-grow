<aside class="main-sidebar sidebar-light-purple elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin Right To Grow</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{ request()->is('dashboard') ? 'active' :''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.type.index') }}" class="nav-link {{ request()->is('category-type/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-list text-warning"></i>
                        <p>
                            Category Type
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ request()->is('category/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-list text-green"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.head.index') }}" class="nav-link {{ request()->is('category-head/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-table text-blue"></i>
                        <p>
                            Category Head
                        </p>
                    </a>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-table"></i>--}}
{{--                        <p>--}}
{{--                            Tables--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="pages/tables/simple.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Simple Tables</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="nav-header">LABELS</li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon far fa-circle text-warning"></i>--}}
{{--                        <p>Warning</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
