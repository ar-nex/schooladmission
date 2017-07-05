<?php

class Model_merit extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getMeritList($stream) {
        if ($stream == "SCIENCE") {
            $sql = "SELECT b.name, b.fname, xi.form_id, a.percentage, a.typ FROM student_basic b"
                    . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                    . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                    . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'SCIENCE' ORDER BY a.percentage DESC, (a.mth+a.psc+a.lsc) DESC";
        }

        else if($stream === "ARTS")
        {
            $sql = "SELECT b.name, b.fname, xi.form_id, a.percentage, a.typ FROM student_basic b"
                    . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                    . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                    . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'ARTS' ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC LIMIT 248";
        }
        
//        else if($stream === "ARTS")
//        {
//            $sql = "SELECT b.name, b.fname, xi.form_id, a.percentage, a.typ FROM student_basic b"
//                    . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
//                    . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
//                    . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY') ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC";
//        }
        
else if($stream === "ARTS_GEO")
        {
            $sql = "SELECT b.name, b.fname, xi.form_id, a.percentage, a.typ FROM student_basic b"
                    . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                    . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                    . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'ARTS' AND ( xi.el1='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl='GEOGRAPHY') ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC";
        }

        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

}
