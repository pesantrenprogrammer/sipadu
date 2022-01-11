
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
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-arrow-alt-circle-right"></i>
                  Sipadu App
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <h2>Selamat Datang <b><?php if($kategori_data==1){ echo 'Rekan'; }else{ echo'Rekanita';} ?> <?= $admin['nama']; ?></b>.....!</h2>
                <h5>Di Aplikasi SIPADU App PW <?php if($kategori_data==1){ echo 'IPNU'; }else{ echo'IPPNU';} ?> Jawa Tengah </h5>
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
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                <i class="fab fa-safari"></i>
                  Dapatkan Update Informasi di Website Resmi PW IPNU Jawa Tengah
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <iframe style="border:none;" src="https://ipnujateng.or.id/" height="400px" width="100%" title="Iframe Example"></iframe>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
