<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

   public function get_laporan($id_sales, $id_produk, $start_date, $end_date) {
    if (empty($start_date) || empty($end_date)) {
        return [];
    }

    $this->db->select('so.*, s.nama_sales, p.nama_produk');
    $this->db->from('sales_order so');
    $this->db->join('sales s', 'so.id_sales = s.id_sales', 'left');
    $this->db->join('produk p', 'so.id_produk = p.id_produk', 'left');
    $this->db->where('so.status', 'selesai');

    // Pastikan tambahkan waktu 00:00:00 dan 23:59:59
    $this->db->where('so.created_at >=', $start_date . ' 00:00:00');
    $this->db->where('so.created_at <=', $end_date . ' 23:59:59');

    if (!empty($id_sales)) {
        $this->db->where('so.id_sales', $id_sales);
    }
    if (!empty($id_produk)) {
        $this->db->where('so.id_produk', $id_produk);
    }

    $this->db->order_by('so.created_at', 'ASC');

    $query = $this->db->get();

    // Debug: echo query SQL terakhir
    // echo $this->db->last_query();

    return $query->result();
}
}