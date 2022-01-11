<?php
$menu = $this->uri->segment(2);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>OPERATOR | SIPADU</title>
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
        <a href="<?= base_url('user/index') ?>" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('user/logout') ?>" class="nav-link">Logout</a>
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
    <a href="<?=base_url()?>admin/dashboard" class="brand-link">
      <img src="<?=base_url()?>template/dist/img/sipadu-fav2.png" alt="Ansor" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIPADU IPNU</span>
    </a>

    <!-- Sidebar -->
    <?php if ($admin['tingkatan']=='PC'){?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>template/dist/img/<?php if($kategori_data==1){ echo 'ipnufav.png'; }else{ echo'ippnufav.png';} ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $admin['nama_lengkap']; ?></a>
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
            <a href="<?=base_url()?>user/index" <?php if ($menu == 'index') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'aplikasi' || $menu == 'kodedaerah' || $menu == 'manajemenuser' || $menu == 'editaplikasi_foto'
                        || $menu == 'editaplikasi_text' || $menu == 'editpc' || $menu == 'kodepac' || $menu == 'editpac' || $menu == 'koderanting'
                        || $menu == 'inranting' || $menu == 'inpac') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting App
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>user/aplikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aplikasi</p>
                </a> 
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/kodedaerah" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kode Daerah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url() ?>user/manajemenuser?pc=<?= $id_pimpinan?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manajemen User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'anggotapc' || $menu == 'anggotapac' || $menu == 'anggotapr') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-users"></i>
              <p>
                Anggota
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>user/anggotapc" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manajemen Data Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/anggotapac?id=<?= $id_pimpinan?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pimpinan Anak Cabang</p> 
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/anggotapkpt?id" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PKPT</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/anggotapr?id=<?= $id_pimpinan?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ranting / Komisariat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/inanggota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><b>New Data</b></p>
                </a>
              </li>
              <!--<li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-KTA</p>
                </a>
              </li>-->
            </ul>
          </li>
          <!--
          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'suratkeluar' || $menu == 'suratmasuk') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Data Surat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>admin/suratkeluar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>admin/suratmasuk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url()?>admin/inventarisbarang" <?php if ($menu == 'inventarisbarang') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-table"></i>
              <p>
                Inventaris Barang
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/keuangan" <?php if ($menu == 'keuangan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Keuangan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/keuangan" <?php if ($menu == 'kegiatan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Data Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/kegiatan" <?php if ($menu == 'downloadperaturan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-download"></i>
              <p>
                Download Peraturan
              </p>
            </a>
          </li>
          <!--
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-clipboard"></i>
              <p>
                Kegiatan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>admin/rencanakegiatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rencana Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Kegiatan</p>
                </a>
              </li>
            </ul>
          </li>-->
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>user/downloadperaturan" <?php if ($menu == 'downloadperaturan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-download"></i>
              <p>
                Download Peraturan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'statistikorganisasi' || $menu == 'potensikader') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-chart-area"></i>
              <p>
                Statistik Organisasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>user/statistikorganisasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Statistik Organisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/potensikader" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Potensi Kader</p>
                </a>
              </li>
            </ul> 
          </li>

          <li class="nav-header">SIPADU App</li>
          <li class="nav-item">
            <a href="<?=base_url();?>user/about" <?php if ($menu == 'about') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-file"></i>
              <p>About Us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('user/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
    <!-- Sidebar -->
    <?php }
    elseif ($admin['tingkatan']=='PAC'){?>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>template/dist/img/<?php if($kategori_data==1){ echo 'ipnufav.png'; }else{ echo'ippnufav.png';} ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $admin['nama_lengkap']; ?></a>
        </div>
      </div>
      <div style="padding-left:20px;padding-right:50px;">
        <div style="color:#fff;"><?= $pimpinan_defaultpac['pimpinan_ac']; ?> - <?= $pimpinan_defaultpac['nama_pimpinan_ac']; ?></div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?=base_url()?>user/dashboard" <?php if ($menu == 'dashboard') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'aplikasi' || $menu == 'kodedaerah' || $menu == 'manajemenuser' || $menu == 'editaplikasi_foto'
                        || $menu == 'editaplikasi_text' || $menu == 'editpc' || $menu == 'kodepac' || $menu == 'editpac' || $menu == 'koderanting'
                        || $menu == 'inranting' || $menu == 'inpac') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting App
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>user/aplikasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Aplikasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/kodepac?id=<?= $admin['ket']; ?>&pac=<?= $id_pimpinan; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kode Daerah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url() ?>user/manajemenuser?pc=<?= $admin['ket']; ?>&pac=<?= $id_pimpinan; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manajemen User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'anggotapw' || $menu == 'anggotapc' || $menu == 'anggotapac' || $menu == 'anggotapr') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-users"></i>
              <p>
                Anggota
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>user/anggotapac?id=<?= $admin['ket']; ?>&id2=<?= $id_pimpinan; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manajemen Data Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/anggotapr?id=" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ranting / Komisariat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/inanggota" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><b>New Data</b></p>
                </a>
              </li>
              <!--<li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-KTA</p>
                </a>
              </li>-->
            </ul>
          </li>
          <!--
          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'suratkeluar' || $menu == 'suratmasuk') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>
                Data Surat
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>admin/suratkeluar" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>admin/suratmasuk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url()?>admin/inventarisbarang" <?php if ($menu == 'inventarisbarang') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-table"></i>
              <p>
                Inventaris Barang
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/keuangan" <?php if ($menu == 'keuangan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>
                Keuangan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/keuangan" <?php if ($menu == 'kegiatan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-th-large"></i>
              <p>
                Data Kegiatan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>admin/kegiatan" <?php if ($menu == 'downloadperaturan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-download"></i>
              <p>
                Download Peraturan
              </p>
            </a>
          </li>
          <!--
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <i class="nav-icon far fa-clipboard"></i>
              <p>
                Kegiatan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>admin/rencanakegiatan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rencana Kegiatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Kegiatan</p>
                </a>
              </li>
            </ul>
          </li>-->
          <li class="nav-item has-treeview">
            <a href="<?=base_url();?>user/downloadperaturan" <?php if ($menu == 'downloadperaturan') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-download"></i>
              <p>
                Download Peraturan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" <?php if ($menu == 'statistikorganisasi' || $menu == 'potensikader') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-chart-area"></i>
              <p>
                Statistik Organisasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url()?>user/statistikorganisasi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Statistik Organisasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>user/potensikader" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Potensi Kader</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">SIPADU App</li>
          <li class="nav-item">
            <a href="<?=base_url();?>user/about" <?php if ($menu == 'about') {
                ?> class="nav-link active" <?php
            }else{ ?>class="nav-link"<?php } ?>>
              <i class="nav-icon fas fa-file"></i>
              <p>About Us</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('user/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <?php }?>
  </aside>
