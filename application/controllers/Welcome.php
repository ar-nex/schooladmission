<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index(){
        $this->load->view('header/default_header');
        $this->load->view('home/main');
        $this->load->view('footer/default_footer');
    }
}