<?php
class Syllabus_model extends CI_Model{
  function course_list(){
    $pin = $this->input->get('pin');
    $course_table = "s_".$pin;
    $this->db->order_by('meeting', 'DESC');
    $result=$this->db->get($course_table);
    return $result->result();
  }
  function get_student($pin){
    $this->db->where('pin',$pin);
    $result = $this->db->get('students', 1); 
    return $result;
  }
  function get_student_info(){
    $pin = $this->input->get('pin');
    $this->db->where('pin', $pin);
    $result = $this->db->get('students', 1);
    return $result->result();
  }
  function meeting_availability($meeting, $student_table){
    $this->db->where('meeting', $meeting);
    $query = $this->db->get($student_table);
    if($query->num_rows()>0){
      return true;
    } else {
      return false;
    }
  }
  function get_syllabus(){
    $pin = $this->input->get('pin');
    $syllabus_table = "syllabus_".$pin;
    $result = $this->db->get($syllabus_table);
    return $result->result();
  }
  
  function save_course(){
    $pin = $this->input->get('pin');
    $course_table = "s_".$pin;
    $data = array(
      'meeting' 	  => $this->input->post('meeting'),
      'course_date' => $this->input->post('course_date'),
      'teacher'     => $this->input->post('teacher'),
      'duration'    => $this->input->post('duration'),
      'material'	  => $this->input->post('material'),
      'evaluation'  => $this->input->post('evaluation'),
      'w'			  => $this->input->post('w'),
      's'			  => $this->input->post('s'),
      'test'		  => $this->input->post('test'),
    );
    $result=$this->db->insert($course_table, $data);
    return $result;
  }
  
  function update_course(){
    $pin = $this->input->get('pin');
    $course_table = "s_".$pin;
    $meeting 	  = $this->input->post('meeting');
    $course_date  = $this->input->post('course_date');
    $teacher      = $this->input->post('teacher');
    $duration     = $this->input->post('duration');
    $material	  = $this->input->post('material');
    $evaluation   = $this->input->post('evaluation');
    $w			  = $this->input->post('w');
    $s			  = $this->input->post('s');
    $test		  = $this->input->post('test');
    
    $this->db->set('course_date', $course_date);
    $this->db->set('teacher', $teacher);
    $this->db->set('duration', $duration);
    $this->db->set('material', $material);
    $this->db->set('evaluation', $evaluation);
    $this->db->set('w', $w);
    $this->db->set('s', $s);
    $this->db->set('test', $test);
    $this->db->where('meeting', $meeting);
    $result = $this->db->update($course_table);
    return $result;
  }
  
  function check_syllabus(){
    $pin = $this->input->get('pin');
    $id = $this->input->get('id');
    $syllabus_table = "syllabus_".$pin;
    
    $this->db->set('status', 1);
    $this->db->where('id', $id);
    $result = $this->db->update($syllabus_table);
    return $result;
  }
  function uncheck_syllabus(){
    $pin = $this->input->get('pin');
    $id = $this->input->get('id');
    $syllabus_table = "syllabus_".$pin;

    $this->db->set('status', 0);
    $this->db->where('id', $id);
    $result = $this->db->update($syllabus_table);
    return $result;
  }
  function set_after_teaching(){
    $pin = $this->input->post('pin');
    $after_teaching = $this->input->post('after_teaching');
    $this->db->set('after_teaching', $after_teaching);
    $this->db->where('pin', $pin);
    $result = $this->db->update('students');
    return $result;
  }
  function create_test_table(){
    $pin = $this->input->post('pin');
    $test = $this->input->post('test');
    $test_table = "test_".$pin."_".$test;
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'title' => array(
        'type' => 'varchar',
        'constraint' => '255',
        'default' => ''
      ),
      'file_name' => array(
        'type' =>'VARCHAR',
        'constraint' => '255',
        'default' => ''
      )
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    if (!empty($test)){
      $result = $this->dbforge->create_table($test_table, TRUE);
      mkdir ('assets/students/'.$pin."/".$test);
    } else {
      $result = "";
    }
    return $result;
  }
  function get_all_tests(){
    $pin = $this->input->get('pin');
    $student_table = "s_".$pin;
    $result = $this->db->query("SELECT * FROM `$student_table` WHERE `test` != ''
    ");
    return $result->result();
  }
} 