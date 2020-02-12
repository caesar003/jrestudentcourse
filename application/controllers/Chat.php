<?php
class Chat extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('chat_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  
  function show_chat(){
    $data = $this->chat_model->message_list();
    echo json_encode($data);
  }
  function send_message(){
    $data = $this->chat_model->send_message();
    echo json_encode($data);
  }
  function set_unread(){
    $data = $this->chat_model->set_unread();
    echo json_encode($data);
  }
  function get_notif(){
    $data= $this->chat_model->get_notif();
    echo json_encode($data);
  }
  function remove_notif(){
    $data=$this->chat_model->remove_notif();
    echo json_encode($data);
  }

  function do_upload(){
        $config['upload_path']="./assets/images";
        $config['allowed_types']='gif|jpg|png|bmp|mp4|avi|flv|pdf|xlsx|docx|xls|doc|mp3|exe';
        $config['encrypt_name'] = false;
        
        $this->load->library('upload',$config);
      if($this->upload->do_upload("file")){
          $data = $this->upload->data();
          $message= $this->input->post('message');
          $sender = $this->input->post('sender');
          $atch= $data['file_name']; 
          
          $result= $this->chat_model->save_upload($message,$sender, $atch);
          echo json_decode($result);
        }

     }
  
}