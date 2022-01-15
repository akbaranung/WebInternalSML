<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data_berita extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tampil_data()
    {
        return $this->db->query('SELECT berita.id, judul, tgl_berita_terbit, gambar, deskripsi, file, kategori_berita.nama_katagori_berita as kategori FROM berita, kategori_berita where berita.katagori_berita = kategori_berita.id order by berita.id desc');
    }

    public function input_data($data)
    {
        $this->db->insert('berita', $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getdataById($id)
    {
        return $this->db->get_where('berita', array('id' => $id));
    }

    public function edit_data($id)
    {
        $id = $this->uri->segment(4);
        return $this->db->query("SELECT berita.id, judul, tgl_berita_terbit, gambar, deskripsi, file, katagori_berita, kategori_berita.nama_katagori_berita as kategori FROM berita, kategori_berita WHERE berita.katagori_berita = kategori_berita.id AND berita.id = $id");
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('berita', $data);
    }

    public function berita_terbaru()
    {
        return $this->db->query('SELECT berita.id, judul, tgl_berita_terbit, gambar, deskripsi, file, kategori_berita.nama_katagori_berita as kategori FROM berita, kategori_berita where berita.katagori_berita = kategori_berita.id order by berita.id desc limit 5');
    }

    public function berita_home_terbaru()
    {
        return $this->db->query('SELECT berita.id, judul, tgl_berita_terbit, gambar, deskripsi, file, kategori_berita.nama_katagori_berita as kategori FROM berita, kategori_berita where berita.katagori_berita = kategori_berita.id order by berita.id desc limit 3');
    }

    public function download($id)
    {
        $query = $this->db->get_where('berita', array('id' => $id));
        return $query->row_array();
    }
}
