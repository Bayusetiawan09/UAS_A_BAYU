<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

    public function getAllOrdersWithSales() {
       $this->db->select('so.*, so.created_at, p.nama, pr.nama_produk, pr.harga as harga_total, s.nama_sales');
        $this->db->from('sales_order so');
        $this->db->join('pelanggan p', 'p.id_pelanggan = so.id_pelanggan', 'left');
        $this->db->join('produk pr', 'pr.id_produk = so.id_produk', 'left');
        $this->db->join('sales s', 's.id_sales = so.id_sales', 'left');
        $this->db->order_by('so.id_order', 'DESC');
        return $this->db->get()->result();
    }

    public function updateOrderStatus($id_order, $status_order) {
        $this->db->where('id_order', $id_order);
        return $this->db->update('sales_order', ['status' => $status_order]);
    }

    public function delete_order($id_order) {
        $this->db->where('id_order', $id_order);
        return $this->db->delete('sales_order');
    }

      public function jumlah_pesanan() {
    return $this->db->count_all('sales_order'); 
}

    public function restoreStock($id_order) {
    $this->db->select('id_produk, jumlah');
    $this->db->from('sales_order');
    $this->db->where('id_order', $id_order);
    $order = $this->db->get()->row();

    if ($order) {
        $this->db->set('stok', 'stok + ' . (int)$order->jumlah, FALSE);
        $this->db->where('id_produk', $order->id_produk);
        $this->db->update('produk');
    }
}

}
