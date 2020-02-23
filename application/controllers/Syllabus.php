<?php
class Syllabus extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('syllabus_model');
     $this->load->dbforge();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function get_syllabus(){
    $data = $this->syllabus_model->get_syllabus();
    echo json_encode($data);
  }
  
  function check_topic(){
    $data=$this->syllabus_model->check_topic();
    echo json_encode($data);
  }
  function check_ind(){
    $data=$this->syllabus_model->check_ind();
    echo json_encode($data);
  }
  /*function get_this_topic(){
    if ($this->syllabus_model->get_this_topic()){
      echo 'true';
    } else {
      echo 'false';
    }
  } */
  function get_this_topic(){
    $data = $this->syllabus_model->get_this_topic();
    echo json_encode($data);
  }
  function check_topic_header(){
    $data = $this->syllabus_model->check_topic_header();
    echo json_encode($data);
  }
  function get_sections(){
    $data = $this->syllabus_model->get_sections();
    echo json_encode($data);
  }
  function set_program(){
    $data = $this->syllabus_model->set_program();
    echo json_encode($data);
  }
  function create(){
    $data = $this->syllabus_model->create();
    echo json_encode($data);
  }
  function insert(){
    $data = $this->syllabus_model->insert();
    echo json_encode($data);
  }
  function assign(){
    $data = $this->syllabus_model->assign();
    echo json_encode($data);
    /*$pin = $this->input->post('pin');
    $section = $this->input->post('section');
    //$assign = $this->input->post('assign');
    $syllabus_table = "sl_".$pin;
    $this->db->where('section', $section);
    $this->db->set('assigned', 1);
    $query = $this->db->update($syllabus_table);
    $return $query; */
  }
  function get_topics(){
    $data = $this->syllabus_model->get_topics();
    echo json_encode($data);
  }
  function get_all(){
    $data = $this->syllabus_model->get_all();
    echo json_encode($data);
  }
  function assign_section(){
    $data = $this->syllabus_model->assign_section();
    echo json_encode($data);
  }
  function assign_topic(){
    $data = $this->syllabus_model->assign_topic();
    echo json_encode($data);
  }
  function assign_indicator(){
    $data = $this->syllabus_model->assign_indicator();
    echo json_encode($data);
  }
}