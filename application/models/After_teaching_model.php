<?php
class After_teaching_model extends CI_Model{
  function get_list(){
    $this->db->where('after_teaching','yes');
    $query = $this->db->get('students');
    return $query->result();
  }
  function get_course(){
    $pin = $this->input->post('pin');
    $course_table = "s_".$pin;
    $this->db->order_by('meeting', 'desc');
    $this->db->limit(5);
    $query = $this->db->get($course_table);
    return $query->result();
  }
}