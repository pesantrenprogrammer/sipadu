<?php


class Pengiriman extends CI_Model
{

    public function masukBarang($resi, $idkota, $kota)
    {
        $this->db->select('*');
        $this->db->where('noResi', $resi);
        $noresi = $this->db->get('resi')->result_array();
        $idResi = $noresi[0]['idResi'];


        date_default_timezone_set("Asia/Jakarta");
        $data =
            [
                'idResi' => $idResi,
                'idKota' => $idkota,
                'keterangan' => "barang diterima di kantor" . $kota,
                'waktu_terima' =>  date("Y-m-d H:i:s")
            ];


        $this->db->insert('lacak_resi', $data);
    }
}
