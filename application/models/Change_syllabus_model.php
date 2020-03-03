<?php
class Change_syllabus_model extends CI_Model{
  function get_pin(){
    $this->db->where('program_id', 1);
    $query = $this->db->get('students');
    return $query->result();
  }
  function make_empty(){
    $pin = $this->input->post('pin');
    $syllabus_table = "sl_".$pin;
    $query = $this->db->query("TRUNCATE `$syllabus_table`");
    return $query;
  }
}
