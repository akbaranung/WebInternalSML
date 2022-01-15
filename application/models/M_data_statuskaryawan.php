<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data_statuskaryawan extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->query('SELECT * FROM status_karyawan ORDER BY id DESC');
    }

    public function input_data($data)
    {
        $this->db->insert('status_karyawan', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $id = $this->uri->segment(4);
        return $this->db->query("SELECT id, status FROM status_karyawan WHERE id = $id");
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('status_karyawan', $data);
    }
}
