<?php
class Add_score extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('add_score_model');
    $this->load->dbforge();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  /* Initiated as the page loaded */
  function index(){
    $data['title'] = "nothing";
    $this->load->view('add_score_view', $data);
  }
  function get_pin(){
    $data = $this->add_score_model->get_pin();
    echo json_encode($data);
  }
  function add_column(){
    $data = $this->add_score_model->add_column();
    echo json_encode($data);
  }
}
