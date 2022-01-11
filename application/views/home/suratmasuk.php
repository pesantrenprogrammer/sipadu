<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Surat Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Surat </li>
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
              <div style="float:right">
              <a target="_blank" class='btn btn-danger' title='Print' href='<?=base_url()?>admin/printsuratmasuk'>
                <span class='fas fa-print'> </span> Print</a>
              <a target="_blank" class="btn btn-warning"  href="<?=base_url(); ?>admin/exportsuratmasuk">
                  <i class="fas fa-download"></i> Export Excel</a>
              <a class='btn btn-info' title='Buat Surat' href='<?=base_url()?>admin/insuratmasuk'>
                  <span class='fas fa-envelope'> </span> Rekam Surat</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Instansi Pengirim</th>
                  <th>Nomor Surat</th>
                  <!--<th>Tanggal Surat Diterima</th>-->
                  <th>Keterangan</th>
                  <th>Disposisi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($suratmasuk as $sm): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $sm['pengirim'];?></td>
                  <td><?= $sm['nomor_surat_masuk']; ?></td>
                  <!--<td>
                    <?php
                      $tanggal = $sm['tanggal_surat_diterima'];
                      $date=date_create($tanggal);
                      echo date_format($date,"d M Y");
                      ?></td>-->
                  <td><?= $sm['keterangan'];?></td>
                  <td><?= $sm['catatan_disposisi'];?></td>
                  <td>
                    <span style="float:left;margin-right:5px;" class="input-group-prepend">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
                      Lihat
                    </button>
                    <ul class="dropdown-menu">
                      <li class="dropdown-item"><a href="<?=base_url()?>admin/viewsuratmasuk?id=<?= $sm['id_surat_masuk'];?>">Detail</a></li>
                      <li class="dropdown-item"><a target="_blank" href="<?=base_url()?>upload/suratmasuk/<?= $sm['file_surat'];?>">PDF</a></li>
                    </ul>
                  </span>
                    <a class='btn btn-info' title='Edit' href='<?=base_url()?>admin/editsuratmasuk?id=<?= $sm['id_surat_masuk']; ?>'>
                      <span class='fas fa-edit'></span></a>
                  <a class='btn btn-danger tombol-hapus' title='Hapus Data' href='<?=base_url()?>admin/deletesuratmasuk?id=<?= $sm['id_surat_masuk']; ?>'>
                    <span class='fas fa-trash'></span></a></td>
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
