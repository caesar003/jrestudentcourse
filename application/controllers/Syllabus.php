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
  function check(){
    $data=$this->syllabus_model->check();
    echo json_encode($data);
  }
  /*
  no syllabus
  */
  function get_sections(){
    $data = $this->syllabus_model->get_sections();
    echo json_encode($data);
  }
  function get_topics(){
    $data = $this->syllabus_model->get_topics();
    echo json_encode($data);
  }
}