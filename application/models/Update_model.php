<?php
class Update_model extends CI_Model{
  function get_pin(){
    $this->db->select('pin');
    $query = $this->db->get('students');
    return $query->result();
  }
 function add_col(){
   $pin = $this->input->post('pin');
   $student_table = "s_".$pin;
   
   $fields = array(
        'co' => array(
          'type' => 'int',
          'constraint' => 11,
          'after' => 'material'
        )
    );
   $query = $this->dbforge->add_column($student_table, $fields);
   return $query;
 } 
}