<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="z-index: 111111111;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3">PT. Sarana Maju Lestari</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_home/edit/') . $user['id'] ?>">
            <i class="far fa-fw fa-edit"></i>
            <span>Edit Profile</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Kategori -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_kategoriberita'); ?>">
            <i class="far fa-fw fa-file-alt"></i>
            <span>Kategori Berita</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Product -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_databerita'); ?>">
            <i class="far fa-fw fa-newspaper"></i>
            <span>Data Berita</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_statuskaryawan'); ?>">
            <i class="fas fa-fw fa-tag"></i>
            <span>Status Karyawan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_datakaryawan'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Karyawan</span>
        </a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item"> -->
        <!-- <a class="nav-link" href="<?= base_url('Admin/C_datadokumentasi'); ?>"> -->
            <!-- <i class="fas fa-fw fa-camera"></i> -->
            <!-- <span>Dokumentasi Kegiatan</span> -->
        <!-- </a> -->
    <!-- </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_kategori_dokumenperusahaan'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kategori Dokumen Perusahaan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/C_dokumenperusahaan'); ?>">
            <i class="fas fa-fw fa-folder-open"></i>
            <span>Dokumen Perusahaan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Admin/Auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar