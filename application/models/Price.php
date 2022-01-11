<?php
class Price extends CI_Model
{

    public function get_Harga($kotaAsal, $kotaTujuan)
    {
        $this->db->select('harga');
        $this->db->where('idKotaAsal', $kotaAsal);
        $this->db->where('idKotaTujuan', $kotaTujuan);
        $querry = $this->db->get('price')->row_array();
        $harga = $querry['harga'];
        return $harga;
    }
}
