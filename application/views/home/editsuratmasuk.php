
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
            <h1>Edit Surat Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Edit Surat Masuk</li>
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
            <form method="POST" action="<?=base_url()?>admin/updatesuratmasuk">
              <div class="form-group">
                <label>Pengirim</label>
                <input type="hidden" class="form-control" name="id_surat_masuk" value="<?= $suratmasuk['id_surat_masuk']; ?>"/>
                <input type="text" class="form-control" name="pengirim" value="<?= $suratmasuk['pengirim']; ?>"/>
              </div>
              <div class="form-group">
                <label>Tanggal Terima</label>
                <input type="date" class="form-control" name="tanggal_surat_diterima" value="<?= $suratmasuk['tanggal_surat_diterima']; ?>"/>
              </div>
              <div class="form-group">
                <label>Perihal Surat</label>
                <input type="text" class="form-control" name="perihal" value="<?= $suratmasuk['perihal']; ?>"/>
              </div>
              <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" class="form-control" name="nomor_surat_masuk" value="<?= $suratmasuk['nomor_surat_masuk']; ?>"/>
              </div>
              <div class="form-group">
                <label>Tertanggal Surat</label>
                <input type="date" class="form-control" name="tanggal_surat" value="<?= $suratmasuk['tanggal_surat']; ?>"/>
              </div>
              <div class="form-group">
                <label>Tembusan</label>
                <input type="text" class="form-control" name="tembusan" value="<?= $suratmasuk['tembusan']; ?>"/>
              </div>
              <div class="form-group">
                <label>Disposisi</label>
                <input type="text" class="form-control" name="catatan_disposisi" value="<?= $suratmasuk['catatan_disposisi']; ?>"/>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?= $suratmasuk['keterangan']; ?>"/>
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
