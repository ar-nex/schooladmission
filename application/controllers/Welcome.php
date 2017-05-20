<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('model_home');
    }

    public function index(){
        
        $daterange = $this->model_home->get_date();
        $percertage = $this->model_home->get_percentage_required();
        
        if ($daterange) {
            $data['dt'] = $daterange;
        } else {
            $data['dt'] = array('start_date' => 'Not defined', 'end_date' => 'Not defined');
        }
        if ($percertage) {
            $data['percentage'] = $percertage;
        } else {
            $data['percentage'] = array('int_sci' => 0, 'int_arts' => 0, 'int_arts_geo' => 0, 'ext_sci' => 0, 'ext_arts' =>0, 'ext_arts_geo' => 0);
        }
        $this->load->view('header/default_header');
        $this->load->view('home/main', $data);
        $this->load->view('footer/footer_section');
        $this->load->view('footer/default_footer');
    }
}
