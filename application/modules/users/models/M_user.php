<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_user extends CI_Model {

  function createUser($username,$password)
  {
    $data = array(
      'username' => $username,
      'password' => $password
    );
    return $this->db->insert('users',$data);
  }
  function listUser()
  {
    return $this->db->get('users')->result();
  }
  function showUser($id)
  {
    return $this->db->where('id',$id)->get('users')->result();
  }
  function editUser($id,$username,$password)
  {
    $cek =  $this->db->where('username',$username)->get('users')->num_rows();
    if ($cek == 1) {
      return 0;
    }
    else {
      $data = array(
        'username' => $username,
        'password' => $password
      );
      $this->db->where('id',$id);
      $data=$this->db->update('users',$data);
      return 1;
    }
  }

}
