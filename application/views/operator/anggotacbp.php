<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1><?php if($kategori_data==1){ echo 'Data Anggota CBP'; }else{ echo'Data Anggota KPP';} ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active"><?php if($kategori_data==1){ echo 'Data Anggota CBP'; }else{ echo'Data Anggota KPP';} ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php if ($admin['tingkatan']=='PC'){?>
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                <?php if($kategori_data==1){ echo 'PC IPNU'; }else{ echo'PC IPPNU';} ?> <b><?= $pimpinan_cabang['nama_pimpinan']?></b></h3>
              <!--<a target="_blank" class="btn btn-warning" style="float:right;" href="<?=base_url(); ?>admin/printanggotapw "><i class="fas fa-print"></i> Print</a>-->
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
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($anggota as $ang): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $ang['nia']; ?></td>
                  <td><b><?= $ang['nama']; ?></b></td>
                  <td><?= $ang['nama_pimpinan']; ?></td>
                  <td><?= $ang['alamat_lengkap']; ?></td>
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
    <?php }
    elseif ($admin['tingkatan']=='PAC'){?>
                <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                <?php if($kategori_data==1){ echo 'PAC IPNU'; }else{ echo'PAC IPPNU';} ?> <b><?= $pimpinan_defaultpac['nama_pimpinan_ac']?></b></h3>
              <!--<a target="_blank" class="btn btn-warning" style="float:right;" href="<?=base_url(); ?>admin/printanggotapw "><i class="fas fa-print"></i> Print</a>-->
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
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($anggota as $ang): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $ang['nia']; ?></td>
                  <td><b><?= $ang['nama']; ?></b></td>
                  <td><?= $ang['nama_pimpinan']; ?></td>
                  <td><?= $ang['alamat_lengkap']; ?></td>
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
    <?php }?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
