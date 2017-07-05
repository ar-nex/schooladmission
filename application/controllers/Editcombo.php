<?php

class Editcombo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_updateCombo');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }
    
    
    public function index() {
        
       if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('edit/subject');
            $this->load->view('footer/footer_section');
            $this->load->view('footer/footer_editcombo');
        } else {
            $this->_showUnauthorizePage();
        } 
    }
    
    
    public function getSubjects() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fid = $this->input->post('f');
            $data = $this->model_updateCombo->GetCombo($fid);
            if ($data) {
                echo json_encode($data);
            }
            else
            {
                echo 0;
            }
        }else {
            $this->_showUnauthorizePage();
        } 
    }
    
    public function updateSubjecs() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fid = $this->input->post('f');
            $e1 = $this->input->post('e1');
            $e2 = $this->input->post('e2');
            $e3 = $this->input->post('e3');
            $a = $this->input->post('a');

            $r = $this->model_updateCombo->SetCombo($fid, $e1, $e2, $e3, $a);
            if ($r) {
                echo $r;
            }
            else
            {
                echo 0;
            }
        }else {
            $this->_showUnauthorizePage();
        } 
    }
    
    
    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }

}