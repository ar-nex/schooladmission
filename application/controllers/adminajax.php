<?php

class Adminajax extends CI_Controller{
     function __construct() {
        parent::__construct();
        $this->load->model('model_adminajax');
        $this->load->library(array('session'));
    }
    
    public function setdate(){
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $sd = $this->input->post('s');
            $ed = $this->input->post('e');
            $r = $this->model_adminajax->setdate($sd, $ed, $_SESSION['userid']);
            if($r){echo "1";}else{echo "0";}          
        }
    }
    
    public function setPercentage() {
         if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $isci = $this->input->post('isci');
            $iart = $this->input->post('iart');
            $iarg = $this->input->post('iarg');
            $esci = $this->input->post('esci');
            $eart = $this->input->post('eart');
            $earg = $this->input->post('earg');
            $r = $this->model_adminajax->setPercentage($isci, $iarg, $iart, $esci, $earg, $eart, $_SESSION['userid']);
            if($r){echo "1";}else{echo "0";}          
        }
    }
    
    public function getStatics() {
         if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
             $graph_data = $this->model_adminajax->get_graph_data();
             $rt = json_encode(array_values($graph_data));
             echo($rt);
         }
    }
}
