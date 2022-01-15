<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kategori_dokumenperusahaan extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->query('SELECT * FROM kategori_dokumen_perusahaan ORDER BY id DESC');
    }

    public function input_data($data)
    {
        $this->db->insert('kategori_dokumen_perusahaan', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $id = $this->uri->segment(4);
        return $this->db->query("SELECT id, nama_kategori FROM kategori_dokumen_perusahaan WHERE id = $id");
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('kategori_dokumen_perusahaan', $data);
    }

    public function getKategoriByNama($nama_kategori)
    {
        return $this->db->get_where('kategori_dokumen_perusahaan', ['nama_kategori' => $nama_kategori])->row_array();
    }
}
