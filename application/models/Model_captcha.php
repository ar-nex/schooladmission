<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_captcha extends CI_Model {

    function __construct() {
        $this->load->database();
    }
    
    
    public function addCaptcha($cap) {
        $capData = array(
            'captcha_time' => $cap['time'],
            'ip_address' => $_SERVER['REMOTE_ADDR'],
            'word' => $cap['word']
        );
        
        $query = $this->db->insert_string('captcha', $capData);
        $this->db->query($query);
    }

    
    public function delete_expired($time){
        $this->db->where('captcha_time < ', $time)
        ->delete('captcha');
    }
    
    public function check_captcha($word, $ip, $time1){
       $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?'; 
       $binds = array($word, $ip, $time1);
       $query = $this->db->query($sql, $binds);
       $row = $query->row();
       if($row->count == 0){
           return FALSE;
       }  else {
           return TRUE;    
       }
       
    }

}
