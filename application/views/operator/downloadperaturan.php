<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Download Peraturan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Download Peraturan</li>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Judul File</th>
                  <th>Link Download</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($download_peraturan as $dp): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $dp['judul_file']; ?></td>
                  <td><a target="_blank" href="<?= $dp['link_download']; ?>"><?= $dp['link_download']; ?></a></td>
                  <td><?= $dp['keterangan']; ?></td>
                </tr>
                <?php endforeach; ?>

                </tbody>
              </table>
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
