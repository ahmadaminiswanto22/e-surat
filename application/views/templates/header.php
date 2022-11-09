<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/js/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <!-- dataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.dataTables.min.css">
  <!-- <script src="<?= base_url(); ?>assets/js/jquery-2.2.3.min.js"></script> -->
  <script src="<?= base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/jquery-ui/jquery-ui.min.js"></script>

  <!-- datatables js -->
  <script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-table.css" />
  <script src="<?php echo base_url(); ?>assets/js/bootstrap-table.js"></script>
  <!-- script -->

  <title><?= $judul ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" role="navigation">
    <div class="container">
      <img src="<?= base_url(); ?>img/logo.png" alt="logo" class="rounded-circle" width="30" height="30">
      <a class="navbar-brand" href="<?= base_url(); ?>home">E-Surat</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link"> <b>Login berhasil !</b> Hai, <?php echo $this->session->userdata("nama"); ?></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url(); ?>home">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php
          if ($this->session->userdata('akses') == "admin") {
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Master
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="<?= base_url(); ?>kelas">Kelas</a>
                <a class="dropdown-item" href="<?= base_url(); ?>siswa">Siswa</a>
                <a class="dropdown-item" href="<?= base_url(); ?>suratmasuk">Surat</a>
              </div>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>transaksi">Cetak Surat</a>
          </li>
          <?php
          if ($this->session->userdata('akses') == "admin") {
          ?>
            <li class="nav-item ml-3">
              <a class="nav-link" href="<?= base_url(); ?>registrasi">Registrasi User</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>login/logout">Log Out</a>
      </li>
    </ul>
  </nav>