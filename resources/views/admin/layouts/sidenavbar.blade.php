<aside class="main-sidebar sidebar-light-purple elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/admin/logo/right2grow.png') }}" alt="Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Right2Grow</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/dist/img/avatar5.png') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
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
                    <a href="{{route('admin.dashboard')}}"
                       class="nav-link {{ request()->is('dashboard') ? 'active' :''}}">
                        <i class="nav-icon fas fa-tachometer-alt text-green"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">Master Data Management</li>
                <li class="nav-item">
                    <a href="{{ route('division.index') }}" class="nav-link {{ request()->is('division/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-building text-blue"></i>
                        <p>Division</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('district.index') }}" class="nav-link {{ request()->is('district/index') ? 'active' :''}}">
                        <i class="nav-icon fa fa-assistive-listening-systems text-green"></i>
                        <p>District</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('upazila.index') }}" class="nav-link {{ request()->is('upazila/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-table text-red"></i>
                        <p>Upazila</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('union.index') }}" class="nav-link {{ request()->is('union/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-list text-gray-dark"></i>
                        <p>Union</p>
                    </a>
                </li>

                <li class="nav-header">Category Management</li>
                <li class="nav-item">
                    <a href="{{ route('category.type.index') }}"
                       class="nav-link {{ request()->is('category-type/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-list text-warning"></i>
                        <p>
                            Category Type
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                       class="nav-link {{ request()->is('category/index') ? 'active' :''}}">
                        <i class="nav-icon fas fa-list text-green"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.head.index') }}"
                       class="nav-link {{ request()->is('category-head/index') ? 'active' :''}}">
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
