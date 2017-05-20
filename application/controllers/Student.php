<?php

class Student extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('model_student');
    }
    
    public function index(){
        redirect(base_url());
    }
    
    public function register() {
        
    }

}