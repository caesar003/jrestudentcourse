<?php
class After_teaching extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('after_teaching_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
    
  }
  /* Initiated as the page loaded */
  function index(){
    
    if($this->session->userdata('level')==17){
      $data['title'] = "After Teaching | JRE Online Student Course";
      $this->load->view('after_teaching_view', $data);
    } else {
      $data['title'] =  "Access forbidden";
      $this->load->view('unauthorized', $data);
    }
    
  }
  function get_list(){
    $data = $this->after_teaching_model->get_list();
    echo json_encode($data);
  }
  function get_course(){
    $data = $this->after_teaching_model->get_course();
    echo json_encode($data);
  }
  function remove(){
    $data = $this->after_teaching_model->remove();
    echo json_encode($data);
  }
  function update_note(){
    $data = $this->after_teaching_model->update_note();
    echo json_encode($data);
  }
}