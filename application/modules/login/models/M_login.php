<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_login extends CI_Model {

	function checkLogin($username,$password){
        $this->db->where('username',$username)->where('password',$password);
        return $query = $this->db->get('users')->result();
	}

}
