<?php
class Model_admissionnew extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getAppliedCount($gen, $stream) {
        $sql = "";
        switch ($stream) {
            case "ARTS":
                $sql = "SELECT COUNT(*) AS Count FROM firstphase_arts"                       
                        . " WHERE sex = ? AND ( el1 !='GEOGRAPHY' AND el2!='GEOGRAPHY' AND el3!='GEOGRAPHY' AND adl !='GEOGRAPHY')";
                break;
            case "ARTS_GEO":
                $sql = "SELECT COUNT(*) AS Count FROM firstphase_arts"                       
                        . " WHERE sex = ? AND ( el1='GEOGRAPHY' OR el2='GEOGRAPHY' OR el3='GEOGRAPHY' OR adl='GEOGRAPHY')";
                break;
            case "SCIENCE":
                $sql = "SELECT COUNT(*) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE sex = ? AND NOT xi.is_muted <=> 1 AND xi.stream = 'SCIENCE'";
                break;

            default:
                $sql = "";
                break;
        }

        $binds = array($gen);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        return $row->Count;
    }
    
    
    
    public function getAdmittedCount($gen, $stream) {
        switch ($stream) {
            case "ARTS":
                $sql = "SELECT COUNT(*) AS Count FROM firstphase_arts"                       
                        . " WHERE sex = ? AND admission_status = 'ADM' AND ( el1 !='GEOGRAPHY' AND el2!='GEOGRAPHY' AND el3!='GEOGRAPHY' AND adl !='GEOGRAPHY')";
                break;
            case "ARTS_GEO":
                $sql = "SELECT COUNT(*) AS Count FROM firstphase_arts"                       
                        . " WHERE sex = ? AND admission_status = 'ADM' AND ( el1='GEOGRAPHY' OR el2='GEOGRAPHY' OR el3='GEOGRAPHY' OR adl='GEOGRAPHY')";
                break;
            case "SCIENCE":
                $sql = "SELECT COUNT(*) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE sex = ? AND xi.admission_status = 'ADM' AND NOT xi.is_muted <=> 1 AND xi.stream = 'SCIENCE'";
                break;

            default:
                $sql = "";
                break;
        }

        $binds = array($gen);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        return $row->Count;
    }
    
    
    public function getAdmittedSecRoll($stream, $gen) {
            switch ($stream) {
                case "ARTS":
                    $sql = "SELECT name, fname, dob, form_id, section, roll FROM firstphase_arts"
                            . " WHERE admission_status = 'ADM' AND sex= ? AND ( el1 !='GEOGRAPHY' AND el2!='GEOGRAPHY' AND el3!='GEOGRAPHY' AND adl !='GEOGRAPHY') ORDER BY section ASC, roll ASC";

                    break;
                case "ARTS_GEO":
                    $sql = "SELECT name, fname, dob, form_id, section, roll FROM firstphase_arts"
                            . " WHERE admission_status = 'ADM' AND sex= ? AND ( el1='GEOGRAPHY' OR el2='GEOGRAPHY' OR el3='GEOGRAPHY' OR adl='GEOGRAPHY') ORDER BY section ASC, roll ASC";

                    break;
                case "SCIENCE":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE xi.admission_status = 'ADM' AND b.sex= ? AND xi.stream = 'SCIENCE' ORDER BY xi.section ASC, xi.roll ASC";

                    break;
                default:
                    break;
            }
    
        $binds = array($gen);
        $query = $this->db->query($sql, $binds);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }
    
    public function setAbsent($fid) {
        $sql = "UPDATE xi_admission SET admission_status = 'ABS' WHERE form_id='" . $fid . "'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function setRejected($fid, $r) {
        $sql = "UPDATE xi_admission SET admission_status = 'REJ', mute_remark = '" . $r . "'  WHERE form_id='" . $fid . "'";
        $query = $this->db->query($sql);
        return $query;
    }

    public function setAdmitted($fid, $fr, $fsc) {
        $sql = "UPDATE xi_admission SET admission_status = 'ADM', roll='" . $fr . "', section='" . $fsc . "' WHERE form_id='" . $fid . "'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function getAdmission_day_data($stream, $gen) {
     
            switch ($stream) {
                case "ARTS":
                    $sql = "SELECT name, fname, dob, form_id, section, roll, admission_status FROM firstphase_arts"
                            . " WHERE sex = ? AND (el1 !='GEOGRAPHY' AND el2!='GEOGRAPHY' AND el3!='GEOGRAPHY' AND adl !='GEOGRAPHY') ORDER BY form_id";

                    break;
                case "ARTS_GEO":
                    $sql = "SELECT name, fname, dob, form_id, section, roll, admission_status FROM firstphase_arts"
                            . " WHERE sex = ? AND ( el1='GEOGRAPHY' OR el2='GEOGRAPHY' OR el3='GEOGRAPHY' OR adl='GEOGRAPHY') ORDER BY form_id";

                    break;
                case "SCIENCE":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll, xi.admission_status FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE NOT xi.is_muted <=> 1 AND b.sex = ? AND xi.stream = 'SCIENCE' ORDER BY xi.form_id";

                    break;
                default:
                    break;
            }

        $binds = array($gen);
        $query = $this->db->query($sql, $binds);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

}