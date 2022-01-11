<?php error_reporting(0); ?>
<?php if($_GET['id3']==''){ ?>
  <?php if ($admin['tingkatan']=='PC'){?>
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
            <form method="GET" action="<?=base_url()?>user/anggotapr">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <div class="form-group">
              <select  class="form-control" id="id2" name="id2">
                <option>Pilih Anak Cabang</option>
                <?php foreach ($kecamatan as $pac): ?>
                  <option id="id_pimpinan_ac" class="<?= $pac['id_pimpinan']; ?>" value="<?= $pac['id_pimpinan_ac']; ?>"><?= $pac['nama_pimpinan_ac']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <select  class="form-control" id="id3" name="id3">
                <option>Ranting / Komisariat</option>
                <?php foreach ($prpk as $rk): ?>
                <option id="id_pimpinan_rk" class="<?= $rk['id_pimpinan_ac']; ?>" value="<?= $rk['id_pimpinan_rk']; ?>"><?= $rk['nama_pimpinan_rk']; ?></option>
                <?php endforeach; ?>
              </select>
              <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
              <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
              <script>
                  $("#id3").chained("#id2");
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
  <?php }
  elseif ($admin['tingkatan']=='PAC'){?>
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
            <form method="GET" action="<?=base_url()?>user/anggotapr">
            <input type="hidden" name="id" value="<?= $admin['ket'];?>">
            <input type="hidden" name="id2" value="<?= $admin['id_pimpinan'];?>">
            <div class="form-group">
              <select  class="form-control" id="id3" name="id3">
                <option>Ranting / Komisariat</option>
                <?php foreach ($prpk as $rk): ?>
                <option id="id_pimpinan_rk" class="<?= $rk['id_pimpinan_ac']; ?>" value="<?= $rk['id_pimpinan_rk']; ?>"><?= $rk['nama_pimpinan_rk']; ?></option>
                <?php endforeach; ?>
              </select>
              <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
              <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
              <script>
                  $("#id3").chained("#id2");
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
  <?php }?>
<?php } ?>
<?php if($_GET['id3']!=''){ ?>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
          <?php if ($admin['tingkatan']=='PC'){?>
          <div class="card-body table-responsive p-o">
            <form method="GET" action="<?=base_url()?>user/anggotapr">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <div class="form-group">
              <select  class="form-control" id="id2" name="id2">
                <option>Pilih Anak Cabang</option>
                <?php foreach ($kecamatan as $pac): ?>
                  <option id="id_pimpinan_ac" class="<?= $pac['id_pimpinan']; ?>" value="<?= $pac['id_pimpinan_ac']; ?>"><?= $pac['nama_pimpinan_ac']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <select  class="form-control" id="id3" name="id3">
                <option>Ranting / Komisariat</option>
                <?php foreach ($prpk as $rk): ?>
                <option id="id_pimpinan_rk" class="<?= $rk['id_pimpinan_ac']; ?>" value="<?= $rk['id_pimpinan_rk']; ?>"><?= $rk['nama_pimpinan_rk']; ?></option>
                <?php endforeach; ?>
              </select>
              <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
              <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
              <script>
                  $("#id3").chained("#id2");
              </script>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-info" value="Cari"/>
            </div>
            </form>
            </form>

            </div>
            <?php }
            elseif ($admin['tingkatan']=='PAC'){?>
                <div class="card-body">
            <form method="GET" action="<?=base_url()?>user/anggotapr">
            <input type="hidden" name="id" value="<?= $admin['ket'];?>">
            <input type="hidden" name="id2" value="<?= $admin['id_pimpinan'];?>">
            <div class="form-group">
              <select  class="form-control" id="id3" name="id3">
                <option>Ranting / Komisariat</option>
                <?php foreach ($prpk as $rk): ?>
                <option id="id_pimpinan_rk" class="<?= $rk['id_pimpinan_ac']; ?>" value="<?= $rk['id_pimpinan_rk']; ?>"><?= $rk['nama_pimpinan_rk']; ?></option>
                <?php endforeach; ?>
              </select>
              <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
              <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
              <script>
                  $("#id3").chained("#id2");
              </script>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-info" value="Cari"/>
            </div>
            </form>
          </div>
            <?php }?>

            <div class="card-header">
              <h3 class="card-title">Data Anggota <?= $get_rk['pimpinan_rk']; ?> <?= $get_rk['nama_pimpinan_rk']; ?> PAC <?= $get_pac['nama_pimpinan_ac']; ?> - <?= $get_pc['nama_pimpinan']; ?></h3>
              <a target="_blank" class="btn btn-warning" style="float:right;" href="<?=base_url(); ?>user/printanggotark?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>&id3=<?php echo $_GET['id3']; ?>"><i class="fas fa-print"></i> Print</a>
              <a target="_blank" class="btn btn-info" style="float:right;margin-right:5px;" href="<?=base_url(); ?>user/exportanggotark?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>&id3=<?php echo $_GET['id3']; ?>"><i class="fas fa-download"></i> Export Excel</a>
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
                  <td>
                    <?php if ($admin['tingkatan']=='PC'){?>
                      <?= $ang['nia']; ?>
                    <?php } elseif ($admin['tingkatan']=='PAC'){?>
                        <?php if ($ang['status_verifikasi']=='sudah'){?>
                          <?= $ang['nia']; ?>
                        <?php }else{ echo "<span style='padding-left:5px;padding-right:5px;font-size:14px;' class='btn-danger'>Belum Terverifikasi</span>"; } ?>
                    <?php }?>
                  </td>
                  <td><b><?= $ang['nama']; ?></b></td>
                  <td><?= $ang['nama_pimpinan_rk']; ?></td>
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
