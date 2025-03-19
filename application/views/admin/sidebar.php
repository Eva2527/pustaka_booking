<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion shadow-lg" id="accordionSidebar" style="background: linear-gradient(135deg, #2c3e50, #34495e); color: #ffffff;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php" style="color: #ffffff;">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book" style="color: #ffcc00;"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Peminjaman</div>
    </a>

    <hr class="sidebar-divider my-0" style="border-color: rgba(255,255,255,0.2);">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link text-light" href="<?=base_url('admin');?>">
            <i class="fas fa-fw fa-tachometer-alt" style="color: #1abc9c;"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-color: rgba(255,255,255,0.2);">
    <div class="sidebar-heading text-light">Master Data</div>

    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('buku/kategori');?>">
            <i class="fas fa-fw fa-bookmark" style="color: #f39c12;"></i>
            <span>Kategori Buku</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('buku');?>">
            <i class="fas fa-fw fa-book" style="color: #3498db;"></i>
            <span>Data Buku</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('user/anggota');?>">
            <i class="fas fa-fw fa-users" style="color: #e74c3c;"></i>
            <span>Data Anggota</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-color: rgba(255,255,255,0.2);">
    <div class="sidebar-heading text-light">Transaksi</div>

    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('pinjam');?>">
            <i class="fas fa-fw fa-exchange-alt" style="color: #9b59b6;"></i>
            <span>Data Peminjaman</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('pinjam/DaftarBooking');?>">
            <i class="fas fa-fw fa-calendar-check" style="color: #2ecc71;"></i>
            <span>Data Booking</span>
        </a>
    </li>

    <hr class="sidebar-divider" style="border-color: rgba(255,255,255,0.2);">
    <div class="sidebar-heading text-light">Laporan</div>

    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('laporan/laporan_buku');?>">
            <i class="fas fa-fw fa-file-alt" style="color: #e67e22;"></i>
            <span>Laporan Data Buku</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('laporan/laporan_anggota');?>">
            <i class="fas fa-fw fa-file-alt" style="color: #2980b9;"></i>
            <span>Laporan Data Anggota</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-light" href="<?=base_url('laporan/laporan_pinjam');?>">
            <i class="fas fa-fw fa-file-alt" style="color: #27ae60;"></i>
            <span>Laporan Data Peminjaman</span>
        </a>
    </li>

    <hr class="sidebar-divider mt-3" style="border-color: rgba(255,255,255,0.2);">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="border-0 bg-secondary" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
