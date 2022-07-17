<?php
defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
#    Simple Code By Pradana Industries By.bri_pebri     |
#=======================================================|
class M_Dashboard extends CI_Model
{
    public function hitungJumlahWilayah()
    {
        $query = $this->db->get('tbl_wilayah');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungJumlahBabinsa()
    {
        $query = $this->db->get('tbl_babinsa');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
