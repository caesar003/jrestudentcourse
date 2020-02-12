<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }
  function index(){
    $this->load->view('elegant_login.php');
    if($this->session->userdata('logged_in') == TRUE){
          redirect('student');
    }
  }

  function auth(){
    $username    = $this->input->post('username', TRUE);
    $password    = md5($this->input->post('password',TRUE));
    $validate    = $this->login_model->validate($username,$password);
    if($validate->num_rows() > 0){
      $data    = $validate->row_array();
      $id      = $data['user_id'];
      $name    = $data['user_name'];
      $level   = $data['user_level'];
      $avatar  = $data['avatar'];
      $sesdata = array(
        'id'        => $id,
        'username'  => $name,
        'level'     => $level,
        'avatar'    => $avatar,
        'logged_in' => TRUE
      );
      $this->session->set_userdata($sesdata);
      // access login for admin
      redirect('student');
       /* if($level === '1'){
            redirect('page');

        // access login for staff
        }elseif($level === '2'){
            redirect('page/staff');

        // access login for author
        }else{
            redirect('page/author');
        }*/
    }else{
      echo $this->session->set_flashdata('msg','Username or Password is Wrong');
      redirect('login');
    }
  }

  function logout(){
    $this->session->sess_destroy();
    redirect('login');
  }
}
