<?php
class Syllabus extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('syllabus_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  /*
  no syllabus
  */ 
  
  /*
  syllabus exists
  */
  function get_syllabus(){
    $data = $this->syllabus_model->get_syllabus();
    echo json_encode($data);
  }
}