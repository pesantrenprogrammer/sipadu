<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Surat Masuk.xls");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN | Surat Masuk</title>
<link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template-home/assets/favicon.png" />
<style>
body{
  font-family: arial;
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
  <h5 align="center">Data Surat Masuk <br/><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah<br/>
  Masa Khidmat <?= $setting_app['masa_khidmat']; ?></h5>

<table border="1" cellpadding="0" cellspacing="0" style="width:100%">
  <tr>
    <th>No</th>
    <th>Nomor Surat Masuk</th>
    <th>Tanggal Surat Diterima</th>
    <th>Pengirim</th>
    <th>Perihal</th>
		<th>Keterangan</th>
		<th>Disposisi</th>
  </tr>
  <?php $no=1; ?>
  <?php foreach ($suratmasuk as $sm): ?>
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?= $sm['nomor_surat_masuk']; ?></td>
      <td>
        <?php
          $tanggal = $sm['tanggal_surat_diterima'];
          $date=date_create($tanggal);
          echo date_format($date,"d M Y");
          ?></td>
      <td><?= $sm['pengirim']; ?></td>
      <td><?= $sm['perihal']; ?></td>
			<td><?= $sm['keterangan']; ?></td>
			<td><?= $sm['catatan_disposisi']; ?></td>

    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
