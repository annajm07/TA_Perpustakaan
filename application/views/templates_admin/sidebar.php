<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img style="max-width: 55px;" src="<?= base_url(); ?>assets/img/smk.png">
        </div>
        <div class="sidebar-brand-text mx-2 mt-1">Perpustakaan<div style="font-size: 13px; font-family: Trebuchet MS;">Smk Semen Padang</div></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($judul == 'Beranda'):?>active<?php endif; ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($judul == 'Lihat Profil'||$judul == 'Ganti Password'||$judul == 'Ganti Profil'||$judul == 'Ganti Foto'):?>active<?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profil" aria-expanded="true" aria-controls="profil">
          <i class="fas fa-user"></i>
          <span class="ml-1">Profil</span>
        </a>
        <div id="profil" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?= base_url(); ?>admin/lihat_profil"><i class="fas fa-square"></i> Lihat Profil</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/ganti_profil"><i class="fas fa-square"></i> Ganti Profil</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/ganti_foto"><i class="fas fa-square"></i> Ganti Foto Profil</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/ganti_password"><i class="fas fa-square"></i> Ganti Password</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item <?php if($judul == 'Data Petugas'||$judul == 'Data Guru'||$judul == 'Data Siswa'||$judul == 'Konfirmasi Pengguna'||$judul == 'Tambah Petugas'||$judul == 'Detail Petugas'||$judul == 'Edit Petugas'):?>active<?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="true" aria-controls="pengguna">
          <i class="fas fa-users"></i>
          <span>Data Pengguna</span>
        </a>
        <div id="pengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_petugas"><i class="fas fa-square"></i> Data Petugas</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_guru"><i class="fas fa-square"></i> Data Guru</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_siswa"><i class="fas fa-square"></i> Data Siswa</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/konfirmasi"><i class="fas fa-square"></i> Konfirmasi Pengguna</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php if($judul == 'Data Buku'||$judul == 'Data Jurnal'||$judul == 'Data Majalah'||$judul == 'Data Surat Kabar'||$judul == 'Detail Buku'||$judul == 'Detail Surat Kabar'||$judul == 'Detail Majalah'||$judul == 'Detail Jurnal'||$judul == 'Edit Buku'||$judul == 'Edit Jurnal'||$judul == 'Edit Majalah'||$judul == 'Edit Surat Kabar'):?>active<?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#buku" aria-expanded="true" aria-controls="pengguna">
          <i class="fas fa-book"></i>
          <span class="ml-1">Data Koleksi</span>
        </a>
        <div id="buku" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_buku"><i class="fas fa-square"></i> Data Buku</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_jurnal"><i class="fas fa-square"></i> Data Jurnal</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_majalah"><i class="fas fa-square"></i> Data Majalah</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_surat_kabar"><i class="fas fa-square"></i> Data Surat Kabar</a>
          </div>
        </div>
      </li>

       <li class="nav-item <?php if($judul == 'Peminjaman'||$judul == 'Sedang Meminjam'||$judul == 'Pengembalian'||$judul == 'Riwayat Transaksi Siswa'||$judul == 'Riwayat Transaksi Guru'):?>active<?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi" aria-expanded="true" aria-controls="transaksi">
          <i class="far fa-handshake"></i>
          <span>Transaksi</span>
        </a>
        <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?= base_url(); ?>admin/konfirmasi_peminjaman"><i class="fas fa-square"></i> Peminjaman</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/daftar_peminjam"><i class="fas fa-square"></i> Sedang Meminjam</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/konfirmasi_pengembalian"><i class="fas fa-square"></i> Pengembalian</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/riwayat_siswa"><i class="fas fa-square"></i> Riwayat Transaksi Siswa</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/riwayat_guru"><i class="fas fa-square"></i> Riwayat Transaksi Guru</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php if($judul == 'Konfirmasi Denda'||$judul == 'Data Denda'||$judul == 'Donasi'): ?>active<?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#keuangan" aria-expanded="true" aria-controls="keuangan">
          <i class="fas fa-money-check-alt"></i>
          <span>Data Keuangan</span>
        </a>
        <div id="keuangan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?= base_url(); ?>admin/konfirmasi_denda"><i class="fas fa-square"></i> Konfirmasi Denda</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/data_denda"><i class="fas fa-square"></i> Data denda</a>
            <a class="collapse-item" href="<?= base_url(); ?>admin/donasi"><i class="fas fa-square"></i> Donasi</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php if($judul == 'Kritik dan Saran') :?>active<?php endif; ?>">
        <a class="nav-link" href="<?= base_url(); ?>admin/kritik_saran">
         <i class="fas fa-envelope-square"></i>
          <span class="ml-1">Kritik dan Saran</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
        <a class="nav-link"  href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
          <span>Keluar</span></a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav">
            <li class="mt-auto"> Role : Administrator</li>
          </ul>

          <ul class="navbar-nav ml-auto">
              <div class="topbar-divider d-none d-sm-block mr-auto"></div>
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama'); ?></span>
                  <img class="img-profile rounded-circle" src="<?= base_url(); ?>assets/img/profil/<?= $this->session->userdata('gambar'); ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?= base_url(); ?>admin/lihat_profil">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                  </a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item"  href="<?= base_url(); ?>keluar" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Keluar
                  </a>
                </div>
              </li>
          </ul>

        </nav>
        <!-- End of Topbar -->