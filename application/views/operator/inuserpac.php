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
            <h1>New Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Input User</li>
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
            <h3 class="card-title">Input Data User</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-o">
            <form method="POST" action="<?= base_url();?>user/adduser">
              <div class="form-group">
                <label>Tingkatan</label>
                <input readonly type="text" class="form-control" name="tingkatan" value="PAC"/>
              </div>
							<div class="row">
              <div class="form-group col-sm-6">
                <label>PC</label> 

								<select readonly type="text" class="form-control" id="id_pimpinan1" name="id_pimpinan1">
									<?php foreach ($pimpinan_cabang as $pc): ?>
									 <option readonly type="text" value="<?= $pc['id_pimpinan']; ?>">
											 <?= $pc['nama_pimpinan']; ?>
									 </option>
									 <?php endforeach; ?>
					 		 	</select>
							</div>
							<div class="form-group col-sm-6">
                <label>PAC</label>
								<select class="form-control" id="id_pimpinan" name="id_pimpinan">
									<?php foreach ($anakcabang as $pac): ?>
									<option id="id_pimpinan" class="<?= $pac['id_pimpinan']; ?>" value="<?= $pac['id_pimpinan_ac']; ?>">
											<?= $pac['nama_pimpinan_ac']; ?> 
									</option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>


							<script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
			        <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
			        <script>
			            $("#id_pimpinan").chained("#id_pimpinan1");
			        </script>
              <div class="form-group">
                <label>Username</label>
                <input required type="text" class="form-control" name="username"/>
              </div>
              <div class="form-group">
                <label>Password</label>
                <input required type="text" class="form-control" name="password"/>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap"/>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email"/>
              </div>
              <div class="form-group">
                <label>No Telp</label>
                <input type="text" class="form-control" name="no_telpon"/>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="sekretariat"/>
                <input type="hidden" class="form-control" name="level" value="user"/>
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
