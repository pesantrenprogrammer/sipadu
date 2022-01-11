<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Surat Keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Surat </li>
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
                <tr><td>Nomor Surat</td><td>:</td><td><?= $surat_keluar['nomor_surat'];?></td></tr>
                <tr><td>Tetanggal Surat</td><td>:</td><td><?php
                  $tanggalsurat = $surat_keluar['tanggal_surat'];
                  $date=date_create($tanggalsurat);
                  echo date_format($date,"d M Y");
                  ?></td></tr>
                <tr><td>Tujuan</td><td>:</td><td><?= $surat_keluar['tujuan_surat'];?></td></tr>
                <tr><td>Perihal</td><td>:</td><td><?= $surat_keluar['perihal'];?></td></tr>
                <tr><td>Keterangan</td><td>:</td><td><?= $surat_keluar['keterangan'];?></td></tr>
              </table>
              <br/>
              <input type="button" class="btn btn-danger" onclick="history.back();" value="Back" style="margin:10px;"/>
              <a target="_blank" href="<?=base_url()?>upload/suratkeluar/<?= $surat_keluar['file_surat'];?>" class="btn btn-info">Lihat File Surat</a>

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
