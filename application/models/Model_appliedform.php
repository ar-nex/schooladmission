<?php

class Model_appliedform extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getFormDetail($formid, $dob) {

        $sq1 = 'SELECT b.*, x.*, e.* FROM student_basic b 
                INNER JOIN academic_info_x x ON b.id = x.student_basic_id 
                INNER JOIN xi_admission e ON e.student_basic_id = b.id
		where e.form_id=?
		AND b.dob=?';
        $query = $this->db->query($sq1, array($formid, $dob));
        return $query->result_array();
    }

}
