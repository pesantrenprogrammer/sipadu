<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Kegiatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kegiatan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table>
                <tr><td>Nama / Bentuk Kegiatan</td><td>:</td><td><b><?= $daftar_kegiatan['nama_kegiatan'];?></b></td></tr>
                <tr><td>Hari / Tanggal</td><td>:</td><td><?= $daftar_kegiatan['hari'];?>, <?php
                  $tanggal = $daftar_kegiatan['tanggal'];
                  $date=date_create($tanggal);
                  echo date_format($date,"d M Y");
                  ?></td></tr>
                <tr><td>Waktu</td><td>:</td><td><?= $daftar_kegiatan['waktu'];?></td></tr>
                <tr><td>Pelaksana</td><td>:</td><td><?= $daftar_kegiatan['kategori_kegiatan'];?></td></tr>
                <tr><td>Tempat Kegiatan</td><td>:</td><td><?= $daftar_kegiatan['tempat'];?></td></tr>
                <tr><td>Keterangan</td><td>:</td><td><?= $daftar_kegiatan['keterangan'];?></td></tr>
              </table>
              <br/>
              <input type="button" class="btn btn-danger" onclick="history.back();" value="Back" style="margin:10px;"/>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
