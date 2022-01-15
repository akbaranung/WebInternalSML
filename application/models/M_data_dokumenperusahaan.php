<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data_dokumenperusahaan extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->query('SELECT * FROM dokumen_perusahaan ORDER BY id DESC');
    }

    public function input_data($data)
    {
        $this->db->insert('dokumen_perusahaan', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($id)
    {
        $id = $this->uri->segment(4);
        return $this->db->query("SELECT dokumen_perusahaan.id as id, kategori_dokumen_perusahaan.id as id_dokumen, judul_dokumen, file, kategori_dokumen_perusahaan.nama_kategori as nama_kategori FROM dokumen_perusahaan, kategori_dokumen_perusahaan WHERE dokumen_perusahaan.nama_kategori = kategori_dokumen_perusahaan.id AND dokumen_perusahaan.id = $id ORDER BY dokumen_perusahaan.id DESC");
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('dokumen_perusahaan', $data);
    }

    public function relasi_kategori_dokumen()
    {
        return $this->db->query('SELECT dokumen_perusahaan.id, kategori_dokumen_perusahaan.id as id_dokumen, judul_dokumen, file, kategori_dokumen_perusahaan.nama_kategori as nama_kategori FROM dokumen_perusahaan, kategori_dokumen_perusahaan WHERE dokumen_perusahaan.nama_kategori = kategori_dokumen_perusahaan.id ORDER BY dokumen_perusahaan.id DESC');
    }

    public function getdataById($id)
    {
        return $this->db->get_where('dokumen_perusahaan', array('id' => $id));
    }

    public function getAllFiles()
    {
        $query = $this->db->get('dokumen_perusahaan');
        return $query->result();
    }

    public function download($id)
    {
        $query = $this->db->get_where('dokumen_perusahaan', array('id' => $id));
        return $query->row_array();
    }

    public function getDokumenPerusahaan($jenis)
    {
        return $this->db->query("SELECT dokumen_perusahaan.id as id, kategori_dokumen_perusahaan.id as id_dokumen, judul_dokumen, file, kategori_dokumen_perusahaan.nama_kategori as nama_kategori FROM dokumen_perusahaan, kategori_dokumen_perusahaan WHERE dokumen_perusahaan.nama_kategori = kategori_dokumen_perusahaan.id AND dokumen_perusahaan.nama_kategori = $jenis ORDER BY dokumen_perusahaan.id DESC");
    }
}
