<?php

class Admission extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_admission');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $data['tot_applied']['sci_int'] = $this->model_admission->getAppliedCount("INTERNAL", "SCIENCE");
            $data['tot_applied']['art_int'] = $this->model_admission->getAppliedCount("INTERNAL", "ARTS");
            $data['tot_applied']['geo_int'] = $this->model_admission->getAppliedCount("INTERNAL", "ARTS_GEO");
            $data['tot_applied']['sci_ext'] = $this->model_admission->getAppliedCount("EXTERNAL", "SCIENCE");
            $data['tot_applied']['art_ext'] = $this->model_admission->getAppliedCount("EXTERNAL", "ARTS");
            $data['tot_applied']['geo_ext'] = $this->model_admission->getAppliedCount("EXTERNAL", "ARTS_GEO");

            $data['tot_admitted']['sci_int'] = $this->model_admission->getAdmittedCount("INTERNAL", "SCIENCE");
            $data['tot_admitted']['art_int'] = $this->model_admission->getAdmittedCount("INTERNAL", "ARTS");
            $data['tot_admitted']['geo_int'] = $this->model_admission->getAdmittedCount("INTERNAL", "ARTS_GEO");
            $data['tot_admitted']['sci_ext'] = $this->model_admission->getAdmittedCount("EXTERNAL", "SCIENCE");
            $data['tot_admitted']['art_ext'] = $this->model_admission->getAdmittedCount("EXTERNAL", "ARTS");
            $data['tot_admitted']['geo_ext'] = $this->model_admission->getAdmittedCount("EXTERNAL", "ARTS_GEO");

            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('admission/index', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function view($type, $stream) {

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
            $data['category'] = strtoupper($type) . "-" . $strm;
            $data['d'] = $this->model_admission->getAdmittedSecRoll(strtoupper($type), $strm);
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('admission/view_new', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/default_footer');
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function action($type, $stream) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];

            $data['cat'] = $type;

            $strm = "";
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
            $data['d'] = $this->model_admission->getAdmission_day_data(strtoupper($type), $strm);
            $data['category'] = strtoupper($type) . "-" . $strm;

            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('admission/action', $data);
            $this->load->view('footer/footer_section');
            $this->load->view('footer/footer_admission');
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function ajax_abs() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fid = $this->input->post('fid');
            $r = $this->model_admission->setAbsent($fid);
            echo $r;
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function ajax_rej() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fid = $this->input->post('fid');
            $fr = $this->input->post('r');
            $r = $this->model_admission->setRejected($fid, $fr);
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

            $r = $this->model_admission->setAdmitted($fid, $fr, $fsc);
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

    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }

}
