<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manajemen User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Manajemen User</li>
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
            <?php if ($admin['tingkatan']=='PC'){?>
            <h3 class="card-title"><b>Manajemen User | <?php if($kategori_data==1){ echo 'PC IPNU'; }else{ echo'PC IPPNU';} ?>
                <?= $pimpinan_default['nama_pimpinan'] ?></b></h3>
              <div class="" style="float:right;">
              <span style="color:#fff;" class="btn bg-maroon"><b>New Data</b></span>
              <a style="margin-left:5px;" class="btn btn-info" href="<?= base_url();?>user/inuserpac">PAC</a>
              </div>
              <?php }
              elseif ($admin['tingkatan']=='PAC'){?>
              <h3 class="card-title"><b>Manajemen User | <?php if($kategori_data==1){ echo 'PAC IPNU'; }else{ echo'PAC IPPNU';} ?>
                <?= $pimpinan_defaultpac['nama_pimpinan_ac'] ?></b></h3>
                <?php }?>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Tingkat</th>
                  <th>Nama Lengkap</th>
                  <th>No Telp</th>
                  <th width="30%">Alamat</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($manajemenuser as $user): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $user['username']; ?></td>
                  <td><b><?= $user['tingkatan']; ?></b></td>
                  <td><?= $user['nama_lengkap']; ?></td>
                  <td><?= $user['no_telpon']; ?></td>
                  <td><?= $user['sekretariat']; ?></td>
                  <td>
                    <a class='btn btn-info' title='Edit Data' href='<?=base_url()?>user/edituser?id=<?= $user['id_user']; ?>'><span class='fa fa-edit'></span></a>
                    <?php if ($admin['tingkatan']=='PC'){?>
                    <!--<a class='btn btn-danger tombol-hapus' title='Hapus Data' href='<?=base_url()?>user/deleteuser?id=<?= $user['id_user']; ?>&pc=<?php echo $_GET['pc'];?>'><span class='fas fa-trash'></span></a>-->
                    <?php }
                    elseif ($admin['tingkatan']=='PAC'){?>
                    <?php }?>
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
