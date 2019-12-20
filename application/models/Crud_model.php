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
            $image_url = base_url() . 'uploads/user.jpg';

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

}

