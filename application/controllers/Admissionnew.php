<?php
class Admissionnew extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_admissionnew');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    
    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }
    
    
    public function index() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $data['tot_applied']['sci_b'] = $this->model_admissionnew->getAppliedCount("M", "SCIENCE");
            $data['tot_applied']['art_b'] = $this->model_admissionnew->getAppliedCount("M", "ARTS");
            $data['tot_applied']['geo_b'] = $this->model_admissionnew->getAppliedCount("M", "ARTS_GEO");
            $data['tot_applied']['sci_g'] = $this->model_admissionnew->getAppliedCount("F", "SCIENCE");
            $data['tot_applied']['art_g'] = $this->model_admissionnew->getAppliedCount("F", "ARTS");
            $data['tot_applied']['geo_g'] = $this->model_admissionnew->getAppliedCount("F", "ARTS_GEO");

            $data['tot_admitted']['sci_b'] = $this->model_admissionnew->getAdmittedCount("M", "SCIENCE");
            $data['tot_admitted']['art_b'] = $this->model_admissionnew->getAdmittedCount("M", "ARTS");
            $data['tot_admitted']['geo_b'] = $this->model_admissionnew->getAdmittedCount("M", "ARTS_GEO");
            $data['tot_admitted']['sci_g'] = $this->model_admissionnew->getAdmittedCount("F", "SCIENCE");
            $data['tot_admitted']['art_g'] = $this->model_admissionnew->getAdmittedCount("F", "ARTS");
            $data['tot_admitted']['geo_g'] = $this->model_admissionnew->getAdmittedCount("F", "ARTS_GEO");

            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('admission/index_new', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
    public function view($stream, $gen) {

        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            switch ($stream) {
                case "art":
                    $strm = "ARTS";
                    break;
                case "geo":
                    $strm = "ARTS_GEO";
                    break;
                case "sci":
                    $strm = "SCIENCE";
                default:
                    break;
            }
             switch ($gen) {
                case "b":
                    $gn = "M";
                    break;
                case "g":
                    $gn = "F";
                    break;
                
                default:
                    break;
            }
            $data['category'] = strtoupper($strm . "-" . $gn);
            $data['d'] = $this->model_admissionnew->getAdmittedSecRoll($strm, $gn);
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('admission/view_new', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    public function action($stream, $gen) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];

            switch ($stream) {
                case "art":
                    $strm = "ARTS";
                    break;
                case "geo":
                    $strm = "ARTS_GEO";
                    break;
                case "sci":
                    $strm = "SCIENCE";
                default:
                    break;
            }
             switch ($gen) {
                case "b":
                    $gn = "M";
                    break;
                case "g":
                    $gn = "F";
                    break;
                
                default:
                    break;
            }
            $data['d'] = $this->model_admissionnew->getAdmission_day_data($strm, $gn);
            $data['category'] = $strm."-".$gn;

            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('admission/action_new', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/footer_admission');
        } else {
            $this->_showUnauthorizePage();
        }
    }

    
    public function ajax_abs() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fid = $this->input->post('fid');
            $r = $this->model_admissionnew->setAbsent($fid);
            echo $r;
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function ajax_rej() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fid = $this->input->post('fid');
            $fr = $this->input->post('r');
            $r = $this->model_admissionnew->setRejected($fid, $fr);
            echo $r;
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function ajax_adm() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fid = $this->input->post('fid');
            $fr = $this->input->post('r');
            $fsc = $this->input->post('s');

            $r = $this->model_admissionnew->setAdmitted($fid, $fr, $fsc);
            echo $r;
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function ajax_undo() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === TRUE) {
            
        } else {
            $this->_showUnauthorizePage();
        }
    }

}