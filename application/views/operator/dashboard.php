
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Beta Version</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php if ($admin['tingkatan']=='PC'){?>
        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?=base_url()?>user/anggotapc">
            <div class="info-box mb-3">
              <span class="info-box-icon  bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Anggota</span>
                <span class="info-box-number"><?php if($kategori_data==1){ echo 'IPNU'; }else{ echo'IPPNU';} ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?=base_url()?>/user/verifikasianggota">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="nav-icon fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Verifikasi Anggota</span>
                <span align="center" style="background:#f1c40f;width:30px;border-radius:20px;padding:4px;" class="info-box-number"><?= $belumverifikasi; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

           <div class="col-12 col-sm-6 col-md-3">
            <a href="<?=base_url()?>user/manajemenuser?pc=<?= $id_pimpinan?>">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Manajemen User</span>
                <span class="info-box-number">User</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?=base_url()?>user/aplikasi">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Setting Apps</span>
                <span class="info-box-number">Setting</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5><?= $anggota; ?></h5>

                <p>Anggota</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?=base_url(); ?>user/anggotapc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5><?= $pac_aktif; ?></h5>

                <p>PAC dari <?= $pac; ?> Kecamatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url(); ?>user/kodepac?id=<?= $id_pimpinan?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h5><?= $ranting_aktif; ?></h5>

                <p>Ranting dari <?= $ranting; ?> Desa/Kelurahan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url(); ?>user/datapr?id=<?= $id_pimpinan?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h5><?= $komisariat_aktif; ?></h5>

                <p>Komisariat dari <?= $komisariat; ?> Sekolah/Madrasah</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url(); ?>user/datapk?id=<?= $id_pimpinan?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h5><?= $statistik_pkpt_aktif; ?></h5>

                <p>PKPT dari <?= $statistik_pkpt; ?> Perguruan Tinggi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url(); ?>user/datapkpt?id=<?= $id_pimpinan?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-arrow-alt-circle-right"></i>
                  More Info Link
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <a target="_blank" href="">SIPADU! Solusi Manajemen Organisasi Era Society</a> <br/>
                <a target="_blank" href="">Manual E-Book SIPADU PW IPNU PROVINSI JAWA TENGAH</a><br/>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          <div class="card">
              <div class="card-body">
              <img src="<?=base_url()?>template/dist/img/sipadu.png" width="100%"/>
              </div><!-- /.card-body -->
            </div>




            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
        <?php }
    elseif ($admin['tingkatan']=='PAC'){?>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <a href="<?=base_url()?>user/anggotapac?id=<?= $admin['ket']; ?>&id2=<?= $id_pimpinan; ?>">
            <div class="info-box mb-3">
              <span class="info-box-icon  bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Data Anggota</span>
                <span class="info-box-number"><?php if($kategori_data==1){ echo 'IPNU'; }else{ echo'IPPNU';} ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

           <div class="col-12 col-sm-6 col-md-4">
            <a href="<?=base_url() ?>user/manajemenuser?pc=<?= $admin['ket']; ?>&pac=<?= $id_pimpinan; ?>">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Manajemen User</span>
                <span class="info-box-number">User</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <a href="<?=base_url()?>user/aplikasi">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Setting Apps</span>
                <span class="info-box-number">Setting</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
    <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5><?= $anggota; ?></h5>

                <p>Anggota</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?=base_url()?>user/anggotapac?id=<?= $admin['ket']; ?>&id2=<?= $id_pimpinan; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h5><?= $ranting_aktif; ?></h5>

                <p>Ranting dari <?= $ranting; ?> Desa/Kelurahan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url()?>user/koderanting?id=<?= $id_pimpinan; ?>&id2=<?= $admin['ket']; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h5><?= $komisariat_aktif; ?></h5>

                <p>Komisariat dari <?= $komisariat; ?> Sekolah/Madrasah</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url()?>user/kodekomisariat?id=<?= $id_pimpinan; ?>&id2=<?= $admin['ket']; ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-arrow-alt-circle-right"></i>
                  More Info Link
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <a target="_blank" href="">SIPADU! Solusi Manajemen Organisasi Era Society</a> <br/>
                <a target="_blank" href="">Manual E-Book SIPADU PW IPNU PROVINSI JAWA TENGAH</a><br/>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

          <div class="card">
              <div class="card-body">
              <img src="<?=base_url()?>template/dist/img/sipadu.png" width="100%"/>
              </div><!-- /.card-body -->
            </div>




            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
      <?php }?>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
