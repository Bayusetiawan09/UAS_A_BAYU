<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Cek apakah user sudah login
    if (!$this->session->userdata('logged_in')) {
        redirect('auth/login');
    }
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('pelanggan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('pelanggan/tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama'       => $this->input->post('nama'),
                'alamat'     => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
            ];

            $this->Pelanggan_model->insert($data);
            $this->session->set_flashdata('success', 'Pelanggan berhasil ditambahkan.');
            redirect('pelanggan');
        }
    }

    public function edit($id) {
        $data['pelanggan'] = $this->Pelanggan_model->getById($id);
        if (!$data['pelanggan']) show_404();
        $this->load->view('templates/header');
        $this->load->view('pelanggan/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = [
                'nama'       => $this->input->post('nama'),
                'alamat'     => $this->input->post('alamat'),
                'no_telepon' => $this->input->post('no_telepon'),
            ];

            $this->Pelanggan_model->update($id, $data);
            $this->session->set_flashdata('success', 'Pelanggan berhasil diupdate.');
            redirect('pelanggan');
        }
    }

    public function hapus($id) {
        $this->Pelanggan_model->delete($id);
        $this->session->set_flashdata('success', 'Pelanggan berhasil dihapus.');
        redirect('pelanggan');
    }
}
