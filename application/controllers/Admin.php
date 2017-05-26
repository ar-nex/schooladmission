<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $admin_validation;

    function __construct() {
        parent::__construct();
        $this->load->model('model_admin');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library(array('form_validation', 'session'));
// 		$this->admin_validation['failed_msg']="";
    }

    public function index() {
        redirect(base_url('/admin/login'));
    }

    public function login() {
        $this->form_validation->set_error_delimiters('<p class="in-error">', '</p>');
        $this->form_validation->set_rules('userid', 'User Id', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->form_validation->run()) {
            $this->_buildLoginPage($this->admin_validation);
        } elseif ($this->_validateUser()) {
            redirect(base_url('admin/dashboard'));
        } else {
            $this->_buildLoginPage($this->admin_validation);
        }
    }

    public function dashboard() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];

            $dash_data['tot_applied'] = $this->model_admin->get_total_applied();
            $dash_data['invalid'] = $this->model_admin->get_total_invalid();
            $dash_data['boysCount'] = $this->model_admin->get_gender_count('M');
            $dash_data['girlsCount'] = $this->model_admin->get_gender_count('F');

            $dash_data['internalCount'] = $this->model_admin->get_type_count('INTERNAL');
            $dash_data['externalCount'] = $this->model_admin->get_type_count('EXTERNAL');
            
            $dash_data['sciCount'] = $this->model_admin->get_stream_count('SCIENCE');
            $dash_data['artCount'] = $this->model_admin->get_stream_count('ARTS');

            $daterange = $this->model_admin->get_date();
            $percertage = $this->model_admin->get_percentage_required();
            if (!$daterange) {
                $dash_data['date'] = array('start_date' => 'Not defined', 'end_date' => 'Not defined');
            } else {
                $dash_data['date'] = $daterange;
            }
            if ($percertage) {
                $dash_data['percentage'] = $percertage;
            } else {
                $dash_data['percentage'] = array('int_sci' => 0, 'int_arts' => 0, 'int_arts_geo' => 0, 'ext_sci' => 0, 'ext_arts' => 0, 'ext_arts_geo' => 0);
            }
            $this->_buildDashboard($admin, $dash_data);
        } else {

            $this->_showUnauthorizePage();
        }
    }

    public function logout() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $this->session->sess_destroy();
            $errData['msg'] = "You have successfully logged out.";
            $errData['hrf'] = base_url('admin/login');
            $errData['link'] = "Go to login page";
            $this->_logoutpage($errData);
        } else {
            $errData['msg'] = "You have have not logged in yet.";
            $errData['hrf'] = base_url('admin/login');
            $errData['link'] = "Go to login page";
            $this->_logoutpage($errData);
        }
    }

    private function _buildLoginPage($logformdata) {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/login_page', $logformdata);
        $this->load->view('footer/default_footer');
    }

    private function _buildDashboard($adm, $data) {
        $this->load->view('header/header_withJQ');
        $this->load->view('nav/logged_nav', $adm);
        $this->load->view('admin/dashboard', $data);
        //  $this->load->view('admin/dash_graph');
        $this->load->view('footer/footer_dashboard');
    }

    private function _validateUser() {

        $sup_userid = filter_input(INPUT_POST, 'userid');
        $sup_pwd = filter_input(INPUT_POST, 'password');
        $data_ret = $this->model_admin->getAdmin_namepass($sup_userid);
        if ($data_ret === FALSE) {
            $this->admin_validation['failed_msg'] = "Sorry! entered user id didn't match.";
            return FALSE;
        } else {
            $u_pwd_hash = $data_ret->password;
            $u_id = $data_ret->id;
            $u_name = $data_ret->name;
            if (!password_verify($sup_pwd, $u_pwd_hash)) {
                $this->admin_validation['failed_msg'] = "Sorry! user id or password didn't match.";
                return FALSE;
            } else {
// 	if the following is set to zero at application folder on config file, session will destroy on browser closer.			
// 	$config['sess_expiration'] = 0;
                $_SESSION['userid'] = $u_id;
                $_SESSION['user'] = $u_name;
                $_SESSION['authenticated'] = "nm11";
                return TRUE;
            }
        }
    }

    private function _logoutpage($data) {
        $this->load->view('header/default_header');
        $this->load->view('admin/response', $data);
        $this->load->view('footer/default_footer');
    }

    private function _response($data) {
        $this->load->view('header/default_header');
        $this->load->view('nav/logged_nav');
        $this->load->view('admin/response', $data);
        $this->load->view('footer/footer_default');
    }

    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }

}
