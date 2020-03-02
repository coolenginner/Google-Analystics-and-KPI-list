<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class MY_Controller extends CI_Controller {
	public $data=[];
	public $Evaluator=[];
	public function __construct()
	{
		parent::__construct();

		// $this->load->library('session');
		// $this->load->helper('url');
	}

    protected function admin_aut() {
        if (!$this->session->userdata('access_token')) {
            redirect(base_url() . 'admin/login/');
        }
    }
   

    protected function Insert_Ignore($data=[],$table='ma_likes'){
        if(count($data)>0){
            $insert_query = $this->db->insert_string($table, $data);
            $insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
            $this->db->query($insert_query);
        }
    }

     
    

}