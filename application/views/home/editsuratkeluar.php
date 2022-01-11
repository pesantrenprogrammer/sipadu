
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
            <h1>Edit Surat Keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Edit Surat Keluar</li>
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
            <h3 class="card-title"><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form method="POST" action="<?=base_url()?>admin/updatesuratkeluar">
              <div class="form-group">
                <label>Nomor Surat</label>
                <input type="hidden" class="form-control" name="id_surat_keluar" value="<?= $surat_keluar['id_surat_keluar']; ?>"/>
                <div class="row">
                  <div class="col-lg-8">
                    <input type="text" class="form-control" name="nomor_surat" value="<?= $surat_keluar['nomor_surat']; ?>"/>
                  </div>
                  <div class="col-lg-4">
                    <input type="text" class="form-control" name="index_surat" value="<?= $surat_keluar['index_surat']; ?>"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Tertanggal Surat</label>
                <input type="date" class="form-control" name="tanggal_surat" value="<?= $surat_keluar['tanggal_surat']; ?>"/>
              </div>
              <div class="form-group">
                <label>Tujuan Surat</label>
                <input type="text" class="form-control" name="tujuan_surat" value="<?= $surat_keluar['tujuan_surat']; ?>"/>
              </div>
              <div class="form-group">
                <label>Perihal Surat</label>
                <input type="text" class="form-control" name="perihal" value="<?= $surat_keluar['perihal']; ?>"/>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?= $surat_keluar['keterangan']; ?>"/>
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
