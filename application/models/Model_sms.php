<?php

class Model_sms extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getRankedFormIdWithMobile($stream) {
        if ($stream == "SCIENCE") {
            $sql = "SELECT xi.form_id, b.mobile FROM xi_admission xi "
                    . " INNER JOIN academic_info_x a ON a.student_basic_id=xi.student_basic_id "
                    . " INNER JOIN student_basic b ON b.id=xi.student_basic_id"
                    . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'SCIENCE' ORDER BY a.percentage DESC, (a.mth+a.psc+a.lsc) DESC";
        } else if ($stream === "ARTS") {
            $sql = "SELECT xi.form_id, b.mobile FROM xi_admission xi "
                    . " INNER JOIN academic_info_x a ON a.student_basic_id=xi.student_basic_id "
                    . " INNER JOIN student_basic b ON b.id=xi.student_basic_id"
                    . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY') ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC";
        } else if ($stream === "ARTS_GEO") {
            $sql = "SELECT xi.form_id, b.mobile FROM xi_admission xi "
                    . " INNER JOIN academic_info_x a ON a.student_basic_id=xi.student_basic_id "
                    . " INNER JOIN student_basic b ON b.id=xi.student_basic_id"
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
    
    public function getFirstPhaseArtsMobile() {
        $sql = "SELECT b.mobile from student_basic b INNER JOIN academic_info_x a on a.student_basic_id = b.id INNER JOIN xi_admission xi on xi.student_basic_id = b.id WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'ARTS' ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC LIMIT 248";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

}
