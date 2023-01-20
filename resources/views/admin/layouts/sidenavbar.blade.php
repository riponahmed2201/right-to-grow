<aside class="main-sidebar sidebar-light-purple elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/admin/logo/right2grow.png') }}" alt="Logo" class="brand-image img-circle"
            style="opacity: .8">
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
            <ul class="nav nav-pills text-sm nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt text-green"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header" style="font-size: 15px; color: black">Master Data Management</li>
                <li class="nav-item">
                    <a href="{{ route('division.index') }}"
                        class="nav-link {{ request()->is('division/index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building text-blue"></i>
                        <p>Division List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('district.index') }}"
                        class="nav-link {{ request()->is('district/index') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-assistive-listening-systems text-green"></i>
                        <p>District List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('upazila.index') }}"
                        class="nav-link {{ request()->is('upazila/index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table text-red"></i>
                        <p>Upazila List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('union.index') }}"
                        class="nav-link {{ request()->is('union/index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list text-gray-dark"></i>
                        <p>Union List</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('financialYear.index') }}"
                        class="nav-link {{ request()->is('financial-year/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list text-green"></i>
                        <p>Financial Year List</p>
                    </a>
                </li>

                <li class="nav-header" style="font-size: 15px; color: black">Category Management</li>
                <li class="nav-item">
                    <a href="{{ route('type.index') }}"
                        class="nav-link {{ request()->is('category-type/index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list text-warning"></i>
                        <p>
                            Type List
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('category.index') }}"
                        class="nav-link {{ request()->is('category/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list text-green"></i>
                        <p>
                            Category List
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('subcategory.index') }}"
                        class="nav-link {{ request()->is('subcategory/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table text-blue"></i>
                        <p>
                            Subcategory List
                        </p>
                    </a>
                </li>

                <li class="nav-header">Form Kha Management</li>
                <li class="nav-item">
                    <a href="{{ route('admin.getAllFormKhaData') }}" class="nav-link">
                        <i class="nav-icon fas fa-list text-warning"></i>
                        <p>
                            Form Kha List
                        </p>
                    </a>
                </li>

                <li class="nav-header">Wash And Nutrition Management</li>
                <li class="nav-item">
                    <a href="{{ route('wash_and_nutrition.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-list text-green"></i>
                        <p>
                            Wash And Nutrition List
                        </p>
                    </a>
                </li>

                <li class="nav-header">Report Management</li>
                <li class="nav-item">
                    <a href="{{ route('admin.healthComparisonReport') }}"
                        class="nav-link {{ request()->is('health-comparison-report') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book text-green"></i>
                        <p>
                            Health Comaparison
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.washAndNutritionReport') }}"
                        class="nav-link {{ request()->is('wash-and-nutrition-report') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book text-danger"></i>
                        <p>
                            Wash And Nutrition
                        </p>
                    </a>
                </li>

                <li class="nav-header">User Management</li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}"
                        class="nav-link {{ request()->is('user/index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users text-green"></i>
                        <p>
                            User List
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
