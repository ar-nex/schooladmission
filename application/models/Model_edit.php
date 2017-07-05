<?php

class Model_edit extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($form_no, $col) {
        $basic = array("name", "fname", "mname", "gname", "grel", "dob", "sex", "ph_challenged", "ph_type", "guardian_occu", "category", "is_bpl", "aadhar_no", "guardian_aadhar", "bpl_no", "epic_no", "bank_account", "bank_name", "bank_branch", "branch_ifsc", "addresslane1a", "addresslane1", "addresslane2", "ps", "dist", "pin", "p_addresslane1a", "p_addresslane1", "p_addresslane2", "p_ps", "p_dist", "p_pin");
        $lastclass = array("last_school", "last_board", "passing_yr");
        $eleven = array("section", "roll");
        if (in_array($col, $basic)) {
            $sql = "SELECT " . $col . " FROM student_basic WHERE id = (SELECT student_basic_id FROM xi_admission WHERE form_id='" . $form_no . "')";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            if ($result) {
                $val = $result[0][$col];
                return $val;
            } else {
                return FALSE;
            }
        } else if (in_array($col, $lastclass)) {
            $sql = "SELECT " . $col . " FROM academic_info_x WHERE student_basic_id = (SELECT student_basic_id from xi_admission WHERE form_id='".$form_no."')";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            if ($result) {
                $val = $result[0][$col];
                return $val;
            } else {
                return FALSE;
            }
        } else if(in_array($col, $eleven)){
            $sql = "SELECT " . $col . " FROM xi_admission WHERE student_basic_id = (SELECT student_basic_id from xi_admission WHERE form_id='".$form_no."')";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            if ($result) {
                $val = $result[0][$col];
                return $val;
            } else {
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }

    public function update($form_no, $col, $val) {
        $basic = array("name", "fname", "mname", "gname", "grel", "dob", "sex", "ph_challenged", "ph_type", "guardian_occu", "category", "is_bpl", "aadhar_no", "guardian_aadhar", "bpl_no", "epic_no", "bank_account", "bank_name", "bank_branch", "branch_ifsc", "addresslane1a", "addresslane1", "addresslane2", "ps", "dist", "pin", "p_addresslane1a", "p_addresslane1", "p_addresslane2", "p_ps", "p_dist", "p_pin");
        $lastclass = array("last_school", "last_board", "passing_yr");
        $eleven = array("section", "roll");
        if (in_array($col, $basic)) {
            $sql = "UPDATE student_basic SET " . $col . " = '" . $val . "' WHERE id=(SELECT student_basic_id FROM xi_admission WHERE form_id='" . $form_no . "')";
            $query = $this->db->query($sql);
            return $query;
        } else if (in_array($col, $lastclass)) {
            $sql = "UPDATE academic_info_x SET " . $col . " = '" . $val . "' WHERE student_basic_id = (SELECT student_basic_id from xi_admission WHERE form_id='" . $form_no . "')";
            $query = $this->db->query($sql);
            return $query;
        }else if (in_array($col, $eleven)) {
            $sql = "UPDATE xi_admission SET " . $col . " = '" . $val . "' WHERE form_id='" . $form_no . "'";
            $query = $this->db->query($sql);
            return $query;
        } else {
            return false;
        }
    }

    public function IsFormExist($fid) {
        $sql = "SELECT COUNT(*) AS count FROM xi_admission WHERE form_id='".$fid."'";
        $query = $this->db->query($sql);
        $row = $query->row();
        if ($row->count == 1) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

}
