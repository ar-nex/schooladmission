<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
    }
    public function index()
    {
        $this->load->view('header/default_header');
        echo "<h1>This is for test.</h1>";
        $this->load->view('footer/default_footer');
    }

    public function one()
    {
        echo "Hello world.";
    }
}