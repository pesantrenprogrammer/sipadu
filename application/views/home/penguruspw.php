<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengurus PW IPNU Jawa Tengah</h1>
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
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah</h3>
              <a target="_blank" class="btn btn-warning" style="float:right;" href="<?=base_url(); ?>admin/printanggotapw "><i class="fas fa-print"></i> Print</a>
              <a target="_blank" class="btn btn-info" style="float:right;margin-right:5px;" href="<?=base_url(); ?>admin/exportanggotapw "><i class="fas fa-download"></i> Export Excel</a>
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
                  <th>Status</th>
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
                  <td><?= $ang['nama_pimpinan']; ?></td>
                  <td><?= $ang['alamat_lengkap']; ?></td>
                  <td><?php if ($ang['status_verifikasi']=='sudah'){ echo"<span style='padding-left:5px;padding-right:5px;font-size:14px;' class='btn-success'>Terverifikasi</span>" ;}
                            else{ echo "<span style='padding-left:5px;padding-right:5px;font-size:14px;' class='btn-danger'>Belum Terverifikasi</span>";} ?></td>
                  <td>
                    <?php if($kategori_data==1){ ?>
                      <a target="_blank" class='btn btn-info' title='Print KTA IPNU' href='<?=base_url()?>admin/printktaipnu?id=<?= $ang['id_anggota']; ?>&id2=<?= $ang['id_pimpinan']; ?>&aktif=<?= $ang['aktif_kepengurusan']; ?>'>
                        <i class="fas fa-address-card"></i></a>
                      <?php }else{ ?>
                        <a target="_blank" class='btn btn-info' title='Print KTA IPPNU' href='<?=base_url()?>admin/printktaippnu?id=<?= $ang['id_anggota']; ?>'>
                          <i class="fas fa-address-card"></i></a>
                      <?php } ?>

                    <a class='btn btn-warning' title='view Detail' href='<?=base_url()?>admin/viewanggota?id=<?= $ang['id_anggota']; ?>'>
                      <span class='fas fa-th-list'></span></a>
                      <!--<a class='btn bg-olive btn-flat' title='Edit Data' href='<?=base_url()?>admin/editanggota?id=<?= $ang['id_anggota']; ?>'><span class='fa fa-edit'></span></a>-->
                    <a class='btn btn-danger tombol-hapus' title='Hapus Data' href='<?=base_url()?>admin/deleteanggota?id=<?= $ang['id_anggota']; ?>'><span class='fas fa-trash'></span></a>

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
