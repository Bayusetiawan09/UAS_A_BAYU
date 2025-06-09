<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order_model extends CI_Model {

    public function getIdSalesByUserId($user_id) {
        $this->db->select('id_sales');
        $this->db->where('id_sales', $user_id);
        $query = $this->db->get('sales');

        if ($query->num_rows() > 0) {
            return $query->row()->id_sales;
        } else {
            return null;
        }
    }

    public function getOrdersBySalesId($id_sales) {
        $this->db->select('sales_order.*, pelanggan.nama, produk.nama_produk, produk.harga, sales_order.created_at');
        $this->db->from('sales_order');
        $this->db->join('pelanggan', 'pelanggan.id_pelanggan = sales_order.id_pelanggan', 'left');
        $this->db->join('produk', 'produk.id_produk = sales_order.id_produk', 'left');
        $this->db->where('sales_order.id_sales', $id_sales);
        return $this->db->get()->result();
            }

    
public function getAllPelanggan() {
    return $this->db->get('pelanggan')->result();
}

public function getHargaProduk($id_produk) {
    $this->db->select('harga');
    $this->db->where('id_produk', $id_produk);
    $produk = $this->db->get('produk')->row();
    return $produk ? $produk->harga : 0;
}


    public function getAllProduk() {
        return $this->db->get('produk')->result();
    }

    public function getStokProduk($id_produk) {
        $this->db->select('stok');
        $this->db->where('id_produk', $id_produk);
        $produk = $this->db->get('produk')->row();
        return $produk ? $produk->stok : 0;
    }

    public function insertOrder($data) {
        $this->db->trans_start();

        $this->db->insert('sales_order', $data);

        $this->db->set('stok', 'stok - ' . (int)$data['jumlah'], FALSE);
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->update('produk');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function jumlah_pesanan_by_sales($id_sales) {
    $this->db->where('id_sales', $id_sales);
    return $this->db->count_all_results('sales_order');
}


}
