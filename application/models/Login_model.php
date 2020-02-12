<?php
class Login_model extends CI_Model{

  function validate($username,$password){
    $this->db->where('user_name',$username);
    $this->db->where('user_password',$password);
    $result = $this->db->get('tbl_users',1);
    return $result;
  }

  function reset_password($userid, $username, $hashed_password){
  	$this->db->where('user_id', $userid);
    $this->db->set('user_name', $username);
  	$this->db->set('user_password', $hashed_password);
  	$result = $this->db->update('tbl_users');
  	return $result;
  }
}
