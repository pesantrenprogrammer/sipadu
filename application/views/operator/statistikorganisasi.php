<style type="text/css">
	.fileUpload {
	    position: relative;
	    overflow: hidden;
	    border-radius: 0px;
	    margin-left: -4px;
	    margin-top: -2px;
	}
	.fileUpload input.upload {
	    position: absolute;
	    top: 0;
	    right: 0;
	    margin: 0;
	    padding: 0;
	    font-size: 20px;
	    cursor: pointer;
	    opacity: 0;
	    filter: alpha(opacity=0);
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		document.getElementById("uploadBtn").onchange = function () {
			document.getElementById("uploadFile").value = this.value;
		};
	});
</script>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Statistik Organisasi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Statistik</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php if ($admin['tingkatan']=='PC'){?>
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Statistik Organisasi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <table>
            <tr><td>Jumlah Anggota</td> <td> :</td> <td> <?= $anggota; ?></td></tr>
            <tr><td>Jumlah PAC </td> <td> :</td> <td> <?= $pac;?> </td></tr>
          </table>
            <div class="row">
              <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $anggota; ?> </h3>

                    <p>Anggota</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotapc" class="small-box-footer">Jumlah Anggota <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $pac_aktif;?></h3>

                    <p>Pimpinan Anak Cabang dari <?= $pac;?> Kecamatan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/kodepac?id=<?= $id_pimpinan?>" class="small-box-footer">Jumlah Pimpinan Anak Cabang <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
						<!-- pembatas Baris -->
						<div class="row">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $ranting_aktif; ?></h3>

                    <p>Ranting dari <?= $ranting; ?> Desa/Kelurahan</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/datapr?id=<?= $id_pimpinan?>" class="small-box-footer">Jumlah Pimpinan Ranting <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= $statistik_pkpt_aktif;?></h3>

                    <p>PKPT dari <?= $statistik_pkpt;?> Perguruan Tinggi</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/datapkpt?id=<?= $id_pimpinan?>" class="small-box-footer">Jumlah Pimpinan Komisariat Perguruan Tinggi <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $komisariat_aktif;?></h3>

                    <p>Komisariat dari <?= $komisariat;?> Sekolah/Madrasah</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/datapk?id=<?= $id_pimpinan?>" class="small-box-footer">Jumlah Pimpinan Komisariat <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <?php }
    elseif ($admin['tingkatan']=='PAC'){?>

<section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Statistik Organisasi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-o">

            <div class="row">
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $anggota; ?> </h3>

                    <p>Anggota</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a href="<?=base_url()?>user/anggotapac?id=<?= $admin['ket']; ?>&id2=<?= $id_pimpinan; ?>" class="small-box-footer">Jumlah Anggota <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $ranting_aktif;?></h3>

                    <p>Ranting dari <?= $ranting;?> Desa/Kelurahan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url()?>user/koderanting?id=<?= $id_pimpinan; ?>&id2=<?= $admin['ket']; ?>" class="small-box-footer">Jumlah Pimpinan Ranting <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= $komisariat_aktif;?></h3>

                    <p>Komisariat dari <?= $komisariat;?> Sekolah/Madrasah</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url()?>user/kodekomisariat?id=<?= $id_pimpinan; ?>&id2=<?= $admin['ket']; ?>" class="small-box-footer">Jumlah Pimpinan Komisariat <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
						<!-- pembatas Baris -->
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <?php }?>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
