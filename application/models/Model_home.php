<?php

class Model_home extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_date() {
        $sql = 'select * from apply_date ORDER BY id DESC LIMIT 1;';
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

}
