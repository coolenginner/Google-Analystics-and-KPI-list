<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        
    }

    //  User Login Function
    public function Authenticate($email = '', $password = '') {

        if ($email != '' && $password != '') {
            $query = $this->db->query("select * from ma_admin where admin_username = ? and admin_password = ?  limit 1", array($email, $password));
            $result = $query->row();
            $total = $query->num_rows();
            if ($total == 1) {
                return $result;
            }
        }
        return false;
    }


}

?>