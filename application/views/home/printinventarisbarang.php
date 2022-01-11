<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMIN | Inventaris Barang</title>
<link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template-home/assets/favicon.png" />
<script language=javascript>
	function printWindow(){
	bV = parseInt(navigator.appVersion);
	if (bV >= 4) window.print() ;}
	printWindow();
</script>
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
	<img src="<?=base_url(); ?>upload/setting-app/<?= $setting_app['kop_surat']; ?>" width="100%"/>
	<h5 align="center">Data Inventaris Barang <br/><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah<br/>
	Masa Khidmat <?= $setting_app['masa_khidmat']; ?></h5>
<table border="1" cellpadding="5" cellspacing="0" style="width:100%">
  <tr>
		<th>No</th>
    <th>Index Barang</th>
		<th>Jenis Barang</th>
		<th>Jumlah</th>
    <th>Asal</th>
    <th>Harga</th>
    <th>Keterangan</th>

  </tr>
  <?php $no=1; ?>
  <?php foreach ($inventaris_barang as $ib): ?>
    <tr>
			<td><?php echo $no++; ?></td>
      <td><?= $ib['index_barang']; ?></td>
			<td><?= $ib['nama_barang']; ?></td>
      <td><?= $ib['jumlah']; ?></td>
      <td><?= $ib['asal_barang']; ?></td>
      <td><?= $ib['harga_satuan']; ?></td>
      <td><?= $ib['keterangan']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
