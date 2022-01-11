<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pimpinan Komisariat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">PK</li>
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
              <h3 class="card-title">
              <?php if($kategori_data==1){ echo 'PC IPNU'; }else{ echo'PC IPPNU';} ?> <b><?= $pimpinan_cabang['nama_pimpinan']?></b></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table">
                <thead>
                <tr>
                  <th>No</th> 
                  <th>Nama Komisariat</th>
                  <th>Kode Daerah</th>
                  <th>Pimpinan Anak Cabang</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($data_pk as $pk): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $pk['nama_pimpinan_rk']; ?></td>
                  <?php if($kategori_data==1){ ?>
                    <td><b><?= $pk['kd_pimpinan']; ?>.<?= $pk['kd_pimpinan_ac']; ?>.<?= $pk['kd_pimpinan_rk']; ?></b></td>
                  <?php }else{ ?>
                    <td><b><?= $pk['kd_pimpinan']; ?><?= $pk['kd_pimpinan_ac']; ?><?= $pk['kd_pimpinan_rk']; ?></b></td>
                  <?php } ?>
                  <td>Kecamatan <?= $pk['nama_pimpinan_ac']; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>

              </table>
              <input type="button" class="btn bg-maroon" onclick="history.back();" value="Kembali"/>
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
