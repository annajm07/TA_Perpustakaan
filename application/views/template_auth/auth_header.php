<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$judul; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url(); ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url(); ?>/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body class="bg-primary">
<nav class="navbar navbar-expand-md navbar-light bg-light shadow">
  <div class="navbar-brand font-weight-bold">
    <img style="max-width: 60px;" src="<?= base_url(); ?>assets/img/smk.png">
    <div class="float-right mt-1 ml-2">
      <div>PERPUSTAKAAN</div>
      <div style="font-size: 14px; font-family: Trebuchet MS;" class="">SMK SEMEN PADANG</div>
    </div>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="ml-auto">
        <ul class="nav nav-pills ">
  <li class="nav-item">
    <a class="nav-link <?php if($judul == 'Masuk'): ?>active<?php endif; ?>" href="<?= base_url(); ?>auth">Masuk</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($judul == 'Daftar'): ?>active<?php endif; ?>" href="<?= base_url(); ?>auth/daftar">Daftar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($judul == 'Koleksi Buku'): ?>active<?php endif; ?>" href="<?= base_url(); ?>auth/koleksi_buku">Koleksi Buku</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($judul == 'Kritik dan Saran'): ?>active<?php endif; ?>" href="<?= base_url(); ?>auth/kritik_saran">kritik dan Saran</a>
  </li>
</ul>
     </div>
  </div>
</nav>