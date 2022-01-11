<?php


class Resi extends CI_Model
{

    public function get_waktu($tanggalMasuk, $tipe)
    {
        $waktu = '';
        if ($tipe == 1) {
            $waktu = date('d-F-Y', strtotime('+3 day', strtotime($tanggalMasuk)));
        } else if ($tipe == 2) {
            $waktu = date('d-F-Y', strtotime('+1 day', strtotime($tanggalMasuk)));
        } else {
            $waktu = date('d-F-Y', strtotime('+3 day', strtotime($tanggalMasuk)));
        }

        return $waktu;
    }
    public function get_Tenor($tanggalMasuk, $tenor)
    {

        $waktu = date('d-F-Y', strtotime('+' . $tenor . 'day', strtotime($tanggalMasuk)));


        echo $waktu;
    }
    public function print_Keuangan($tglawal, $tglakhir, $kota)
    {
        $judulKota = '';
        $data = '';
        if ($kota == "*") {
            $this->db->select('*');
            $this->db->where('tanggalTerima >=', $tglawal);
            $this->db->where('tanggalTerima <=', $tglakhir);
            $data = $this->db->get('resi')->result_array();
            $judulKota = "SEMUA KOTA";
        } else {

            $this->db->select('*');
            $this->db->where('tanggalTerima >=', $tglawal);
            $this->db->where('tanggalTerima <=', $tglakhir);
            $this->db->where('kotaAsal', $kota);
            $data = $this->db->get('resi')->result_array();
            $judulKota = $kota;
        }
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('L', 'F4');
        $total = 0;
        $gambar =  "<img src=\"assets/img/SCP_Logo.png\" width=\"100\" height=\"50\"/>";

        $pdf->Image('assets/img/SCP_Logo.png', 15, 6, 30, 20);
        $pdf->SetFont('Helvetica', 'B', 16);
        $pdf->Cell(0, 0, 'PT Solusi Cargo Perkasa', 0, 0, 'C');
        $pdf->Ln();
        $pdf->SetFont('Helvetica', 'B', 9);
        $pdf->Cell(0, 0, 'Alamat: Ruko Parkiran Bandara Husein Sastranegara No 17, Kota Bandung', 0, 0, 'C');
        $pdf->Ln();
        $tabel = '<br><br><hr>';
        $pdf->writeHTML($tabel);
        $pdf->Ln();
        $pdf->SetFont('Helvetica', 'B', 11);
        $pdf->Cell(0, 0, 'LAPORAN PENGIRIMAN BARANG ', 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->SetFont('Helvetica', 'B', 9);
        $pdf->Cell(0, 0, "Kota : " . $judulKota, 0, 0, 'C');
        $pdf->Ln(5);
        $pdf->SetFont('Helvetica', 'B', 9);
        $pdf->Cell(0, 0, 'Tanggal ' . $tglawal . ' S.d ' . $tglakhir, 0, 0, 'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Ln();
        $tabel = '
        <style>
        td {
             font-size: 12px;
        }
        </style>
        <big>
        <table border="1" cellpadding="1">
            <tr>
                <td width="30" align="center">NO</td>
                <td width="75" align="center">NO RESI</td>
                <td width="75" align="center">TANGGAL TERIMA</td>
                <td width="105" align="center">PENGIRIM</td>
                <td width="105" align="center">PENERIMA</td>
                <td width="75" align="center">ASAL</td>
                <td width="75" align="center">TUJUAN</td>
                <td width="50" align="center">BARANG</td>
                <td width="45" align="center">KOLI</td>
                <td width="45"  align="center">BERAT</td>
                <td width="80" align="center">HARGA/KG</td>
                <td width="120" align="center">BIAYA</td>
            </tr>
            ';
        $berat = 0;
        $ct = 1;
        foreach ($data as $value) {
            $cabang = $this->getName($value["idCabang"]);
            $tabel .=
                '
            <tr>
                <td align="center">' . $ct . '</td>
                <td align="center">' . $cabang . $value["noResi"] . '</td>  
                <td align="center">' . $value["tanggalTerima"] . '</td>
                <td align="center">' . $value["namaPengirim"] . '</td>
                <td align="center">' . $value["namapenerima"] . '</td>
                <td align="center">' . $value["kotaAsal"] . '</td> 
                <td align="center">' . $value["kotaTujuan"] . '</td>
                <td align="center">' . $value["jenisBarang"] . '</td>
                <td align="center">' . $value["koli"] . '</td>
                <td align="center">' . $value["berat"] . '</td>
                <td align="left">' . $this->rupiah($value["harga"]) . '</td>
                <td align="left">' . $this->rupiah($value["total"])  . '</td>
            </tr>
            ';
            $berat = $berat + $value["berat"];
            $ct++;
            $total = $total + $value['total'];
        };
        $tabel .= '
        </table>
        </big>
        ';
        $pdf->writeHTML($tabel);
        $pdf->Ln();
        $pdf->Ln();
        $pdf->SetFont('Helvetica', 'B', 12);
        $pdf->Cell(0, 0, 'Total Berat :' . $berat, 0, 0, 'L');
        $pdf->Ln();
        $pdf->SetFont('Helvetica', 'B', 12);

        $pdf->Cell(0, 0, 'Total Biaya :' . $this->rupiah($total), 0, 0, 'L');

        $pdf->Output("Laporan_" . $tglawal . '.pdf', 'I');
    }
    public function updateStatusBon($noresi)
    {
        $state =
            [
                'status' => 1
            ];
        $this->db->where('idResi', $noresi);
        $this->db->update('relasiorder', $state);
    }
    public function getIdCabang($namaCabang)
    {
        $this->db->select('idCabang');
        $this->db->where('namaCabang', $namaCabang);
        return $this->db->get('cabang')->row_array();
    }
    public function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }
    public function getName($id)
    {
        $this->db->select('namaCabang');
        $this->db->where('idCabang', $id);
        $Result = $this->db->get('cabang')->row_array();
        return $Result['namaCabang'];
    }
    public function getKota($id)
    {
        $this->db->select('namaKota');
        $this->db->where('idKota', $id);
        $Result = $this->db->get('kota')->row_array();
        return $Result['namaKota'];
    }
        public function get_resi()
    {
        $tangalnow = date("Y-m-d");
        $tanggalkecil = date_create($tangalnow);
        date_modify($tanggalkecil, "-30 days");
        $tanggalkecil = date_format($tanggalkecil, "Y-m-d");
        $this->db->select('*');
        $this->db->where('tanggalTerima >=', $tanggalkecil);
        $this->db->where('tanggalTerima <=', $tangalnow);
        $data = $this->db->get('resi')->result_array();
        return $data;
    }
}
