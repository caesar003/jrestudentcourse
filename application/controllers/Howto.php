<?php
class Howto extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  /* Initiated as the page loaded */
  function index(){
    $data['title'] = "How to guide| JRE Online Student Course";
    $this->load->view('howto', $data);
  }
}
