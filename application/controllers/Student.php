<?php
class Student extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('student_model');
    $this->load->dbforge();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  /* Initiated as the page loaded */
  function index(){
    $data['title'] = "Home | JRE Online Student Course";
    $this->load->view('student_view', $data);
  }
  function student_data(){
    $data=$this->student_model->student_data();
    echo json_encode($data);
  }
  function after_teaching_data(){
    $data = $this->student_model->after_teaching_list();
    echo json_encode($data);
  }
  /* New Student */
  function pin_availability(){
    $pin = $this->input->post('pin');
    if ($this->student_model->pin_availability($pin)){
      echo 'true';
    } else {
      echo 'false';
    }
  }
  function save(){
    $data=$this->student_model->save_student();
    echo json_encode($data);
  }	
  function course_table(){
    $data=$this->student_model->create_course_table();
    echo json_encode($data);
  }
  function syllabus_table(){
    $data=$this->student_model->create_syllabus_table();
    echo json_encode($data);
  }
  function syllabus_insert(){
    $data=$this->student_model->insert_into_syllabus();
    echo json_encode($data);
  }
  function student_directories(){
    $data=$this->student_model->create_student_directories();
    echo json_encode($data);
  }
  /* Update Student Record */
 function update(){
    $data=$this->student_model->update_student();
    echo json_encode($data);
  }
  function delete_student(){
      $data = $this->student_model->delete_student();
      echo json_encode($data);
  }
  function delete_table(){
      $data = $this->student_model->delete_student();
      echo json_encode($data);
  }
  /* Final Speaking Performance */
  function set_fsp(){
    $data= $this->student_model->set_fsp();
    echo json_encode($data);
  }
  function fsp_table(){
    $data=$this->student_model->create_fsp_table();
    echo json_encode($data);
  }
}