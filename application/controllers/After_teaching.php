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
    $data['title'] = "After Teaching | JRE Online Student Course";
    $this->load->view('after_teaching_view', $data);
  }
}