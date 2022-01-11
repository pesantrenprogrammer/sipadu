<div class="site-section " id="services-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-7 text-center">
                <div class="block-heading-1">
                    <h2>Harga</h2>
                    <h3> <?= $kotaAsal[0]['namaKota'] ?> ke <?= $kotaTujuan[0]['namaKota'] ?> </h3>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-all">



            <div class="block__35630">
                <div class="icon mb-0">
                    <span class="flaticon-airplane"></span>
                </div>
                <h3 class="mb-3">Express</h3>
                <table>
                    <tr>
                        Waktu estimasi : 1 hari sampai
                    </tr><br>
                    <tr>
                        Harga :
                    </tr><br>
                    <?php $x = 0;
                    foreach ($harga as $res) : ?>
                        <?php
                        if ($res['tipe'] == 1) {
                            if ($res['besar'] == 0) {
                                echo "<tr>
                                        <td> berat < " . $res['berat'] . " : <h3> " . $this->Resi->rupiah($res['Harga']) . " </h3>
                                        </td> <br>
                                    </tr>";
                            } else {
                                echo "<tr>
                                        <td> berat > " . $res['berat'] . " : <h3> " . $this->Resi->rupiah($res['Harga']) . " </h3>
                                        </td> <br>
                                    </tr>";
                            }
                            $x++;
                        }

                        ?>

                    <?php endforeach;
                    if ($x == 0) {
                        echo "<tr>
                                <td> Untuk harga bisa langusung tanyakan ke costumer service yang ada </h3>
                                </td> <br>
                            </tr>";
                    } ?>
                </table>
            </div>


            <div class="block__35630">
                <div class="icon mb-0">
                    <span class="flaticon-add"></span>
                </div>
                <h3 class="mb-3">Regular</h3>
                <table>
                    <tr>
                        Waktu estimasi : 1-4 hari sampai
                    </tr><br>
                    <tr>
                        Harga :
                    </tr><br>
                    <?php $x = 0;
                    foreach ($harga as $res) : ?>
                        <?php
                        if ($res['tipe'] == 0) {
                            if ($res['besar'] == 0) {
                                echo "<tr>
                                        <td> berat < " . $res['berat'] . " : <h3> " . $this->Resi->rupiah($res['Harga']) . " </h3>
                                        </td> <br>
                                    </tr>";
                            } else {
                                echo "<tr>
                                        <td> berat > " . $res['berat'] . " : <h3> " . $this->Resi->rupiah($res['Harga']) . " </h3>
                                        </td> <br>
                                    </tr>";
                            }
                            $x++;
                        }
                        ?>

                    <?php endforeach;
                    if ($x == 0) {
                        echo "<tr>
                                <td> Untuk harga bisa langusung tanyakan ke costumer service yang ada </h3>
                                </td> <br>
                            </tr>";
                    } ?>
                </table>
            </div>

            <div class="block__35630" style="display: none;">
            </div>


            <div class="block__35630">
                <div class="icon mb-0">
                    <span class="fas fa-truck"></span>
                </div><br>
                <h3 class="mb-3">Trucking</h3>
                <p>Untuk jenis pengiriman ini silahkan hubungi Costumer Service kantor cabang kami yang berada di kota Anda. </p>
            </div>

            <div class="block__35630">
                <div class="icon mb-0">
                    <span class="fas fa-motorcycle"></span>
                </div><br>
                <h3 class="mb-3">Motor</h3>
                <p>Untuk jenis pengiriman ini silahkan hubungi Costumer Service kantor cabang kami yang berada di kota Anda. </p>
            </div>

            <div class="block__35630">
                <div class="icon mb-0">
                    <span class="fa fa-home"></span>
                </div><br>
                <h3 class="mb-3">Pindahan Rumah</h3>
                <p>Untuk jenis pengiriman ini silahkan hubungi Costumer Service kantor cabang kami yang berada di kota Anda. </p>
            </div>

        </div>
    </div>
</div>