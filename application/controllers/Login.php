<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//use \Curl\Curl;
class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //redirect('admin/login');
        // $this->load->model('User_model');
    }
    
    public function index() {
    	redirect('admin/login');
    }
    public function logout() {
        $this->session->set_userdata('evaluator', '');
        redirect('login');
    }

}
