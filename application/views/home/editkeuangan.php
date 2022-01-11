
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
            <h1>Edit Keuangan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Edit Keuangan</li>
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
            <form method="POST" action="<?=base_url()?>admin/updatekeuangan">
              <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="hidden" class="form-control" name="id_keuangan" value="<?= $keuangan['id_keuangan']; ?>"/>
                <input type="date" class="form-control" name="tanggal_transaksi" value="<?= $keuangan['tanggal_transaksi']; ?>"/>
              </div>
              <div class="form-group">
                <label>Uraian Pemasukan</label>
                <input type="text" class="form-control" name="uraian_pemasukan" value="<?= $keuangan['uraian_pemasukan']; ?>"/>
              </div>
              <div class="form-group">
                <label>Uraian Pengeluaran</label>
                <input type="text" class="form-control" name="uraian_pengeluaran" value="<?= $keuangan['uraian_pengeluaran']; ?>"/>
              </div>
              <div class="form-group">
                <label>Debit / Pemasukan</label>
                <input type="text" class="form-control" name="masuk" value="<?= $keuangan['masuk']; ?>"/>
              </div>
              <div class="form-group">
                <label>Kredit / Pengeluaran</label>
                <input type="text" class="form-control" name="keluar" value="<?= $keuangan['keluar']; ?>"/>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?= $keuangan['keterangan']; ?>"/>
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
