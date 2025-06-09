<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Cek user sudah login dan role harus admin
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
    }

    public function dashboard() {

    $this->load->model('Produk_model');
    $this->load->model('Pelanggan_model');
    $this->load->model('Sales_model');
    $this->load->model('Pesanan_model'); 

    $data['total_produk'] = $this->Produk_model->jumlah_produk();
    $data['total_pelanggan'] = $this->Pelanggan_model->jumlah_pelanggan();
    $data['total_sales'] = $this->Sales_model->jumlah_sales();
    $data['total_pesanan'] = $this->Pesanan_model->jumlah_pesanan();

        $data['content'] = '<h1>Selamat datang di Dashboard Admin</h1>';
        $this->load->view('templates/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
        
    }
}
