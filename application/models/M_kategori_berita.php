<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori_berita extends CI_Model
{

    public function tampil_data_kategori()
    {
        return $this->db->query('SELECT * FROM kategori_berita ORDER BY id DESC');
    }

    public function input_data($data)
    {
        $this->db->insert('kategori_berita', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $id = $this->uri->segment(4);
        return $this->db->query("SELECT id, nama_katagori_berita FROM kategori_berita WHERE id = $id");
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('kategori_berita', $data);
    }
}
