<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct() {
        parent::__construct();

// Cek apakah user sudah login
    if (!$this->session->userdata('logged_in')) {
        redirect('auth/login');
    }


        $this->load->model('Laporan_model');
        $this->load->model('Sales_model');
        $this->load->model('Produk_model');
        $this->load->library('pdf'); // Dompdf
    }

    public function index() {
        $data['sales'] = $this->Sales_model->get_all();
        $data['produk'] = $this->Produk_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('manager/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function generate() {
        $id_sales  = $this->input->get('id_sales');
        $id_produk = $this->input->get('id_produk');
        $start_date = $this->input->get('start_date');
        $end_date   = $this->input->get('end_date');

        // Validasi wajib input tanggal
        if (empty($start_date) || empty($end_date)) {
            $this->session->set_flashdata('error', 'Silakan pilih tanggal mulai dan tanggal akhir terlebih dahulu.');
            redirect('laporan');
            return;
        }

        // Perluas waktu filter untuk satu hari penuh
        $start_date_full = $start_date . ' 00:00:00';
        $end_date_full   = $end_date . ' 23:59:59';

        // Ambil data laporan sesuai filter
        $data['laporan'] = $this->Laporan_model->get_laporan($id_sales, $id_produk, $start_date_full, $end_date_full);
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;

        // Setup PDF
        $this->pdf->set_paper('A4', 'landscape');

        $html = $this->load->view('manager/laporan_pdf', $data, true);

        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream("laporan_penjualan.pdf", array("Attachment" => 0));
    }
}
