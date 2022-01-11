<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Keuangan.xls");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN | Keuangan</title>
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
	<h5 align="center">Data Keuangan <br/><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah<br/>
	Masa Khidmat <?= $setting_app['masa_khidmat']; ?></h5>
  <table align="center" border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
      <th>No</th>
      <th>Tanggal Transaksi</th>
      <th>Debit</th>
      <th>Kredit</th>
      <th>Uraian Pemasukan</th>
      <th>Uraian Pengeluaran</th>
      <th>Keterangan</th>
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
      <td><?= $uang['keluar']; ?></td>
      <td><?= $uang['masuk']; ?></td>
      <td><?= $uang['uraian_pemasukan']; ?></td>
      <td><?= $uang['uraian_pengeluaran']; ?></td>
      <td><?= $uang['keterangan']; ?></td>
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
</body>
</html>
