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
 function get_sections(){
   $id= $this->input->post('level');
    //$section = $this->input->post('section')
    if($id == 1){
      $syllabus_master = "syll_kids";
    } else if($id ==2){
      $syllabus_master = "syll_elementary";
    } else if($id == 3){
      $syllabus_master = "syll_junior";
    } else if($id == 4){
      $syllabus_master = "syll_senior";
    } else {
      $syllabus_master = "syll_general";
    }
    //$this->db->where('sections', $sections);
    $this->db->where('topics', 0);
    $query = $this->db->get($syllabus_master);
    return $query->result();
 }
  function get_topics(){
    $id = $this->input->post('level');
    $section = $this->input->post('section');
    if($id == 1){
      $syllabus_master = "syll_kids";
    } else if($id ==2){
      $syllabus_master = "syll_elementary";
    } else if($id == 3){
      $syllabus_master = "syll_junior";
    } else if($id == 4){
      $syllabus_master = "syll_senior";
    } else {
      $syllabus_master = "syll_general";
    }
    $this->db->where('sections', $section);
    $this->db->where('topics !=',0);
    $this->db->where('inds', 0);
    $query = $this->db->get($syllabus_master);
    return $query->result();
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
  function check(){
    $pin = $this->input->post('pin');
    $id = $this->input->post('id');
    $stat = $this->input->post('stat');
    $syllabus_table = "sl_".$pin;
    
    $this->db->set('status', $stat);
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
  
} 