<?php
$menu = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aggota | SIPADU</title>
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/dist/img/sipadu-fav.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url()?>template/template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url()?>template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>anggota/index" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('anggota/logout') ?>" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" data-widget="" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-info elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>anggota/index" class="brand-link">
      <img src="<?=base_url()?>template/dist/img/sipadu-fav2.png" alt="Ansor" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b>SIPADU <?php if($kategori_data==1){ echo 'IPNU'; }else{ echo'IPPNU';} ?></b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>template/dist/img/<?php if($kategori_data==1){ echo 'ipnufav.png'; }else{ echo'ippnufav.png';} ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $admin['nama']; ?> </a>
        </div>
      </div>
      <div style="padding-left:20px;padding-right:50px;">
        <div style="color:#fff;"><?= $pimpinan_default['pimpinan']; ?> - <?= $pimpinan_default['nama_pimpinan']; ?></div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?=base_url()?>anggota/index" <?php if ($menu == 'index') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url()?>anggota/editpassword?id=<?= $admin['id_anggota'];?>" <?php if ($menu == 'editpassword') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-key"></i>
              <p>
                Edit Password
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview">
            <a href="<?=base_url()?>anggota/viewanggota?id=<?= $admin['id_anggota'];?>" <?php if ($menu == 'viewanggota') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-user"></i>
              <p>
                Edit Data Anggota
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview">
            <a href="<?=base_url()?>anggota/downloadperaturan" <?php if ($menu == 'downloadperaturan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-download"></i>
              <p>
                Download Peraturan
              </p>
            </a>

          </li>


          <li class="nav-header">SIPADU App</li>
          <li class="nav-item">
            <a href="<?=base_url();?>anggota/about" <?php if ($menu == 'about') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-file"></i>
              <p>About Us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('anggota/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
