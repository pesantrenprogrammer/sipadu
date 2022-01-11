
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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="<?=base_url()?>admin/anggotapw">
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
            <a href="<?=base_url()?>/admin/verifikasianggota">
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
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

           <div class="col-12 col-sm-6 col-md-3">
            <a href="<?=base_url()?>admin/manajemenuser">
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
            <a href="<?=base_url()?>admin/aplikasi">
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5><?= $anggota; ?></h5>

                <p>Anggota</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="<?=base_url()?>admin/anggotapw" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h5><?= $pc; ?></h5>

                <p>PC</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=base_url()?>admin/kodedaerah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php foreach ($jumlah_keuangan as $total) : ?>
                <h5>Rp <?= number_format($total['masuk']-$total['keluar']); ?></h5>
                <?php endforeach; ?>
                <p>Keuangan</p>
              </div>
              <div class="icon">
                <i class="fa fa-dollar-sign"></i>
              </div>
              <a href="<?=base_url()?>admin/keuangan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h5><?= $sm; ?></h5>

                <p>Surat Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-envelope"></i>
              </div>
              <a href="<?=base_url()?>admin/suratmasuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
            <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">Success</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p><h3>Anda Sukses Menginput Data</h3></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-success btn-outline-light" data-dismiss="modal">Close</button>
              <!--<button type="button" class="btn btn-outline-light">Save</button>-->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
