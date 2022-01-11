<div class="site-section" id="faq-section">
    <div class="container">
        <div class="row mb-5">
            <div class="block-heading-1 col-12 text-center">
                <h2>Tracking</h2>
            </div>
        </div>
        <!--Tabel Lacak-->
        <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-black h4 mb-4">Lacak</h3>
            <ol class="activity-feed">
                <?php $terima = ""; ?>
                <?php $x = 0;
                $v = sizeof($lacak) - 1;
                foreach ($lacak as $res) : ?>
                    <?php if ($x == $v) {
                        $terima = $res['waktu_terima'];
                        echo '<li class="feed-item feed-item-success">';
                    } else {
                        echo '<li class="feed-item feed-item-info">';
                    }
                    ?>

                    <time class="date" datetime="9-23"><?= date('D, d-F-Y g:i a', strtotime($res['waktu_terima']))  ?></time>
                    <span class="text"><?= $res['Keterangan'] ?></span>
                    </li>
                <?php $x++;
                endforeach; ?>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Nomor Resi</h3>
                    <p> <?= $dataR[0]['noResi']; ?> </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Kota Asal</h3>
                    <p> <?= $dataR[0]['kotaAsal']; ?> </p>
                </div>

                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Berat</h3>
                    <p> <?= $dataR[0]['berat'] ?> </p>
                </div>

                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Waktu Pengiriman</h3>
                    <p> <?= date('d-F-Y', strtotime($dataR[0]['tanggalTerima']))  ?> </p>
                </div>

                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Pengirim</h3>
                    <p> <?= $dataR[0]['namaPengirim'] ?> </p>
                </div>

            </div>



            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Layanan Pengiriman</h3>
                    <p> <?php if ($dataR[0]['tipePengiriman'] == 1) {
                            echo "Reguler";
                        } else {
                            echo "expres";
                        } ?> </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Kota Tujuan</h3>
                    <p> <?= $dataR[0]['kotaTujuan']; ?> </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Status</h3>
                    <p> <?php if ($dataR[0]['status'] == 1) {
                            echo "Dalam Pengirman";
                        } else {
                            echo "Selesai";
                        } ?> </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Waktu Terima</h3>
                    <p> <?= date('d-F-Y', strtotime($terima)); ?> </p>
                </div>
                <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-black h4 mb-4">Penerima</h3>
                    <p> <?= $dataR[0]['namapenerima'] ?> </p>
                </div>

            </div>
        </div>

    </div>
</div>