<?php
class Change_syllabus extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('change_syllabus_model');
    $this->load->model('syllabus_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  /* Initiated as the page loaded */
  function index(){
    $this->load->view('change_syllabus_view');
  }
  function get_pin(){
    $data = $this->change_syllabus_model->get_pin();
    echo json_encode($data);
  }
  function make_empty(){
    $data = $this->change_syllabus_model->make_empty();
    echo json_encode($data);
  }
  function insert(){
    $data = $this->syllabus_model->insert();
    echo json_encode($data);
  }
}
