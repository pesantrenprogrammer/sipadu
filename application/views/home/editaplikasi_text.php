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
            <h1>Setting App</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Setting App</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Setting App</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="form-group">
                <form method="POST" action="<?=base_url(); ?>admin/updateaplikasi_text" enctype="multipart/form-data" name="form1" id="form1">
                  <label><?php $kolom=$_POST['kolom']; if($kolom == 'nama_ketua'){ echo "Nama Ketua"; }elseif ($kolom == 'nia_ketua') { echo "NIA Ketua"; }
                  elseif ($kolom=='nama_sekretaris') {echo "Nama Sekretaris"; }elseif ($kolom=='nia_sekretaris') {echo "NIA Sekretaris"; }?></label>
									<input type="hidden" name="id" id="id" value="<?= $aplikasi['id_pengaturan_pimpinan']; ?>"/>
									<input type="hidden" name="namakolom" value="<?php echo $_POST['kolom']; ?>"/>
									<input class="form-control" type="text" name="kolom" value="<?= $aplikasi[$kolom]; ?>"> <br/>
									<input class="btn bg-maroon" type="button" onclick="history.back();" value="Kembali"/>
									<input class="btn btn-info" type="submit" value="Save Update"/>
                </form>
                <?php $kolom = $_POST['kolom']; ?>
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
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
