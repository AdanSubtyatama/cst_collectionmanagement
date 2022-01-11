<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">CST_C_MANAGEMENT</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="far fa-square"></i> <span>Dashboard Page</span></a></li>          
            <li class="menu-header">Main Data</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Preferensi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('corebranch.index') }}">Data Cabang</a></li>
                    <li><a class="nav-link" href="{{ route('corebusinessCollector.index') }}">Data Collector</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i>
                    <span>Utility</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="">Pengaturan User</a></li>
                    <li><a class="nav-link" href="">Pengaturan Menu</a></li>
                </ul>
            </li>
            

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>