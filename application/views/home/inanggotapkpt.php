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
<?php error_reporting(0); ?>
<!-- Kategori User IPNU or IPPNU : if IPNU -->
<?php if($kategori_data=='1'){ ?>
<!-- Pilih Berdasarkan Kabupaten/Kota -->
<?php if($_GET['id']==''){ ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Anggota IPNU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Input Anggota</li>
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
          <!-- /.card-header -->
          <div class="card-body">
            <form method="GET" action="<?=base_url()?>admin/inanggota">
            <div class="form-group">
              <select name="id" class="form-control">
                <option>Pilih Cabang</option>
                <?php foreach ($cabang as $pc): ?>
                <option value="<?= $pc['id_pimpinan']; ?>"><?= $pc['kd_pimpinan']; ?> - <?= $pc['nama_pimpinan']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-info" value="Pilih"/>
            </div>
          </form>
          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php } ?>

  <!-- Content Wrapper. Contains page content -->
	<!-- Menampilkan data filter by search -->
<?php if($_GET['id']!=''){ ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Anggota IPNU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Anggota</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash', 'Terpakai'); ?>"></div>
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Anggota</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <form action="<?=base_url()?>admin/addanggota" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table class='table'>
            <tr>
            <td>Nomor Induk Anggota</td>
            <td colspan="3">
							<input required="required" readonly="readonly" class="form-control" type="text" name="nia"  placeholder="11.07.02.00015 -> Contoh NIA Otomatis" /><br/>
              <input type="hidden" name="urut" value="<?= $jumlah+1; ?>"/>
							<input type="hidden" name="jenis" value="PKPT"/>
							<input type="hidden" name="pw" value="11"/>
							<input type="hidden" name="kategori_data" value="<?= $kategori_data ?>"/>
            **)NIA akan terinput otomatis setelah data disimpan</td>
            </tr>
             <tr><td>Nama Lengkap</td>
              <td colspan="3"><input  class="form-control" type="text" name="nama" value="" placeholder="Nama Lengkap" required></td>
             </tr>

              <tr><td>Tempat, Tanggal Lahir</td>
             <td colspan="2"><input required="required" class="form-control" type="text" name="tempat_lahir"  value="" placeholder="Tempat Lahir"/></td><td><input type="date" name="tanggal_lahir" class="form-control pull-right"  placeholder="Tanggal Lahir"></td>
              </tr>
							<tr><td>Email</td>
             <td colspan="2"><input required="required" class="form-control" type="text" name="email"  value="" placeholder="Email"/></td>
              </tr>
							<tr>
                 <td>Alamat Lengkap</td>
                 <td colspan="3"><textarea class="form-control"  name="alamat_lengkap" id="alamat_lengkap" style="height: 50px;width: 100%;"></textarea></td>
                  </tr>
									<tr>
									 <td>Data Orang Tua</td>
									 <td>
											 <input type="text" class="form-control" name="nama_ayah"  value="" placeholder="Nama Ayah"/>
										</td>

										<td>
											 <input type="text" class="form-control" name="nama_ibu"  value=""  placeholder="Nama Ibu"/>
											</td>

										<td>
											<div class="form-group">
											 <label></label>

										</div>

									</td>
										</tr>
                <tr>
                 <td><b>Keanggotaan</b></td>
                 <td>
									 <div class="form-group">
										 <label>Pimpinan Cabang</label>
									 <select class="form-control" id="id_pimpinan" name="id_pimpinan">
									 <?php foreach ($cabang as $pc): ?>
                    <option value="<?= $pc['id_pimpinan']; ?>">
                        <?= $pc['kd_pimpinan']; ?> - <?= $pc['nama_pimpinan']; ?>
                    </option>
										<?php endforeach; ?>
	            			</select>
									</div>
									</td>

                  <td>
										<div class="form-group">
 										 <label>PKPT</label>
										<select class="form-control" id="id_pimpinan_ac" name="id_pimpinan_ac">
                    <?php foreach ($kecamatan as $pac): ?>
                    <option id="id_pimpinan_ac" class="<?= $pac['id_pimpinan']; ?>" value="<?= $pac['id_pimpinan_ac']; ?>">
                        <?= $pac['nama_pimpinan_ac']; ?>
                    </option>
                    <?php endforeach; ?>
            				</select>
										</div>
										</td>

                  <td>
										<!--<div class="form-group">
 										 <label>Ranting / Komisariat</label>
										<select class="form-control" id="id_pimpinan_rk" name="id_pimpinan_rk">
                		<option value="">Pilih Ranting</option>
                    <?php foreach ($ranting as $ran): ?>
                    <option id="id_pimpinan_rk" class="<?= $ran['id_pimpinan_ac']; ?>" value="<?= $ran['id_pimpinan_rk']; ?>">
                        <?= $ran['nama_pimpinan_rk']; ?>
                    </option>
                    <?php endforeach; ?>
            				</select>
									</div>-->
						        <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
						        <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
						        <script>
						            $("#id_pimpinan_ac").chained("#id_pimpinan");
						            //$("#id_pimpinan_rk").chained("#id_pimpinan_ac");
						        </script>
                </td>
                  </tr>
									<tr><td>Aktif Kepengurusan</td>
										<td colspan="3">
											<select class="form-control" name="aktif_kepengurusan">
												<option>Pilih Pimpinan</option>
												<option value="Anggota">Anggota</option>
												<option value="PR">PR</option>
												<option value="PK">PK</option>
												<option value="PAC">PAC</option>
												<option value="PKPT">PKPT</option>
												<option value="PC">Pimpinan Cabang</option>
												<option value="PW">Pimpinan Wilayah</option>
												<option value="PP">Pimpinan Pusat</option>
											</select></td>
									</tr>
									<tr><td><b>Kaderisasi Formal</b></td>
										<td colspan="3">
											<select required="required" class="form-control" name="pelatihan_formal">
												<option>Pilih tingkatan</option>
												<option value="Makesta">MAKESTA</option>
												<option value="Lakmud">LAKMUD</option>
												<option value="Lakut">LAKUT</option>
											</select></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Makesta
												<select required="required" class="form-control col-6" style="float:right;" name="makesta">
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input required="required" type="text" class="form-control" name="penyelenggara_makesta" value="" placeholder="Penyelenggara"/></td>
											<td><input required="required" type="text" class="form-control" name="tempat_makesta" value="" placeholder="Tempat"/></td>
											<td><input required="required" type="date" class="form-control" name="waktu_makesta" value="" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Lakmud
												<select class="form-control col-6" style="float:right;" name="lakmud">
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input type="text" class="form-control" name="penyelenggara_lakmud" value="" placeholder="Penyelenggara"/></td>
											<td><input type="text" class="form-control" name="tempat_lakmud" value="" placeholder="Tempat"/></td>
											<td><input type="date" class="form-control" name="waktu_lakmud" value="" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Lakut
												<select class="form-control col-6" style="float:right;" name="lakut">
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input type="text" class="form-control" name="penyelenggara_lakut" value="" placeholder="Penyelenggara"/></td>
											<td><input type="text" class="form-control" name="tempat_lakut" value="" placeholder="Tempat"/></td>
											<td><input type="date" class="form-control" name="waktu_lakut" value="" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td>Kaderisasi Non Formal</td>
											<td colspan="3">
												<div class="form-group">
				                  <select name="pelatihan_nonformal" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
				                    <option>Latin 1</option>
				                    <option>Latin 2</option>
														<option>ISPT</option>
				                    <option>Diklatama CBP</option>
				                    <option>Diklatmad CBP</option>
				                    <option>Diklatnas CBP</option>
				                    <option>Latihan Jurnalistik</option>
				                    <option>Entrpreneurship Training</option>
				                  </select>
				                </div>
		                	</td>
									</tr>
									<tr>
											<td>Keanggotaan CBP</td>
											<td colspan="3">
												<div class="form-group">
				                  <select name="status_cbp" class="form-control">
														<option>Pilih</option>
														<option value="ya">Anggota</option>
				                    <option value="tidak">Bukan Anggota</option>
				                  </select>
				                </div>
		                	</td>
									</tr>
									<!--<tr>
		                 <td>Tanggal Masuk IPNU</td>
		                  <td colspan="3"><input required type="date" name="tanggal_masuk" class="form-control pull-right" placeholder="Tanggal Masuk"></td>
		              </tr>-->
									<tr>
		                 <td>Tempat Input KTA</td>
		                  <td colspan="3"><input class="form-control" type="text" name="tempat_input_kta" class="form-control pull-right" placeholder="Tempat Input KTA (Kabupaten/Kota)"></td>
		              </tr>
		              <tr>
		                 <td>Tanggal Input KTA</td>
		                  <td colspan="3"><?php
		                  $tgl_input_kta=date('Y-m-d');?><input class="form-control" type="date" name="tanggal_input_kta" class="form-control pull-right" readonly="readonly" value="<?php echo $tgl_input_kta; ?>" ></td>
		              </tr>
              <tr>
                   <td>Pendidikan Terakhir</td>
                   <td colspan="3"> <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="SMP/Sederajat">SD/Sederajat</option>
                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    </select></td>
                 </tr>
								 <tr>
									 <td></td>
									 <td>
										 <div class="form-group">
											 <label>SD / MI</label>
											 <input name="pendidikan_sd" type="text" class="form-control" value=""/>
										 </div>
									 </td>
									 <td>
										 <div class="form-group">
											 <label>SMP / MTs</label>
											 <input name="pendidikan_smp" type="text" class="form-control" value=""/>
										 </div>
									 </td>
									 <td>
										 <div class="form-group">
											 <label>SMA / MA / SMK</label>
											 <input name="pendidikan_sma" type="text" class="form-control" value=""/>
										 </div>
									 </td>
								 </tr>
                 <tr>
									<td></td>
									<td colspan="2">
										<div class="form-group">
										<label>Perguruan Tinggi</label>
										<input class="form-control" type="text" name="pendidikan_pt" value="" />
										</div>
									</td>
									<td>
										<div class="form-group">
										<label>Pendidikan Non Formal</label>
										<input class="form-control" type="text" name="pendidikan_nonformal" value="" />
										</div>
									</td>
                 </tr>
              <tr>
                <tr><td colspan="4"><div class='box box-warning'></div></td></tr>
                 <td>Kontak</td>
                 <td colspan="2">No HP<input type="text" class="form-control"  name="no_hp" id="no_hp" placeholder=""></td>
								 <td>Facebook<input type="text" class="form-control"  name="fb" id="fb" placeholder=""></td>
                  </tr>
              	<tr>
                     <td></td>

                     <td colspan="2">Instagram<input type="text" class="form-control"  name="ig" id="ig" placeholder=""></td>
										 <td>Twitter<input type="text" class="form-control"  name="twitter" id="twitter" placeholder=""></td>
                      </tr>
              <tr>
                 <td>Pas Foto Anggota</td>
                  <td colspan="3"><input class="form-control" type="file" name="foto" class="form-control pull-right" placeholder="foto"></td>
                  </tr>
                  <tr>
                <td></td>
                  <td colspan="3">
										<input class="btn btn-info"  type="submit" value="Simpan" /> &nbsp;
										<a target="_blank" href="<?=base_url();?>admin/printformanggota" class="btn btn-warning">Print Form Anggota</a>
									</td>
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
	<!-- InputMask -->
<?php } ?>
<?php
}?>

<!-- ..............PEMBATAS..................... -->
<!-- if User Data IPPNU -->
<?php if($kategori_data=='0'){ ?>
<!-- Pilih Berdasarkan Kabupaten/Kota -->
<?php if($_GET['id']==''){ ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Anggota IPPNU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Input Anggota</li>
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
          <!-- /.card-header -->
          <div class="card-body">
            <form method="GET" action="<?=base_url()?>admin/inanggota">
            <div class="form-group">
              <select name="id" class="form-control">
                <option>Pilih Cabang</option>
                <?php foreach ($cabang as $pc): ?>
                <option value="<?= $pc['id_pimpinan']; ?>"><?= $pc['kd_pimpinan']; ?> - <?= $pc['nama_pimpinan']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-info" value="Pilih"/>
            </div>
          </form>
          </div>

          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php } ?>

  <!-- Content Wrapper. Contains page content -->
	<!-- Menampilkan data filter by search -->
<?php if($_GET['id']!=''){ ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Anggota IPPNU</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Anggota</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash', 'Terpakai'); ?>"></div>
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Anggota</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <form action="<?=base_url()?>admin/addanggotaippnu" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table class='table'>
            <tr>
            <td>Nomor Induk Anggota</td>
            <td colspan="3">
							<input required="required" readonly="readonly" class="form-control" type="text" name="nia"  placeholder="331121100015 -> Contoh NIA Otomatis" /><br/>
              <input type="hidden" name="urut" value="<?= $jumlah+1; ?>"/>
							<input type="hidden" name="jenis" value="PKPT"/>
              <input type="hidden" name="pw" value="33"/>
							<input type="hidden" name="kategori_data" value="<?= $kategori_data ?>"/>
            **)NIA akan terinput otomatis setelah data disimpan</td>
            </tr>
             <tr><td>Nama Lengkap</td>
              <td colspan="3"><input required="required" class="form-control" type="text" name="nama" value="" placeholder="Nama Lengkap" /></td>
             </tr>

              <tr><td>Tempat, Tanggal Lahir</td>
             <td colspan="2"><input required="required" class="form-control" type="text" name="tempat_lahir"  value="" placeholder="Tempat Lahir"/></td><td><input type="date" name="tanggal_lahir" class="form-control pull-right"  placeholder="Tanggal Lahir"></td>
              </tr>
							<tr><td>Email</td>
             <td colspan="2"><input required="required" class="form-control" type="text" name="email"  value="" placeholder="Email"/></td>
              </tr>
							<tr>
                 <td>Alamat Lengkap</td>
                 <td colspan="3"><textarea class="form-control"  name="alamat_lengkap" id="alamat_lengkap" style="height: 50px;width: 100%;"></textarea></td>
                  </tr>
									<tr>
									 <td>Data Orang Tua</td>
									 <td>
											 <input type="text" class="form-control" name="nama_ayah"  value="" placeholder="Nama Ayah"/>
										</td>

										<td>
											 <input type="text" class="form-control" name="nama_ibu"  value=""  placeholder="Nama Ibu"/>
											</td>

										<td>
											<div class="form-group">
											 <label></label>

										</div>

									</td>
										</tr>
                <tr>
                 <td><b>Keanggotaan</b></td>
                 <td>
									 <div class="form-group">
										 <label>Pimpinan Cabang</label>
									 <select class="form-control" id="id_pimpinan" name="id_pimpinan">
									 <option>Pilih Pimpinan Cabang</option>
									 <?php foreach ($cabang as $pc): ?>
                    <option value="<?= $pc['id_pimpinan']; ?>">
                        <?= $pc['kd_pimpinan']; ?> - <?= $pc['nama_pimpinan']; ?>
                    </option>
										<?php endforeach; ?>
	            			</select>
									</div>
									</td>

                  <td>
										<div class="form-group">
 										 <label>PKPT</label>
										<select class="form-control" id="id_pimpinan_ac" name="id_pimpinan_ac">
                    <?php foreach ($kecamatan as $pac): ?>
                    <option id="id_pimpinan_ac" class="<?= $pac['id_pimpinan']; ?>" value="<?= $pac['id_pimpinan_ac']; ?>">
                        <?= $pac['nama_pimpinan_ac']; ?>
                    </option>
                    <?php endforeach; ?>
            				</select>
										</div>
										</td>

                  <td>
										<!--<div class="form-group">
 										 <label>Ranting / Komisariat</label>
										<select class="form-control" id="id_pimpinan_rk" name="id_pimpinan_rk">
                		<option value="">Pilih Ranting</option>
                    <?php foreach ($ranting as $ran): ?>
                    <option id="id_pimpinan_rk" class="<?= $ran['id_pimpinan_ac']; ?>" value="<?= $ran['id_pimpinan_rk']; ?>">
                        <?= $ran['nama_pimpinan_rk']; ?>
                    </option>
                    <?php endforeach; ?>
            				</select>
									</div>-->
						        <script src="<?=base_url()?>template/jquery-1.10.2.min.js"></script>
						        <script src="<?=base_url()?>template/jquery.chained.min.js"></script>
						        <script>
						            $("#id_pimpinan_ac").chained("#id_pimpinan");
						            //$("#id_pimpinan_rk").chained("#id_pimpinan_ac");
						        </script>
                </td>
                  </tr>
									<tr><td>Aktif Kepengurusan</td>
										<td colspan="3">
											<select class="form-control" name="aktif_kepengurusan">
												<option>Pilih Pimpinan</option>
												<option value="Anggota">Anggota</option>
												<option value="PR">PR</option>
												<option value="PK">PK</option>
												<option value="PAC">PAC</option>
												<option value="PKPT">PKPT</option>
												<option value="PC">Pimpinan Cabang</option>
												<option value="PW">Pimpinan Wilayah</option>
												<option value="PP">Pimpinan Pusat</option>
											</select></td>
									</tr>
									<tr><td><b>Kaderisasi Formal</b></td>
										<td colspan="3">
											<select required="required" class="form-control" name="pelatihan_formal">
												<option>Pilih tingkatan</option>
												<option value="makesta">MAKESTA</option>
												<option value="lakmud">LAKMUD</option>
												<option value="lakut">LAKUT</option>
											</select></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Makesta
												<select required="required" class="form-control col-6" style="float:right;" name="makesta">
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input required="required" type="text" class="form-control" name="penyelenggara_makesta" value="" placeholder="Penyelenggara"/></td>
											<td><input required="required" type="text" class="form-control" name="tempat_makesta" value="" placeholder="Tempat"/></td>
											<td><input required="required" type="date" class="form-control" name="waktu_makesta" value="" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Lakmud
												<select class="form-control col-6" style="float:right;" name="lakmud">
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input type="text" class="form-control" name="penyelenggara_lakmud" value="" placeholder="Penyelenggara"/></td>
											<td><input type="text" class="form-control" name="tempat_lakmud" value="" placeholder="Tempat"/></td>
											<td><input type="date" class="form-control" name="waktu_lakmud" value="" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Lakut
												<select class="form-control col-6" style="float:right;" name="lakut">
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input type="text" class="form-control" name="penyelenggara_lakut" value="" placeholder="Penyelenggara"/></td>
											<td><input type="text" class="form-control" name="tempat_lakut" value="" placeholder="Tempat"/></td>
											<td><input type="date" class="form-control" name="waktu_lakut" value="" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td>Kaderisasi Non Formal</td>
											<td colspan="3">
												<div class="form-group">
				                  <select name="pelatihan_nonformal" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
				                    <option>Latin 1</option>
				                    <option>Latin 2</option>
														<option>ISPT</option>
				                    <option>Diklatama KPP</option>
				                    <option>Diklatmad KPP</option>
				                    <option>Diklatnas KPP</option>
				                    <option>Latihan Jurnalistik</option>
				                    <option>Entrpreneurship Training</option>
				                  </select>
				                </div>
		                	</td>
									</tr>
									<tr>
											<td>Keanggotaan KPP</td>
											<td colspan="3">
												<div class="form-group">
				                  <select name="status_cbp" class="form-control">
														<option>Pilih</option>
														<option value="ya">Anggota</option>
				                    <option value="tidak">Bukan Anggota</option>
				                  </select>
				                </div>
		                	</td>
									</tr>
									<!--<tr>
		                 <td>Tanggal Masuk IPPNU</td>
		                  <td colspan="3"><input required type="date" name="tanggal_masuk" class="form-control pull-right" placeholder="Tanggal Masuk"></td>
		              </tr>-->
									<tr>
		                 <td>Tempat Input KTA</td>
		                  <td colspan="3"><input class="form-control" type="text" name="tempat_input_kta" class="form-control pull-right" placeholder="Tempat Input KTA (Kabupaten/Kota)"></td>
		              </tr>
		              <tr>
		                 <td>Tanggal Input KTA</td>
		                  <td colspan="3"><?php
		                  $tgl_input_kta=date('Y-m-d');?><input class="form-control" type="date" name="tanggal_input_kta" class="form-control pull-right" readonly="readonly" value="<?php echo $tgl_input_kta; ?>" ></td>
		              </tr>
              <tr>
                   <td>Pendidikan Terakhir</td>
                   <td colspan="3"> <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                    <option value="Tidak Ada">Tidak Ada</option>
                    <option value="SMP/Sederajat">SD/Sederajat</option>
                    <option value="SMP/Sederajat">SMP/Sederajat</option>
                    <option value="SMA/Sederajat">SMA/Sederajat</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                    </select></td>
                 </tr>
								 <tr>
									 <td></td>
									 <td>
										 <div class="form-group">
											 <label>SD / MI</label>
											 <input name="pendidikan_sd" type="text" class="form-control" value=""/>
										 </div>
									 </td>
									 <td>
										 <div class="form-group">
											 <label>SMP / MTs</label>
											 <input name="pendidikan_smp" type="text" class="form-control" value=""/>
										 </div>
									 </td>
									 <td>
										 <div class="form-group">
											 <label>SMA / MA / SMK</label>
											 <input name="pendidikan_sma" type="text" class="form-control" value=""/>
										 </div>
									 </td>
								 </tr>
                 <tr>
									<td></td>
									<td colspan="2">
										<div class="form-group">
										<label>Perguruan Tinggi</label>
										<input class="form-control" type="text" name="pendidikan_pt" value="" />
										</div>
									</td>
									<td>
										<div class="form-group">
										<label>Pendidikan Non Formal</label>
										<input class="form-control" type="text" name="pendidikan_nonformal" value="" />
										</div>
									</td>
                 </tr>
              <tr>
                <tr><td colspan="4"><div class='box box-warning'></div></td></tr>
                 <td>Kontak</td>
                 <td colspan="2">No HP<input type="text" class="form-control"  name="no_hp" id="no_hp" placeholder=""></td>
								 <td>Facebook<input type="text" class="form-control"  name="fb" id="fb" placeholder=""></td>
                  </tr>
              <tr>
                     <td></td>
                     <td>Instagram<input type="text" class="form-control"  name="ig" id="ig" placeholder=""></td>
                     <td>Twitter<input type="text" class="form-control"  name="twitter" id="twitter" placeholder=""></td>
										 <td></td>
                      </tr>
              <tr>
                 <td>Pas Foto Anggota</td>
                  <td colspan="3"><input class="form-control" type="file" name="foto" class="form-control pull-right" placeholder="foto"></td>
                  </tr>
                  <tr>
                <td></td>
                  <td colspan="3">
										<input class="btn btn-info"  type="submit" value="Simpan" /> &nbsp;
										<a target="_blank" href="<?=base_url();?>admin/printformanggota" class="btn btn-warning">Print Form Anggota</a>
									</td>
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
	<!-- InputMask -->
<?php } ?>
<?php
}?>
