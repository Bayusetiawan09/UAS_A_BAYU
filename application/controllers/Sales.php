<?php
class Sales extends CI_Controller {

  public function __construct() {
    parent::__construct();
    // Cek user sudah login dan role harus admin
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'sales') {
            redirect('auth/login');
        }
    $this->load->model('Sales_model');
    $this->load->library('session');
    $this->load->library('form_validation');
  }

  public function dashboard() {

    $id_sales = $this->session->userdata('id_sales');
    $this->load->model('Sales_order_model');

    $data['total_pesanan_sales'] = $this->Sales_order_model->jumlah_pesanan_by_sales($id_sales);
    $this->load->view('templates/header');
    $this->load->view('sales/dashboard', $data);
    $this->load->view('templates/footer');
  }

  public function index() {
    $this->db->select('sales.*, users.username');
    $this->db->from('sales');
    $this->db->join('users', 'users.id = sales.id_sales', 'left');
    $this->db->where('users.role', 'sales');
    $query = $this->db->get();
    $data['sales'] = $query->result();
    $this->load->view('templates/header');
    $this->load->view('sales/index', $data);
    $this->load->view('templates/footer');
  }

  public function tambah() {
    $used_ids = $this->db->select('id_sales')->get('sales')->result_array();
    $used_ids = array_column($used_ids, 'id_sales'); 

    $this->db->where('role', 'sales');
    if (!empty($used_ids)) {
        $this->db->where_not_in('id', $used_ids);
    }
    $data['users_sales'] = $this->db->get('users')->result();

    $this->form_validation->set_rules('id_sales', 'Username Sales', 'required');
    $this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required');
    $this->form_validation->set_rules('id_sales_person', 'ID Sales Person', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('sales/tambah', $data);
        $this->load->view('templates/footer');
    } else {
        $this->Sales_model->insert([
            'id_sales' => $this->input->post('id_sales'),
            'nama_sales' => $this->input->post('nama_sales'),
            'id_sales_person' => $this->input->post('id_sales_person'),
        ]);
        $this->session->set_flashdata('success', 'Sales berhasil ditambahkan.');
        redirect('sales');
    }
  }

  public function edit($id) {
    $data['sales'] = $this->Sales_model->getById($id);

    $this->form_validation->set_rules('nama_sales', 'Nama Sales', 'required');
    $this->form_validation->set_rules('id_sales_person', 'ID Sales Person', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('templates/header');
      $this->load->view('sales/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $this->Sales_model->update($id, [
        'nama_sales' => $this->input->post('nama_sales'),
        'id_sales_person' => $this->input->post('id_sales_person')
      ]);
      $this->session->set_flashdata('success', 'Sales berhasil diperbarui.');
      redirect('sales');
    }
  }

  public function hapus($id) {
    $this->Sales_model->delete($id);
    $this->session->set_flashdata('success', 'Sales berhasil dihapus.');
    redirect('sales');
  }

}
