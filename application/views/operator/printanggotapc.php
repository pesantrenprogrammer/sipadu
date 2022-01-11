<html>
<head>
<title>SIPADU | Print Data Anggota</title>
<link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/dist/img/sipadu-fav.png" />
<style>
body{
  font-family: arial;
  font-size: 11;
  margin: 50px;
}
table{
  font-size: 11;
}
</style>
<script language=javascript>
	function printWindow(){
	bV = parseInt(navigator.appVersion);
	if (bV >= 4) window.print() ;}
	printWindow();
</script>
<head> 
<body>
  <img src="<?=base_url(); ?>upload/setting-app/<?= $setting_app['kop_surat']; ?>" width="100%"/>
  <h5 align="center">Data Anggota<br/>PC <?php if($kategori_data==1){ echo 'IPNU'; }else{ echo'IPPNU';} ?>
        <?= $pimpinan_cabang['nama_pimpinan']?></h5>
  Doc : <?php if($kategori_data==1){ echo 'PC IPNU'; }else{ echo'PC IPPNU';} ?> <?= $pimpinan_cabang['nama_pimpinan']?>
              <table align="center" id="example1" class="table" border="1" cellpadding="10" cellspacing="0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIA</th>
                  <th>Nama</th>
                  <th>Keanggotaan</th>
                  <th>Alamat</th>
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
                </tr>

                <?php endforeach; ?>
                </tbody>

              </table>

</body>
