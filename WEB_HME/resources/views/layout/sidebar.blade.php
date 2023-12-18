<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
           <img src="/img/HME1.jpg" alt="" style="width:50px; height:50px;" class="">
        </div>
        <div class="sidebar-brand-text mx-3">HME FT Unram</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if($active == 'dashboard') {{ 'active' }}@else {{ '' }} @endif">
        <a class="nav-link" href="/Dashboard ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span >Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Berita
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @if($active == 'berita') {{ 'active' }} @else {{ '' }} @endif">
        <a class="nav-link" href="/BeritaAdmin">
            <i class="bi bi-newspaper 2x"></i>
            <span>Berita</span>
        </a>
    </li>
    <li class="nav-item @if($active == 'kategori') {{ 'active' }} @else {{ '' }} @endif">
        <a class="nav-link" href="/Kategori">
            <i class="bi bi-bookmarks-fill"></i>
            <span>Kategori</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
   

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Anggota Aktif
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  @if($active == 'anggota') {{ 'active' }} @else {{ '' }} @endif">
        <a class="nav-link" href="/Member">
            <i class="bi bi-people-fill"></i>
            <span>Anggota HME</span></a>
    </li>
    <li class="nav-item @if($active == 'position') {{ 'active' }} @else {{ '' }} @endif">
        <a class="nav-link" href="/position">
            <i class="bi bi-shuffle"></i>
            <span>Member position</span></a>
    </li>
    
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pengaturan akun admin
    </div>
    <li class="nav-item @if($active == 'Profil') {{ 'active' }} @else {{ '' }} @endif">
        <a class="nav-link" href="/Profil">
            <i class="bi bi-person-square"></i>
            <span>Profil admin</span></a>
    </li>
    <li class="nav-item @if($active == 'sandi') {{ 'active' }} @else {{ '' }} @endif">
        <a class="nav-link" href="/Akun">
            <i class="bi bi-key-fill"></i>
            <span>Sandi Akun</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>