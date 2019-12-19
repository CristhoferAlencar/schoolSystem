<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login_model extends CI_Model { 
	
	function __construct() {
        parent::__construct();
    }

    function adminLoginFunction() {

        $email = $this->input->post('email');			
        $password = $this->input->post('password');	
        $credential = array('email' => $email, 'password' => sha1($password));	

        $query = $this->db->get_where('admin', $credential);

        if ($query->num_rows() > 0) {
            $row = $query->row();
            
            $this->session->set_userdata('login_type', 'admin');
            $this->session->set_userdata('admin_login', '1');
            $this->session->set_userdata('admin_id', $row->admin_id);
            $this->session->set_userdata('login_user_id', $row->admin_id);
            $this->session->set_userdata('name', $row->name);
        } elseif ($query->num_rows() == 0) {
            $this->session->set_flashdata('error_message', get_phrase('Invalid Login Detail'));
            redirect(base_url() . 'login', 'refresh');
        }

    }
	
}
