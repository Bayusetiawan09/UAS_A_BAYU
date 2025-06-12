<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['produk'] = $this->Produk_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('produk/tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok'),
                // created_at otomatis oleh DB
            ];

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');
            redirect('produk');
        }
    }

    public function edit($id) {
        $data['produk'] = $this->Produk_model->getById($id);
        if (!$data['produk']) show_404();
        $this->load->view('templates/header');
        $this->load->view('produk/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('kode_produk', 'Kode Produk', 'required');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'kode_produk' => $this->input->post('kode_produk'),
                'nama_produk' => $this->input->post('nama_produk'),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok'),
            ];

            $this->Produk_model->update($id, $data);
            $this->session->set_flashdata('success', 'Produk berhasil diupdate.');
            redirect('produk');
        }
    }

    public function hapus($id) {
        $this->Produk_model->delete($id);
        $this->session->set_flashdata('success', 'Produk berhasil dihapus.');
        redirect('produk');
    }
}
