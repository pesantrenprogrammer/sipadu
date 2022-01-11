<?php error_reporting(0); ?>
<?php if($_GET['id2']==''){ ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Data Anggota</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="GET" action="<?=base_url()?>user/anggotapkpt">
            <div class="form-group">
              <select  class="form-control" id="id2" name="id2">
                <option>Pilih PKPT</option>
                <?php foreach ($pkpt as $pkpt): ?>
                <option id="id_pimpinan_ac" class="<?= $pkpt['id_pimpinan']; ?>" value="<?= $pkpt['id_pimpinan_ac']; ?>">PKPT <?= $pkpt['nama_pimpinan_ac']; ?></option>
                <?php endforeach; ?>
              </select>
              <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
              <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
              <script>
                  $("#id2").chained("#id");
              </script>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-info" value="Cari"/>
            </div>
          </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid --> 
    </section>
    <!-- /.content -->
  </div>
<?php } ?>
<?php if($_GET['id2']!=''){ ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Data Anggota</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="card-body">
      <form method="GET" action="<?=base_url()?>user/anggotapkpt">
        <div class="form-group">
        <select  class="form-control" id="id2" name="id2">
                <option>Pilih PKPT</option>
                <?php foreach ($pkpt as $pkpt): ?>
                <option id="id_pimpinan_ac" class="<?= $pkpt['id_pimpinan']; ?>" value="<?= $pkpt['id_pimpinan_ac']; ?>">PKPT <?= $pkpt['nama_pimpinan_ac']; ?></option>
                <?php endforeach; ?>
              </select>
        <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
        <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
        <script>
            $("#id2").chained("#id");
        </script>
      </div>
      <div class="form-group">
        <input type="submit" class="form-control btn btn-info" value="Cari"/>
      </div>
    </form>

    </div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Anggota PKPT <?= $get_pkpt['nama_pimpinan_ac']; ?> - <?= $get_pc['nama_pimpinan']; ?></h3>
              <a target="_blank" class="btn btn-warning" style="float:right;" href="<?=base_url(); ?>user/printanggotapkpt?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>"><i class="fas fa-print"></i> Print</a>
              <a target="_blank" class="btn btn-info" style="float:right;margin-right:10px;" href="<?=base_url(); ?>user/exportanggotapkpt?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>"><i class="fas fa-download"></i> Export Excel</a>
              <a class="btn btn-danger" style="float:right;margin-right:10px;" href="<?=base_url(); ?>user/inanggotapkpt?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>"><i class="fas fa-plus"></i> New Data</a>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>NIA</th>
                  <th>Nama</th>
                  <th>Keanggotaan</th>
                  <th>Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($anggota as $ang): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $ang['nia']; ?></td>
                  <td><b><?= $ang['nama']; ?></b></td>
                  <td><?= $ang['nama_pimpinan_ac']; ?></td>
                  <td><?= $ang['alamat_lengkap']; ?></td>
                  <td><a class='btn btn-info btn-flat' title='view Detail' href='<?=base_url()?>user/viewanggota?id=<?= $ang['id_anggota']; ?>'>
                    <span class='fas fa-th-list'></span></a></td>
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
  <?php } ?>
