<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="/obat">Obat</a>
                    <a class="nav-link" href="/klasifikasi">Klasifikasi</a>
                    <a class="nav-link" href="/klasifikasi-obat">Klasifikasi Obat</a>
                </nav>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{session('email')}}</div>
        </div>
    </nav>
</div>
