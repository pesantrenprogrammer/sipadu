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
              <h3 class="card-title"><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Cabang</th>
                  <th>Kode Daerah</th>
                  <th>Pengaturan</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($pimpinan as $pimp): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $pimp['nama_pimpinan']; ?></td>
                  <td><b><?= $pimp['kd_pimpinan']; ?></b></td>
                  <td>
                    <span style="float:left;margin-right:5px;" class="input-group-prepend">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <span class='fa fa-wrench'></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="<?=base_url(); ?>admin/kodepac?id=<?= $pimp['id_pimpinan']; ?>">PAC</a></li>
                      <li class="dropdown-item"><a  href="<?=base_url(); ?>admin/kodepkpt?id=<?= $pimp['id_pimpinan']; ?>">PKPT</a></li>
                    </ul>
                    </span>
                      <!--<form method="GET" action="<?=base_url(); ?>admin/kodepac">
                        <button style="float:left;margin-right:5px;" class='btn btn-info' type="submit" name="id" value="<?= $pimp['id_pimpinan']; ?>"><span class='fa fa-wrench'></span></button></form>-->

                    <form method="GET" action="<?=base_url(); ?>admin/editpc">
                      <button style="" class="btn bg-maroon" type="submit" name="id" value="<?= $pimp['id_pimpinan']; ?>"><span class="fa fa-edit"></span></button></form>
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
