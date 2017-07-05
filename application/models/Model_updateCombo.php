<?php

class Model_updateCombo extends CI_Model {

    function __construct() {
        $this->load->database();
    }
    
    public function GetCombo($fid) {
        $sql = "SELECT stream, el1, el2, el3, adl FROM xi_admission WHERE form_id = '".$fid."'";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
                $val = $result[0];
                return $val;
        } else {
                return FALSE;
        }
    }
    
    public function SetCombo($fid, $el1, $el2, $el3, $adl) {
        $sql = "UPDATE xi_admission SET el1='".$el1."', el2='".$el2."', el3='".$el3."', adl='".$adl."' WHERE form_id='".$fid."'";
        $query = $this->db->query ( $sql);
        return $query;    
    }

}
