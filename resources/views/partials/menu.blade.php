<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route("admin.home") }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            {{-- User Management --}}
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-user nav-icon">

                    </i>
                    {{ trans('global.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.permission.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.role.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fas fa-user nav-icon">

                            </i>
                            {{ trans('global.user.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            {{-- End User Management --}}

            {{-- Karyawan Management --}}
                 {{-- <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fas fa-users nav-icon">

                        </i>
                        {{ trans('Kelola Karyawan') }}
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="{{ route("admin.karyawans.index") }}" class="nav-link {{ request()->is('admin/karyawans') || request()->is('admin/karyawans/*') ? 'active' : '' }}">
                                <i class="fas fa-group nav-icon">

                                </i>
                                {{ trans('Data Karyawan') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin.karyawans.index") }}" class="nav-link {{ request()->is('admin/karyawans') || request()->is('admin/karyawans/*') ? 'active' : '' }}">
                                <i class="fas fa-user-times nav-icon">

                                </i>
                                {{ trans('Mutasi Karyawan') }}
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- End Karyawan Management --}}

                {{-- Absen Management --}}
                    <li class="nav-item nav-dropdown">
                        <a class="nav-link  nav-dropdown-toggle">
                            <i class="fas fa-calendar-check-o nav-icon">

                            </i>
                            IT Management
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="{{ route("admin.printers.index") }}" class="nav-link {{ request()->is('admin/absensis') || request()->is('admin/absensis/*') ? 'active' : '' }}">
                                    <i class="fas fa-calendar nav-icon">

                                    </i>
                                    Data Printer
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route("admin.komputers.index") }}" class="nav-link {{ request()->is('admin/komputers') || request()->is('admin/perbaikans/*') ? 'active' : '' }}">
                                    <i class="fas fa-list nav-icon">

                                    </i>
                                    Data Komputer
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route("admin.kliens.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                                    <i class="fas fa-user nav-icon">

                                    </i>
                                    Data Klien
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route("admin.perbaikans.index") }}" class="nav-link {{ request()->is('admin/perbaikans') || request()->is('admin/perbaikans/*') ? 'active' : '' }}">
                                    <i class="fas fa-cogs nav-icon">

                                    </i>
                                    Daftar Perbaikan
                                </a>
                            </li>

                        {{-- <li class="nav-item">
                            <a href="{{ route("admin.karyawans.index") }}" class="nav-link {{ request()->is('admin/karyawans') || request()->is('admin/karyawans/*') ? 'active' : '' }}">
                                <i class="fas fa-calendar nav-icon">

                                </i>
                                {{ trans('Buat Absen') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin.karyawans.index") }}" class="nav-link {{ request()->is('admin/karyawans') || request()->is('admin/karyawans/*') ? 'active' : '' }}">
                                <i class="fas fa-user nav-icon">

                                </i>
                                {{ trans('Buat cuti') }}
                            </a>
                        </li> --}}
                    </ul>
                </li>
                {{-- End Absen Management --}}

                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle">
                        <i class="fas fa-calendar-check-o nav-icon">

                        </i>
                        Karyawan Managenen
                    </a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a href="{{ route("admin.departemens.index") }}" class="nav-link {{ request()->is('admin/departemens') || request()->is('admin/departemens/*') ? 'active' : '' }}">
                                <i class="fas fa-calendar nav-icon">

                                </i>
                                Data Departement
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route("admin.npps.index") }}" class="nav-link {{ request()->is('admin/npps') || request()->is('admin/npps/*') ? 'active' : '' }}">
                                <i class="fas fa-calendar nav-icon">

                                </i>
                                Buat Npp
                            </a>
                        </li>


                        {{-- <li class="nav-item">
                            <a href="{{ route("admin.departemens.index") }}" class="nav-link {{ request()->is('admin/departemens') || request()->is('admin/departemens/*') ? 'active' : '' }}">
                                <i class="fas fa-calendar nav-icon">

                                </i>
                                Data Departement
                            </a>
                        </li> --}}


                </ul>
            </li>



            <li class="nav-item">
                <a href="{{ route("admin.products.index") }}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                    <i class="fas fa-cogs nav-icon">

                    </i>
                    {{ trans('global.product.title') }}
                </a>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
