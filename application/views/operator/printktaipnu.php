<!DOCTYPE html>
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
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KTA | SIPADU</title>
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/dist/img/sipadu-fav.png" />
  <link href='https://fonts.googleapis.com/css?family=Libre Barcode 128 Text' rel='stylesheet'>
  <script language=javascript>
  	function printWindow(){
  	bV = parseInt(navigator.appVersion);
  	if (bV >= 4) window.print() ;}
  	printWindow();
  </script>
  <style>
  body{
    font-family: arial;
  }
  .wadah{
  	width: 8.560cm;
    float: left;
  }
  .kotakdalam{
    margin-left:50px;

  }
  .teksdalam{
    margin-left:28px;
    margin-top: 40px;
    font-size: 8px;
    position: absolute;
    width: 5.6cm;
  }
  .tekstengah{
    text-align: justify;
    margin-top: 7px;
    font-size: 6.5px;
    width: 5.4cm;
  }
  .teksbawah{
    text-align: center;
    margin-top: 7px;
    font-size: 7px;
    width: 6cm;
  }
  .kotakfoto{
    width: 1.5cm;
    height: 2cm;
    margin-left: 243px;
    margin-top:40px;
    position: absolute;
  }
  .foto{
    width: 1.64cm;

  }
  .ttdketua{
    position: absolute;
    width:1.5cm;
    margin-left: -20px;
    margin-top: 3px;
		font-size: 6px;
  }
  .stempel{
    position: absolute;
    width:1.5cm;
    margin-left: -3px;
    margin-top: -12px;
    transform:rotate(-5deg);
  }
  .kotakbarcode{
    width: 1.64cm;
    height: 0.5cm;
    margin-left: 243px;
    margin-top: 117px;
    position: absolute;
    text-align: center;
  }
  .barcode {
      font-family: 'Libre Barcode 128 Text';font-size: 12px;
  }
  </style>
</head>
<body>
  <h3>Cetak  KTA IPNU</h3>
  <img class="wadah" src="<?=base_url(); ?>upload/ktaipnudepan.jpg"/>
  <div class="wadah">
  <img style="margin-left:50px;" class="wadah" src="<?=base_url(); ?>upload/ktaipnubelakang.jpg"/>
    <div class="kotakdalam">
      <div class="kotakfoto">
          <img class="foto" src="<?=base_url();?>upload/anggota/<?= $anggota['foto'];?>"/>
      </div>
      <div class="kotakbarcode">
        <p class="barcode"><?= $anggota['nia'];?></p>
      </div>
      <div class="teksdalam">
        <table cellspacing="0px">
          <tr height="3px" valign="top"><td>NIA</td> <td style="text-indent:-4px">: <?= $anggota['nia'];?></td></tr>
          <tr height="3px" valign="top"><td>Nama</td> <td style="text-indent:-4px">: <?= $anggota['nama'];?></td></tr>
          <tr height="3px" valign="top"><td>TTL</td> <td style="text-indent:-4px">: <?= $anggota['tempat_lahir'];?>, <?= tgl_indo($anggota['tanggal_lahir']);?></td></tr>
          <tr valign="top"><td width="40%">Alamat</td> <td style="text-indent:-4px">: <?= $anggota['alamat_lengkap'];?></td></tr>
        </table>

        <div class="tekstengah">
        <table>
          <tr>Kartu Tanda Anggota ini berlaku sampai dengan yang bersangkutan tidak lagi memenuhi persyaratan keanggotaan IPNU</tr>
        </table>
      </div>
      <div class="teksbawah">
        <b>PIMPINAN CABANG</b> <br/>
        <b>IKATAN PELAJAR NAHDLATUL ULAMA</b><br/>
        <span style="text-transform: uppercase;"><b><?= $cabang['nama_pimpinan']; ?></b></span>
        <table border="0" cellspacing="0" width="100%">
          <tr>
            <td width="45%"><img class="ttdketua" src="<?=base_url();?>upload/setting-app/<?= $setting_app['ttd_ketua'];?>" />Ketua<br/><br/><br/><br/><span style="text-transform: uppercase;"><b><u><?= $setting_app['nama_ketua'];?></u></b></span></td>
            <td width="10%"><img class="stempel" src="<?=base_url();?>upload/setting-app/<?= $setting_app['stempel'];?>"</td>
            <td width="45%"><img class="ttdketua" src="<?=base_url();?>upload/setting-app/<?= $setting_app['ttd_sekretaris'];?>" />Sekretaris<br/><br/><br/><br/><span style="text-transform: uppercase;"><b><u><?= $setting_app['nama_sekretaris'];?></u></b></td>
          </tr>
          <tr>
            <td>NIA. <?= $setting_app['nia_ketua'];?></td>
            <td></td>
            <td>NIA. <?= $setting_app['nia_sekretaris'];?></td>
          </tr>
        </table>
      </div>
      </div>

    </div>

  </div>
</body>
</html>
