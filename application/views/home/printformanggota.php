<!DOCTYPE html>
<html>
  <head>
    <title>SIPADU App | Print Form Anggota</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/dist/img/sipadu-fav.png" />
    <style>
      body{
        font-family: arial;
        font-size: 11;
      }
    </style>
    <script language=javascript>
    	function printWindow(){
    	bV = parseInt(navigator.appVersion);
    	if (bV >= 4) window.print() ;}
    	printWindow();
    </script>
  </head>
  <body>
    <?php error_reporting(0); ?>
    <!-- Kategori User IPNU or IPPNU : if IPNU -->
    <?php if($kategori_data=='1'){ ?>
    <h3>Formulir Data Anggota Baru<br/>
        Ikatan Pelajar Nahdlatul Ulama (IPNU)
    </h3><br/>
    <div align="center" style="width:3cm;height:4cm;border: solid #000;float:right;"><br/><br/>Foto 3x4</div>
    <table id="example1" class="table" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr valign="top">
        <td >Alamat Lengkap</td>
        <td>:</td>
        <td>.........................................<br/>.........................................<br/>.........................................</td>
      </tr>
      <tr>
        <td valign="top">Nama Orang Tua</td>
        <td>:</td>
        <td>Ayah : ......................................... <br/>Ibu : .........................................</td>
      </tr>
      <tr valign="top">
        <td>Pimpinan</td>
        <td>:</td>
        <td>PC : ......................................... <br/>PAC : .........................................
          <br/>PR / PK : .........................................</td>
      </tr>
      <tr>
        <td>Aktif Kepengurusan</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Kaderisasi Formal</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Makesta</td>
        <td>:</td>
        <td><span style="font-size:8px;">*Penyelenggara, Tempat, Waktu</span><br/>.........................................</td>
      </tr>
      <tr>
        <td>Lakmud</td>
        <td>:</td>
        <td><span style="font-size:8px;">*Penyelenggara, Tempat, Waktu</span><br/>.........................................</td>
      </tr>
      <tr>
        <td>Lakut</td>
        <td>:</td>
        <td><span style="font-size:8px;">*Penyelenggara, Tempat, Waktu</span><br/>.........................................</td>
      </tr>
      <tr>
        <td>Kaderisasi Non Formal</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Keanggotaan CBP</td>
        <td>:</td>
        <td>Anggota / Tidak</td>
      </tr>
      <tr>
        <td>Tanggal Masuk IPNU</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td><b>Pendidikan Terakhir</b></td>
        <td>:</td>
        <td>SD/MI | SMP/MTs | SMA/MA/SMK | S1 | S2</td>
      </tr>
      <tr>
        <td>SD /MI</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>SMP / MTs</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>SMA / MA / SMK</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Perguruan Tinggi</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Pendidikan Non Formal</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Facebook</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Instagram</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Twitter</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
    </table>
    <?php } ?>
    <!-- if IPPNU -->
    <?php if($kategori_data=='0'){ ?>
    <h3>Formulir Data Anggota Baru<br/>
        Ikatan Pelajar Putri Nahdlatul Ulama (IPPNU)
    </h3><br/>
    <div align="center" style="width:3cm;height:4cm;border: solid #000;float:right;"><br/><br/>Foto 3x4</div>
    <table id="example1" class="table" border="0" cellpadding="2" cellspacing="0">
      <tr>
        <td>Nama Lengkap</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Tempat, Tanggal Lahir</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr valign="top">
        <td >Alamat Lengkap</td>
        <td>:</td>
        <td>.........................................<br/>.........................................<br/>.........................................</td>
      </tr>
      <tr>
        <td valign="top">Nama Orang Tua</td>
        <td>:</td>
        <td>Ayah : ......................................... <br/>Ibu : .........................................</td>
      </tr>
      <tr valign="top">
        <td>Pimpinan</td>
        <td>:</td>
        <td>PC : ......................................... <br/>PAC : .........................................
          <br/>PR / PK : .........................................</td>
      </tr>
      <tr>
        <td>Aktif Kepengurusan</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Kaderisasi Formal</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Makesta</td>
        <td>:</td>
        <td><span style="font-size:8px;">*Penyelenggara, Tempat, Waktu</span><br/>.........................................</td>
      </tr>
      <tr>
        <td>Lakmud</td>
        <td>:</td>
        <td><span style="font-size:8px;">*Penyelenggara, Tempat, Waktu</span><br/>.........................................</td>
      </tr>
      <tr>
        <td>Lakut</td>
        <td>:</td>
        <td><span style="font-size:8px;">*Penyelenggara, Tempat, Waktu</span><br/>.........................................</td>
      </tr>
      <tr>
        <td>Kaderisasi Non Formal</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Keanggotaan KPP</td>
        <td>:</td>
        <td>Anggota / Tidak</td>
      </tr>
      <tr>
        <td>Tanggal Masuk IPPNU</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td><b>Pendidikan Terakhir</b></td>
        <td>:</td>
        <td>SD/MI | SMP/MTs | SMA/MA/SMK | S1 | S2</td>
      </tr>
      <tr>
        <td>SD /MI</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>SMP / MTs</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>SMA / MA / SMK</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Perguruan Tinggi</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Pendidikan Non Formal</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Facebook</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Instagram</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
      <tr>
        <td>Twitter</td>
        <td>:</td>
        <td>.........................................</td>
      </tr>
    </table>
    <?php } ?>
  </body>
</html>
