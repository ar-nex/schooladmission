<?php

class Sms extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_sms');
        $this->load->library('session');
    }

    
    public function index() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
        $dt['ar_sci'] = $this->model_sms->getRankedFormIdWithMobile("SCIENCE");
        $dt['ar_art'] = $this->model_sms->getRankedFormIdWithMobile("ARTS");
        $dt['ar_geo'] = $this->model_sms->getRankedFormIdWithMobile("ARTS_GEO");


            foreach ($dt as $key => $value) {
                print_r($value);
                if ($value['form_id'] == 10) {
                    echo "----<br>";
                    echo $key+1;
                    break;
                }
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
    public function firstphasearts() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
        $d = $this->model_sms->getFirstPhaseArtsMobile();
        $mobiles = "";
        foreach ($d as $value) {
            $mobiles = $mobiles.$value['mobile'].", ";
        }
        echo($mobiles);
        }
        else{
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
