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
            <h1>Edit Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Anggota</li>
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
            <h3 class="card-title">Edit Anggota</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-o">
            <form action="<?=base_url()?>anggota/updateanggota" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table class='table'>
            <tr>
            <td>Nomor Induk Anggota</td>
            <td colspan="3"><input required="required" readonly="readonly" class="form-control" type="text" name="nia" value="<?= $anggota['nia']; ?>" placeholder="Nomor Induk Anggota" /><br/>
              <input type="hidden" name="id" value="<?= $anggota['id_anggota'];?>"/>
            </td>
            </tr>
             <tr><td>Nama Lengkap</td>
              <td colspan="3"><input required="required" class="form-control" type="text" name="nama" value="<?= $anggota['nama'];?>" placeholder="Nama Lengkap" /></td>
             </tr>

              <tr><td>Tempat, Tanggal Lahir</td>
             <td colspan="2"><input required="required" class="form-control" type="text" name="tempat_lahir"  value="<?= $anggota['tempat_lahir'];?>" placeholder="Tempat Lahir"/></td><td><input type="date" name="tanggal_lahir" value="<?= $anggota['tanggal_lahir'];?>" class="form-control pull-right"  placeholder="Tanggal Lahir"></td>
              </tr>
              <tr>
              <td>Alamat Lengkap</td>
                 <td colspan="3"><textarea class="form-control"  name="alamat_lengkap" id="alamat_lengkap"
                   style="height: 50px;width: 100%;"><?= $anggota['alamat_lengkap'];?></textarea></td>
              </tr>
							<tr>
								<tr><td>Pekerjaan</td>
	               <td colspan="3"><input class="form-control" type="text" name="pekerjaan_usaha" value="<?= $anggota['pekerjaan_usaha'];?>" placeholder="Pekerjaan" /></td>
	            </tr>
							<tr>
								<tr><td>Penghasilan</td>
								 <td colspan="3"> <select class="form-control" name="penghasilan_pribadi" id="penghasilan_pribadi">
									<option value="<?= $anggota['penghasilan_pribadi'];?>"><?= $anggota['penghasilan_pribadi'];?></option>
									<option value=""><b>----Pilih Untuk Edit-----</b></option>
									<option value="Kurang dari Rp 1.500.000,-/bulan"> Kurang dari Rp 1.500.000,-/bulan</option>
									<option value="Rp 1.500.000,- - Rp 2.500.000,-/bulan"> Rp 1.500.000,- - Rp 2.500.000,-/bulan</option>
									<option value="Rp 2.500.000,- - Rp 3.500.000,-/bulan"> Rp 2.500.000,- - Rp 3.500.000,-/bulan</option>
									<option value="Rp 3.500.000,- - Rp 4.500.000,-/bulan"> Rp 3.500.000,- - Rp 4.500.000,-/bulan</option>
									<option value="Lebih dari Rp 4.500.000,-/bulan"> Lebih dari Rp 4.500.000,-/bulan</option>
									</select></td>
							</tr>
							<tr>
								<td>Data Orang Tua</td>
		             <td colspan="1">Nama Ayah<input class="form-control" type="text" name="nama_ayah"  value="<?= $anggota['nama_ayah'];?>" placeholder="Nama Ayah"/></td>
								 <td>Nama Ibu<input type="text" name="nama_ibu" value="<?= $anggota['nama_ibu'];?>" class="form-control pull-right"  placeholder="Nama Ibu"></td>
		          </tr>
							<tr>
								<td>Pekerjaan Orang Tua</td>
		             <td colspan="1">Pekerjaan Ayah<input class="form-control" type="text" name="pekerjaan_ayah"  value="<?= $anggota['pekerjaan_ayah'];?>" placeholder="Pekerjaan Ayah"/></td>
								 <td>Pekerjaan Ibu<input type="text" name="pekerjaan_ibu" value="<?= $anggota['pekerjaan_ibu'];?>" class="form-control pull-right"  placeholder="Pekerjaan Ibu"></td>
		          </tr>
							<tr>
								<td>Penghasilan Orang Tua</td>
								 <td colspan="1"> Penghasilan Ayah <select class="form-control" name="penghasilan_ayah" id="penghasilan_ayah">
									<option value="<?= $anggota['penghasilan_ayah'];?>"><?= $anggota['penghasilan_ayah'];?></option>
									<option value=""><b>----Pilih Untuk Edit-----</b></option>
									<option value="Kurang dari Rp 1.500.000,-/bulan"> Kurang dari Rp 1.500.000,-/bulan</option>
									<option value="Rp 1.500.000,- - Rp 2.500.000,-/bulan"> Rp 1.500.000,- - Rp 2.500.000,-/bulan</option>
									<option value="Rp 2.500.000,- - Rp 3.500.000,-/bulan"> Rp 2.500.000,- - Rp 3.500.000,-/bulan</option>
									<option value="Rp 3.500.000,- - Rp 4.500.000,-/bulan"> Rp 3.500.000,- - Rp 4.500.000,-/bulan</option>
									<option value="Lebih dari Rp 4.500.000,-/bulan"> Lebih dari Rp 4.500.000,-/bulan</option>
									</select></td>
									<td> Penghasilan Ibu <select class="form-control" name="penghasilan_ibu" id="penghasilan_ibu">
 									<option value="<?= $anggota['penghasilan_ibu'];?>"><?= $anggota['penghasilan_ibu'];?></option>
 									<option value=""><b>----Pilih Untuk Edit-----</b></option>
 									<option value="Kurang dari Rp 1.500.000,-/bulan"> Kurang dari Rp 1.500.000,-/bulan</option>
 									<option value="Rp 1.500.000,- - Rp 2.500.000,-/bulan"> Rp 1.500.000,- - Rp 2.500.000,-/bulan</option>
 									<option value="Rp 2.500.000,- - Rp 3.500.000,-/bulan"> Rp 2.500.000,- - Rp 3.500.000,-/bulan</option>
 									<option value="Rp 3.500.000,- - Rp 4.500.000,-/bulan"> Rp 3.500.000,- - Rp 4.500.000,-/bulan</option>
 									<option value="Lebih dari Rp 4.500.000,-/bulan"> Lebih dari Rp 4.500.000,-/bulan</option>
 									</select></td>
							</tr>
							<tr>
                   <td>Aktif Kepengurusan</td>
                   <td colspan="3"> <select class="form-control" name="aktif_kepengurusan" id="aktif_kepengurusan">
                    <option value="<?= $anggota['aktif_kepengurusan'];?>"><?= $anggota['aktif_kepengurusan'];?></option>
										<option value="">----Pilih-----</option>
										<option value="Anggota">Anggota</option>
										<option value="PR">PR</option>
										<option value="PK">PK</option>
										<option value="PAC">PAC</option>
										<option value="PKPT">PKPT</option>
										<option value="PC">PC</option>
										<option value="PW">PW</option>
										<option value="PP">PP</option>
                    </select></td>
                 </tr>
								 <tr>
	                  <td>Pengkaderan Formal Terakhir</td>
	                  <td colspan="3"><select class="form-control" name="pelatihan_formal" id="pelatihan_formal">
	                   <option value="<?= $anggota['pelatihan_formal'];?>"><?= $anggota['pelatihan_formal'];?></option>
	                   <option value="">----Pilih Untuk Edit----</option>
	                   <option value="makesta">Makesta</option>
	                   <option value="lakmud">Lakmud</option>
	                   <option value="lakut">Lakut</option>
	                   </select></td>
	                </tr>
									<tr>
										<td>Riwayat Pengkaderan Formal</td>
										<td>Penyelenggara</td>
										<td>Tempat</td>
										<td>Waktu</td>
									</tr>
									<tr>
											<td style="padding-left:50px">Makesta
												<select class="form-control col-6" style="float:right;" name="makesta">
													<option value="<?= $anggota['makesta'];?>"><?= $anggota['makesta'];?></option>
													<option value="">---Pilih----</option>
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input type="text" class="form-control" name="penyelenggara_makesta" value="<?= $anggota['penyelenggara_makesta'];?>" placeholder="Penyelenggara"/></td>
											<td><input type="text" class="form-control" name="tempat_makesta" value="<?= $anggota['tempat_makesta'];?>" placeholder="Tempat"/></td>
											<td><input type="date" class="form-control" name="waktu_makesta" value="<?= $anggota['waktu_makesta'];?>" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Lakmud
												<select class="form-control col-6" style="float:right;" name="lakmud">
													<option value="<?= $anggota['lakmud'];?>"><?= $anggota['lakmud'];?></option>
													<option value="">---Pilih----</option>
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input type="text" class="form-control" name="penyelenggara_lakmud" value="<?= $anggota['penyelenggara_lakmud'];?>" placeholder="Penyelenggara"/></td>
											<td><input type="text" class="form-control" name="tempat_lakmud" value="<?= $anggota['tempat_lakmud'];?>" placeholder="Tempat"/></td>
											<td><input type="date" class="form-control" name="waktu_lakmud" value="<?= $anggota['waktu_lakmud'];?>" placeholder="Waktu"/></td>
									</tr>
									<tr>
											<td style="padding-left:50px">Lakut
												<select class="form-control col-6" style="float:right;" name="lakut">
													<option value="<?= $anggota['lakut'];?>"><?= $anggota['lakut'];?></option>
													<option value="">---Pilih----</option>
													<option value="belum">Belum</option><option value="sudah">Sudah</option>
												</select>
											</td>
											<td><input type="text" class="form-control" name="penyelenggara_lakut" value="<?= $anggota['penyelenggara_lakut'];?>" placeholder="Penyelenggara"/></td>
											<td><input type="text" class="form-control" name="tempat_lakut" value="<?= $anggota['tempat_lakut'];?>" placeholder="Tempat"/></td>
											<td><input type="date" class="form-control" name="waktu_lakut" value="<?= $anggota['waktu_lakut'];?>" placeholder="Waktu"/></td>
									</tr>
								 <tr><td>Kaderisasi Nonformal</td>
                  <td colspan="3"><input class="form-control" type="text" name="pelatihan_nonformal" value="<?= $anggota['pelatihan_nonformal'];?>" placeholder="Kaderisasi Nonformal" /></td>
                 </tr>
								 <?php if($kategori_data=='1'){ ?>
								 <tr>
	                    <td>Keanggotaan CBP</td>
	                    <td colspan="3"> <select class="form-control" name="status_cbp" id="status_cbp">
	                     <option value="<?= $anggota['status_cbp'];?>"><?php if($anggota['status_cbp']=='ya'){ echo 'Anggota'; }else{ echo 'Bukan Anggota';}?></option>
	                     <option value=""><b>----Pilih Untuk Edit-----</b></option>
											 <option value="ya">Anggota</option>
											 <option value="tidak">Bukan Anggota</option>
	                     </select></td>
	                </tr>
									 <?php
									 }?>

									 <!-- ..............PEMBATAS..................... -->
									 <!-- if User Data IPPNU -->
									 <?php if($kategori_data=='0'){ ?>
										 <tr>
			                    <td>Keanggotaan KPP</td>
			                    <td colspan="3"> <select class="form-control" name="status_cbp" id="status_cbp">
			                     <option value="<?= $anggota['status_cbp'];?>"><?php if($anggota['status_cbp']=='ya'){ echo 'Anggota'; }else{ echo 'Bukan Anggota';}?></option>
			                     <option value=""><b>----Pilih Untuk Edit-----</b></option>
													 <option value="ya">Anggota</option>
													 <option value="tidak">Bukan Anggota</option>
			                     </select></td>
			                </tr>
											<tr>
		 		                  <td>Tanggal Masuk IPPNU</td>
		 		                   <td colspan="3"><input required readonly type="date" name="tanggal_masuk" value="<?= $anggota['tanggal_masuk']; ?>" class="form-control pull-right" placeholder="Tanggal Masuk"></td>
		 		               </tr>
									 <?php
									 }?>
									 <tr>
		                    <td>Pendidikan Terakhir</td>
		                    <td colspan="3"> <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
		                     <option value="<?= $anggota['pendidikan_terakhir'];?>"><?= $anggota['pendidikan_terakhir'];?></option>
		                     <option value=""><b>----Pilih Untuk Edit-----</b></option>
		                     <option value="Tidak Ada">tidak Ada</option>
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
		 									 <td>Riwayat Pendidikan</td>
		 									 <td>
		 										 <div class="form-group">
		 											 <label>SD / MI</label>
		 											 <input name="pendidikan_sd" type="text" class="form-control" value="<?= $anggota['pendidikan_sd'];?>"/>
		 										 </div>
		 									 </td>
		 									 <td>
		 										 <div class="form-group">
		 											 <label>SMP / MTs</label>
		 											 <input name="pendidikan_smp" type="text" class="form-control" value="<?= $anggota['pendidikan_smp'];?>"/>
		 										 </div>
		 									 </td>
		 									 <td>
		 										 <div class="form-group">
		 											 <label>SMA / MA / SMK</label>
		 											 <input name="pendidikan_sma" type="text" class="form-control" value="<?= $anggota['pendidikan_sma'];?>"/>
		 										 </div>
		 									 </td>
		 								 </tr>
		                  <tr>
		 									<td></td>
		 									<td colspan="2">
		 										<div class="form-group">
		 										<label>Perguruan Tinggi</label>
		 										<input class="form-control" type="text" name="pendidikan_pt" value="<?= $anggota['pendidikan_pt'];?>" placeholder="Perguruan Tinggi" />
		 										</div>
		 									</td>
		 									<td>
		 										<div class="form-group">
		 										<label>Program Studi</label>
		 										<input class="form-control" type="text" name="program_studi_s1" value="<?= $anggota['program_studi_s1'];?>" />
		 										</div>
		 									</td>
		                  </tr>
											<tr>
		 									<td></td>
		 									<td colspan="2">
		 										<div class="form-group">
		 										<label>Pascasarjana</label>
		 										<input class="form-control" type="text" name="pascasarjana" value="<?= $anggota['pascasarjana'];?>" placeholder="Perguruan Tinggi" />
		 										</div>
		 									</td>
		 									<td>
		 										<div class="form-group">
		 										<label>Program Studi</label>
		 										<input class="form-control" type="text" name="program_studi_s2" value="<?= $anggota['program_studi_s2'];?>" />
		 										</div>
		 									</td>
		                  </tr>
											<tr>
		 									<td></td>
		 									<td colspan="2">
		 										<div class="form-group">
		 										<label>Pendidikan Non Formal</label>
		 										<input class="form-control" type="text" name="pendidikan_nonformal" value="<?= $anggota['pendidikan_nonformal'];?>" />
		 										</div>
		 									</td>
		                  </tr>
											<tr>
												<tr><td>Pengalaman Organisasi</td>
					               <td colspan="3"><input class="form-control" type="text" name="pengalaman_organisasi" value="<?= $anggota['pengalaman_organisasi'];?>" placeholder="Pengalaman Organisasi" /></td>
					            </tr>
											<tr>
												 <td>Kontak</td>
												 <td colspan="2">Email<input type="email" class="form-control"  name="email" id="email" value="<?= $anggota['email'];?>" placeholder="admin@ipnujateng.com"></td>
												 <td>No HP<input type="text" class="form-control"  name="no_hp" id="no_hp" value="<?= $anggota['no_hp'];?>" placeholder=""></td>
											</tr>
											 <tr>
													 <td></td>
													 <td>Facebook<input type="text" class="form-control"  name="fb" id="fb" value="<?= $anggota['fb'];?>" placeholder=""></td>
													 <td>Instagram<input type="text" class="form-control"  name="ig" id="ig" value="<?= $anggota['ig'];?>" placeholder=""></td>
													 <td>Twitter<input type="text" class="form-control"  name="twitter" id="twitter" value="<?= $anggota['twitter'];?>" placeholder=""></td>
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
