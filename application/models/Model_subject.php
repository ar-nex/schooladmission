<?php

class Model_subject extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getData($strm)
    {
       $sql = "";
        switch($strm)
        {
            case "ARTS":
                $sql = "SELECT b.name, xi.form_id, xi.section, xi.roll, xi.el1, xi.el2, xi.el3, xi.adl FROM student_basic b INNER JOIN xi_admission xi ON b.id = xi.student_basic_id WHERE xi.admission_status = 'ADM' AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY') ORDER BY xi.section ASC, xi.roll ASC";
                break;
            case "GEO":
                 $sql = "SELECT b.name, xi.form_id, xi.section, xi.roll, xi.el1, xi.el2, xi.el3, xi.adl FROM student_basic b INNER JOIN xi_admission xi ON b.id = xi.student_basic_id WHERE xi.admission_status = 'ADM' AND xi.stream = 'ARTS' AND ( xi.el1 ='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl ='GEOGRAPHY') ORDER BY xi.section ASC, xi.roll ASC";
                break;
            case "SCIENCE":
                 $sql = "SELECT b.name, xi.form_id, xi.section, xi.roll, xi.el1, xi.el2, xi.el3, xi.adl FROM student_basic b INNER JOIN xi_admission xi ON b.id = xi.student_basic_id WHERE xi.admission_status = 'ADM' AND xi.stream = 'SCIENCE' ORDER BY xi.section ASC, xi.roll ASC";
                break;
            default:
                break;
        }
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    public function getDataAll()
    {
         $sql = "SELECT b.name, xi.form_id, xi.section, xi.roll, xi.el1, xi.el2, xi.el3, xi.adl FROM student_basic b INNER JOIN xi_admission xi ON b.id = xi.student_basic_id WHERE xi.admission_status = 'ADM' ORDER BY xi.section ASC, xi.roll ASC";
         $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
}