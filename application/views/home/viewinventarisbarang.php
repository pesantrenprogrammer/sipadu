<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Inventaris Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inventaris Barang </li>
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
                <tr><td>Index Barang</td><td>:</td><td><?= $inventaris_barang['index_barang'];?></td></tr>
                <tr><td>Nama / Jenis Barang</td><td>:</td><td><?= $inventaris_barang['nama_barang'];?></td></tr>
                <tr><td>Jumlah</td><td>:</td><td><?= $inventaris_barang['jumlah'];?></td></tr>
                <tr><td>Asal Barang</td><td>:</td><td><?= $inventaris_barang['asal_barang'];?></td></tr>
                <tr><td>Harga Satuan</td><td>:</td><td><?= $inventaris_barang['harga_satuan'];?></td></tr>
                <tr><td>Keterangan</td><td>:</td><td><?= $inventaris_barang['keterangan'];?></td></tr>
              </table>
              <br/>
              <input type="button" class="btn btn-danger" onclick="history.back();" value="Back" style="margin:10px;"/>
              <a target="_blank" href="" class="btn btn-info">Print Kartu Inventaris Barang</a>

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
