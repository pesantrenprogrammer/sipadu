<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rencana Kegiatan (Program Kerja)</h1>
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
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Program Kerja PC GP Ansor Kab. Purworejo</h3> <br/>
              <a class='btn btn-info' title='Print' href='<?=base_url()?>admin/viewanggota?id=<?= $ang['id_anggota']; ?>'>
                <span class='fas fa-print'> </span> Print</a>
              <a class='btn btn-info' title='Buat Surat' href='<?=base_url()?>admin/viewanggota?id=<?= $ang['id_anggota']; ?>'>
                  <span class='fas fa-plus'> </span> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Bidang</th>
                  <th>Waktu</th>
                  <th>Penanggung Jawab</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($rencanakegiatan as $rk): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $rk['nama_kegiatan']; ?></td>
                  <td><?= $rk['kategori_rencana_kegiatan']; ?></td>
                  <td><?= $rk['rencana_waktu_mulai'];?></td>
                  <td><?= $rk['penanggung_jawab'];?></td>
                  <td>
                    <a class='btn bg-olive' title='Lihat Surat' href='<?=base_url()?>admin/viewanggota?id=<?= $ang['id_anggota']; ?>'>
                    <span class='fas fa-th-list'></span></a>
                    <!--<a class='btn bg-olive btn-flat' title='Edit Data' href='<?=base_url()?>admin/editanggota?id=<?= $ang['id_anggota']; ?>'><span class='fa fa-edit'></span></a>-->
                  <a onclick="return confirm('Apakah Benar Akan Menghapus Data ini?')" class='btn btn-danger' title='Hapus Data' href='<?=base_url()?>admin/deleteanggota?id=<?= $ang['id_anggota']; ?>'><span class='fas fa-trash'></span></a></td>
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
