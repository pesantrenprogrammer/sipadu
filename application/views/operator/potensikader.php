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
            <h1>Potensi Kader</h1>
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
          <h3 class="card-title">
            <?php if($kategori_data==1){ echo 'PC IPNU'; }else{ echo'PC IPPNU';} ?> <b><?= $pimpinan_cabang['nama_pimpinan']?></b></h3>

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
                  <a href="<?=base_url(); ?>user/anggotapc" class="small-box-footer">Jumlah Anggota <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
             
              <?php if($kategori_data==1){ ?>
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= $cbp;?></h3>

                    <p>CBP</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotacbp" class="small-box-footer">Anggota CBP <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <?php }else { ?>
                <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= $cbp;?></h3>

                    <p>KPP</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotacbp" class="small-box-footer">Anggota KPP <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
                <?php } ?> 
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $makesta;?></h3>

                    <p>Makesta</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotaformal?id=Makesta" class="small-box-footer">Lulusan Makesta <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?= $lakmud;?></h3>

                    <p>Lakmud</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotaformal?id=Lakmud" class="small-box-footer">Lulusan Lakmud <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $lakut;?></h3>

                    <p>Lakut</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotaformal?id=Lakut" class="small-box-footer">Lulusan Lakut <i class="fas fa-arrow-circle-right"></i></a>
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
          <h3 class="card-title">
            <?php if($kategori_data==1){ echo 'PAC IPNU'; }else{ echo'PAC IPPNU';} ?> <b><?= $pimpinan_defaultpac['nama_pimpinan_ac']?></b></h3>

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
             
              <?php if($kategori_data==1){ ?>
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= $cbp;?></h3>

                    <p>CBP</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotacbp" class="small-box-footer">Anggota CBP <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <?php }else { ?>
                <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?= $cbp;?></h3>

                    <p>KPP</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotacbp" class="small-box-footer">Anggota KPP <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
                <?php } ?> 
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?= $makesta;?></h3>

                    <p>Makesta</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotaformal?id=Makesta" class="small-box-footer">Lulusan Makesta <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><?= $lakmud;?></h3>

                    <p>Lakmud</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotaformal?id=Lakmud" class="small-box-footer">Lulusan Lakmud <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?= $lakut;?></h3>

                    <p>Lakut</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="<?=base_url(); ?>user/anggotaformal?id=Lakut" class="small-box-footer">Lulusan Lakut <i class="fas fa-arrow-circle-right"></i></a>
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

    <?php }?>

    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
