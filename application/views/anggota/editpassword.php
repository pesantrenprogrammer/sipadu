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
            <h1>Edit Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Anggota</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-o">
            <form action="<?=base_url()?>anggota/updatepassword" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table class='table'>
            <tr>
            <td>Nomor Induk Anggota</td>
            <td colspan="3"><input required="required" readonly="readonly" class="form-control" type="text" name="nia" value="<?= $anggota['nia']; ?>" placeholder="Nomor Induk Anggota" /><br/>
              <input type="hidden" name="id" value="<?= $anggota['id_anggota'];?>"/>
            </td>
            </tr>
             <tr><td>Update Password</td>
              <td colspan="3"><input required="required" class="form-control" type="text" name="password" value="<?= $anggota['password'];?>" placeholder="Password" /></td>
             </tr>
                  <tr>
                <td></td>
                  <td colspan="3"><input class="btn btn-info"  type="submit" value="Save Update" /></td>
                  <input type="hidden" name="MM_insert" value="form1" />
                  </tr>
              </table>
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