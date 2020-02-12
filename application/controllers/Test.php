<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
  function __construct(){
    parent::__construct();
    //$this->load->library('upload');
    $this->load->model('test_model');
    $this->load->model('student_single_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  function index(){
    $pin = $this->input->get('pin');
    $meeting = $this->input->get('meeting');
    $test = $this->input->get('test');
    $student_table = "s_".$pin;
    $data ['title'] = "Test -".$pin." - ".$test;
    $data ['student_detail'] = $this->student_single_model->get_student($pin);
    $data['test_info'] = $this->test_model->test_info($meeting, $student_table);
    $this->load->view('test_view', $data);
  }
  public function uploadSubmit() {	
    if(!empty($_FILES['file_upload']['name'])) {
      $pin = $this->input->post('pin');
      $meeting = $this->input->post('meeting');
      $test = $this->input->post('test');
      $test_table = "t_".$pin."_".$meeting;
      $config['upload_path'] = './assets/students/'.$pin."/".$meeting."/";
      $config['allowed_types'] = '*'; 
      $config['encrypt_name'] = TRUE;
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if(!empty($_FILES['file_upload']['name'])){
        if ($this->upload->do_upload('file_upload')) {
            $data = $this->upload->data();
            $file_name  = $data['file_name'];
            $title = $this->input->post('file_title');
            $result = $this->test_model->upload_file($title, $file_name, $test_table);
            return true;
            //echo json_decode($result);
            //echo base_url().'/assets/students/'.$pin.'/'.$test.'/'.$file_name;
          } else {
            echo 'something went wrong';
           
          }	
        } else {
          echo 'please upload valid file';
          
        }	
        #echo 'uploaded';
      }	
    }
  function test_detail(){
    $pin = $this->input->get('pin');
    $meeting = $this->input->get('meeting');
    $test_table = "t_".$pin."_".$meeting;
    $data = $this->test_model->test_detail($test_table);
    echo json_encode($data);
  }
  function test_files(){
    $data= $this->test_model->get_test_files();
    echo json_encode($data);
  }
}