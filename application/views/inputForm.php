<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <div clas="container-contact100">
        <div class="wrap-contact100">
        <form action="POST">
            <div class="form-group">
                <label for="penerima">Nama Penerima : </label><br>
                <input type="text" class="form-control" id="penerima" name="penerima"><br>
            </div>
            <div class="form-group" >
                <label for="alamat">Alamat Penerima : </label><br>
                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea><br>
            </div> 
            <div class="form-group">
                <label for="berat">Berat : </label><br>
                <input type="number" class="form-control " id="berat" name="berat" placeholder="kg"><br>
            </div>
            <div class="form-group">
                <label for="jenisbarang">Jenis Barang:</label><br>
                <input type="textarea" class="form-control" id="jenisbarang" name="jenisbarang" placeholder="Pakaian,aksesoris,dsb"><br>
            </div>
            <div class="form-group">
                <label class="my-1 mr-2" for="jalur">Pilih Jalur Pengiriman :</label>
                <select class="custom-select my-1 mr-sm-2" name="jalur" id="jalur">
                <option value="darat">Darat</option>
                <option value="Laut">Laut</option>
                <option value="Udara">Udara</option>
                </select>
            </div>
            <div class="form-group">
                <label class="my-1 mr-2" for="tipe">Pilih Tipe Pengiriman :</label>
                <select class="custom-select my-1 mr-sm-2" name="tipe" id="tipe">
                <option value="ODS">One Day Service</option>
                <option value="reguler">Reguler</option>
                <option value="ND">Next Day</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga :</label><br>
                <input type="number" class="form-control" id="harga" name="harga" value="0" readonly>
            </div>
            <input type="submit" class ="btn btn-primary" value="submit">
        </form>
    </div>
    </div>    