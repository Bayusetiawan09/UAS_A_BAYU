<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Sales_order_model');
        $this->load->library('form_validation');
    }

    public function register(){
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
    }

    public function login(){
        $this->load->view('auth/login');
    }

    public function process_register(){
        $this->form_validation->set_rules('username','Username','required|is_unique[users.username]');
        $this->form_validation->set_rules('password','Password','required|min_length[6]');
        $this->form_validation->set_rules('confirm_password','Konfirmasi Password','required|matches[password]');
        $this->form_validation->set_rules('role','Role','required|in_list[admin,sales,manager]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role'     => $this->input->post('role'),
            ];

            if($this->User_model->insert_user($data)){
                $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Pendaftaran gagal. Silakan coba lagi.');
                redirect('auth/register');
            }
        }
    }

    public function process_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->check_user($username, $password);

        if($user){
            $this->session->set_userdata([
                'user_id'  => $user->id,
                'username' => $user->username,
                'role'     => $user->role,
                'logged_in'=> TRUE
            ]);

            if ($user->role == 'sales') {
                $id_sales = $this->Sales_order_model->getIdSalesByUserId($user->id);
                $this->session->set_userdata('id_sales', $id_sales);
            }

            $this->session->set_flashdata('welcome', 'Selamat datang, ' . $user->username . '!');
            $this->redirect_by_role($user->role);
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah.');
            redirect('auth/login');
        }
    }

    private function redirect_by_role($role){
        switch($role){
            case 'admin':
                redirect('admin/dashboard');
                break;
            case 'sales':
                redirect('sales/dashboard');
                break;
            case 'manager':
                redirect('manager/dashboard');
                break;
            default:
                redirect('auth/login');
        }
    }

    public function logout(){
        $this->session->unset_userdata(['user_id', 'username', 'role', 'logged_in', 'id_sales']);
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
