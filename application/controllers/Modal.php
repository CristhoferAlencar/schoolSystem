<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller { 

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

    public function index() {
    
    }

    function popup ($page_name = '', $param2 = '', $param3 = '') {
        $account_type = $this->session->userdata('login_type');
        $page_data['param2']    =   $param2;
        $page_data['param3']    =   $param3;

        $page_name = explode('-', $page_name);

        $this->load->view('backend/' . $account_type . '/' . $page_name[0] . '/' . $page_name[1] . '.php', $page_data);
    }
}