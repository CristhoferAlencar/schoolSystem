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

    function librarian($param1 = '', $param2 = '', $param3 = '') {

        if ($param1 == 'insert'){
            $this->crud_model->insert_librarian();
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
            
            redirect(base_url(). 'admin/librarian', 'refresh');
        }

        if($param1 == 'update'){
            $this->crud_model->update_librarian($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
            
            redirect(base_url(). 'admin/librarian', 'refresh');
        }

        if($param1 == 'delete'){
            $this->crud_model->delete_librarian($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
            
            redirect(base_url(). 'admin/librarian', 'refresh');
        }

        $page_data['page_name']          = 'librarian/index';
        $page_data['page_title']         = get_phrase('Manage Librarian');
        $page_data['select_librarian']   = $this->db->get('librarian')->result_array();
        
        $this->load->view('backend/base', $page_data);
    }

    function accountant($param1 = '', $param2 = '', $param3 = '') {

        if ($param1 == 'insert') {
            $this->crud_model->insert_accountant();
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
            
            redirect(base_url(). 'admin/accountant', 'refresh');
        }


        if($param1 == 'update') {
            $this->crud_model->update_accountant($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
            
            redirect(base_url(). 'admin/accountant', 'refresh');
        }

        if($param1 == 'delete'){
            $this->crud_model->delete_accountant($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
            
            redirect(base_url(). 'admin/accountant', 'refresh');
        }

        $page_data['page_name']         = 'accountant/index';
        $page_data['page_title']        = get_phrase('Manage Accountant');
        $page_data['select_accountant']   = $this->db->get('accountant')->result_array();
        $this->load->view('backend/base', $page_data);
    }

    function hostel($param1 = '', $param2 = '', $param3 = '') {

        if ($param1 == 'insert'){
            $this->crud_model->insert_hostel();
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
            
            redirect(base_url(). 'admin/hostel', 'refresh');
        }


        if($param1 == 'update'){
            $this->crud_model->update_hostel($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
            
            redirect(base_url(). 'admin/hostel', 'refresh');
        }

        if($param1 == 'delete'){
            $this->crud_model->delete_hostel($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
            
            redirect(base_url(). 'admin/hostel', 'refresh');
        }

        $page_data['page_name']         = 'hostel/index';
        $page_data['page_title']        = get_phrase('Manage Hostel');
        $page_data['select_hostel']     = $this->db->get('hostel')->result_array();
        $this->load->view('backend/base', $page_data);
    }

    function hrm($param1 = '', $param2 = '', $param3 = '') {

        if ($param1 == 'insert'){
            $this->crud_model->insert_hrm();
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
           
            redirect(base_url(). 'admin/hrm', 'refresh');
        }

        if($param1 == 'update'){
            $this->crud_model->update_hrm($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
            
            redirect(base_url(). 'admin/hrm', 'refresh');
        }

        if($param1 == 'delete'){
            $this->crud_model->delete_hrm($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
            
            redirect(base_url(). 'admin/hrm', 'refresh');
        }

        $page_data['page_name']         = 'hrm/index';
        $page_data['page_title']        = get_phrase('Manage HRM');
        $page_data['select_hrm']        = $this->db->get('hrm')->result_array();
        $this->load->view('backend/base', $page_data);
    }

    function alumni($param1 = '', $param2 = '', $param3 = '') {

        if ($param1 == 'insert'){
            $this->alumni_model->insert_alumni();
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully saved'));
            
            redirect(base_url(). 'admin/alumni', 'refresh');
        }

        if($param1 == 'update') {
            $this->alumni_model->update_alumni($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully updated'));
            
            redirect(base_url(). 'admin/alumni', 'refresh');
        }

        if($param1 == 'delete') {
            $this->alumni_model->delete_alumni($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data successfully deleted'));
            
            redirect(base_url(). 'admin/alumni', 'refresh');
        }

        $page_data['page_name']         = 'alumni/index';
        $page_data['page_title']        = get_phrase('Manage Alumni');
        $page_data['select_alumni']        = $this->db->get('alumni')->result_array();
        $this->load->view('backend/base', $page_data);
    }

    function teacher ($param1 = '', $param2 ='', $param3 =''){

        if($param1 == 'insert'){
            $this->teacher_model->insetTeacherFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'admin/teacher', 'refresh');
        }

        if($param1 == 'update'){
            $this->teacher_model->updateTeacherFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/teacher', 'refresh');
        }


        if($param1 == 'delete'){
            $this->teacher_model->deleteTeacherFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/teacher', 'refresh');
    
            }

        $page_data['page_name']     = 'teacher/index';
        $page_data['page_title']    = get_phrase('Manage Teacher');
        $page_data['select_teacher']  = $this->db->get('teacher')->result_array();
        $this->load->view('backend/base', $page_data);

    }

    function get_designation($department_id = null){

        $designation = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach($designation as $key => $row)
        echo '<option value="'.$row['designation_id'].'">' . $row['name'] . '</option>';
    }

    /*
    * The function manages vacancy
    */
    function vacancy ($param1 = '', $param2 ='', $param3 =''){

        if($param1 == 'insert'){
            $this->vacancy_model->insetVacancyFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'admin/vacancy', 'refresh');
        }

        if($param1 == 'update'){
            $this->vacancy_model->updateVacancyFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/vacancy', 'refresh');
        }

        if($param1 == 'delete'){
            $this->vacancy_model->deleteVacancyFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/vacancy', 'refresh');
        }

        $page_data['page_name']     = 'vacancy/index';
        $page_data['page_title']    = get_phrase('Manage Vacancy');
        $page_data['select_vacancy']  = $this->db->get('vacancy')->result_array();
        $this->load->view('backend/base', $page_data);
    }

    /**
     *  The function manages job applicant 
     */
    function application($param1 = 'applied', $param2 ='', $param3 =''){

        if($param1 == 'insert'){
            $this->application_model->insertApplicantFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
            redirect(base_url(). 'admin/application', 'refresh');
        }

        if($param1 == 'update'){
            $this->application_model->updateApplicantFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/application', 'refresh');
        }

        if($param1 == 'delete'){
            $this->application_model->deleteApplicantFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/application', 'refresh');
        }

        if($param1 != 'applied' && $param1 != 'on_review' && $param1 != 'interviewed' && $param1 != 'offered' && $param1 != 'hired' && $param1 != 'declined')
            $param1 ='applied';
        
        $page_data['status']        = $param1;
        $page_data['page_name']     = 'application/index';
        $page_data['page_title']    = get_phrase('Job Applicant');
        $this->load->view('backend/base', $page_data);
    }

    /**
     *  The function manages Leave
     */
    function leave ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'update'){
            $this->leave_model->updateLeaveFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/leave', 'refresh');
        }


        if($param1 == 'delete'){
            $this->leave_model->deleteLeaveFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/leave', 'refresh');
    
            }

        
        $page_data['page_name']     = 'leave/index';
        $page_data['page_title']    = get_phrase('Manage Leave');
        $this->load->view('backend/base', $page_data);
    }

    /**
     * The function manages Awards  
     */
    function award ($param1 = null, $param2 = null, $param3 = null){

        if($param1 == 'create'){
            $this->award_model->createAwardFunction();
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/award', 'refresh');
        }

        if($param1 == 'update'){
            $this->award_model->updateAwardFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/award', 'refresh');
        }


        if($param1 == 'delete'){
            $this->award_model->deleteAwardFunction($param2);
            $this->session->set_flashdata('flash_message', get_phrase('Data deleted successfully'));
            redirect(base_url(). 'admin/award', 'refresh');
        }

        $page_data['page_name']     = 'award/index';
        $page_data['page_title']    = get_phrase('Manage Award');
        $this->load->view('backend/base', $page_data);
    }

    function payroll(){
        
        $page_data['page_name']     = 'payroll/create_payslip';
        $page_data['page_title']    = get_phrase('Create Payslip');
        $this->load->view('backend/base', $page_data);

    }

    function get_employees($department_id = null)
    {
        $employees = $this->db->get_where('teacher', array('department_id' => $department_id))->result_array();
        foreach($employees as $key => $employees)
            echo '<option value="' . $employees['teacher_id'] . '">' . $employees['name'] . '</option>';
    }

    function payroll_selector()
    {
        $department_id  = $this->input->post('department_id');
        $employee_id    = $this->input->post('employee_id');
        $month          = $this->input->post('month');
        $year           = $this->input->post('year');
        
        redirect(base_url() . 'admin/payroll_view/' . $department_id. '/' . $employee_id . '/' . $month . '/' . $year, 'refresh');
    }
    
    function payroll_view($department_id = null, $employee_id = null, $month = null, $year = null)
    {
        $page_data['department_id'] = $department_id;
        $page_data['employee_id']   = $employee_id;
        $page_data['month']         = $month;
        $page_data['year']          = $year;
        $page_data['page_name']     = 'payroll/payroll_add_view';
        $page_data['page_title']    = get_phrase('Create Payslip');
        $this->load->view('backend/base', $page_data);
    }

    function create_payroll(){
        $this->payroll_model->insertPayrollFunction();
        $this->session->set_flashdata('flash_message', get_phrase('Data saved successfully'));
        redirect(base_url(). 'admin/payroll_list/filter2/'. $this->input->post('month').'/'. $this->input->post('year'), 'refresh');
    }

    /**
     * The function manages AwPayroll List
     */
    function payroll_list ($param1 = null, $param2 = null, $param3 = null, $param4 = null){

        if($param1 == 'mark_paid'){
            $data['status'] =  1;
            $this->db->update('payroll', $data, array('payroll_id' => $param2));

            $this->session->set_flashdata('flash_message', get_phrase('Data updated successfully'));
            redirect(base_url(). 'admin/payroll_list/filter2/'. $param3.'/'. $param4, 'refresh');
        }

        if($param1 == 'filter'){
            $page_data['month'] = $this->input->post('month');
            $page_data['year'] = $this->input->post('year');
        }
        else{
            $page_data['month'] = date('n');
            $page_data['year'] = date('Y');
        }

        if($param1 == 'filter2'){
            $page_data['month'] = $param2;
            $page_data['year'] = $param3;
        }

        $page_data['page_name']     = 'payroll/payroll_list';
        $page_data['page_title']    = get_phrase('List Payroll');
        $this->load->view('backend/base', $page_data);
    }

}