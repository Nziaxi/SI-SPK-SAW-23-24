<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('/assets/img/icons/brands/LinkedCo.png') }}" alt class="w-px-50 h-auto" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Linked.co</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->Is('dashboard*') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li
            class="menu-item {{ request()->Is('divisi*') || request()->Is('karyawan*') || request()->Is('pengguna*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Main Data">Main Data</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->Is('divisi*') ? 'active' : '' }}">
                    <a href="{{ route('divisi.index') }}" class="menu-link">
                        <div data-i18n="Data Divisi">Data Divisi</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->Is('karyawan*') ? 'active' : '' }}">
                    <a href="{{ route('karyawan.index') }}" class="menu-link">
                        <div data-i18n="Data Karyawan">Data Karyawan</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->Is('pengguna*') ? 'active' : '' }}">
                    <a href="{{ route('pengguna.index') }}" class="menu-link">
                        <div data-i18n="Data Pengguna">Data Pengguna</div>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="menu-item {{ request()->Is('kriteria*') || request()->Is('bobot*') || request()->Is('sub-kriteria*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-ol"></i>
                <div data-i18n="Kriteria">Kriteria</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->Is('kriteria*') ? 'active' : '' }}">
                    <a href="{{ route('kriteria.index') }}" class="menu-link">
                        <div data-i18n="Data Kriteria">Data Kriteria</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->Is('bobot*') ? 'active' : '' }}">
                    <a href="{{ route('bobot.index') }}" class="menu-link">
                        <div data-i18n="Data Bobot">Data Bobot</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->Is('sub-kriteria*') ? 'active' : '' }}">
                    <a href="{{ route('sub-kriteria.index') }}" class="menu-link">
                        <div data-i18n="Data Sub Kriteria">Data Sub Kriteria</div>
                    </a>
                </li>
            </ul>
        </li>
        <li
            class="menu-item {{ request()->Is('penilaian*') || request()->Is('riwayat-penilaian*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-check"></i>
                <div data-i18n="Penilaian">Penilaian</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->Is('penilaian*') ? 'active' : '' }}">
                    <a href="{{ route('penilaian.index') }}" class="menu-link">
                        <div data-i18n="Data Penilaian">Data Penilaian</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->Is('riwayat-penilaian*') ? 'active' : '' }}">
                    <a href="{{ route('riwayat-penilaian.index') }}" class="menu-link">
                        <div data-i18n="Data Riwayat Penilaian">Data Riwayat Penilaian</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->Is('perangkingan*') ? 'active' : '' }}">
            <a href="{{ route('templates.perangkingan') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bar-chart-alt-2"></i>
                <div data-i18n="Perangkingan">Perangkingan</div>
            </a>
        </li>
        <li class="menu-item {{ request()->Is('report*') ? 'active' : '' }}">
            <a href="{{ route('templates.report') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Report">Report</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
