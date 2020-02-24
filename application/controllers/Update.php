<?php
class Update extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('update_model');
    $this->load->dbforge();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
   function index(){
    $data['title'] = "Update";
    $this->load->view('update_view', $data);
  }
  function get_pin(){
    $data= $this->update_model->get_pin();
    echo json_encode($data);
  }
  function add_col(){
    $data = $this->update_model->add_col();
    echo json_encode($data);
  }
}