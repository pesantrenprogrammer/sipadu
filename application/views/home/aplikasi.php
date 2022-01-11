<?php error_reporting(0); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
} ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting App </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Setting App</li>
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
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example" class="table">
                <thead>
                <tr>
                  <th colspan="3">#</th>
                  <!--<th>Edit</th>-->
                </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Organisasi</td>
                    <td><b><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> <?= $aplikasi['nama_pimpinan']; ?></b></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Masa Khidmat </td>
                    <td><?= $aplikasi['masa_khidmat']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="masa_khidmat"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Nomor SP </td>
                    <td><?= $aplikasi['no_sp']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="no_sp"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Tanggal Berlaku SP</td>
                    <td><?= tgl_indo($aplikasi['tgl_sp']); ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_date">
                      <button class="btn btn-info" type="submit" name="kolom" value="tgl_sp"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Surat Pengesahan</td>
                    <td><a href="<?= base_url();?>upload/setting-app/<?= $aplikasi['file_sp']; ?>" ><?php $app=$aplikasi['file_sp']; if($app==''){ echo 'Belum Ada File';}else{ echo 'SuratPengesahan.pdf';} ?></a></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_dokumen">
                      <button class="btn btn-info" type="submit" name="kolom" value="file_sp"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                <tr>
                  <td>Kop Surat</td>
                  <td><img src="<?= base_url();?>upload/setting-app/<?= $aplikasi['kop_surat']; ?>" height="70px"/></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_foto">
                    <button class="btn btn-info" type="submit" name="kolom" value="kop_surat"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                  <td>Nama Ketua </td>
                  <td><?= $aplikasi['nama_ketua']; ?></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                    <button class="btn btn-info" type="submit" name="kolom" value="nama_ketua"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                  <td>NIA Ketua </td>
                  <td><?= $aplikasi['nia_ketua']; ?></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                    <button class="btn btn-info" type="submit" name="kolom" value="nia_ketua"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                  <td>Tanda Tangan Ketua</td>
                  <td><img src="<?= base_url();?>upload/setting-app/<?= $aplikasi['ttd_ketua']; ?>" height="70px"/></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_foto">
                    <button class="btn btn-info" type="submit" name="kolom" value="ttd_ketua"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                  <td>Nama Sekretaris </td>
                  <td><?= $aplikasi['nama_sekretaris']; ?></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                    <button class="btn btn-info" type="submit" name="kolom" value="nama_sekretaris"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                  <td>NIA Sekretaris </td>
                  <td><?= $aplikasi['nia_sekretaris']; ?></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                    <button class="btn btn-info" type="submit" name="kolom" value="nia_sekretaris"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                  <td>Tanda Tangan Sekretaris</td>
                  <td><img src="<?= base_url();?>upload/setting-app/<?= $aplikasi['ttd_sekretaris']; ?>" height="70px"/></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_foto">
                    <button class="btn btn-info" type="submit" name="kolom" value="ttd_sekretaris"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                  <td>Stempel</td>
                  <td><img src="<?= base_url();?>upload/setting-app/<?= $aplikasi['stempel']; ?>" height="70px"/></td>
                  <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_foto">
                    <button class="btn btn-info" type="submit" name="kolom" value="stempel"><i class="fas fa-edit"></i></button></form></td>
                </tr>
                <tr>
                    <td>Alamat sekretariat</td>
                    <td><?= $aplikasi['alamat_sekretariat']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="alamat_sekretariat"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $aplikasi['email']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="email"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Website</td>
                    <td><?= $aplikasi['website']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="website"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Facebook</td>
                    <td><?= $aplikasi['facebook']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="facebook"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Instagram</td>
                    <td><?= $aplikasi['instagram']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="instagram"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Twitter</td>
                    <td><?= $aplikasi['twitter']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="twitter"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
                  <tr>
                    <td>Nomor Handphone</td>
                    <td><?= $aplikasi['no_hp']; ?></td>
                    <td><form method="POST" action="<?=base_url()?>admin/editaplikasi_text">
                      <button class="btn btn-info" type="submit" name="kolom" value="no_hp"><i class="fas fa-edit"></i></button></form></td>
                  </tr>
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
