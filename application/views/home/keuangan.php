<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Keuangan</li>
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
              <a target="_blank" class='btn btn-danger' title='Print' href='<?=base_url()?>admin/printkeuangan'>
                <span class='fas fa-print'> </span> Print</a>
              <a target="_blank" class="btn btn-warning"  href="<?=base_url(); ?>admin/exportkeuangan">
                  <i class="fas fa-download"></i> Export Excel</a>
              <a class='btn btn-info' title='Buat Surat' href='<?=base_url()?>admin/inkeuangan'>
                   New Data</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Transaksi</th>
                  <th>Debit</th>
                  <th>Kredit</th>
									<th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($keuangan as $uang): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php
                    $tanggal = $uang['tanggal_transaksi'];
                    $date=date_create($tanggal);
                    echo date_format($date,"d M Y");
                    ?></td>
                  <td><?= $uang['masuk']; ?></td>
                  <td><?= $uang['keluar']; ?></td>
									<td><?= $uang['keterangan']; ?></td>
                  <td>
                    <a class='btn btn-warning' title='Lihat Surat' href='<?=base_url()?>admin/viewkeuangan?id=<?= $uang['id_keuangan']; ?>'>
                    <span class='fas fa-th-list'></span></a>
                    <a class='btn btn-info' title='Edit Data' href='<?=base_url()?>admin/editkeuangan?id=<?= $uang['id_keuangan']; ?>'><span class='fa fa-edit'></span></a>
                  <a class='btn btn-danger tombol-hapus' title='Hapus Data' href='<?=base_url()?>admin/deletekeuangan?id=<?= $uang['id_keuangan']; ?>'><span class='fas fa-trash'></span></a></td>
                </tr>
                <?php endforeach; ?>

                </tbody>
              </table>
							<br/>
							<h5><b>Rekap Keuangan</b></h5>
							<table>
								<tr><td>Jumlah Masuk</td> <td>:</td> <td>Rp <?= $masuk['masuk'];?></td></tr>
								<tr><td>Jumlah Keluar</td> <td>:</td> <td>Rp <?= $keluar['keluar'];?></td></tr>
								<tr><td>Saldo</td> <td>:</td> <td><b>Rp <?= $masuk['masuk']-$keluar['keluar'];?></b></td></tr>
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
