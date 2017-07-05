<?php

class Download extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_download');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index() {
        if ((isset($_SESSION['authenticated'])) && $_SESSION['authenticated'] === "nm11") {
            $admin['logged_admin'] = $_SESSION['user'];
            $data = $this->model_download->getData();
            $output = '';
            if (!$data) {
                echo "There is no data";
            } else {
                $output .= '
                    <table class="table" bordered="1">
                    <tr>
                    <td>Student Name</td>
                    <td>Father Name</td>
                    <td>Mother Name</td>
                    <td>Guardian Name</td>
                    <td>Guardian Relation</td>
                    <td>Guardian Occupation</td>
                    <td>Date of Birth</td>
                    <td>Sex</td>
                    <td>Roll</td>
                    <td>SubjectComboId</td>
                    <td>Present Address</td>
                    <td>Permanant Address</td>
                    <td>Mobile</td>
                    <td>Guardian Mobile</td>
                    <td>Email</td>
                    </tr>';
                
              foreach ($data as $k){
              $output .= '
			<tr>
                        <td>'.$k["name"].'</td>
                        <td>'.$k["fname"].'</td>
                        <td>'.$k["mname"].'</td>
                        <td>'.$k["gname"].'</td>
                        <td>'.$k["grel"].'</td>
                        <td>'.$k["guardian_occu"].'</td>
                        <td>'.$k["dob"].'</td>
                        <td>'.$k["sex"].'</td>
                        <td>'.$k["roll"].'</td>
                        <td></td>
                        <td>'.$k["addresslane1a"].', Vill. '.$k["addresslane1"].', P.O. '.$k["addresslane2"].', PS. '.$k["ps"].', Dist. '.$k["dist"].', PIN '.$k["pin"].'</td>
                        <td>'.$k["p_addresslane1a"].', Vill. '.$k["p_addresslane1"].', P.O. '.$k["p_addresslane2"].', PS. '.$k["p_ps"].', Dist. '.$k["p_dist"].', PIN '.$k["p_pin"].'</td>
                       <td></td>
                       <td>'.$k['mobile'].'</td>
                       <td>'.$k['email'].'</td>
</tr>';
              }  
            $output .='</table>';
				
	    header("Content-Type: application/vnd-ms-excel");
	    header("Content-Disposition: attachment; filename=xi2017.xls");
	    echo $output;
            }
        } else {
            $this->_showUnauthorizePage();
        }
    }

    private function _showUnauthorizePage() {
        $this->load->view('header/default_header');
        $this->load->view('nav/default_nav');
        $this->load->view('admin/accessdenied');
        $this->load->view('footer/default_footer');
    }

}
