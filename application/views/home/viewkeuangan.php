<style>
td {
  padding: 10px;
}

</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Keuangan </li>
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
              <table cellspacing="5" class="table-striped">
                <tr><td>Tanggal Transaksi</td><td>:</td><td><?php
                  $tanggal = $keuangan['tanggal_transaksi'];
                  $date=date_create($tanggal);
                  echo date_format($date,"d M Y");
                  ?></td></tr>
                <tr><td>Uraian Pemasukan</td><td>:</td><td><?= $keuangan['uraian_pemasukan'];?></td></tr>
                <tr><td>Uraian Pengeluaran</td><td>:</td><td><?= $keuangan['uraian_pengeluaran'];?></td></tr>
                <tr><td>Debit / Pemasukan</td><td>:</td><td><?= $keuangan['masuk'];?></td></tr>
                <tr><td>Kredit / Pengeluaran</td><td>:</td><td><?= $keuangan['keluar'];?></td></tr>
                <tr><td>Keterangan</td><td>:</td><td><?= $keuangan['keterangan'];?></td></tr>
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
