<!-- sidebar area -->
<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu1">
            <li class="single-nav-wrapper">
                <a href="{{ url('dashboard') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="{{ url('profile/alokasi') }}" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Data Alokasi</span>
                </a>
            </li>
            <li class="single-nav-wrapper">
                <a href="{{ url('profile/realisasi') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-file"></i></span>
                    <span class="menu-text">Realisasi Kode Rekening</span>
                </a>
            </li>
            <li class="single-nav-wrapper">
                <a href="{{ url('profile/rekapitulasi') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-file"></i></span>
                    <span class="menu-text">Rekapitulasi BOP</span>
                </a>
            </li>
        </ul>
    </nav>
</aside><!-- /sidebar Area-->