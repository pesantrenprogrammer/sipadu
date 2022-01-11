<?php


class PengirimModel extends CI_Model
{

    public function get_detailPengirim($idPengirim)
    {
        $this->db->select('*');

        $this->db->where('idPengirim', $idPengirim);
        $querry = $this->db->get('pengirim')->result_array();
        return $querry;
    }
    public function get_resi($idPengirim)
    {
        $this->db->select('*');
        $this->db->from('resi');
        $this->db->join('relasiorder', 'relasiorder.idResi=resi.idResi');
        $this->db->where('idPengirim', $idPengirim);
        $hasil = $this->db->get()->result_array();
        return $hasil;
    }
}
