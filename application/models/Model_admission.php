<?php

class Model_admission extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAppliedCount($type, $stream) {
        $sql = "";
        switch ($stream) {
            case "ARTS":
                $sql = "SELECT COUNT(*) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE NOT xi.is_muted <=> 1 AND a.typ = ? AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY')";
                break;
            case "ARTS_GEO":
                $sql = "SELECT COUNT(*) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE NOT xi.is_muted <=> 1 AND a.typ = ? AND xi.stream = 'ARTS' AND ( xi.el1='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl='GEOGRAPHY')";
                break;
            case "SCIENCE":
                $sql = "SELECT COUNT(*) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE NOT xi.is_muted <=> 1 AND a.typ = ? AND xi.stream = 'SCIENCE'";
                break;

            default:
                $sql = "";
                break;
        }

        $binds = array($type);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        return $row->Count;
    }

    public function getAdmittedCount($type, $stream) {
        switch ($stream) {
            case "ARTS":
                $sql = "SELECT COUNT(b.id) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE NOT xi.is_muted <=> 1 AND a.typ = ? AND xi.admission_status = 'ADM' AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY')";
                break;
            case "ARTS_GEO":
                $sql = "SELECT COUNT(b.id) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE NOT xi.is_muted <=> 1 AND a.typ = ? AND xi.admission_status = 'ADM' AND xi.stream = 'ARTS' AND ( xi.el1='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl='GEOGRAPHY')";
                break;
            case "SCIENCE":
                $sql = "SELECT COUNT(b.id) AS Count FROM student_basic b"
                        . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                        . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                        . " WHERE NOT xi.is_muted <=> 1 AND a.typ = ? AND xi.admission_status = 'ADM' AND xi.stream = 'SCIENCE'";
                break;

            default:
                $sql = "";
                break;
        }

        $binds = array($type);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        return $row->Count;
    }

    public function getAdmission_day_data($type, $stream) {
        if ($type === "COMBINED") {
            switch ($stream) {
                case "ARTS":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll, xi.admission_status FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY') ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC";

                    break;
                case "ARTS_GEO":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll, xi.admission_status FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'ARTS' AND ( xi.el1='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl='GEOGRAPHY') ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC";

                    break;
                case "SCIENCE":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll, xi.admission_status FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE NOT xi.is_muted <=> 1 AND xi.stream = 'SCIENCE' ORDER BY a.percentage DESC, (a.mth+a.psc+a.lsc) DESC";

                    break;
                default:
                    break;
            }
        } else {

            switch ($stream) {
                case "ARTS":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll, xi.admission_status FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE NOT xi.is_muted <=> 1 AND a.typ = '" . $type . "' AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY') ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC";

                    break;
                case "ARTS_GEO":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll, xi.admission_status FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE NOT xi.is_muted <=> 1 AND a.typ = '" . $type . "' AND xi.stream = 'ARTS' AND ( xi.el1='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl='GEOGRAPHY') ORDER BY a.percentage DESC, (a.bng+a.eng+a.geo+a.his) DESC";

                    break;
                case "SCIENCE":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll, xi.admission_status FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE NOT xi.is_muted <=> 1 AND a.typ = '" . $type . "' AND xi.stream = 'SCIENCE' ORDER BY a.percentage DESC, (a.mth+a.psc+a.lsc) DESC";

                    break;
                default:
                    break;
            }
        }

        $query = $this->db->query($sql);
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

    public function getAdmittedSecRoll($type, $stream) {
        if ($type === "COMBINED") {
            switch ($stream) {
                case "ARTS":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE xi.admission_status = 'ADM' AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY') ORDER BY xi.section ASC, xi.roll ASC";

                    break;
                case "ARTS_GEO":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE xi.admission_status = 'ADM' AND xi.stream = 'ARTS' AND ( xi.el1='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl='GEOGRAPHY') ORDER BY xi.section ASC, xi.roll ASC";

                    break;
                case "SCIENCE":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE xi.admission_status = 'ADM' AND xi.stream = 'SCIENCE' ORDER BY xi.section ASC, xi.roll ASC";

                    break;
                default:
                    break;
            }
        } else {
            switch ($stream) {
                case "ARTS":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE xi.admission_status = 'ADM' AND a.typ = '" . $type . "' AND xi.stream = 'ARTS' AND ( xi.el1 !='GEOGRAPHY' AND xi.el2!='GEOGRAPHY' AND xi.el3!='GEOGRAPHY' AND xi.adl !='GEOGRAPHY') ORDER BY xi.section ASC, xi.roll ASC";

                    break;
                case "ARTS_GEO":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE xi.admission_status = 'ADM' AND a.typ = '" . $type . "' AND xi.stream = 'ARTS' AND ( xi.el1='GEOGRAPHY' OR xi.el2='GEOGRAPHY' OR xi.el3='GEOGRAPHY' OR xi.adl='GEOGRAPHY') ORDER BY xi.section ASC, xi.roll ASC";

                    break;
                case "SCIENCE":
                    $sql = "SELECT b.name, b.fname, b.dob, xi.form_id, xi.section, xi.roll FROM student_basic b"
                            . " INNER JOIN xi_admission xi ON xi.student_basic_id = b.id"
                            . " INNER JOIN academic_info_x a ON a.student_basic_id = b.id"
                            . " WHERE xi.admission_status = 'ADM' AND a.typ = '" . $type . "' AND xi.stream = 'SCIENCE' ORDER BY xi.section ASC, xi.roll ASC";

                    break;
                default:
                    break;
            }
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
