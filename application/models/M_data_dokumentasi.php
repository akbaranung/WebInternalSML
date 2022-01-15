<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data_dokumentasi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tampil_data()
    {
        return $this->db->query('SELECT * FROM dokumen');
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function input_data($data)
    {
        $this->db->insert('dokumen', $data);
    }

    public function getdataById($id)
    {
        return $this->db->get_where('dokumen', array('id' => $id));
    }

    public function edit_data($id)
    {
        $id = $this->uri->segment(4);
        return $this->db->query("SELECT * FROM dokumen WHERE  dokumen.id=$id");
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('dokumen', $data);
    }
}
