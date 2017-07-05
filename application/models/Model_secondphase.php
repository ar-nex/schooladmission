<?php

class Model_secondphase extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    public function getCount() {
       $sql = "SELECT count(*) AS count FROM secondphase_arts WHERE 1";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->count;
    }
    
    public function getMerit($limit) {
        $sql = "SELECT name, fname, form_id, percentage FROM secondphase_arts WHERE 1 ORDER BY percentage DESC LIMIT ".$limit;
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($result) {
            return $result;
        } else {
            return FALSE;
        }
    }

}
