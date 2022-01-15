<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_data_karyawan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tampil_data()
    {
        return $this->db->query('SELECT karyawan.id, nama, alamat, jenis_kelamin, email, no_telpon, foto_karyawan, divisi, password, status_karyawan.status as status  FROM karyawan, status_karyawan WHERE karyawan.status = status_karyawan.id');
    }

    public function tampil_data_status_karyawan()
    {
        return $this->db->query('SELECT * FROM status_karyawan');
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function input_data($data)
    {
        $this->db->insert('karyawan', $data);
    }

    public function getdataById($id)
    {
        return $this->db->get_where('karyawan', array('id' => $id));
    }

    public function edit_data($id)
    {
        $id = $this->uri->segment(4);
        return $this->db->query("SELECT karyawan.id, nama, alamat, jenis_kelamin, email, no_telpon, foto_karyawan, divisi, password, karyawan.status as status , karyawan.level as level, status_karyawan.status as status_karyawan  FROM karyawan, status_karyawan where karyawan.status = status_karyawan.id AND karyawan.id = $id");
    }

    public function update_data($where, $data)
    {
        $this->db->where($where);
        $this->db->update('karyawan', $data);
    }
}
