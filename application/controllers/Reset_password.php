<?php
class Reset_password extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
    if($this->session->userdata('logged_in') != TRUE){
          redirect('student');
    }
  }

  function index(){
    $this->load->view('reset_password_view.php');
  }

  function reset_password(){
    $userid      = $this->input->post('id', TRUE);
    $username    = $this->input->post('username', TRUE);
    $password    = md5($this->input->post('new_password',TRUE));
    $password2   = md5($this->input->post('new_password2', TRUE));
    if($password != $password2){
        echo $this->session->set_flashdata('msg','Passwords don&apos;t match');
        redirect('reset_password');
    } else {
        $hashed_password = $password;
    }
    //$validate    = $this->login_model->validate($email,$password);
    $change_password    = $this->login_model->reset_password($userid, $username,$hashed_password);
    if($change_password){
        echo $this->session->set_flashdata('msg', 'Password changed!');
        redirect('login/logout');
    }else{
        echo $this->session->set_flashdata('msg','Something went wrong.');
        redirect('reset_password');
    }
  }
}
