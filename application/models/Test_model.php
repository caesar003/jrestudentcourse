<?php 
class Test_model extends CI_Model{
  function test_info($meeting, $student_table){
    $this->db->where('meeting', $meeting);
    $result = $this->db->get($student_table);
    return $result;
  }
  function test_detail($test_table){
    $result = $this->db->get($test_table);
    return $result;
  }
  function upload_file($title,$file_name, $test_table){
    $data = array(
      'title' => $title,
      'file_name' => $file_name, 
    );
    $result=$this->db->insert($test_table,$data);
    return $result;
  }
  function get_test_files(){
    $pin = $this->input->get('pin');
    $meeting = $this->input->get('meeting');
    $test = $this->input->get('test');
    $test_table = "t_".$pin."_".$meeting;
    //$student_table = "s_".$pin;
    $result = $this->db->query("SELECT * FROM `$test_table`");
    return $result->result();
  }
}