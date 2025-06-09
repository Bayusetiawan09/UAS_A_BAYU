<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek apakah user sudah login
    if (!$this->session->userdata('logged_in')) {
        redirect('auth/login');
    }
        $this->load->model('Sales_order_model');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'sales') {
            redirect('auth/login');
        }
    }

    public function index() {
        $id_sales = $this->session->userdata('id_sales');
        if (!$id_sales) {
            redirect('auth/login');
        }

        $data['orders'] = $this->Sales_order_model->getOrdersBySalesId($id_sales);

        $this->load->view('templates/header');
        $this->load->view('sales_order/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
    $id_sales = $this->session->userdata('id_sales');
    if (!$id_sales) {
        redirect('auth/login');
    }

    $this->load->library('form_validation');

    $this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required');
    $this->form_validation->set_rules('id_produk', 'Produk', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|integer|greater_than[0]');

    if ($this->form_validation->run() == FALSE) {
        $data['pelanggan'] = $this->Sales_order_model->getAllPelanggan();
        $data['produk'] = $this->Sales_order_model->getAllProduk();

        $this->load->view('templates/header');
        $this->load->view('sales_order/tambah', $data);
        $this->load->view('templates/footer');
    } else {
        
        $id_pelanggan = $this->input->post('id_pelanggan');
        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');

        $stok = $this->Sales_order_model->getStokProduk($id_produk);
        if ($stok < $jumlah) {
            $this->session->set_flashdata('error', 'Stok produk tidak cukup. Stok tersedia: ' . $stok);
            redirect('sales_order/tambah');
        }

        $harga_satuan = $this->Sales_order_model->getHargaProduk($id_produk);

        $input = [
            'id_sales' => $id_sales,
            'id_pelanggan' => $id_pelanggan,
            'id_produk' => $id_produk,
            'jumlah' => $jumlah,
            'harga_total' => $harga_satuan * $jumlah,  
            'status' => 'draft',               
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Sales_order_model->insertOrder($input);

        $this->session->set_flashdata('success', 'Order berhasil ditambahkan.');
        redirect('sales_order');
    }
}
}