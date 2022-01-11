<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inventaris Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inventaris Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php if($kategori_data==1){ echo 'PW IPNU'; }else{ echo'PW IPPNU';} ?> Provinsi Jawa Tengah</h3>
              <div style="float:right;">
              <a target="_blank" class='btn btn-danger' title='Print' href='<?=base_url()?>admin/printinventarisbarang'>
                <span class='fas fa-print'> </span> Print</a>
              <a target="_blank" class="btn btn-warning"  href="<?=base_url(); ?>admin/exportinventarisbarang">
                  <i class="fas fa-download"></i> Export Excel</a>
              <a class='btn btn-info' title='Buat Surat' href='<?=base_url()?>admin/ininventarisbarang'>
              </span> New Data</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-o">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Index Barang</th>
                  <th>Jenis / Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach ($inventaris_barang as $ib): ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?= $ib['index_barang']; ?></td>
                  <td><?= $ib['nama_barang']; ?></td>
                  <td><?= $ib['jumlah']; ?></td>
                  <td><?= $ib['keterangan'];?></td>
                  <td>
                    <a class='btn btn-warning' title='Lihat' href='<?=base_url()?>admin/viewinventarisbarang?id=<?= $ib['id_inventaris_barang']; ?>'>
                    <span class='fas fa-th-list'></span></a>
                    <a class='btn btn-info' title='Edit Data' href='<?=base_url()?>admin/editinventarisbarang?id=<?= $ib['id_inventaris_barang']; ?>'><span class='fa fa-edit'></span></a>
                  <a class='btn btn-danger tombol-hapus' title='Hapus Data' href='<?=base_url()?>admin/deleteinventarisbarang?id=<?= $ib['id_inventaris_barang']; ?>'><span class='fas fa-trash'></span></a></td>
                </tr>
                <?php endforeach; ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
