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
              <h3 class="card-title"><?php if($kategori_data==1){ echo 'PC IPNU'; }else{ echo'PC IPPNU';} ?> <?= $pimpinan_cabang['nama_pimpinan'];?></h3>
              <?php if ($admin['tingkatan']=='PC'){?>
              <form method="GET" action="<?=base_url();?>user/inpac">
                <input type="hidden" name="id" value="<?= $pimpinan_cabang['id_pimpinan'];?>"/>
                <button type="submit" style="float:right;margin-right:5px;" class="btn btn-info">New Data</button></form>
                <?php }
              elseif ($admin['tingkatan']=='PAC'){?>
              <?php }?>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Kecamatan</th>
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
                  <td><?= $pimp['nama_pimpinan_ac']; ?></td>
                  <td><b><?= $pimp['kd_pimpinan_ac']; ?></b></td>
                  <td><?= $pimp['status_aktif']; ?></td>
                  <td> 
                    <?php if ($admin['tingkatan']=='PC'){?>
                      <span style="float:left;margin-right:5px;" class="input-group-prepend">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class='fa fa-wrench'></span>
                    </button>
                    <ul class="dropdown-menu"> 
                      <li class="dropdown-item"><a href="<?=base_url()?>user/koderanting?id=<?= $pimp['id_pimpinan_ac']; ?>&id2=<?php echo $_GET['id']?>">Ranting</a></li>
                      <li class="dropdown-item"><a href="<?=base_url()?>user/kodekomisariat?id=<?= $pimp['id_pimpinan_ac']; ?>&id2=<?php echo $_GET['id']?>">Komisariat</a></li>
                    </ul>
                    </span>
                      <a class='btn bg-warning' title='Edit Data' href='<?=base_url()?>user/editpac?id=<?= $pimp['id_pimpinan_ac']; ?>&id2=<?php echo $_GET['id']?>'><span class='fa fa-edit'></span></a>
                    <?php }
                    elseif ($admin['tingkatan']=='PAC'){?>
                    <span style="float:left;margin-right:5px;" class="input-group-prepend">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class='fa fa-wrench'></span>
                    </button>
                      <ul class="dropdown-menu"> 
                      <li class="dropdown-item"><a href="<?=base_url()?>user/koderanting?id=<?= $pimp['id_pimpinan_ac']; ?>&id2=<?php echo $_GET['id']?>">Ranting</a></li>
                      <li class="dropdown-item"><a href="<?=base_url()?>user/kodekomisariat?id=<?= $pimp['id_pimpinan_ac']; ?>&id2=<?php echo $_GET['id']?>">Komisariat</a></li>
                    </ul>
                    </span>
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
