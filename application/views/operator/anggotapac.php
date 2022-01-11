<?php error_reporting(0); ?>
<!-- Pilih Berdasarkan Kabupaten/Kota -->
<?php if($_GET['id2']==''){ ?>
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
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <!-- /.card-header -->
          <div class="card-body">
            <form method="GET" action="<?=base_url()?>user/anggotapac">
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <select name="id2" class="form-control">
                <option>Pilih Anak Cabang</option>
                <?php foreach ($kecamatan as $pac): ?>
                <option id="id_pimpinan_ac" class="<?= $pac['id_pimpinan']; ?>" value="<?= $pac['id_pimpinan_ac']; ?>"><?= $pac['nama_pimpinan_ac']; ?></option>
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
  <?php }
  elseif ($admin['tingkatan']=='PAC'){?>
  <?php }?>
<?php } ?>
<!-- Menampilkan data filter by search -->
<?php if($_GET['id2']!=''){ ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
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
      <?php if ($admin['tingkatan']=='PC'){?>
      <div class="card-body table-responsive p-o">
        <form method="GET" action="<?=base_url()?>user/anggotapac">
            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
              <select name="id2" class="form-control">
                <option>Pilih Anak Cabang</option>
                <?php foreach ($kecamatan as $pac): ?>
                <option id="id_pimpinan_ac" class="<?= $pac['id_pimpinan']; ?>" value="<?= $pac['id_pimpinan_ac']; ?>"><?= $pac['nama_pimpinan_ac']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-info" value="Cari"/>
            </div>
          </form>
      </div>
      <?php }
      elseif ($admin['tingkatan']=='PAC'){?>
      <?php }?>
      <!-- /.card-body -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Data Anggota - <?php if($kategori_data==1){ echo 'PAC IPNU'; }else{ echo'PAC IPPNU';} ?> <?= $get_pac['nama_pimpinan_ac']; ?></b></h3>
              <a target="_blank" class="btn btn-warning" style="float:right;" href="<?=base_url(); ?>user/printanggotapac?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>"><i class="fas fa-print"></i> Print</a>
              <a target="_blank" class="btn btn-info" style="float:right;margin-right:5px;" href="<?=base_url(); ?>user/exportanggotapac?id=<?php echo $_GET['id']; ?>&id2=<?php echo $_GET['id2']; ?>"><i class="fas fa-download"></i> Export Excel</a>
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
                  <th width='30%'>Alamat</th>
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
                  <td><?= $ang['nama_pimpinan_ac']; ?></td>
                  <td><?= $ang['alamat_lengkap']; ?></td>
                  <td>
                    <a class='btn btn-info' title='view Detail' href='<?=base_url()?>user/viewanggota?id=<?= $ang['id_anggota']; ?>'>
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
