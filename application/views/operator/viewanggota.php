<?php //error_reporting(0); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Detail Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Anggota</li>
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
            <div class="card-header">
              <h3 class="card-title"><?= $anggota['nia']; ?> | <?= $anggota['nama']; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example" class="table">

                <tbody>
                  <tr>
                    <td rowspan="23">
                      <?php if ($anggota['foto']==''){ ?>
                        <img src="<?=base_url(); ?>upload/foto-profil.jpg" width="100px"/>

                  <?php }else{ ?>
                    <img src="<?=base_url(); ?>upload/anggota/<?= $anggota['foto']; ?>" width="100px"/>
                  <?php  } ?>

                      <br/>
                      <b><a href="<?=base_url();?>user/editfotoanggota?id=<?= $anggota['id_anggota']; ?>">Edit Foto Profil</a></b>
                    </td>
                    <td>NIA</td>
                    <td><?= $anggota['nia']; ?></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td><b><?= $anggota['nama']; ?></b></td>
                  </tr>
                  <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td><?= $anggota['tempat_lahir']; ?>,
                      <?php
                        $tanggal = $anggota['tanggal_lahir'];
                        $date=date_create($tanggal);
                        echo date_format($date,"d M Y");
                        ?></td>
                  </tr>
                  <tr>
                    <td>Alamat Lengkap</td>
                    <td><?= $anggota['alamat_lengkap']; ?></td>
                  </tr>
                  <tr>
                    <td>Tanggal Masuk Anggota</td>
                    <td><?php
                        $tanggalm = $anggota['waktu_makesta'];
                        $date=date_create($tanggalm);
                        echo date_format($date,"d M Y");
                        ?></td>
                  </tr>
                  <tr>
                    <td>Pendidikan Terakhir</td>
                    <td><?= $anggota['pendidikan_terakhir']; ?></td>
                  </tr>
                  <tr>
                    <td>Pendidikan Non Formal</td>
                    <td><?= $anggota['pendidikan_nonformal']; ?></td>
                  </tr>
                  <tr>
                    <td>Kaderisasi Formal Terakhir</td>
                    <td><?= $anggota['pelatihan_formal']; ?></td>
                  </tr>
                  <tr>
                    <td>Kaderisasi Non Formal</td>
                    <td><?= $anggota['pelatihan_nonformal']; ?></td>
                  </tr>

                  <tr>
                    <td>Email</td>
                    <td><?= $anggota['email']; ?></td>
                  </tr>
                  <tr>
                    <td>No Hp</td>
                    <td><?= $anggota['no_hp']; ?></td>
                  </tr>
                  <tr>
                    <td>Facebook</td>
                    <td><?= $anggota['fb']; ?></td>
                  </tr>
                  <tr>
                    <td>Instagram</td>
                    <td><?= $anggota['ig']; ?></td>
                  </tr>
                  <tr>
                    <td colspan="2"><a class="form-control btn bg-info" href="<?=base_url()?>user/editanggota?id=<?= $anggota['id_anggota']; ?>">Edit Data</a></td>
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
