<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Cek apakah user sudah login
    if (!$this->session->userdata('logged_in')) {
        redirect('auth/login');
    }



        $this->load->model('Pesanan_model');
    }

    public function index() {
        $data['orders'] = $this->Pesanan_model->getAllOrdersWithSales();
        $this->load->view('templates/header');
        $this->load->view('pesanan/index', $data);
        $this->load->view('templates/footer');
    }

   public function update_status() {
    $id_order = $this->input->post('id_order');
    $status_order = $this->input->post('status_order');

    $valid_status = ['draft', 'dikirim', 'selesai', 'dibatalkan'];

    if (!in_array($status_order, $valid_status)) {
        $this->session->set_flashdata('error', 'Status tidak valid.');
        redirect('pesanan');
        return;
    }

    if ($status_order === 'dibatalkan') {
        $this->Pesanan_model->restoreStock($id_order);
    }

    $update = $this->Pesanan_model->updateOrderStatus($id_order, $status_order);

    if ($update) {
        $this->session->set_flashdata('success', 'Status pesanan berhasil diperbarui.');
    } else {
        $this->session->set_flashdata('error', 'Gagal memperbarui status pesanan.');
    }

    redirect('pesanan');
}


    public function delete($id_order) {
        $this->Pesanan_model->delete_order($id_order);
        $this->session->set_flashdata('success', 'Pesanan berhasil dihapus.');
        redirect('pesanan');
    }
}
