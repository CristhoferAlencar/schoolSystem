<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller { 

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');	//Load library for session
        $this->load->model('crud_model');
				
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

    function manage_profile($param1 = '', $param2 ='', $param3 =''){
        if($this->session->userdata('admin_login') != 1) 
            redirect(base_url(), 'refresh');
        
        if($param1 == 'update') {
            $data['name']   =   $this->input->post('name');
            $data['email']  =   $this->input->post('email');
    
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('Info Updated'));
            redirect(base_url() . 'admin/manage_profile', 'refresh');
        }
    
        if($param1 == 'change_password') {
            $data['new_password']           =   sha1($this->input->post('new_password'));
            $data['confirm_new_password']   =   sha1($this->input->post('confirm_new_password'));
    
            if ($data['new_password'] == $data['confirm_new_password']) {
               $this->db->where('admin_id', $this->session->userdata('admin_id'));
               $this->db->update('admin', array('password' => $data['new_password']));
               $this->session->set_flashdata('flash_message', get_phrase('Password Changed'));
            } else{
                $this->session->set_flashdata('error_message', get_phrase('Type the same password'));
            }
    
            redirect(base_url() . 'admin/manage_profile', 'refresh');
        }
    
        $page_data['page_name']     = 'profile/update-profile';
        $page_data['page_title']    = get_phrase('My Profile');
        $page_data['edit_profile']  = $this->db->get_where('admin', array('admin_id' => $this->session->userdata('admin_id')))->result_array();
        $this->load->view('backend/base', $page_data);
    }

    function enquiry_category($param1 = '', $param2 ='', $param3 ='') {
        if($param1 == 'insert'){
            $this->crud_model->enquiry_category();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            
            redirect(base_url(). 'admin/enquiry_category', 'refresh');
        }
    
        if($param1 == 'update'){
            $this->crud_model->update_club($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
           
            redirect(base_url(). 'admin/enquiry_category', 'refresh');
        }
    
        if($param1 == 'delete'){
            $this->crud_model->delete_category($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            
            redirect(base_url(). 'admin/enquiry_category', 'refresh');
        }
    
        $page_data['page_name']     = 'enquiries/enquiry_category';
        $page_data['page_title']    = get_phrase('Manage Category');
        $page_data['enquiry_category']  = $this->db->get('enquiry_category')->result_array();
        $this->load->view('backend/base', $page_data);
    
    }

    function list_enquiry($param1 = '', $param2 ='', $param3 ='') {

        if($param1 == 'delete'){
            $this->db->where('enquiry_id', $param2);
            $this->db->delete('enquiry');
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            
            redirect(base_url(). 'admin/list_enquiry', 'refresh');
        }

        $page_data['page_name']     = 'enquiries/list_enquiry';
        $page_data['page_title']    = get_phrase('All Enquiries');
        $page_data['select_enquiry']  = $this->db->get('enquiry')->result_array();
        
        $this->load->view('backend/base', $page_data);
    }

    function club($param1 = '', $param2 ='', $param3 ='') {

        if($param1 == 'insert') {
            $page_data['club_name']  =   $this->input->post('club_name');
            $page_data['description']   =   $this->input->post('desc');
            $page_data['date']      =   $this->input->post('date');
    
            $this->db->insert('club', $page_data);
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            
            redirect(base_url(). 'admin/club', 'refresh');
        }

        if($param1 == 'update') {
            $page_data['club_name']  =   $this->input->post('club_name');
            $page_data['description']   =   $this->input->post('desc');
            $page_data['date']      =   $this->input->post('date');
    
            $this->db->where('club_id', $param2);
            $this->db->update('club', $page_data);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            
            redirect(base_url(). 'admin/club', 'refresh');
        }


        if($param1 == 'delete'){
            $this->db->where('club_id', $param2);
            $this->db->delete('club');
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            
            redirect(base_url(). 'admin/club', 'refresh');
        }

        $page_data['page_name']     = 'club/index';
        $page_data['page_title']    = get_phrase('Manage Club');
        $page_data['select_club']  = $this->db->get('club')->result_array();
        
        $this->load->view('backend/base', $page_data);
    }

    function circular($param1 = '', $param2 = '', $param3 = '') {
        if ($param1 == 'insert'){
            $this->crud_model->insert_circular();
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
            
            redirect(base_url(). 'admin/circular', 'refresh');
        }

        if($param1 == 'update') {
            $this->crud_model->update_circular($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
            
            redirect(base_url(). 'admin/circular', 'refresh');
        }

        if($param1 == 'delete'){
            $this->crud_model->delete_circular($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
            
            redirect(base_url(). 'admin/circular', 'refresh');
        }

        $page_data['page_name']         = 'circular/index';
        $page_data['page_title']        = get_phrase('Manage Circular');
        $page_data['select_circular']   = $this->db->get('circular')->result_array();
        
        $this->load->view('backend/base', $page_data);
    }

    function parent($param1 = '', $param2 = '', $param3 = '') {

        if ($param1 == 'insert') {
            $this->crud_model->insert_parent();
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
            
            redirect(base_url(). 'admin/parent', 'refresh');
        }

        if($param1 == 'update') {
            $this->crud_model->update_parent($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
            
            redirect(base_url(). 'admin/parent', 'refresh');
        }


        if($param1 == 'delete') {
            $this->crud_model->delete_parent($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
           
            redirect(base_url(). 'admin/parent', 'refresh');
        }

        $page_data['page_name']       = 'parent/index';
        $page_data['page_title']      = get_phrase('Manage Parent');
        $page_data['select_parent']   = $this->db->get('parent')->result_array();
        
        $this->load->view('backend/base', $page_data);
    }

}