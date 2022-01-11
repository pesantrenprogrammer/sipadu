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
            <h1>Add Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Keuangan</li>
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
            <form action="<?=base_url()?>admin/addkeuangan" method="post" enctype="multipart/form-data" name="form1" id="form1">
							<div class="form-group">
		             <label>Tanggal Transaksi</label>
		             <input type="date" name="tanggal_transaksi" class="form-control" placeholder="Tanggal Transaksi"/>
		          </div>
							<div class="form-group">
                <label>Uraian Pemasukan</label>
                <input type="text" name="uraian_pemasukan" class="form-control" placeholder="Sumber dan Uraian Pemasukan"/>
              </div>
              <div class="form-group">
                <label>Uraian Pengeluaran</label>
                <input type="text" name="uraian_pengeluaran" class="form-control" placeholder="Uraian Pengeluaran"/>
              </div>
              <div class="form-group">
                <label>Debit</label>
                <input type="number" name="masuk" class="form-control" placeholder="Debit / Pemasukan"/>
              </div>
              <div class="form-group">
                <label>Kredit</label>
                <input type="number" name="keluar" class="form-control" placeholder="Kredit / Pengeluaran"/>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
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
