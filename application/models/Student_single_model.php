<?php
class Student_single_model extends CI_Model{
  function get_student($pin){
    $this->db->where('pin',$pin);
    $result = $this->db->get('students', 1);
    return $result;
  }
  function get_nick_name($pin){
    $this->db->where('pin', $pin);
    $query = $this->db->get('students');
      if($query->num_rows()>0){
        foreach ($query->result() as $row){
          $name=$row->nick_name;
        }
      } else {
        $name = '';
      }

    return $name;
  }
  function get_student2(){
    $pin = $this->input->post('pin');
    $this->db->where('pin', $pin);
    $result = $this->db->get('students', 1);
    return $result->result();
  }
  function get_course(){
    $pin = $this->input->get('pin');
    $course_table = "s_".$pin;
    $this->db->order_by('meeting', 'ASC');
    $result=$this->db->get($course_table);
    return $result->result();
  }
  function get_syllabus(){
    $pin = $this->input->post('pin');
    $prg = $this->input->post('prg');
    if($prg == 1){
      $syllabus_master = "syll_kids";
    } else if($prg == 2) {
      $syllabus_master = "syll_elementary";
    } else if($prg == 3){
      $syllabus_master = "syll_junior";
    } else if($prg == 4){
      $syllabus_master = "syll_senior";
    } else{
      $syllabus_master = "syll_general";
    }
    $syllabus_table = "sl_".$pin;

    $this->db->select('*');
    $this->db->from($syllabus_table);
    $this->db->where('assigned', '1');
    $this->db->join($syllabus_master, $syllabus_master.'.id = '.$syllabus_table.'.id');
    $this->db->order_by('section', 'asc');
    $this->db->order_by('topic', 'asc');
    $this->db->order_by('ind', 'asc');
    $result = $this->db->get();
    return $result->result();
  }
  function get_syll(){
    $id = $this->input->post('id');
    if($id == 1){
      $syllabus = "syll_kids";
    } else if($id==2){
      $syllabus = "syll_elementary";
    } else if($id==3){
      $syllabus = "syll_junior";
    } else if($id==4){
      $syllabus = "syll_senior";
    } else {
      $syllabus = "syll_general";
    }
    $query = $this->db->get($syllabus);
    return $query->result();
  }
  function get_tests(){
    $pin = $this->input->get('pin');
    $student_table = "s_".$pin;
    $result = $this->db->query("SELECT * FROM `$student_table` WHERE `test` != ''
    ");
    return $result->result();
  }
  function get_fsp(){
    $pin = $this->input->post('pin');
    $fsp_table = "fsp_".$pin;
    $result = $this->db->get($fsp_table);
    return $result->result();
  }
  function get_meeting(){
    $pin = $this->input->post('pin');
    $student_table = "s_".$pin;
    $this->db->order_by('meeting','desc');
    $this->db->select('meeting');
    $query = $this->db->get($student_table);
    return $query->result();
  }
  function meeting_avail($meeting, $student_table){
    $this->db->where('meeting', $meeting);
    $query = $this->db->get($student_table);
    if($query->num_rows()>0){
      return true;
    } else {
      return false;
    }
  }
  function test_avail($student_table, $test){
    $this->db->where('test', $test);
    $query = $this->db->get($student_table);
    if($query->num_rows()>0){
      return true;
    } else {
      return false;
    }
  }
  function test_edit_avail(){
    $pin = $this->input->post('pin');
    $test = $this->input->post('test');
    $student_table = "s_".$pin;
    $this->db->where('test', $test);
    $query = $this->db->get($student_table,1);
    return $query->result();
  }
  function save_course(){
    $pin = $this->input->post('p');
    $course_table = "s_".$pin;
    $data = array(
      'meeting' 	  => $this->input->post('m'),
      'course_date' => $this->input->post('cd'),
      'teacher'     => $this->input->post('tc'),
      'duration'    => $this->input->post('du'),
      'material'	  => $this->input->post('ma'),
      'co'            => $this->input->post('co'),
      'evaluation'  => $this->input->post('ev'),
      'w'			  => $this->input->post('w'),
      's'			  => $this->input->post('s'),
      'test'		  => $this->input->post('test'),
      'test_number'   => $this->input->post('tnu'),
      'test_name'     => $this->input->post('tn'),
      'of_test_number' => $this->input->post('otn'),
      'of_test'        => $this->input->post('ot')
    );
    $result=$this->db->insert($course_table, $data);
    return $result;
  }

  function create_test(){
    $pin = $this->input->post('pin');
    $meeting = $this->input->post('meeting');
    $test_table = "t_".$pin."_".$meeting;
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
    if (!empty($meeting)){
      $result = $this->dbforge->create_table($test_table, TRUE);
      mkdir ('assets/students/'.$pin."/".$meeting);
    } else {
      $result = "";
    }
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
  function update_course(){
    $pin = $this->input->post('p');
    $course_table = "s_".$pin;
    $meeting 	  = $this->input->post('m');
    $course_date  = $this->input->post('cd');
    $teacher      = $this->input->post('tc');
    $duration     = $this->input->post('du');
    $material	  = $this->input->post('ma');
    $co = $this->input->post('co');
    $evaluation   = $this->input->post('ev');
    $w			  = $this->input->post('w');
    $s			  = $this->input->post('s');
    $test		  = $this->input->post('test');
    $test_number  = $this->input->post('tnu');
    $test_name    = $this->input->post('tn');
    $of_test_number = $this->input->post('otn');
    $of_test        = $this->input->post('ot');

    $this->db->set('course_date', $course_date);
    $this->db->set('teacher', $teacher);
    $this->db->set('duration', $duration);
    $this->db->set('material', $material);
    $this->db->set('co', $co);
    $this->db->set('evaluation', $evaluation);
    $this->db->set('w', $w);
    $this->db->set('s', $s);
    $this->db->set('test', $test);
    $this->db->set('test_number', $test_number);
    $this->db->set('test_name', $test_name);
    $this->db->set('of_test_number', $of_test_number);
    $this->db->set('of_test', $of_test);
    $this->db->where('meeting', $meeting);
    $result = $this->db->update($course_table);
    return $result;
  }
  function delete_course(){
    $pin = $this->input->post('pin');
    $m = $this->input->post('m');
    $course_table = "s_".$pin;
    $this->db->where('meeting', $m);
    $query = $this->db->delete($course_table);
    return $query;
  }
  function delete_test(){
    $pin = $this->input->post('pin');
    $m = $this->input->post('m');
    $test_table = "t_".$pin."_".$m;
    $query = $this->dbforge->drop_table($test_table, true);
    return $query;
  }
  function get_all_syllabus(){
    $pin = $this->input->post('pin');
    $syllabus_table = "syll_".$pin;

    $this->db->select('*');
    $this->db->from($syllabus_table);
    $this->db->join('syllabus_master', 'syllabus_master.id = '.$syllabus_table.'.id');
    $this->db->order_by('section', 'asc');
    $this->db->order_by('topic', 'asc');
    $this->db->order_by('ind', 'asc');

    $query = $this->db->get();
    return $query->result();
  }
  function assign_syllabus(){
     $id = $this->input->post('id');
     $assign = $this->input->post('assign');
     $pin = $this->input->post('pin');
     $syllabus_table = "syll_".$pin;
     $this->db->set('assign',$assign);
     $this->db->where('id', $id);
     $query = $this->db->update($syllabus_table);
     return $query;
  }
  function assign_syllabus_section(){
    $section = $this->input->post('section');
    $assign = $this->input->post('assign');
    $pin = $this->input->post('pin');
    $syllabus_table = "syll_".$pin;
    $this->db->set('assign', $assign);
    $this->db->where('section', $section);
    $this->db->set('assign', $assign);
    $query = $this->db->update($syllabus_table);
    return $query;
  }
  function assign_syllabus_topic(){
    $section = $this->input->post('section');
    $topic = $this->input->post('topic');
    $assign = $this->input->post('assign');
    $pin = $this->input->post('pin');
    $syllabus_table = "syll_".$pin;
    $this->db->where('section', $section);
    $this->db->where('topic', $topic);
    $this->db->set('assign', $assign);
    $query = $this->db->update($syllabus_table);
    return $query;
  }
  function add_fsp(){
    $pin = $this->input->post('pin');
    $fsp_table = "fsp_".$pin;
    $data = array(
      'material' =>$this->input->post('topic'),
      'fsp_result' => $this->input->post('fsp_result'),
      'comment' => $this->input->post('comment')
    );
    $result= $this->db->insert($fsp_table, $data);
    return $result;
  }
  function update_fsp(){
    $pin = $this->input->post('pin');
    $id = $this->input->post('id');
    $topic = $this->input->post('topic');
    $fsp_result = $this->input->post('fsp_result');
    $comment = $this->input->post('comment');
    $fsp_table = "fsp_".$pin;

    $this->db->set('material', $topic);
    $this->db->set('comment', $comment);
    $this->db->set('fsp_result', $fsp_result);
    $this->db->where('id', $id);
    $result = $this->db->update($fsp_table);
    return $result;
  }
}
