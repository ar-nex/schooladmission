<?php

class Model_form extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getApplyDate() {
        $sql = 'select id, start_date, end_date from apply_date ORDER BY id DESC LIMIT 1;';
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            $result = $result[0];
            return $result;
        } else {
            return FALSE;
        }
    }

     public function get_percentage_required() {
        $sql = "select * from percentage_required ORDER BY id DESC LIMIT 1;";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            $result = $result[0];
            return $result;
        } else {
            return FALSE;
        }
    }
    
    
    public function putApplicationDetail($imgName, $imgPath) {
        $name = $_SESSION['post']['sts_name'];
        if(isset($_SESSION['post']['sts_name2']))
        {
            $name = $name." ".$_SESSION['post']['sts_name2'];
        }
        if(isset($_SESSION['post']['sts_name3']))
        {
            $name = $name." ".$_SESSION['post']['sts_name3'];
        }
        
        $sx = $_SESSION['post']['sts_sex'];
        $fno;
        if($sx == "M"){
            $sql = "INSERT INTO `formno_boys` (`id`) VALUES (NULL)";
            $query = $this->db->query($sql);
            $fno = $this->db->insert_id();
        }else{
            $sql = "INSERT INTO `formno_girls` (`id`) VALUES (NULL)";
            $query = $this->db->query($sql);
            $fno = $this->db->insert_id();
        }
        $ibpl;
        if($_SESSION['post']['sts_bpl'] == "Y"){
            $ibpl = "1";
        }else{
            $ibpl = "0";
        }
        
        $iph;
        if($_SESSION['post']['sts_ph'] == "Y"){
            $iph = "1";
        }else{
            $iph = "0";
        }
        
        
        $student_basic_data = array(
            'name' => $name,
            'fname' => $_SESSION['post']['sts_fname'],
            'mname' => $_SESSION['post']['sts_mname'],
            'gname' => $_SESSION['post']['sts_gname'],
            'dob' => $_SESSION['post']['yy'] . '-' . $_SESSION['post']['mm'] . '-' . $_SESSION['post']['dd'],
            'sex' => $_SESSION['post']['sts_sex'],
            'ph_challenged' => $iph,
            'ph_type' => $_SESSION['post']['ph_type'],
            'guardian_occu' => $_SESSION['post']['sts_groccu'],
            'category' => $_SESSION['post']['sts_cat'],
            'is_bpl' => $ibpl,
            'aadhar_no' => $_SESSION['post']['sts_adhr'],
            'guardian_aadhar' => $_SESSION['post']['grd_adhr'],
            'religion' => $_SESSION['post']['sts_religion'],
            'bpl_no' => $_SESSION ['post']['sts_bpl_no'],
            'epic_no' => $_SESSION ['post']['grd_epic'],
            'addresslane1a' => $_SESSION['post']['sts_add1_a'],
            'addresslane1' => $_SESSION['post']['sts_add1'],
            'addresslane2' => $_SESSION['post']['sts_add2'],
            'ps' => $_SESSION['post']['sts_ps'],
            'dist' => $_SESSION['post']['sts_dist'],
            'pin' => $_SESSION['post']['sts_pin'],
            'p_addresslane1a' => $_SESSION['post']['prm_add1_a'],
            'p_addresslane1' => $_SESSION['post']['prm_add1'],
            'p_addresslane2' => $_SESSION['post']['prm_add2'],
            'p_ps' => $_SESSION['post']['prm_ps'],
            'p_dist' => $_SESSION['post']['prm_dist'],
            'p_pin' => $_SESSION['post']['prm_pin'],
            'mobile' => $_SESSION['post']['sts_mobile'],
            'email' => $_SESSION['post']['sts_email'],
            'img_name' => $imgName,
            'img_path' => $imgPath,
            'bank_account' => $_SESSION['post']['sts_acc'],
            'bank_name' => $_SESSION['post']['sts_bank'],
            'bank_branch' => $_SESSION['post']['sts_bank_branch'],
            'branch_ifsc' => $_SESSION['post']['sts_ifsc']
        );

        $suc_ins1 = $this->db->insert('student_basic', $student_basic_data);
        $stu_id = $this->db->insert_id();

        $academic_data = array(
            'form_no' => $fno,
            'last_school' => $_SESSION['post']['sts_school'],
            'passing_yr' => $_SESSION['post']['sts_psyear'],
            'client_ip' => $_SERVER['REMOTE_ADDR'],
            'student_basic_id' => $stu_id
        );

        $suc_form = $this->db->insert('v_admission', $academic_data);
        $form_no = $this->db->insert_id();
        return $fno;
    }
    
    public function isAadharExist($aadhar){
       $sql = 'SELECT COUNT(*) AS count FROM student_basic WHERE aadhar_no = ?'; 
       $binds = array($aadhar);
       $query = $this->db->query($sql, $binds);
       $row = $query->row();
       if($row->count == 0){
           return 0;
       }  else {
           return 1;    
       }
    }
    
    public function isStudentExist($name, $fname, $dob) {
       $rt = FALSE;
       $sql = 'SELECT COUNT(*) AS count FROM student_basic WHERE name = ? AND fname=? AND dob=?'; 
       $binds = array($name, $fname, $dob);
       $query = $this->db->query($sql, $binds);
       $row = $query->row();
       if($row->count == 0){
           $rt = FALSE;
       }  else {
           $rt = TRUE;    
       } 
       return $rt;
    }
    
    public function isMobileExist($name, $mobile) {
       $rt1 = FALSE;
       $sql1 = 'SELECT COUNT(*) AS count FROM student_basic WHERE name = ? AND mobile = ?'; 
       $binds1 = array($name, $mobile);
       $query1 = $this->db->query($sql1, $binds1);
       $row1 = $query1->row();
       if($row1->count == 0){
           $rt1 = FALSE;
       }  else {
           $rt1 = TRUE;    
       }
       return $rt1;
    }
    
    
    public function isBankAccountExist($acc){
       $sql = 'SELECT COUNT(*) AS count FROM student_basic WHERE bank_account = ?'; 
       $binds = array($acc);
       $query = $this->db->query($sql, $binds);
       $row = $query->row();
       if($row->count == 0){
           return FALSE;
       }  else {
           return TRUE;    
       }
    }

}
