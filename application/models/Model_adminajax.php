<?php

class Model_adminajax extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function setdate($sd, $ed, $userid) {
        $dates_data = array(
            'start_date' => $sd,
            'end_date' => $ed,
            'admin_id' => $userid
        );
        return $this->db->insert('apply_date', $dates_data);
    }
    
    public function setPercentage($sci, $artGeo, $art, $exSci, $exArtGeo, $exArt, $userid)
    {
        $per_data = array(
            'int_sci' => $sci,
            'int_arts' => $art,
            'int_arts_geo' => $artGeo,
            'ext_sci' => $exSci,
            'ext_arts' => $exArt,
            'ext_arts_geo' => $exArtGeo,
            'admin_id' => $userid
        );
        
        return $this->db->insert('percentage_required', $per_data);
    }

    public function get_total_applied() {
        $sql = 'SELECT COUNT(*) AS count FROM v_admission';
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->count;
    }

    public function get_total_invalid() {
        $sql = "SELECT COUNT(*) AS count FROM v_admission where is_muted = 1";
        $query = $this->db->query($sql);
        $row = $query->row();
        return $row->count;
    }

    public function get_gender_count($sx) {
        $sql = "SELECT COUNT(*) AS count FROM student_basic b"
                . " INNER JOIN v_admission v ON b.id=v.student_basic_id"
                . " WHERE b.sex = ? AND NOT v.is_muted <=>1";
        $binds = array($sx);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        return $row->count;
    }

    public function get_graph_data() {
        $sq1 = 'SELECT DATE(applied_time) AS date, COUNT(form_id) AS count FROM v_admission GROUP BY DATE(applied_time)';
        $query = $this->db->query($sq1);
        return $query->result_array();
    }

}
