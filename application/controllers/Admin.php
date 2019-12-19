<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller { 

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');	//Load library for session
				
		/*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }

    // Default function, redirects to login page if no admin logged in yet
    public function index() {
        if($this->session->userdata('admin_login') != 1) redirect(base_url(). 'login', 'refresh');
        if($this->session->userdata('admin_login') == 1) redirect(base_url(). 'admin/dashboard', 'refresh');
    }

    // Admin dashboard code to redirect to admin page if successfull login
    function dashboard() {
        if ($this->session->userdata('admin_login') != 1) redirect(base_url(), 'refresh');
        
        $page_data['page_name'] = 'home/index';
        $page_data['page_title'] =  get_phrase('Admin Dashboard');
        $this->load->view('backend/base', $page_data);
    }

}