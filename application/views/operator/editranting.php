
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
            <h1>Edit Ranting/Komisariat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Edit Ranting/Komisariat</li>
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
            <h3 class="card-title">Edit Ranting/Komisariat</h3>

            <div class="card-body table-responsive p-o">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="<?=base_url()?>user/updateranting"> 
              <div class="form-group">
                <label>Kode Daerah</label>
                <input type="text" class="form-control" name="kd_pimpinan_rk" value="<?= $koderanting['kd_pimpinan_rk']; ?>"/>
              </div>
              <div class="form-group">
                <label>Nama Ranting/Komisariat</label>
                <input type="text" class="form-control" name="nama_pimpinan_rk" value="<?= $koderanting['nama_pimpinan_rk']; ?>"/>
                <input type="hidden" class="form-control" name="id_pimpinan_rk" value="<?= $koderanting['id_pimpinan_rk']; ?>"/>
                <input type="hidden" class="form-control" name="pimpinan_rk" value="<?= $koderanting['pimpinan_rk']; ?>"/>
                <input type="hidden" class="form-control" name="id_pimpinan_ac" value="<?php echo $_GET['id']; ?>"/>
								<input type="hidden" class="form-control" name="id_pimpinan" value="<?php echo $_GET['id2']; ?>"/>
              </div>
              <div class="form-group">
                <label>Status Kepengurusan</label>
                <select class="form-control" name="status_aktif">
                    <option value="<?= $koderanting['status_aktif']; ?>"><?= $koderanting['status_aktif']; ?></option>
                    <option value="<?= $koderanting['status_aktif']; ?>">--- Pilih --- </option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak">Tidak</option>
                </select>
              </div>

              <div class="form-group">
								<input type="button" class="btn bg-maroon" onclick="history.back();" value="Kembali"/>
                <input type="submit" class="btn btn-info" name="edit" value="Save"/>
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
