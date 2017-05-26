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
            $appliedStream = $_POST['stream'];



            if ($this->_isStudentPresent($nm, $fnmt, $db, $appliedStream)) {
                $data['unique_msg'] = "Student with same name, same father name and same date of birth already applied.";
                $this->_buildform($this->_getDateInfo(), $data);
            } else if ($this->_isMobilePresent($nm, $mbt, $appliedStream)) {
                $data['unique_msg'] = "Student with same name and same mobile number already applied.";
                $this->_buildform($this->_getDateInfo(), $data);
            } else if (isset($_POST['sts_adhr']) && $this->_isAadharPresent($_POST['sts_adhr'], $appliedStream)) {
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

    
    public function photo() {
        if ((isset($_SESSION['next']) && $_SESSION['next'] === "PHOTO") && (isset($_SESSION['post']))) { {
                $config['upload_path'] = './uploads/nmhsxi/';
                $config['allowed_types'] = 'jpeg|jpg|png|PNG';
                $config['file_name'] = $this->_setImageName();
                $config['max_size'] = 150;
// 				$config['max_width']            = 800;
// 				$config['max_height']           = 1200;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('header/header_withJQ');
                    $this->load->view('nav/default_nav');
                    $this->load->view('form/upload', $error);
                    $this->load->view('footer/footer_section');
                    $this->load->view('footer/footer_upload');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    //do resize the image.

                    if ($this->_resizePic($data['upload_data']['full_path'])) {

                        //put all the value in the database.
                        $data['session'] = $_SESSION['post'];
                        $thumb_img_name = $this->_getThumbx($data['upload_data']['file_name']);
                        $thumb_img_path = $this->_getThumbx($data['upload_data']['full_path']);
                        $data['form']['photo'] = $thumb_img_name;

                        $data['form']['id'] = $this->model_form->putApplicationDetail($thumb_img_name, $thumb_img_path);
                        $data['form']['dob'] = $_SESSION['post']['yy'] . '-' . $_SESSION['post']['mm'] . '-' . $_SESSION['post']['dd'];
                        $data['applicantName'] = $_SESSION['post']['sts_name'];
                        $applicantName = $_SESSION['post']['sts_name'];
                        $ApplicantEmail = $_SESSION['post']['sts_email'];

                        $fid = $data['form']['id'];
                        $mobile = $_SESSION['post']['sts_mobile'];
                        //destroy session post data
                        unset($_SESSION['post']);
                        $this->_sendSMS($fid, $mobile);


                        //sent mail with form number and date of birth
                        if ($ApplicantEmail !== "") {
                            //	$data['hasEmailSent']=$this->_sentMail($ApplicantEmail, $applicantName, $data['form']['id']);

                            $data['hasEmailSent'] = FALSE;
                        } else {
                            $data['hasEmailSent'] = FALSE;
                        }
                        
                        $formCount = $this->model_form->get_total_applied();
                        if ($formCount % 50 === 0) {
                            $this->_sendSMSToHeadSir($formCount);
                        }

                        $this->load->view('header/default_header');
                        $this->load->view('nav/default_nav');
                        $this->load->view('form/success',$data);
                        $this->load->view('footer/footer_section');
                        $this->load->view('footer/default_footer');
                    } else {
                        echo "error";
                    }
                }
            }
        } else {
            redirect('form');
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
        $validArt = array("GEOGRAPHY", "HISTORY", "POL. SC", "PHILOSOPHY", "ECONOMICS", "ARABIC", "SOCIOLOGY", "EDUCATION");
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


    
    
    
       private function _sendSMS($fno, $mobile) {
        $authKey = "132443ATujQDvdWfF583dab47";
        $mobileNumber = $mobile;
        $senderId = "NMHSXI";
        $message = urlencode("Application form for admission to class XI at Naimouza High School submitted successfully. Form no. is " . $fno);



        //Define route 
        $route = "4";
//Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

//API URL
        $url = "https://control.msg91.com/api/sendhttp.php";

// init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
        ));


//Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
        $output = curl_exec($ch);

//Print error if any
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);

        //   echo $output;
    }
    
    
    
    
    
        private function _sendSMSToHeadSir($formCount) {
        $authKey = "132443ATujQDvdWfF583dab47";
        $mobileNumber = "8513094183";
        $senderId = "NMHSXI";
        $message = urlencode("Respected Sir, Greetings from nexap.in. Total form fill up for class XI admission till now is ".$formCount.". Thank you.");



        //Define route 
        $route = "4";
//Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );

//API URL
        $url = "https://control.msg91.com/api/sendhttp.php";

// init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
        ));


//Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
        $output = curl_exec($ch);

//Print error if any
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
        }

        curl_close($ch);

        //   echo $output;
    }
    
    
    
    
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

    private function _isStudentPresent($nm, $fnm, $dob, $stream) {
        return $this->model_form->isStudentExist($nm, $fnm, $dob, $stream);
    }

    private function _isMobilePresent($nm, $mb, $stream) {
        return $this->model_form->isMobileExist($nm, $mb, $stream);
    }

    private function _isAadharPresent($adhr, $stream) {
        if (strlen($adhr) == 12) {
            return $this->model_form->isAadharExist($adhr, $stream);
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
    
    
    
    private function _getThumbx($imgdata) {
        $thumbitem1 = "_thumb.jpg";
        $thumbitem2 = "_thumb.jpeg";
        $thumbitem3 = "_thumb.png";
        if (preg_match('/(\.jpg)$/', $imgdata)) {
            return preg_replace('/(\.jpg)$/', $thumbitem1, $imgdata);
        } elseif (preg_match('/(\.jpeg)$/', $imgdata)) {
            return preg_replace('/(\.jpeg)$/', $thumbitem2, $imgdata);
        } elseif (preg_match('/(\.png)$/', $imgdata)) {
            return preg_replace('/(\.png)$/', $thumbitem3, $imgdata);
        } else {
            return FALSE;
        }
    }

    private function _setImageName() {
        $student_name = $_SESSION['post']['sts_name'];
        $student_dob = $_SESSION['post']['yy'] . '-' . $_SESSION['post']['mm'] . '-' . $_SESSION['post']['dd'];
        $slug_name = preg_replace('/\s/', '_', $student_name);
        $slug_dob = str_replace('-', '', $student_dob);
        $img_name = $slug_name . '_' . $slug_dob;
        return $img_name;
    }

    private function _resizePic($src_pic) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $src_pic;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 150;
        $config['height'] = 150;
        $this->load->library('image_lib', $config);
        return $this->image_lib->resize();
    }
}
