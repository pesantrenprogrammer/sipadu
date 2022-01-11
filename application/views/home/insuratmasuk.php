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
            <h1>Surat Masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Surat</li>
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
            <h3 class="card-title">New Data Surat Masuk</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="<?=base_url()?>admin/addsuratmasuk" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<div class="form-group">
                <label>Instansi Pengirim</label>
                <input type="text" name="pengirim" class="form-control" placeholder="Tuliskan Instansi Pengirim"/>
              </div>
							<div class="form-group">
                <label>Tanggal Terima</label>
                <input type="date" name="tanggal_surat_diterima" class="form-control"/>
              </div>
							<div class="form-group">
                <label>Perihal Surat</label>
                <input type="text" name="perihal" class="form-control" placeholder="Tuliskan Perihal Surat"/>
              </div>
							<div class="form-group">
                <label>Nomor Surat Masuk</label>
                <input type="text" name="nomor_surat_masuk" class="form-control" placeholder="Tuliskan Nomor Surat Masuk"/>
              </div>
							<div class="form-group">
                <label>Tertanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control"/>
              </div>
							<div class="form-group">
                <label>Tembusan</label>
                <input type="text" name="tembusan" class="form-control" placeholder="Tembusan"/>
              </div>
              <div class="form-group">
                <label>Catatan Disposisi</label>
                <textarea type="text" name="catatan_disposisi" class="form-control" placeholder="Tuliskan Catatan Disposisi"></textarea>
              </div>
							<div class="form-group">
                <label>Keterangan</label>
                <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan / Catatan lain"></textarea>
              </div>
              <div class="form-group">
                <label>File Surat (Pdf/JPG/PNG)</label>
                <input type="file" name="file_surat" class="form-control"/>
              </div>
              <div class="form-group">
                <input class="form-control btn btn-info"  type="submit" value="Simpan" />
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
