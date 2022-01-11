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
            <h1>New Data Ranting/Komisariat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Input Ranting/Komisariat</li>
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
            <h3 class="card-title">Input Data Ranting/Komisariat - PAC <?= $pac['nama_pimpinan_ac']; ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-o">
            <form method="POST" action="<?= base_url();?>/admin/addranting">
              <input type="hidden" class="form-control" name="id_pimpinan_ac" value="<?php echo $_GET['id']; ?>"/>
              <input type="hidden" class="form-control" name="id_pimpinan" value="<?php echo $_GET['id2']; ?>"/>
              <div class="form-group">
                <label>Kode Daerah</label>
                <input type="text" class="form-control" name="kd_pimpinan_rk"/>
              </div>
							<div class="form-group">
                <label>Jenis Pimpinan</label>
                <input type="text" class="form-control" name="pimpinan_rk" value="<?php echo $_GET['id3']; ?>" readonly/>
              </div>
              <div class="form-group">
                <label>Nama Ranting/Komisariat</label>
                <input type="text" class="form-control" name="nama_pimpinan_rk"/>
              </div>
              <div class="form-group">
                <input type="submit" class="form-control btn btn-info" name="save" value="Save"/>
              </div>
            </form>
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
