<?php

class Subject extends CI_Controller
{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_subject');
        $this->load->library('session');
        $this->load->helper('url');
    }
    
    public function index()
    {
         if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $data['category'] = "All";
            $data['d'] = $this->model_subject->getDataAll();
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('subject/subject_main', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
        
         } else{
             $this->_showUnauthorizePage();
         }
        
    }
    
    
     public function arts()
    {
         if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $data['category'] = "ARTS without Geo";
            $data['d'] = $this->model_subject->getData("ARTS");
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('subject/subject_main', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
         } else{
             $this->_showUnauthorizePage();
         }
        
    }
    
    
     public function geo()
    {
         if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
             $data['category'] = "ARTS with Geo";
            $data['d'] = $this->model_subject->getData("GEO");
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('subject/subject_main', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
         } else{
             $this->_showUnauthorizePage();
         }
        
    }
    
    
     public function science()
    {
         if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
             $data['category'] = "SCIENCE";
            $data['d'] = $this->model_subject->getData("SCIENCE");
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('subject/subject_main', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
         } else{
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