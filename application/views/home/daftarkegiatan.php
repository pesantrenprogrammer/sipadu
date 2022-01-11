<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Kegiatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kegiatan</li>
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
              <div style="float:right;">
              <a target="_blank" class='btn btn-danger' title='Print' href='<?=base_url()?>admin/printdaftarkegiatan'>
                <span class='fas fa-print'> </span> Print</a>
              <a target="_blank" class="btn btn-warning"  href="<?=base_url(); ?>admin/exportdaftarkegiatan">
                    <i class="fas fa-download"></i> Export Excel</a>
              <a class='btn btn-info' title='Buat Surat' href='<?=base_url()?>admin/indaftarkegiatan'>
                  </span> New Data</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Bentuk Kegiatan</th>
                  <th>Hari, Tanggal</th>
                  <th>Pelaksana</th>
                  <th>Tempat Pelaksanaan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($daftar_kegiatan as $dk): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $dk['nama_kegiatan']; ?></td>
                  <td><?= $dk['hari']; ?> , <?php
                    $tanggal = $dk['tanggal'];
                    $date=date_create($tanggal);
                    echo date_format($date,"d M Y");
                    ?></td>
                  <td><?= $dk['kategori_kegiatan']; ?></td>
                  <td><?= $dk['tempat'];?></td>
                  <td>

                    <span style="float:left;margin-right:5px;" class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      Edit
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="<?=base_url()?>admin/editdaftarkegiatan?id=<?= $dk['id_daftar_kegiatan']; ?>">Edit Data</a></li>
                      <li class="dropdown-item"><a target="_blank" href="<?=base_url()?>admin/editlpj?id=<?= $dk['id_daftar_kegiatan']; ?>">Edit LPJ Pdf</a></li>
                    </ul>
                    </span>
                    <a class='btn btn-info' title='Lihat' href='<?=base_url()?>admin/viewdaftarkegiatan?id=<?= $dk['id_daftar_kegiatan']; ?>'>
                      <span class='fas fa-th-list'></span></a>
                  <a class='btn btn-danger tombol-hapus' title='Hapus Data' href='<?=base_url()?>admin/deletedaftarkegiatan?id=<?= $dk['id_daftar_kegiatan']; ?>'><span class='fas fa-trash'></span></a></td>
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
