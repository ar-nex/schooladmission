<?php

class Form extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('session', 'form_validation', 'form_validation_x'));
        $this->load->helper(array('url', 'form'));
        $this->load->model('model_form');
        $this->load->model('model_captcha');
        // $this->load->model('admin_utility_model');	
    }

    public function index() {
        $data['prev_regis_msg'] = "";
        if (isset($_SESSION['post'])) {
            $data['session'] = $_SESSION['post'];
        }

        $data['ceilPer'] = $this->model_form->get_percentage_required();

        $this->form_validation->set_error_delimiters('<p class="in-error">', '</p>');
        $this->form_validation->set_rules('sts_name', 'student name', 'trim|required');
        $this->form_validation->set_rules('sts_fname', 'father name', 'trim|required');
        $this->form_validation->set_rules('sts_mname', 'mother name', 'trim|required');
        $this->form_validation->set_rules('sts_gname', 'guardian name', 'trim|required');

        $this->form_validation->set_rules('sts_add1', '', 'trim|required');
        $this->form_validation->set_rules('sts_add2', '', 'trim|required');
        $this->form_validation->set_rules('sts_ps', 'police station', 'trim|required');
        $this->form_validation->set_rules('sts_dist', 'district', 'trim|required');
        $this->form_validation->set_rules('sts_pin', 'PIN', 'trim|required|numeric|exact_length[6]');


        $this->form_validation->set_rules('prm_add1', '', 'trim|required');
        $this->form_validation->set_rules('prm_add2', '', 'trim|required');
        $this->form_validation->set_rules('prm_ps', 'police station', 'trim|required');
        $this->form_validation->set_rules('prm_dist', 'district', 'trim|required');
        $this->form_validation->set_rules('prm_pin', 'PIN', 'trim|required|numeric|exact_length[6]');

        $this->form_validation->set_rules('sts_mobile', 'mobile number', 'trim|numeric|required|exact_length[10]');
        $this->form_validation->set_rules('sts_email', 'email', 'trim|valid_email');

        $this->form_validation->set_rules('sts_school', 'School', 'trim|required');
        $this->form_validation->set_rules('sts_psyear', 'year', 'trim|required|less_than[2018]|greater_than[2014]');
        $this->form_validation->set_rules('sts_acc', 'Bank accoutn', 'trim|numeric');
        $this->form_validation->set_rules('sts_bank', 'Bank name', 'trim');
        $this->form_validation->set_rules('sts_bank_branch', 'branch name', 'trim');
        $this->form_validation->set_rules('sts_ifsc', 'IFSC', 'trim');

        $this->form_validation->set_rules('ascap', 'captcha', 'trim|required');

        $this->form_validation_x->set_element_x('radio', 'sts_sex');
        $this->form_validation_x->set_element_x('radio', 'sts_ph');
        $this->form_validation_x->set_element_x('radio', 'sts_bpl');

        $this->form_validation_x->set_element_x('select', 'sts_cat');
        $this->form_validation_x->set_element_x('select', 'sts_religion');
        $this->form_validation_x->set_element_x('select', 'dd');
        $this->form_validation_x->set_element_x('select', 'mm');
        $this->form_validation_x->set_element_x('select', 'yy');

        $this->form_validation_x->set_element_x('checkbox', 'chk_declr');

        // validated
        if (($this->form_validation->run() == FALSE) || ($this->form_validation_x->run_x($_POST) == FALSE)) {

            //chech if the form has been submitted or not
            $elem_x = isset($_POST['sts_name']);
            if ($elem_x) {
                $this->form_validation_x->run_x($_POST);
                $data['error_x'] = $this->form_validation_x->getError_x();
            }

            // if invalid then build the form with message accordingly.
            $this->_buildform($this->_getDateInfo(), $data);
        } else {

            $nm1 = $_POST['sts_name'];
            $nmt1 = trim($nm1);
            $nm2 = $_POST['sts_name2'];
            $nmt2 = trim($nm2);
            $nm3 = $_POST['sts_name3'];
            $nmt3 = trim($nm3);
            $nm = $nmt1 . " " . $nmt2 . " " . $nm3;
            $fnm = $_POST['sts_fname'];
            $fnmt = trim($fnm);
            $db = $_POST['yy'] . '-' . $_POST['mm'] . '-' . $_POST['dd'];
            $mb = $_POST['sts_mobile'];
            $mbt = trim($mb);



            if ($this->_isStudentPresent($nm, $fnmt, $db)) {
                $data['unique_msg'] = "Student with same name, same father name and same date of birth already applied.";
                $this->_buildform($this->_getDateInfo(), $data);
            } else if ($this->_isMobilePresent($nm, $mbt)) {
                $data['unique_msg'] = "Student with same name and same mobile number already applied.";
                $this->_buildform($this->_getDateInfo(), $data);
            } else if (isset($_POST['sts_adhr']) && $this->_isAadharPresent($_POST['sts_adhr'])) {
                $data['unique_msg'] = "Student with same aadhar number already applied.";
                $this->_buildform($this->_getDateInfo(), $data);
            } elseif (!$this->_hasValidPercentage($_POST['tot'], array($_POST['bng'], $_POST['eng'], $_POST['mth'], $_POST['psc'], $_POST['lsc'], $_POST['geo'], $_POST['hst']), $_POST['stream'], $_POST['sts_type'], $data['ceilPer'])) {
                $data['error_x']['invalid_prcnt'] = '<p class="in-error">Sorry! You have less percentage and you are not eligible to apply in this stream.</p>';

                $this->_buildform($this->_getDateInfo(), $data);
            } elseif (!$this->_hasCorrectSubjects($_POST['stream'], array($_POST['el1'], $_POST['el2'], $_POST['el3']))) {
                $data['error_x']['invalid_combi'] = '<p class="in-error">Please chose appropriate subject combination according to stream.</p>';
                $this->_buildform($this->_getDateInfo(), $data);
            } elseif (!$this->_hasCorrectAdditional($_POST['stream'], $_POST['adl'])) {
                $data['error_x']['invalid_addl'] = '<p class="in-error">Please chose appropriate subject combination according to stream.</p>';
                $this->_buildform($this->_getDateInfo(), $data);
            } elseif (!$this->_validateCaptcha($_POST['ascap'], $this->input->ip_address())) {
                $data['error_x']['invalid_captcha'] = '<p class="in-error">Sorry! Captcha text didn\'t matche.</p>';
                $this->_buildform($this->_getDateInfo(), $data);
            } else {
                foreach ($_POST as $key => $value) {
                    $_SESSION['post'][$key] = trim($value);
                }
                if (!isset($_SESSION['post']['ph_type'])) {
                    $_SESSION['post']['ph_type'] = "";
                }
                if (!isset($_SESSION['post']['grd_epic'])) {
                    $_SESSION['post']['grd_epic'] = "";
                }
                if (!isset($_SESSION['post']['sts_bpl_no'])) {
                    $_SESSION['post']['sts_bpl_no'] = "";
                }
                if (!isset($_SESSION['post']['sts_groccu'])) {
                    $_SESSION['post']['sts_groccu'] = "";
                }
                if (!isset($_SESSION['post']['grd_adhr'])) {
                    $_SESSION['post']['grd_adhr'] = "";
                }
                if (!isset($_SESSION['post']['sts_adhr'])) {
                    $_SESSION['post']['sts_adhr'] = "";
                }
                if (!isset($_SESSION['post']['sts_acc'])) {
                    $_SESSION['post']['sts_acc'] = "";
                }
                if (!isset($_SESSION['post']['sts_bank'])) {
                    $_SESSION['post']['sts_bank'] = "";
                }
                if (!isset($_SESSION['post']['sts_bank_branch'])) {
                    $_SESSION['post']['sts_bank_branch'] = "";
                }
                if (!isset($_SESSION['post']['sts_ifsc'])) {
                    $_SESSION['post']['sts_ifsc'] = "";
                }
                $_SESSION['next'] = "PHOTO";
                redirect('form/photo');
            }
        }
    }

    private function _buildform($dateinfo, $formdata) {
        $data = $formdata;
        if (!$dateinfo) {
            $data['msg'] = 'Please check the date of online application <a href="' . site_url() . '">here</a>';
            $data['msg_st_dt'] = "";
            $this->load->view('header/default_header');
            $this->load->view('nav/default_nav');
            $this->load->view('form/beyonddate', $data);
            $this->load->view('footer/default_footer');
        } elseif (is_array($dateinfo)) {

            switch ($dateinfo ['status']) {

                case "GOINGON" :

//					if(isset($_POST['stream'])){
//						$data['streamflag']=$_POST['stream'];
//					}
                    $this->load->view('header/default_header');
                    $this->load->view('nav/default_nav');
                    $data['captcha'] = $this->_createCaptcha();
                    $this->model_captcha->addCaptcha($data['captcha']);
                    $data['wrongcap'] = "";
                    $this->load->view('form/onlineform', $data);
                    $this->load->view('footer/footer_section');
                    $this->load->view('footer/footer_form');
                    break;
                default :
                    $data['msg'] = 'Please check the date of online application <a href="' . site_url() . '">here</a>';
                    $data['msg_st_dt'] = "";
                    $this->load->view('header/default_header');
                    $this->load->view('nav/default_nav');
                    $this->load->view('form/beyonddate', $data);
                    $this->load->view('footer/default_footer');
                    break;
            }
        }
    }

    private function _hasCorrectSubjects($stream, $subs) {
        $validSci = array("PHYSICS", "CHEMISTRY", "MATHEMATICS", "BIOLOGY");
        $validArt = array("GEOGRAPHY", "HISTORY", "POL. SC", "PHILOSOPHY", "ECONOMICS", "ARABIC");

        if ($stream === "SCIENCE") {
            foreach ($subs as $value) {
                if (!in_array($value, $validSci)) {
                    return false;
                }
            }
            return true;
        } elseif ($stream === "ARTS") {
            foreach ($subs as $value) {
                if (!in_array($value, $validArt)) {
                    return false;
                }
            }
            return true;
        }
    }

    private function _hasCorrectAdditional($strm, $sub) {
        $validSci = array("PHYSICS", "CHEMISTRY", "MATHEMATICS", "BIOLOGY");
        $validArt = array("GEOGRAPHY", "HISTORY", "POL. SC", "PHILOSOPHY", "ECONOMICS", "ARABIC");
        if ($strm === "SCIENCE" && $sub !== " ") {
            if (!in_array($sub, $validSci)) {
                return false;
            }
        } elseif ($strm === "ARTS" && $sub !== " ") {
            if (!in_array($sub, $validArt)) {
                return false;
            }
        }
        return true;
    }

// ***** valid percentage
    private function _hasValidPercentage($tot, $subMarks, $stream, $tp, $m) {


        $obt_percent1 = array_sum($subMarks) / $tot * 100;
        $obt_percent = round($obt_percent1, 2);

        $isValid = false;
        if ($tp === "INTERNAL") {
            $isValid = $this->_hasVlPrInternal($stream, $obt_percent, $m);

            return $isValid;
        } elseif ($tp === "EXTERNAL") {
            $isValid = $this->_hasVlPrExternal($stream, $obt_percent, $m);

            return $isValid;
        } else {
            return $isValid;
        }
    }

    private function _hasVlPrInternal($strm, $op, $m) {
        $isValid1 = false;
        if ($strm === "SCIENCE") {
            $isValid1 = $this->_hasVlPrScience("INTERNAL", $op, $m);

            return $isValid1;
        } elseif ($strm === "ARTS") {
            $isValid1 = $this->_hasVlPrArts("INTERNAL", $op, $m);

            return $isValid1;
        } else {
            return $isValid1;
        }
    }

    private function _hasVlPrExternal($strm, $op, $m) {
        $isValid1 = false;
        if ($strm === "SCIENCE") {
            $isValid1 = $this->_hasVlPrScience("EXTERNAL", $op, $m);

            return $isValid1;
        } elseif ($strm === "ARTS") {
            $isValid1 = $this->_hasVlPrArts("EXTERNAL", $op, $m);

            return $isValid1;
        } else {
            return $isValid1;
        }
    }

    private function _hasVlPrScience($tp, $op, $m) {
        $isValid2 = false;
        if ($tp === "INTERNAL") {
            $ep = $m['int_sci'];
            if ($op >= $ep) {
                $isValid2 = true;
            } else {
                $isValid2 = false;
            }

            return $isValid2;
        } elseif ($tp === "EXTERNAL") {
            $ep = $m['ext_sci'];
            if ($op >= $ep) {
                $isValid2 = true;
            } else {
                $isValid2 = false;
            }

            return $isValid2;
        } else {
            return $isValid2;
        }
    }

    private function _hasVlPrArts($tp, $op, $m) {
        $isValid3 = false;
        $appSubs = array($_POST['el1'], $_POST['el2'], $_POST['el3'], $_POST['adl']);
        $hasGeo = in_array("GEOGRAPHY", $appSubs);
        if (!$hasGeo) {
            $isValid3 = $this->_hasValidOutGeo($tp, $op, $m);

            return $isValid3;
        } else {

            $isValid3 = $this->_hasValidWithGeo($tp, $op, $m);

            return $isValid3;
        }
    }

    private function _hasValidOutGeo($tp, $op, $m) {
        $isValidG = false;
        if ($tp === "INTERNAL") {
            $ep = $m['int_arts'];
            if ($op >= $ep) {
                $isValidG = true;
            } else {
                $isValidG = false;
            }

            return $isValidG;
        } else if ($tp === "EXTERNAL") {
            $ep = $m['ext_arts'];
            if ($op >= $ep) {
                $isValidG = true;
            } else {
                $isValidG = false;
            }

            return $isValidG;
        } else {
            return $isValidG;
        }
    }

    private function _hasValidWithGeo($tp, $op, $m) {
        $isValidW = false;
        if ($tp === "INTERNAL") {
            $ep = $m['int_arts_geo'];
            if ($op >= $ep) {
                $isValidW = true;
            } else {
                $isValidW = false;
            }

            return $isValidW;
        } else if ($tp === "EXTERNAL") {
            $ep = $m['ext_arts_geo'];
            if ($op >= $ep) {
                $isValidW = true;
            } else {
                $isValidW = false;
            }

            return $isValidW;
        } else {
            return $isValidW;
        }
    }

// **** end : valid percentage 


    private function _getDateInfo() {

        $date_range = $this->model_form->getApplyDate();
        $ret_data = array();
        if ($date_range) {
            $start_date = new DateTime($date_range ['start_date'], new DateTimeZone('Asia/Kolkata'));
            $end_date = new DateTime($date_range ['end_date'], new DateTimeZone('Asia/Kolkata'));
            $today = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
            $end_date->modify('+1 day');
            $days_to_close = $today->diff($end_date);
            $days_to_close = $days_to_close->format('%R%a');


            $days_to_start = $start_date->diff($today);
            //$days_to_start = $days_to_start->format('%R%a');
            // if ($days_to_start >= 0 && $days_to_close >= 0) {
            //     $ret_data ['status'] = "GOINGON";
            //     $ret_data ['days'] = $days_to_close;
            //     return $ret_data;
            // }else{
            //     $ret_data ['status'] = "OFF";
            //     $ret_data ['days'] = "0";
            //     return $ret_data;
            // }
            $sd = $start_date->getTimestamp();
            $ed = $end_date->getTimestamp();
            $td = $today->getTimestamp();
            $sd_diff = $td - $sd;
            $ed_diff = $ed - $td;
            if ($sd_diff >= 0 && $ed_diff >= 0) {
                $ret_data ['status'] = "GOINGON";
                $ret_data ['days'] = $days_to_close;
                return $ret_data;
            } else {
                $ret_data ['status'] = "OFF";
                $ret_data ['days'] = "0";
                return $ret_data;
            }
        } else {
            return FALSE;
        }
    }

    private function _isStudentPresent($nm, $fnm, $dob) {
        return $this->model_form->isStudentExist($nm, $fnm, $dob);
    }

    private function _isMobilePresent($nm, $mb) {
        return $this->model_form->isMobileExist($nm, $mb);
    }

    private function _isAadharPresent($adhr) {
        if (strlen($adhr) == 12) {
            return $this->model_form->isAadharExist($adhr);
        } else {
            return FALSE;
        }
    }

    private function _createCaptcha() {
        $this->load->helper('captcha');
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'img_width' => 130,
            'img_height' => 32,
            'expiration' => 7200,
            'word_length' => 5,
            'pool' => 'ABCEFGHIJKLMNPQRST123456789',
            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(163, 184, 251)
            )
        );

        return create_captcha($vals);
    }

    private function _validateCaptcha($word, $ip) {
        $expiration = time() - 7200;
        $this->model_captcha->delete_expired($expiration);
        return $this->model_captcha->check_captcha($word, $ip, $expiration);
    }
  public function creload() {
        $recap = $this->_createCaptcha();
        $this->model_captcha->addCaptcha($recap);
        echo ($recap['image']);
    }
}
