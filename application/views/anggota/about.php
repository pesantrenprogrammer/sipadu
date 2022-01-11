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
            <h1>About Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">About Us</li>
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
            <h3 class="card-title"><b>SIPADU IPNU Jawa Tengah</b></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <img src="<?=base_url()?>template/dist/img/sipadu.png" width="300px"/><br/> <br/>
            Aplikasi <b>Sistem Informasi Pelajar dan Administrasi Terpadu (Sipadu)</b> merupakan aplikasi yang dikembangkan
            180 Dev Departemen Kominfo PW IPNU Provinsi Jawa Tengah. Aplikasi ini dikembangkan pada berbagai platform meliputi
            website dan mobile (Android & IOS). <br/>
						Tim yang terus berprogress mengembangkan Sipadu App ini meliputi :<br/><br/>
						<table>
						<tr><td><b>Penanggung Jawab</b></td> <td>:</td> <td>Syaeful Kamaludin (Ketua PW IPNU Provinsi Jawa Tengah) </td></tr>
						<tr><td><b>Project Manager</b></td> <td> :</td> <td> Muhammad Kurniawan (Wakil Ketua Bidang Kominfo PW IPNU)</td></tr>
						<tr><td>Fullstack Developer </td> <td> :</td> <td> Muhammad Adnan (Koordinator Dept Kominfo PW IPNU)</td></tr>
						<tr><td>Web Design & Programmer </td> <td> :</td> <td> Marzuqi Rouf </td></tr>
						<tr><td>Analis </td> <td> :</td> <td> Maulana Bahrul Alam</td></tr>
						<tr><td>PJ Bimtek </td> <td> :</td> <td> Marzuqi Rouf</td></tr>
					</table>
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
