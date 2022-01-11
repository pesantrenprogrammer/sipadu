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
  <script language=javascript>
  	function printWindow(){
  	bV = parseInt(navigator.appVersion);
  	if (bV >= 4) window.print() ;}
  	printWindow();
  </script>
  <style>
  body{
    font-family: Times New Roman;
    color: rgba(0,154,148,255)
;
  }
  .wadah{
    width: 8.5cm;
    height: 5cm;
    float: right;
  }
  .wadahdepan{
    width: 8.5cm;
    height: 5cm;
    float: left;
    position: absolute;
  }
  .kotakdalam{
    margin-left:35px;

  }
  .teksdalam{
    margin-right:50px;
    margin-top: 18px;
    font-size: 7px;
    position: absolute;
    width: 5.4cm;
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
    margin-left: 20px;
    margin-top:50px;
    position: absolute;
  }
  .foto{
    width: 2.5cm;
    height: 3cm;
  }
  .ttdketua{
    position: absolute;
    width:1.5cm;
    margin-left: -10px;
    margin-top: 5px;
  }
  .stempel{
    position: absolute;
    width:1.5cm;
    margin-left: -3px;
    margin-top: -12px;
    transform:rotate(-5deg);
  }
	.kotaktglinput{
    height: 0.5cm;
    margin-left: 210px;
    margin-top: 87px;
    position: absolute;
    text-align: center;
  }
  .tglinput {
      font-size: 7px;
  }
  </style>
</head>
<body>
  <h3>Cetak  KTA IPPNU</h3>
  <div class="wadahdepan">
  <div class="kotakfoto">
      <img class="foto" src="<?=base_url();?>upload/anggota/<?= $anggota['foto'];?>"/>
  </div>
  <img class="wadahdepan" src="<?=base_url(); ?>upload/ktaippnudepan.png"/>
  </div>
  <div class="wadah">
  <img style="margin-left:50px;" class="wadah" src="<?=base_url(); ?>upload/ktaippnubelakang.png"/>
    <div class="kotakdalam">
      <div class="teksdalam">
        <b>
        <table cellspacing="0" cellpadding="0">
          <tr height="2px" valign="top"><td width="50%">Nomor Induk Anggota</td> <td style="text-indent:-4px">: <?= $anggota['nia'];?></td></tr>
          <tr height="2px" valign="top"><td>Nama</td> <td style="text-indent:-4px">: <?= $anggota['nama'];?></td></tr>
          <tr height="2px" valign="top"><td>Tempat dan Tanggal Lahir</td> <td style="text-indent:-4px">: <?= $anggota['tempat_lahir'];?>, <?= tgl_indo($anggota['tanggal_lahir']);?></td></tr>
          <tr valign="top"><td width="50%">Alamat/Tempat Tinggal</td> <td style="text-indent:-4px">: <?= $anggota['alamat_lengkap'];?></td></tr>
        </table>
        </b>
      </div>

    </div>
		<div class="kotaktglinput">
			<span class="tglinput"><b>Jakarta, <?= tgl_indo($anggota['tanggal_input_kta']);?></b></span>
		</div>

  </div>
</body>
</html>
