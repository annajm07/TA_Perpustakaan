<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
          <img style="max-width: 55px;" src="<?= base_url(); ?>assets/img/smk.png">
        </div>
        <div class="sidebar-brand-text mx-2 mt-1">Perpustakaan<div style="font-size: 13px; font-family: Trebuchet MS;">Smk Semen Padang</div></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($judul == 'Beranda'):?>active<?php endif; ?>">
        <a class="nav-link" href="<?= base_url(); ?>petugas_buku">
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
      <li class="nav-item <?php if($judul == 'Lihat Profil'||$judul == 'Ganti Password'||$judul == 'Ganti Foto'):?>active<?php endif; ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="true" aria-controls="pengguna">
          <i class="fas fa-user"></i>
          <span class="ml-1">Profil</span>
        </a>
        <div id="pengguna" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="<?= base_url(); ?>petugas_buku/lihat_profil"><i class="fas fa-square"></i> Lihat Profil</a>
            <a class="collapse-item" href="<?= base_url(); ?>petugas_buku/ganti_foto"><i class="fas fa-square"></i> Ganti Foto Profil</a>
            <a class="collapse-item" href="<?= base_url(); ?>petugas_buku/ganti_password"><i class="fas fa-square"></i> Ganti Password</a>
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
            <a class="collapse-item" href="<?= base_url(); ?>petugas_buku/data_buku"><i class="fas fa-square"></i> Data Buku</a>
            <a class="collapse-item" href="<?= base_url(); ?>petugas_buku/data_jurnal"><i class="fas fa-square"></i> Data Jurnal</a>
            <a class="collapse-item" href="<?= base_url(); ?>petugas_buku/data_majalah"><i class="fas fa-square"></i> Data Majalah</a>
            <a class="collapse-item" href="<?= base_url(); ?>petugas_buku/data_surat_kabar"><i class="fas fa-square"></i> Data Surat Kabar</a>
          </div>
        </div>
      </li>

      <li class="nav-item <?php if($judul == 'Perawatan Koleksi'):?>active<?php endif; ?>">
        <a class="nav-link" href="<?= base_url(); ?>petugas_buku/perawatan">
         <i class="fas fa-hand-holding-medical"></i>
          <span class="ml-1">Perawatan</span></a>
      </li>

       <li class="nav-item <?php if($judul == 'Usulan Masuk'):?>active<?php endif; ?>">
        <a class="nav-link" href="<?= base_url(); ?>petugas_buku/usulan_masuk">
         <i class="fas fa-comment"></i>
          <span class="ml-1">Usulan Masuk</span></a>
      </li>


      <li class="nav-item <?php if($judul == 'Kritik dan Saran'):?>active<?php endif; ?>">
        <a class="nav-link" href="<?= base_url(); ?>petugas_buku/kritik_saran">
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
            <li class="mt-auto"> Role : Petugas Buku</li>
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
                  <a class="dropdown-item" href="<?= base_url(); ?>petugas_buku/lihat_profil">
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