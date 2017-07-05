<?php

class Editmarks extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_editmarks');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('edit/marks');
            $this->load->view('footer/footer_section');
            $this->load->view('footer/footer_editmarks');
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function listenget() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function listenset() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            
        } else {
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
