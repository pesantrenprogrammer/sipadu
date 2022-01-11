<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Anggota.xls");
?>
<html>
<head>
<title>SIPADU | Export Data Anggota</title>
<link rel="icon" type="image/x-icon" href="<?= base_url() ?>/template/dist/img/sipadu-fav.png" />
<style>
body{
  font-family: arial;
  margin: 50px;
}
table{
  font-size: 11;
}
</style>

<head>
<body>

  <h5 align="center">Data Anggota<br/><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah<br/>
  Masa Khidmat 2019-2022</h5>
              <table align="center" id="example1" class="table" border="1" cellpadding="10" cellspacing="0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIA</th>
                  <th>Nama</th>
                  <th>TTL</th>
                  <th>Keanggotaan</th>
                  <th>Aktif Kepengurusan</th>
                  <th>Status Keanggotaan CBP</th>
                  <th>Alamat</th>
                  <th>Kaderisasi Formal</th>
                  <th>Kaderisasi Non Formal</th>
                  <th>Pendidikan Terakhir</th>
                  <th>SD/MI</th>
                  <th>SMP/MTs</th>
                  <th>SMA/MA/SMK</th>
                  <th>S1</th>
                  <th>Program Studi S1</th>
                  <th>Pascasarjana</th>
                  <th>Program Studi S2</th>
                  <th>Pengalaman Organisasi</th>
                  <th>Pendidikan Non Formal</th>
                  <th>Email</th>
                  <th>No HP</th>
                  <th>Facebook</th>
                  <th>Instagram</th>
                  <th>Twitter</th>
                  <th>Pekerjaan / Usaha</th>
                  <th>Penghasilan Pribadi</th>
                  <th>Nama Ayah</th>
                  <th>Pekerjaan Ayah</th>
                  <th>Penghasilan Ayah</th>
                  <th>Nama Ibu</th>
                  <th>Pekerjaan Ibu</th>
                  <th>Penghasilan Ibu</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                <?php foreach ($anggota as $ang): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $ang['nia']; ?></td>
                  <td><b><?= $ang['nama']; ?></b></td>
                  <td><?= $ang['tempat_lahir']; ?>, <?= $ang['tanggal_lahir']; ?></td>
                  <td><?= $ang['nama_pimpinan']; ?></td>
                  <td><?= $ang['aktif_kepengurusan']; ?></td>
                  <td><?= $ang['status_cbp']; ?></td>
                  <td><?= $ang['alamat_lengkap']; ?></td>
                  <td><?= $ang['pelatihan_formal']; ?></td>
                  <td><?= $ang['pelatihan_nonformal'] ?></td>
                  <td><?= $ang['pendidikan_terakhir']; ?></td>
                  <td><?= $ang['pendidikan_sd']; ?></td>
                  <td><?= $ang['pendidikan_smp']; ?></td>
                  <td><?= $ang['pendidikan_sma']; ?></td>
                  <td><?= $ang['pendidikan_pt']; ?></td>
                  <td><?= $ang['program_studi_s1']; ?></td>
                  <td><?= $ang['pascasarjana']; ?></td>
                  <td><?= $ang['program_studi_s2']; ?></td>
                  <td><?= $ang['pengalaman_organisasi']; ?></td>
                  <td><?= $ang['pendidikan_nonformal']; ?></td>
                  <td><?= $ang['email']; ?></td>
                  <td><?= $ang['no_hp']; ?></td>
                  <td><?= $ang['fb']; ?></td>
                  <td><?= $ang['ig']; ?></td>
                  <td><?= $ang['twitter']; ?></td>
                  <td><?= $ang['pekerjaan_usaha']; ?></td>
                  <td><?= $ang['penghasilan_pribadi']; ?></td>
                  <td><?= $ang['nama_ayah']; ?></td>
                  <td><?= $ang['pekerjaan_ayah'] ?></td>
                  <td><?= $ang['penghasilan_ayah']; ?></td>
                  <td><?= $ang['nama_ibu']; ?></td>
                  <td><?= $ang['pekerjaan_ibu']; ?></td>
                  <td><?= $ang['penghasilan_ibu']; ?></td>

                </tr>

                <?php endforeach; ?>
                </tbody>

              </table>

</body>
</html>
