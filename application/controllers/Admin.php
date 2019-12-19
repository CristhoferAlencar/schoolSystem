<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller { 

    function __construct() {
        parent::__construct();
        $this->load->database();                        
        $this->load->library('session');					  
               
    }

    public function index() {
        if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
    }

    function dashboard() {
        if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        
       	$page_data['page_name'] = 'home/index';
        $page_data['page_title'] =  get_phrase('Admin Dashboard');
        $this->load->view('backend/base', $page_data);
    }

}
