<?php

class Edit extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_edit');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $this->load->view('header/default_header');
            $this->load->view('nav/logged_nav', $admin);
            $this->load->view('edit/basic');
            $this->load->view('footer/footer_section');
            $this->load->view('footer/footer_edit');
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function listenget() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fno = $this->input->post('fid');
            $colCode = $this->input->post('c');
            if ($this->model_edit->IsFormExist($fno)) {
                $col = $this->_getColName($colCode);
                $r = $this->model_edit->get($fno, $col);
                echo $r;
            } else {
                echo "no_record";
            }
           
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function listenset() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fno = $this->input->post('fid');
            $colCode = $this->input->post('c');
            $val = $this->input->post('v');
            $col = $this->_getColName($colCode);
            $r = $this->model_edit->update($fno, $col, $val);
            echo $r;
        } else {
            $this->_showUnauthorizePage();
        }
    }

    private function _getColName($code) {
        $col = "";
        switch ($code) {
            case "s1":
                $col = "name";
                break;
            case "s2":
                $col = "fname";
                break;
            case "s3":
                $col = "mname";
                break;
            case "s4":
                $col = "gname";
                break;
            case "s5":
                $col = "grel";
                break;
            case "s6":
                $col = "dob";
                break;
            case "s7":
                $col = "sex";
                break;
            case "s8":
                $col = "ph_challenged";
                break;
            case "s9":
                $col = "ph_type";
                break;
            case "s10":
                $col = "guardian_occu";
                break;
            case "s11":
                $col = "category";
                break;
            case "s12":
                $col = "is_bpl";
                break;
            case "s13":
                $col = "aadhar_no";
                break;
            case "s14":
                $col = "guardian_aadhar";
                break;
            case "s15":
                $col = "religion";
                break;
            case "s16":
                $col = "bpl_no";
                break;
            case "s17":
                $col = "epic_no";
                break;
            case "c1":
                $col = "addresslane1a";
                break;
            case "c2":
                $col = "addresslane1";
                break;
            case "c3":
                $col = "addresslane2";
                break;
            case "c4":
                $col = "ps";
                break;
            case "c5":
                $col = "dist";
                break;
            case "c6":
                $col = "pin";
                break;
            case "c7":
                $col = "p_addresslane1a";
                break;
            case "c8":
                $col = "p_addresslane1";
                break;
            case "c9":
                $col = "p_addresslane2";
                break;
            case "c10":
                $col = "p_ps";
                break;
            case "c11":
                $col = "p_dist";
                break;
            case "c12":
                $col = "p_pin";
                break;
            case "b1":
                $col = "bank_account";
                break;
            case "b2":
                $col = "bank_name";
                break;
            case "b3":
                $col = "bank_branch";
                break;
            case "b4":
                $col = "branch_ifsc";
                break;
            case "l1":
                $col = "last_school";
                break;
            case "l2":
                $col = "last_board";
                break;
            case "l3":
                $col = "passing_yr";
                break;
            case "e1":
                $col = "section";
                break;
            case "e2":
                $col = "roll";
                break;
            default:
                $col = "";
                break;
        }
        return $col;
    }

    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }

}
