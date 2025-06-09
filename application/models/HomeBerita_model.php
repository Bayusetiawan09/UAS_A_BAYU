<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeBerita_model extends CI_Model {

    // Ambil semua data berita
    public function get_all()
    {
        return $this->db->get('berita')->result();
    }

    // Ambil berita berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('berita', ['idberita' => $id])->row();
    }
}
