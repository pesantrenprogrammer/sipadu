<?php error_reporting(0); ?>
<!-- Pilih Berdasarkan Kabupaten/Kota -->
<?php if($_GET['id']==''){ ?>
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
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="GET" action="<?=base_url()?>admin/anggotapc">
            <div class="form-group">
              <select name="id" class="form-control">
                <option>Pilih Cabang</option>
                <?php foreach ($cabang as $pc): ?>
                <option value="<?= $pc['id_pimpinan']; ?>"><?= $pc['kd_pimpinan']; ?> - <?= $pc['nama_pimpinan']; ?></option>
                <?php endforeach; ?>
              </select>
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
<!-- Menampilkan data filter by search -->
<?php if($_GET['id']!=''){ ?>

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
      <div class="card-body">
        <form method="GET" action="<?=base_url()?>admin/anggotapc">
        <div class="form-group">
          <select name="id" class="form-control">
            <option>Pilih Cabang</option>
            <?php foreach ($cabang as $pc): ?>
            <option value="<?= $pc['id_pimpinan']; ?>"><?= $pc['kd_pimpinan']; ?> - <?= $pc['nama_pimpinan']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" class="form-control btn btn-info" value="Cari"/>
        </div>
      </form>
      </div>
      <!-- /.card-body --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Data Anggota - <?= $get_pc['nama_pimpinan']; ?></b></h3>
              <a target="_blank" class="btn btn-warning" style="float:right;" href="<?=base_url(); ?>admin/printanggotapc?id=<?php echo $_GET['id']; ?>"><i class="fas fa-print"></i> Print</a>
                <a target="_blank" class="btn btn-info" style="float:right;margin-right:5px;" href="<?=base_url(); ?>admin/exportanggotapc?id=<?php echo $_GET['id']; ?>"><i class="fas fa-download"></i> Export Excel</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table">
                <thead>
                <tr>
                  <th>No</th>
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
                  <td>
                    <a class='btn btn-info' title='view Detail' href='<?=base_url()?>admin/viewanggota?id=<?= $ang['id_anggota']; ?>'>
                      <span class='fas fa-th-list'></span></a>
                      <!--<a class='btn bg-olive btn-flat' title='Edit Data' href='<?=base_url()?>admin/editanggota?id=<?= $ang['id_anggota']; ?>'><span class='fa fa-edit'></span></a>-->
                    <!--<a onclick="return confirm('Apakah Benar Akan Menghapus Data ini?')" class='btn btn-danger' title='Hapus Data' href='<?=base_url()?>admin/deleteanggota?id=<?= $ang['id_anggota']; ?>'><span class='fas fa-trash'></span></a>-->

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
    <?php } ?>
