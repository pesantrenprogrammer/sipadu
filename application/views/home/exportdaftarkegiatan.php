<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar Kegiatan.xls");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN | Daftar Kegiatan</title>
<link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template-home/assets/favicon.png" />
<style>
body{
  font-family: arial;
  font-size: 11px;
}
th{
  padding: 5px;
}
td{
  padding: 10px;
}
</style>
</head>
<body>
	<h5 align="center">Data Kegiatan <br/><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah<br/>
	Masa Khidmat <?= $setting_app['masa_khidmat']; ?></h5>
<table border="1" cellpadding="5" cellspacing="0" style="width:100%">
  <thead>
  <tr>
    <th>No</th>
    <th>Bentuk Kegiatan</th>
    <th>Hari, Tanggal</th>
    <th>Waktu</th>
    <th>Pelaksana</th>
    <th>Tempat Pelaksanaan</th>
    <th>Keterangan</th>
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
    <td><?= $dk['waktu']; ?></td>
    <td><?= $dk['kategori_kegiatan']; ?></td>
    <td><?= $dk['tempat'];?></td>
    <td><?= $dk['keterangan'];?></td>
    </tr>
  <?php endforeach; ?>

  </tbody>
</table>
</body>
</html>
