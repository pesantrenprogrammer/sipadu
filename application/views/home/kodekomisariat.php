<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pengaturan Kode Daerah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Kode Daerah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> <?= $pimpinan_cabang['nama_pimpinan']; ?> - <b>PAC <?= $pac['nama_pimpinan_ac']; ?> (<?= $pac['kd_pimpinan_ac']; ?>)</b></h3>
              <a style="float:right;" class="btn btn-info" href="<?= base_url();?>admin/inranting?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>&id3=PK">New Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Komisariat</th>
                  <th>Kode Daerah</th>
                  <th>Status Kepengurusan</th>
                  <th>Pengaturan</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($pimpinan as $pimp): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $pimp['nama_pimpinan_rk']; ?></td>
                  <td><b><?= $pimp['kd_pimpinan_rk']; ?></b></td>
                  <td><?= $pimp['status_aktif']; ?></td>
                  <td>
                    <a class='btn btn-info' title='Edit Data' href='<?=base_url()?>admin/editranting?id_rk=<?= $pimp['id_pimpinan_rk']; ?>&id=<?= $pimp['id_pimpinan_ac']; ?>&id2=<?= $pimp['id_pimpinan']; ?>&id3=PK'><span class='fa fa-edit'></span></a>
                    </td>
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
