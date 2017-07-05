<?php

class Overview extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('model_overview');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library(array('form_validation', 'session'));
    }

    public function index($page = 1) {
        redirect('overview/page/1');
    }

    public function page($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $tot_student = $this->model_overview->get_total_applied();
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverview($offSet);
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/footer_overview');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function valid($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $tot_student = $this->model_overview->get_valid_applied();
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverviewValid($offSet);
            $data['vl'] = 'valid';
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_valid', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    public function boys($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $tot_student = $this->model_overview->get_gender_count('M');
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverviewValidGender($offSet, 'M');
            $data['vl'] = 'valid';
            $data['gn'] = 'boys';
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_valid', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
    public function girls($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
             $tot_student = $this->model_overview->get_gender_count('F');
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverviewValidGender($offSet, 'F');
            $data['vl'] = 'valid';
            $data['gn'] = 'girls';
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_valid', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
    public function internal ($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
             $tot_student = $this->model_overview->get_type_count('INTERNAL');
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverviewValidType($offSet, 'INTERNAL');
            $data['vl'] = 'valid';
            $data['gn'] = 'internals';
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_valid', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    public function external ($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
             $tot_student = $this->model_overview->get_type_count('EXTERNAL');
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverviewValidType($offSet, 'EXTERNAL');
            $data['vl'] = 'valid';
            $data['gn'] = 'externals';
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_valid', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
    public function science ($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
             $tot_student = $this->model_overview->get_stream_count('SCIENCE');
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverviewValidStream($offSet, 'SCIENCE');
            $data['vl'] = 'valid';
            $data['gn'] = 'science';
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_valid', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
     public function arts ($page = 1) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
             $tot_student = $this->model_overview->get_stream_count('ARTS');
            $totalPage = ceil($tot_student / 30);

            $data['tPage'] = $totalPage;
            $data['cPage'] = $page;

            $offSet = 30 * ($page - 1);
            $data['d'] = $this->model_overview->getOverviewValidStream($offSet, 'ARTS');
            $data['vl'] = 'valid';
            $data['gn'] = 'arts';
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_valid', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }
    
    
    
    public function rejected() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $data['d'] = $this->model_overview->getOverviewInValid();
            if ($data['d']) {
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/ov_in_valid', $data);
               $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo "Sorry no record found.";
            }
            
            } else {
            $this->_showUnauthorizePage();
        }
    }
    

    public function drop() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $fno = $this->input->post('fid');
            $r = $this->input->post('r');

            $msg = $this->model_overview->doMute($fno, $r);
            if ($msg) {
                echo '1';
            } else {
                echo '0';
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }

    public function detail($fno = FALSE, $dob = FALSE) {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            if ($fno == FALSE || $dob == FALSE) {
                echo '<h2>Form number and date of birth are mandatory</h2>';

                //  $formdata = $this->model_onlineform->getFormDetail($input_formno, $input_dob);
            } else {
                $this->_buildDetailPage($fno, $dob);
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }

    private function _buildDetailPage($fno, $dob) {
        if (is_numeric($fno) && strtotime($dob)) {
            $formdata = $this->model_overview->getFormDetail($fno, $dob);
            $admin['logged_admin'] = $_SESSION['user'];
            if (isset($formdata[0])) {
                $data['fd'] = $formdata[0];
                $this->load->view('header/default_header');
                $this->load->view('nav/logged_nav', $admin);
                $this->load->view('overview/applicant_dtl', $data);
                $this->load->view('footer/footer_section');
                $this->load->view('footer/default_footer');
            } else {
                echo '<h2>Invalid form number and or date of birth.</h2>';
            }
        } else {
            echo '<h2>Form number and date of birth are mandatory and they should have correct format</h2>';
        }
    }

    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }

}
