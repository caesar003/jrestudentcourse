<?php
class Add_score_model extends CI_Model{
  function get_pin(){
    $this->db->select('pin');
    $this->db->where('program_id !=', null);
    $query = $this->db->get('students');
    return $query->result();
  }
 function add_column(){
   $pin = $this->input->post('pin');
   $syllabus_table = "sl_".$pin;

   $fields = array(
        'wr' => array(
          'type' => 'int',
          'constraint' => 11,
          'after' => 'ind'
        ),
        'sp' => array(
          'type' => 'int',
          'constraint' => 11,
          'after' => 'wr'
        )
    );
   $query = $this->dbforge->add_column($syllabus_table, $fields);
   return $query;
 }
}
