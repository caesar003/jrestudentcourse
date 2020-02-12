<?php
class Chat extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('chat_model');
    $this->load->library('upload');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  function show_chat(){
    $data = $this->chat_model->chat_list();
    echo json_encode($data);
  }
  function send_chat(){
    $data = $this->chat_model->send_chat();
    echo json_encode($data);
  }
 function upload_file(){
    $sender = $this->input->post('sender');
    $config['upload_path'] = './assets/messages/'; //path folder
    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf|mp4|docx|mp3|xlsx'; //Allowing types
    $config['encrypt_name'] = TRUE; //encrypt file name 
    $this->upload->initialize($config);
    if(!empty($_FILES['file_atc']['name'])){
      if ($this->upload->do_upload('file_atc')){
        $data   = $this->upload->data();
        $file  = $data['file_name']; //get file name
        $message = $this->input->post('message');
        //$title  = $this->input->post('title');
        $result = $this->chat_model->upload_file($message, $file, $sender);
        echo json_decode($result);
        //redirect ('test?pin='.$pin.'&test='.$test);
            //echo "Upload Successful";
      }else{
        echo "Upload failed. Image file must be gif|jpg|png|jpeg|bmp";
      }
    }else{
      echo "Failed, Image file is empty.";
    }
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
}