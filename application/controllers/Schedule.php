<?php
class Schedule extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('schedule_model');
    $this->load->dbforge();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  function get_schedules(){
    $data = $this->schedule_model->get_schedules();
    echo json_encode($data);
  }
  function get_schedule(){
    $data = $this->schedule_model->get_schedule();
    echo json_encode($data);
  }
  function get_note(){
    $data = $this->schedule_model->get_note();
    echo json_encode($data);
  }
  function update_note(){
    $data = $this->schedule_model->update_note();
    echo json_encode($data);
  }
  function update(){

    $data = $this->schedule_model->update_schedule();
    echo json_encode($data);
  }
  function get_nick_name(){
    $data = $this->schedule_model->get_nick_name();
    echo json_encode($data);
  }
  function set_nick_name(){
    $data = $this->schedule_model->set_nick_name();
    echo json_encode($data);
  }
  function add_teacher(){
    $data = $this->schedule_model->add_teacher();
    echo json_encode($data);
  }
  function delete_teacher(){
    $data = $this->schedule_model->delete_teacher();
    echo json_encode($data);
  }
  function date_availability(){
    $d = $this->input->post('d');
    if ($this->schedule_model->date_availability($d)){
       echo 'true';
    } else {
      echo 'false';
    }
  }
  function add_schedule(){
   $data = $this->schedule_model->add_schedule();
    echo json_encode($data);
  }
  function create_schedule(){
    $data = $this->schedule_model->create_schedule();
    echo json_encode($data);
  }
  function insert_teachers(){
    $data = $this->schedule_model->insert_teachers();
    echo json_encode($data);
  }
}
