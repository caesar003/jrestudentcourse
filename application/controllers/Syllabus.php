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
  function check(){
    $data=$this->syllabus_model->check();
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
  function insert(){
    echo 'hello';
  }
  function assign(){
    echo 'hello';
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
}