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
  function remove(){
    $pin = $this->input->post('pin');
    $this->db->where('pin', $pin);
    $this->db->set('after_teaching','');
    $query = $this->db->update('students');
    return $query;
  }
  function update_note(){
    $pin = $this->input->post('pin');
    $str = $this->input->post('str');
    $this->db->where('pin', $pin);
    $this->db->set('note', $str);
    $query = $this->db->update('students');
    return $query;
  }
}