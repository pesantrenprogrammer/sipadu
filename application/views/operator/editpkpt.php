
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
            <h1>Edit PKPT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Edit PKPT</li>
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
            <h3 class="card-title">Edit PKPT</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="<?=base_url()?>user/updatepkpt">
              <div class="form-group">
                <label>Kode PKPT</label>
                <input type="text" class="form-control" name="kd_pimpinan_ac" value="<?= $kodedaerah['kd_pimpinan_ac']; ?>"/>
              </div>
              <div class="form-group">
                <label>Nama PKPT</label>
                <input type="text" class="form-control" name="nama_pimpinan_ac" value="<?= $kodedaerah['nama_pimpinan_ac']; ?>"/>
                <input type="hidden" class="form-control" name="id_pimpinan_ac" value="<?= $kodedaerah['id_pimpinan_ac']; ?>"/>
                <input type="hidden" name="id_pimpinan" value="<?php echo $_GET['id2']?>">
              </div>
              <div class="form-group">
                <label>Status Kepengurusan</label>
                <select class="form-control" name="status_aktif">
                    <option value="<?= $kodedaerah['status_aktif']; ?>"><?= $kodedaerah['status_aktif']; ?></option>
                    <option value="<?= $kodedaerah['status_aktif']; ?>">--- Pilih --- </option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak">Tidak</option>
                </select>
              </div>

              <div class="form-group">
                <input type="button" class="btn btn-danger" onclick="history.back();" value="Kembali"/>
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
