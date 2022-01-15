<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
    public function update_data_profile($where, $data)
    {
        $this->db->where($where);
        $this->db->update('karyawan', $data);
    }
}
