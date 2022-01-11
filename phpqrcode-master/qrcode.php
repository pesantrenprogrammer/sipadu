<?php

include 'qrlib.php';
//QRcode::png("Muhamad Adnan Pengusaha Web Sukses");
QRcode::png("Muhamad Adnan Pengusaha Web Sukses", "cek.png", "L", 4, 4);
echo "<img src='cek.png' />";

 ?>
