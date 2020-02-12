<?php
class Chat_model extends CI_Model{
  function save_upload($message,$sender, $atch){
		$data = array(
	        	'message' 	=> $message,
	        	'sender' => $sender,
	        	'atch' => $atch
	       	);  
	    $result= $this->db->insert('chat_messages',$data);
	    return $result;
	}
	function message_list(){
    $this->db->order_by('sent_date', 'ASC');
    $this->db->select('*');
    $this->db->from('chat_messages');
    $this->db->join('tbl_users', 'chat_messages.sender = tbl_users.user_id');
    $result = $this->db->get();
    return $result->result();
  }
  function send_message(){
    $data = array(
      'message' => $this->input->post('message'),
      'sender'  => $this->input->post('sender')
    );
    $result=$this->db->insert('chat_messages', $data);
    return $result;
  }
  function set_unread(){
    $sender = $this->input->post('sender');
    $this->db->set('unread_message', 'yes');
    $this->db->where('user_id !=', $sender);
    $result = $this->db->update('tbl_users');
    return $result;
  }
	
  function get_notif(){
    $sender = $this->input->get('sender');
    $this->db->where('user_id', $sender);
    $result = $this->db->get('tbl_users');
    return $result->result();
  }

  function remove_notif(){
    $sender = $this->input->get('sender');
    $this->db->set('unread_message', 'no');
    $this->db->where('user_id', $sender);
    $result = $this->db->update('tbl_users');
    return $result;
  }
  
}
