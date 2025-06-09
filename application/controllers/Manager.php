<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manager extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'manager') {
            redirect('auth/login');
        }
    }

    public function dashboard() {
        $data['content'] = '<h1>Selamat datang di Dashboard Manager</h1>';
        $this->load->view('templates/header');
        $this->load->view('manager/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
