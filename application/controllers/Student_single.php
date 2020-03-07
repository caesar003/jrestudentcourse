<?php
class Student_single extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('student_single_model');
    $this->load->model('student_model');
    $this->load->dbforge();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  function index(){
    $pin = $this->input->get('pin',TRUE);
    $nick_name = $this->student_single_model->get_nick_name($pin);
    if($this->student_model->pin_availability($pin)){
        $data['title'] = $nick_name." - ".$pin;
        $data['students'] = $this->student_single_model->get_student($pin);
        $this->load->view('student_single_view', $data);
    } else {
        $data['title'] = "Not found!";
        $data['pin'] = $pin;
        $this->load->view('pin_not_exists',$data);
    }
  }
  function get_student_info(){
    $data = $this->student_single_model->get_student2();
    echo json_encode($data);
  }
  function get_course(){
    $data=$this->student_single_model->get_course();
    echo json_encode($data);
  }
  function get_syllabus(){
    $data = $this->student_single_model->get_syllabus();
    echo json_encode($data);
  }
  function get_syll(){
    $data = $this->student_single_model->get_syll();
    echo json_encode($data);
  }
  function get_tests(){
    $data= $this->student_single_model->get_tests();
    echo json_encode($data);
  }
  function get_fsp(){
    $data = $this->student_single_model->get_fsp();
    echo json_encode($data);
  }
  function get_meeting(){
    $data = $this->student_single_model->get_meeting();
    echo json_encode($data);
  }
  /* new course */
  function meeting_avail(){
    $pin = $this->input->post('p');
    $meeting = $this->input->post('m');
    $student_table = "s_".$pin;
    if ($this->student_single_model->meeting_avail($meeting,$student_table)){
       echo 'true';
    } else {
      echo 'false';
    }
  }
  function test_avail(){
    $pin = $this->input->post('p');
    $test = $this->input->post('test');
    $student_table = "s_".$pin;
    if ($this->student_single_model->test_avail($student_table, $test)){
      echo 'true';
    } else {
      echo 'false';
    }
  }
  function save_course(){
    $data=$this->student_single_model->save_course();
    echo json_encode($data);
  }
  function check_syllabus(){
    $data=$this->student_single_model->check_syllabus();
    echo json_encode($data);
  }
  function create_test(){
    $data=$this->student_single_model->create_test();
    echo json_encode($data);
  }
  function set_aft(){
    $data = $this->student_single_model->set_after_teaching();
    echo json_encode($data);
  }
  function test_edit_avail(){
    $data = $this->student_single_model->test_edit_avail();
    echo json_encode($data);
  }
  function update_course(){
    $data=$this->student_single_model->update_course();
    echo json_encode($data);
  }
  function delete_course(){
    $data = $this->student_single_model->delete_course();
    echo json_encode($data);
  }
  function delete_test(){
    $data = $this->student_single_model->delete_test();
    echo json_encode($data);
  }
  /* syllabus edit */
  function get_all_syllabus(){
    $data = $this->student_single_model->get_all_syllabus();
    echo json_encode($data);
  }
  function assign_syllabus(){
    $data = $this->student_single_model->assign_syllabus();
    echo json_encode($data);
  }
  function assign_syllabus_section(){
    $data = $this->student_single_model->assign_syllabus_section();
    echo json_encode($data);
  }
  function assign_syllabus_topic(){
    $data = $this->student_single_model->assign_syllabus_topic();
    echo json_encode($data);
  }
  /* final speaking performance */
  function add_fsp(){
    $data = $this->student_single_model->add_fsp();
    echo json_encode($data);
  }
  function update_fsp(){
   $data = $this->student_single_model->update_fsp();
    echo json_encode($data);
  }
}
