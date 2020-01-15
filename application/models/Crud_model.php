<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model { 
	
	function __construct() {
        parent::__construct();
    }

    function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        
        foreach ($result as $row)
            return $row[$field];
    }

    function get_image_url($type = '', $id = '') {
        if(file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/defaults/user-avatar.png';

        return $image_url;
    }

    function enquiry_category() {
        $page_data['category']  =   $this->input->post('category');
        $page_data['purpose']   =   $this->input->post('purpose');
        $page_data['whom']      =   $this->input->post('whom');
        
        $this->db->insert('enquiry_category', $page_data);
    }

    function update_club($param2) {
        $page_data['category']  =   $this->input->post('category');
        $page_data['purpose']   =   $this->input->post('purpose');
        $page_data['whom']      =   $this->input->post('whom');
        
        $this->db->where('enquiry_category_id', $param2);
        $this->db->update('enquiry_category', $page_data);
    }

    function delete_category($param2) {
        $this->db->where('enquiry_category_id', $param2);
        $this->db->delete('enquiry_category');
    }

    function insert_circular() {
        $page_data['title']         =   $this->input->post('title');
        $page_data['reference']     =   $this->input->post('reference');
        $page_data['content']       =   $this->input->post('content');
        $page_data['date']          =   $this->input->post('date');

        $this->db->insert('circular', $page_data);
    }

    function update_circular($param2) {
        $page_data['title']         =   $this->input->post('title');
        $page_data['reference']     =   $this->input->post('reference');
        $page_data['content']       =   $this->input->post('content');
        $page_data['date']          =   $this->input->post('date');

        $this->db->where('circular_id', $param2);
        $this->db->update('circular', $page_data);
    }

    function delete_circular($param2) {
        $this->db->where('circular_id', $param2);
        $this->db->delete('circular');
    }

    function insert_parent() {
        $page_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
			'password' => sha1($this->input->post('password')),
			'phone' => $this->input->post('phone'),
        	'address' => $this->input->post('address'),
        	'profession' => $this->input->post('profession'),
        );

        $this->db->insert('parent', $page_data);
    }

    function update_parent($param2) {
        $page_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
        	'address' => $this->input->post('address'),
        	'profession' => $this->input->post('profession'),
        );

        $this->db->where('parent_id', $param2);
        $this->db->update('parent', $page_data);
    }

    function delete_parent($param2) {
        $this->db->where('parent_id', $param2);
        $this->db->delete('parent');
    }

    function insert_librarian() {
        $page_data = array(		// array data that postulate the input fileds
            'name' 				=> $this->input->post('name'),
            'librarian_number' 	=> $this->input->post('librarian_number'),
            'birthday' 			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            'email' 			=> $this->input->post('email'),
            
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status'	=> $this->input->post('marital_status'),
            'file_name'	        => $_FILES["file_name"]["name"],
            'password' 			=> sha1($this->input->post('password'))
        );
            
        $data['file_name'] = $_FILES["file_name"]["name"];
		$data['email'] = $this->input->post('email');
		$check_email = $this->db->get_where('librarian', array('email' => $data['email']))->row()->email;	// checking if email exists in database
        
        if($check_email != null) {
            $this->session->set_flashdata('error_message', get_phrase('Email Already Exist'));
            
            redirect(base_url() . 'admin/librarian/', 'refresh');
		} else {
            $this->db->insert('librarian', $page_data);
            $librarian_id = $this->db->insert_id();
		
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/librarian_image/" . $_FILES["file_name"]["name"]);	// upload files
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $librarian_id . '.jpg');			// image with user ID
        }
    }

    function update_librarian($param2) {
        $page_data = array(			// array starts from here
            'name'				=> $this->input->post('name'),
            'birthday'			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            
            'email' 			=> $this->input->post('email'),
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status' 	=> $this->input->post('marital_status')
        );

        $this->db->where('librarian_id', $param2);
        $this->db->update('librarian', $page_data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/librarian_image/' . $param2 . '.jpg');            
    }

    function delete_librarian($param2) {
        $this->db->where('librarian_id', $param2);
        $this->db->delete('librarian');
    }

    function insert_accountant() {
        $page_data = array(		// array data that postulate the input fileds
            'name' 				=> $this->input->post('name'),
            'accountant_number'	=> $this->input->post('accountant_number'),
            'birthday' 			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            'email' 			=> $this->input->post('email'),
            
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status'	=> $this->input->post('marital_status'),
            'password' 			=> sha1($this->input->post('password'))
        );
            
        $page_data['file_name'] = $_FILES["file_name"]["name"];
		$page_data['email'] = $this->input->post('email');
		$check_email = $this->db->get_where('accountant', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
		if($check_email != null) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            
            redirect(base_url() . 'admin/accountant/', 'refresh');
		} else {
            $this->db->insert('accountant', $page_data);
            $librarian_id = $this->db->insert_id();
		
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/accountant_image/" . $_FILES["file_name"]["name"]);	// upload files
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $librarian_id . '.jpg');			// image with user ID
        }
    }

    function update_accountant($param2) {
        $page_data = array(			// array starts from here
            'name'				=> $this->input->post('name'),
            'birthday'			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            
            'email' 			=> $this->input->post('email'),
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status' 	=> $this->input->post('marital_status')
        );

        $this->db->where('accountant_id', $param2);
        $this->db->update('accountant', $page_data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/accountant_image/' . $param2 . '.jpg');            
    }

    function delete_accountant($param2) {
        $this->db->where('accountant_id', $param2);
        $this->db->delete('accountant');
    }

    function insert_hostel() {
        $page_data = array(		// array data that postulate the input fileds
            'name' 				=> $this->input->post('name'),
            'hostel_number' 	=> $this->input->post('hostel_number'),
            'birthday' 			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            'email' 			=> $this->input->post('email'),
            
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status'	=> $this->input->post('marital_status'),
            'password' 			=> sha1($this->input->post('password'))
        );
            
        $page_data['file_name'] = $_FILES["file_name"]["name"];
		$page_data['email'] = $this->input->post('email');
		$check_email = $this->db->get_where('hostel', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
		if($check_email != null) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            
            redirect(base_url() . 'admin/hostel/', 'refresh');
		} else {
            $this->db->insert('hostel', $page_data);
            $hostel_id = $this->db->insert_id();
		
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/hostel_image/" . $_FILES["file_name"]["name"]);	// upload files
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hostel_image/' . $hostel_id . '.jpg');			// image with user ID
        }
    }

    
    function update_hostel($param2) {
        $page_data = array(			// array starts from here
            'name'				=> $this->input->post('name'),
            'birthday'			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            
            'email' 			=> $this->input->post('email'),
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status' 	=> $this->input->post('marital_status')
        );

        $this->db->where('hostel_id', $param2);
        $this->db->update('hostel', $page_data);
        
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hostel_image/' . $param2 . '.jpg');            
    }

    function delete_hostel($param2) {
        $this->db->where('hostel_id', $param2);
        $this->db->delete('hostel');
    }

    function insert_hrm(){
        $page_data = array(		// array data that postulate the input fileds
            'name' 				=> $this->input->post('name'),
            'hrm_number' 	    => $this->input->post('hrm_number'),
            'birthday' 			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            'email' 			=> $this->input->post('email'),
            
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status'	=> $this->input->post('marital_status'),
            'password' 			=> sha1($this->input->post('password'))
        );
            
        $page_data['file_name'] = $_FILES["file_name"]["name"];
		$page_data['email'] = $this->input->post('email');
		$check_email = $this->db->get_where('hrm', array('email' => $page_data['email']))->row()->email;	// checking if email exists in database
		if($check_email != null) {
            $this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
            
            redirect(base_url() . 'admin/hrm/', 'refresh');
		} else {
            $this->db->insert('hrm', $page_data);
            $hrm_id = $this->db->insert_id();
		
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/hrm_image/" . $_FILES["file_name"]["name"]);	// upload files
        	move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hrm_image/' . $hrm_id . '.jpg');			// image with user ID
        }
    }


    function update_hrm($param2) {
        $page_data = array(			// array starts from here
            'name'				=> $this->input->post('name'),
            'birthday'			=> $this->input->post('birthday'),
            'sex' 				=> $this->input->post('sex'),
            'religion' 			=> $this->input->post('religion'),
            'blood_group' 		=> $this->input->post('blood_group'),
            'address' 			=> $this->input->post('address'),
            'phone' 			=> $this->input->post('phone'),
            'email' 			=> $this->input->post('email'),
            
            'facebook' 			=> $this->input->post('facebook'),
            'twitter' 			=> $this->input->post('twitter'),
            'googleplus' 		=> $this->input->post('googleplus'),
            'linkedin' 			=> $this->input->post('linkedin'),
            'qualification' 	=> $this->input->post('qualification'),
            'marital_status' 	=> $this->input->post('marital_status')
        );

        $this->db->where('hrm_id', $param2);
        $this->db->update('hrm', $page_data);
       
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hrm_image/' . $param2 . '.jpg');            
    }

    function delete_hrm($param2) {
        $this->db->where('hrm_id', $param2);
        $this->db->delete('hrm');
    }

    function system_logo(){
        move_uploaded_file($_FILES['system_logo']['tmp_name'], 'uploads/logo.png');
    }

    function update_settings() {
        $data['description']    =   $this->input->post('system_name');
        $this->db->where('type', 'system_name');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('system_title');
        $this->db->where('type', 'system_title');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('address');
        $this->db->where('type', 'address');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('phone');
        $this->db->where('type', 'phone');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('paypal_email');
        $this->db->where('type', 'paypal_email');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('currency');
        $this->db->where('type', 'currency');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('system_email');
        $this->db->where('type', 'system_email');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('language');
        $this->db->where('type', 'language');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('text_align');
        $this->db->where('type', 'text_align');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('running_session');
        $this->db->where('type', 'session');
        $this->db->update('settings', $data);

        $data['description']    =   $this->input->post('footer');
        $this->db->where('type', 'footer');
        $this->db->update('settings', $data);
    }

    function update_theme() {
        $data['description']    =   $this->input->post('skin_colour');
        $this->db->where('type', 'skin_colour');
        $this->db->update('settings', $data);
    }

}

