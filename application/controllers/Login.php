<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        $this->load->model('login_model');
    }

	public function index() {
        if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
        $this->load->view('backend/login');
    }

    function check_login() {
        $this->login_model->adminLoginFunction();
        $this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
        redirect(base_url() . 'admin/dashboard', 'refresh');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url(). 'login', 'refresh');
    }
}
