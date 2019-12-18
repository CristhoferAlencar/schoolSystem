<?php
/**
 * An open source application development framework for PHP
 * 
 * @package	CodeIgniter
 * @author	Cristhofer Alencar
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_phrase')){
    
    function get_phrase($phrase = ''){
        $CI =& get_instance();
        $CI->load->database();
        if($current_language = $CI->session->userdata('language')){

        } else{
            $current_language = $CI->db->get_where('settings', array('type' => 'language'))->row()->description;
        }

        if($current_language == ''){
            $current_language = 'english';
            $CI->session->set_userdata('current_language', $current_language);
        }

        // insert blank phrases initially and populating the language db
        // $check_phrase = $CI->db->get_where('language', array('phrase' => $phrase))->row()->phrase;
        // if($check_phrase != $phrase){
        //     $CI->db->insert('language', array('phrase' => $phrase));
        // }

        // delete already phrases
        // $check_phrase = $CI->db->get_where('language', array('phrase' => $phrase))->row()->phrase;
        // if($check_phrase == 'Teachers'){
        //     $CI->db->delete('language', array('phrase' => $phrase));
        // }

        // query for finding the phrase from 'language' table
        $query = $CI->db->get_where('language', array('phrase' => $phrase));
        $row   = $query->row();

        // return the current sessioned language field of according phrase, else return uppercase spaced word
        if(isset($row->$current_language) && $row->$current_language != ""){
            return $row->$current_language;
        } else{
            return ucwords(str_replace('_', ' ', $phrase));
        }
	}
}