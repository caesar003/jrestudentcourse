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
  function check_ind(){
    $pin            = $this->input->post('pin');
    $id             = $this->input->post('id');
    $status         = $this->input->post('status');
    $syllabus_table = "sl_".$pin;
    
    $this->db->where('id', $id);
    $this->db->set('status', $status);
    $query = $this->db->update($syllabus_table);
    return $query;
  }
  function check_topic(){
    $pin = $this->input->post('pin');
    $section = $this->input->post('section');
    $topic = $this->input->post('topic');
    $status = $this->input->post('status');
    
    $syllabus_table = "sl_".$pin;
    
    $this->db->where('section', $section);
    $this->db->where('topic', $topic);
    $this->db->set('status', $status);
    $query = $this->db->update($syllabus_table);
    return $query;
  }
  function get_this_topic(){
    $pin = $this->input->post('pin');
    $section = $this->input->post('section');
    $topic = $this->input->post('topic');
    $status = $this->input->post('status');
    
    $syllabus_table = "sl_".$pin;
    
    $this->db->where('section', $section);
    $this->db->where('topic', $topic);
    $this->db->where('ind !=',0);
    $this->db->where('status !=', $status);
    
    $query = $this->db->get($syllabus_table);
    return $query->result();
  }
  function check_topic_header(){
    $pin = $this->input->post('pin');
    $section = $this->input->post('section');
    $topic = $this->input->post('topic');
    
    $syllabus_table = "sl_".$pin;
    
    $this->db->where('section', $section);
    $this->db->where('topic', $topic);
    $this->db->where('ind', 0);
    $this->db->set('status', 0);
    $query = $this->db->update($syllabus_table);
    return $query;
    
  }
  function set_program(){
    $pin = $this->input->post('pin');
    $program = $this->input->post('level');
    $this->db->where('pin',$pin);
    $this->db->set('program_id', $program);
    $query = $this->db->update('students');
    return $query;
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
  function create(){
    $pin = $this->input->post('pin');
    $syllabus_table = "sl_".$pin;
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'section' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'topic' => array(
        'type' =>'INT',
        'constraint' => 11
      ),
      'ind' => array(
        'type' => 'INT',
        'constraint' => 11
      ),
      'status' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ),
      'assigned' => array(
        'type' => 'varchar',
        'constraint' => '255',
        'default' => '',
      )
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    $result = $this->dbforge->create_table($syllabus_table, TRUE);
    return $result;
  }
  function insert(){
    $pin 			= $this->input->post('pin');
    $prg            = $this->input->post('level');
    $syllabus_table = "sl_".$pin;
    
    if($prg == "1"){
      // elementary kids
      $query          = $this->db->query("INSERT INTO `$syllabus_table` 
      (`id`, `section`, `topic`, `ind`, `status`, `assigned`)
      VALUES
        (1, 1, 0, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 1, 0, 0),
(4, 1, 1, 2, 0, 0),
(5, 1, 1, 3, 0, 0),
(6, 1, 2, 0, 0, 0),
(7, 1, 2, 1, 0, 0),
(8, 1, 2, 2, 0, 0),
(9, 1, 2, 3, 0, 0),
(10, 1, 3, 0, 0, 0),
(11, 1, 3, 1, 0, 0),
(12, 1, 3, 2, 0, 0),
(13, 1, 4, 0, 0, 0),
(14, 1, 4, 1, 0, 0),
(15, 1, 4, 2, 0, 0),
(16, 1, 4, 3, 0, 0),
(17, 1, 5, 0, 0, 0),
(18, 1, 5, 1, 0, 0),
(19, 1, 5, 2, 0, 0),
(20, 1, 5, 3, 0, 0),
(21, 1, 6, 0, 0, 0),
(22, 1, 6, 1, 0, 0),
(23, 1, 6, 2, 0, 0),
(24, 1, 6, 3, 0, 0),
(25, 1, 7, 0, 0, 0),
(26, 1, 7, 1, 0, 0),
(27, 1, 7, 2, 0, 0),
(28, 1, 8, 0, 0, 0),
(29, 1, 8, 1, 0, 0),
(30, 1, 8, 2, 0, 0),
(31, 1, 8, 3, 0, 0),
(32, 1, 9, 0, 0, 0),
(33, 1, 9, 1, 0, 0),
(34, 1, 9, 2, 0, 0),
(35, 1, 9, 3, 0, 0),
(36, 1, 10, 0, 0, 0),
(37, 1, 10, 1, 0, 0),
(38, 1, 10, 2, 0, 0),
(39, 1, 10, 3, 0, 0),
(40, 1, 11, 0, 0, 0),
(41, 1, 11, 1, 0, 0),
(42, 1, 11, 2, 0, 0),
(43, 1, 11, 3, 0, 0),
(44, 2, 0, 0, 0, 0),
(45, 2, 1, 0, 0, 0),
(46, 2, 1, 1, 0, 0),
(47, 2, 1, 2, 0, 0),
(48, 2, 1, 3, 0, 0),
(49, 2, 2, 0, 0, 0),
(50, 2, 2, 1, 0, 0),
(51, 2, 2, 2, 0, 0),
(52, 2, 2, 3, 0, 0),
(53, 2, 3, 0, 0, 0),
(54, 2, 3, 1, 0, 0),
(55, 2, 3, 2, 0, 0),
(56, 2, 4, 0, 0, 0),
(57, 2, 4, 1, 0, 0),
(58, 2, 4, 2, 0, 0),
(59, 2, 4, 3, 0, 0),
(60, 2, 5, 0, 0, 0),
(61, 2, 5, 1, 0, 0),
(62, 2, 5, 2, 0, 0),
(63, 2, 5, 3, 0, 0),
(64, 2, 6, 0, 0, 0),
(65, 2, 6, 1, 0, 0),
(66, 2, 6, 2, 0, 0),
(67, 2, 7, 0, 0, 0),
(68, 2, 7, 1, 0, 0),
(69, 2, 7, 2, 0, 0),
(70, 2, 8, 0, 0, 0),
(71, 2, 8, 1, 0, 0),
(72, 2, 8, 2, 0, 0),
(73, 2, 9, 0, 0, 0),
(74, 2, 9, 1, 0, 0),
(75, 2, 9, 2, 0, 0),
(76, 2, 10, 0, 0, 0),
(77, 2, 10, 1, 0, 0),
(78, 2, 10, 2, 0, 0),
(79, 2, 11, 0, 0, 0),
(80, 2, 11, 1, 0, 0),
(81, 2, 11, 2, 0, 0),
(82, 2, 11, 3, 0, 0),
(83, 3, 0, 0, 0, 0),
(84, 3, 1, 0, 0, 0),
(85, 3, 1, 1, 0, 0),
(86, 3, 1, 2, 0, 0),
(87, 3, 1, 3, 0, 0),
(88, 3, 2, 0, 0, 0),
(89, 3, 2, 1, 0, 0),
(90, 3, 2, 2, 0, 0),
(91, 3, 2, 3, 0, 0),
(92, 3, 3, 0, 0, 0),
(93, 3, 3, 1, 0, 0),
(94, 3, 3, 2, 0, 0),
(95, 3, 3, 3, 0, 0),
(96, 3, 4, 0, 0, 0),
(97, 3, 4, 1, 0, 0),
(98, 3, 4, 2, 0, 0),
(99, 3, 5, 0, 0, 0),
(100, 3, 5, 1, 0, 0),
(101, 3, 5, 2, 0, 0),
(102, 3, 5, 3, 0, 0),
(103, 3, 6, 0, 0, 0),
(104, 3, 6, 1, 0, 0),
(105, 3, 6, 2, 0, 0),
(106, 3, 6, 3, 0, 0),
(107, 3, 7, 0, 0, 0),
(108, 3, 7, 1, 0, 0),
(109, 3, 7, 2, 0, 0),
(110, 3, 8, 0, 0, 0),
(111, 3, 8, 1, 0, 0),
(112, 3, 8, 2, 0, 0),
(113, 3, 9, 0, 0, 0),
(114, 3, 9, 1, 0, 0),
(115, 3, 9, 2, 0, 0),
(116, 3, 9, 3, 0, 0),
(117, 3, 10, 0, 0, 0),
(118, 3, 10, 1, 0, 0),
(119, 3, 10, 2, 0, 0),
(120, 4, 0, 0, 0, 0),
(121, 4, 1, 0, 0, 0),
(122, 4, 1, 1, 0, 0),
(123, 4, 1, 2, 0, 0),
(124, 4, 2, 0, 0, 0),
(125, 4, 2, 1, 0, 0),
(126, 4, 2, 2, 0, 0),
(127, 4, 3, 0, 0, 0),
(128, 4, 3, 1, 0, 0),
(129, 4, 3, 2, 0, 0),
(130, 4, 4, 0, 0, 0),
(131, 4, 4, 1, 0, 0),
(132, 4, 4, 2, 0, 0),
(133, 4, 5, 0, 0, 0),
(134, 4, 5, 1, 0, 0),
(135, 4, 5, 2, 0, 0),
(136, 4, 6, 0, 0, 0),
(137, 4, 6, 1, 0, 0),
(138, 4, 6, 2, 0, 0),
(139, 4, 7, 0, 0, 0),
(140, 4, 7, 1, 0, 0),
(141, 4, 7, 2, 0, 0),
(142, 4, 8, 0, 0, 0),
(143, 4, 8, 1, 0, 0),
(144, 4, 8, 2, 0, 0),
(145, 4, 9, 0, 0, 0),
(146, 4, 9, 1, 0, 0),
(147, 4, 9, 2, 0, 0),
(148, 4, 10, 0, 0, 0),
(149, 4, 10, 1, 0, 0),
(150, 4, 10, 2, 0, 0),
(151, 4, 11, 0, 0, 0),
(152, 4, 11, 1, 0, 0),
(153, 4, 11, 2, 0, 0),
(154, 5, 0, 0, 0, 0),
(155, 5, 1, 0, 0, 0),
(156, 5, 1, 1, 0, 0),
(157, 5, 1, 2, 0, 0),
(158, 5, 2, 0, 0, 0),
(159, 5, 2, 1, 0, 0),
(160, 5, 2, 2, 0, 0),
(161, 5, 2, 3, 0, 0),
(162, 5, 3, 0, 0, 0),
(163, 5, 3, 1, 0, 0),
(164, 5, 3, 2, 0, 0),
(165, 5, 4, 0, 0, 0),
(166, 5, 4, 1, 0, 0),
(167, 5, 4, 2, 0, 0),
(168, 5, 5, 0, 0, 0),
(169, 5, 5, 1, 0, 0),
(170, 5, 5, 2, 0, 0),
(171, 5, 5, 3, 0, 0),
(172, 5, 6, 0, 0, 0),
(173, 5, 6, 1, 0, 0),
(174, 5, 6, 2, 0, 0),
(175, 5, 7, 0, 0, 0),
(176, 5, 7, 1, 0, 0),
(177, 5, 7, 2, 0, 0),
(178, 5, 8, 0, 0, 0),
(179, 5, 8, 1, 0, 0),
(180, 5, 8, 2, 0, 0),
(181, 5, 9, 0, 0, 0),
(182, 5, 9, 1, 0, 0),
(183, 5, 9, 2, 0, 0),
(184, 5, 9, 3, 0, 0),
(185, 5, 10, 0, 0, 0),
(186, 5, 10, 1, 0, 0),
(187, 5, 10, 2, 0, 0),
(188, 5, 10, 3, 0, 0),
(189, 5, 11, 0, 0, 0),
(190, 5, 11, 1, 0, 0),
(191, 5, 11, 2, 0, 0),
(192, 5, 11, 3, 0, 0),
(193, 5, 12, 0, 0, 0),
(194, 5, 12, 1, 0, 0),
(195, 5, 12, 2, 0, 0),
(196, 5, 12, 3, 0, 0),
(197, 6, 0, 0, 0, 0),
(198, 6, 1, 0, 0, 0),
(199, 6, 1, 1, 0, 0),
(200, 6, 1, 2, 0, 0),
(201, 6, 2, 0, 0, 0),
(202, 6, 2, 1, 0, 0),
(203, 6, 2, 2, 0, 0),
(204, 6, 3, 0, 0, 0),
(205, 6, 3, 1, 0, 0),
(206, 6, 3, 2, 0, 0),
(207, 6, 4, 0, 0, 0),
(208, 6, 4, 1, 0, 0),
(209, 6, 4, 2, 0, 0),
(210, 6, 5, 0, 0, 0),
(211, 6, 5, 1, 0, 0),
(212, 6, 5, 2, 0, 0),
(213, 6, 6, 0, 0, 0),
(214, 6, 6, 1, 0, 0),
(215, 6, 6, 2, 0, 0),
(216, 6, 6, 3, 0, 0),
(217, 6, 7, 0, 0, 0),
(218, 6, 7, 1, 0, 0),
(219, 6, 7, 2, 0, 0),
(220, 6, 7, 3, 0, 0),
(221, 6, 8, 0, 0, 0),
(222, 6, 8, 1, 0, 0),
(223, 6, 8, 2, 0, 0),
(224, 6, 8, 3, 0, 0),
(225, 6, 9, 0, 0, 0),
(226, 6, 9, 1, 0, 0),
(227, 6, 9, 2, 0, 0),
(228, 6, 10, 0, 0, 0),
(229, 6, 10, 1, 0, 0),
(230, 6, 10, 2, 0, 0),
(231, 6, 11, 0, 0, 0),
(232, 6, 11, 1, 0, 0),
(233, 6, 11, 2, 0, 0),
(234, 6, 12, 0, 0, 0),
(235, 6, 12, 1, 0, 0),
(236, 6, 12, 2, 0, 0),
(237, 6, 12, 3, 0, 0);");
    } else if ($prg == "2"){
      // elementary
      $query = $this->db->query("INSERT INTO `$syllabus_table` (`id`, `section`, `topic`, `ind`, `status`, `assigned`) 
      VALUES
          (1, 1, 0, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 1, 0, 0),
(4, 1, 1, 2, 0, 0),
(5, 1, 1, 3, 0, 0),
(6, 1, 2, 0, 0, 0),
(7, 1, 2, 1, 0, 0),
(8, 1, 2, 2, 0, 0),
(9, 1, 2, 3, 0, 0),
(10, 1, 3, 0, 0, 0),
(11, 1, 3, 1, 0, 0),
(12, 1, 3, 2, 0, 0),
(13, 1, 4, 0, 0, 0),
(14, 1, 4, 1, 0, 0),
(15, 1, 4, 2, 0, 0),
(16, 1, 4, 3, 0, 0),
(17, 1, 5, 0, 0, 0),
(18, 1, 5, 1, 0, 0),
(19, 1, 5, 2, 0, 0),
(20, 1, 5, 3, 0, 0),
(21, 1, 6, 0, 0, 0),
(22, 1, 6, 1, 0, 0),
(23, 1, 6, 2, 0, 0),
(24, 1, 6, 3, 0, 0),
(25, 1, 7, 0, 0, 0),
(26, 1, 7, 1, 0, 0),
(27, 1, 7, 2, 0, 0),
(28, 1, 8, 0, 0, 0),
(29, 1, 8, 1, 0, 0),
(30, 1, 8, 2, 0, 0),
(31, 1, 8, 3, 0, 0),
(32, 1, 9, 0, 0, 0),
(33, 1, 9, 1, 0, 0),
(34, 1, 9, 2, 0, 0),
(35, 1, 9, 3, 0, 0),
(36, 1, 10, 0, 0, 0),
(37, 1, 10, 1, 0, 0),
(38, 1, 10, 2, 0, 0),
(39, 1, 11, 0, 0, 0),
(40, 1, 11, 1, 0, 0),
(41, 1, 11, 2, 0, 0),
(42, 1, 11, 3, 0, 0),
(43, 1, 12, 0, 0, 0),
(44, 1, 12, 1, 0, 0),
(45, 1, 12, 2, 0, 0),
(46, 1, 12, 3, 0, 0),
(47, 2, 0, 0, 0, 0),
(48, 2, 1, 0, 0, 0),
(49, 2, 1, 1, 0, 0),
(50, 2, 1, 2, 0, 0),
(51, 2, 1, 3, 0, 0),
(52, 2, 2, 0, 0, 0),
(53, 2, 2, 1, 0, 0),
(54, 2, 2, 2, 0, 0),
(55, 2, 2, 3, 0, 0),
(56, 2, 3, 0, 0, 0),
(57, 2, 3, 1, 0, 0),
(58, 2, 3, 2, 0, 0),
(59, 2, 4, 0, 0, 0),
(60, 2, 4, 1, 0, 0),
(61, 2, 4, 2, 0, 0),
(62, 2, 5, 0, 0, 0),
(63, 2, 5, 1, 0, 0),
(64, 2, 5, 2, 0, 0),
(65, 2, 5, 3, 0, 0),
(66, 2, 6, 0, 0, 0),
(67, 2, 6, 1, 0, 0),
(68, 2, 6, 2, 0, 0),
(69, 2, 6, 3, 0, 0),
(70, 2, 7, 0, 0, 0),
(71, 2, 7, 1, 0, 0),
(72, 2, 7, 2, 0, 0),
(73, 2, 8, 0, 0, 0),
(74, 2, 8, 1, 0, 0),
(75, 2, 8, 2, 0, 0),
(76, 2, 9, 0, 0, 0),
(77, 2, 9, 1, 0, 0),
(78, 2, 9, 2, 0, 0),
(79, 2, 10, 0, 0, 0),
(80, 2, 10, 1, 0, 0),
(81, 2, 10, 2, 0, 0),
(82, 2, 11, 0, 0, 0),
(83, 2, 11, 1, 0, 0),
(84, 2, 11, 2, 0, 0),
(85, 2, 12, 0, 0, 0),
(86, 2, 12, 1, 0, 0),
(87, 2, 12, 2, 0, 0),
(88, 2, 12, 3, 0, 0),
(89, 3, 0, 0, 0, 0),
(90, 3, 1, 0, 0, 0),
(91, 3, 1, 1, 0, 0),
(92, 3, 1, 2, 0, 0),
(93, 3, 1, 3, 0, 0),
(94, 3, 2, 0, 0, 0),
(95, 3, 2, 1, 0, 0),
(96, 3, 2, 2, 0, 0),
(97, 3, 2, 3, 0, 0),
(98, 3, 3, 0, 0, 0),
(99, 3, 3, 1, 0, 0),
(100, 3, 3, 2, 0, 0),
(101, 3, 3, 3, 0, 0),
(102, 3, 4, 0, 0, 0),
(103, 3, 4, 1, 0, 0),
(104, 3, 4, 2, 0, 0),
(105, 3, 5, 0, 0, 0),
(106, 3, 5, 1, 0, 0),
(107, 3, 5, 2, 0, 0),
(108, 3, 5, 3, 0, 0),
(109, 3, 6, 0, 0, 0),
(110, 3, 6, 1, 0, 0),
(111, 3, 6, 2, 0, 0),
(112, 3, 6, 3, 0, 0),
(113, 3, 7, 0, 0, 0),
(114, 3, 7, 1, 0, 0),
(115, 3, 7, 2, 0, 0),
(116, 3, 8, 0, 0, 0),
(117, 3, 8, 1, 0, 0),
(118, 3, 8, 2, 0, 0),
(119, 3, 9, 0, 0, 0),
(120, 3, 9, 1, 0, 0),
(121, 3, 9, 2, 0, 0),
(122, 3, 9, 3, 0, 0),
(123, 3, 10, 0, 0, 0),
(124, 3, 10, 1, 0, 0),
(125, 3, 10, 2, 0, 0),
(126, 3, 11, 0, 0, 0),
(127, 3, 11, 1, 0, 0),
(128, 3, 11, 2, 0, 0),
(129, 3, 12, 0, 0, 0),
(130, 3, 12, 1, 0, 0),
(131, 3, 12, 2, 0, 0),
(132, 3, 12, 3, 0, 0),
(133, 4, 0, 0, 0, 0),
(134, 4, 1, 0, 0, 0),
(135, 4, 1, 1, 0, 0),
(136, 4, 1, 2, 0, 0),
(137, 4, 2, 0, 0, 0),
(138, 4, 2, 1, 0, 0),
(139, 4, 2, 2, 0, 0),
(140, 4, 3, 0, 0, 0),
(141, 4, 3, 1, 0, 0),
(142, 4, 3, 2, 0, 0),
(143, 4, 4, 0, 0, 0),
(144, 4, 4, 1, 0, 0),
(145, 4, 4, 2, 0, 0),
(146, 4, 5, 0, 0, 0),
(147, 4, 5, 1, 0, 0),
(148, 4, 5, 2, 0, 0),
(149, 4, 6, 0, 0, 0),
(150, 4, 6, 1, 0, 0),
(151, 4, 6, 2, 0, 0),
(152, 4, 7, 0, 0, 0),
(153, 4, 7, 1, 0, 0),
(154, 4, 7, 2, 0, 0),
(155, 4, 8, 0, 0, 0),
(156, 4, 8, 1, 0, 0),
(157, 4, 8, 2, 0, 0),
(158, 4, 9, 0, 0, 0),
(159, 4, 9, 1, 0, 0),
(160, 4, 9, 2, 0, 0),
(161, 4, 10, 0, 0, 0),
(162, 4, 10, 1, 0, 0),
(163, 4, 10, 2, 0, 0),
(164, 4, 11, 0, 0, 0),
(165, 4, 11, 1, 0, 0),
(166, 4, 11, 2, 0, 0),
(167, 5, 0, 0, 0, 0),
(168, 5, 1, 0, 0, 0),
(169, 5, 1, 1, 0, 0),
(170, 5, 1, 2, 0, 0),
(171, 5, 2, 0, 0, 0),
(172, 5, 2, 1, 0, 0),
(173, 5, 2, 2, 0, 0),
(174, 5, 2, 3, 0, 0),
(175, 5, 3, 0, 0, 0),
(176, 5, 3, 1, 0, 0),
(177, 5, 3, 2, 0, 0),
(178, 5, 4, 0, 0, 0),
(179, 5, 4, 1, 0, 0),
(180, 5, 4, 2, 0, 0),
(181, 5, 5, 0, 0, 0),
(182, 5, 5, 1, 0, 0),
(183, 5, 5, 2, 0, 0),
(184, 5, 5, 3, 0, 0),
(185, 5, 6, 0, 0, 0),
(186, 5, 6, 1, 0, 0),
(187, 5, 6, 2, 0, 0),
(188, 5, 7, 0, 0, 0),
(189, 5, 7, 1, 0, 0),
(190, 5, 7, 2, 0, 0),
(191, 5, 8, 0, 0, 0),
(192, 5, 8, 1, 0, 0),
(193, 5, 8, 2, 0, 0),
(194, 5, 9, 0, 0, 0),
(195, 5, 9, 1, 0, 0),
(196, 5, 9, 2, 0, 0),
(197, 5, 9, 3, 0, 0),
(198, 5, 10, 0, 0, 0),
(199, 5, 10, 1, 0, 0),
(200, 5, 10, 2, 0, 0),
(201, 5, 10, 3, 0, 0),
(202, 5, 11, 0, 0, 0),
(203, 5, 11, 1, 0, 0),
(204, 5, 11, 2, 0, 0),
(205, 5, 11, 3, 0, 0),
(206, 5, 12, 0, 0, 0),
(207, 5, 12, 1, 0, 0),
(208, 5, 12, 2, 0, 0),
(209, 5, 12, 3, 0, 0),
(210, 6, 0, 0, 0, 0),
(211, 6, 1, 0, 0, 0),
(212, 6, 1, 1, 0, 0),
(213, 6, 1, 2, 0, 0),
(214, 6, 2, 0, 0, 0),
(215, 6, 2, 1, 0, 0),
(216, 6, 2, 2, 0, 0),
(217, 6, 3, 0, 0, 0),
(218, 6, 3, 1, 0, 0),
(219, 6, 3, 2, 0, 0),
(220, 6, 4, 0, 0, 0),
(221, 6, 4, 1, 0, 0),
(222, 6, 4, 2, 0, 0),
(223, 6, 5, 0, 0, 0),
(224, 6, 5, 1, 0, 0),
(225, 6, 5, 2, 0, 0),
(226, 6, 6, 0, 0, 0),
(227, 6, 6, 1, 0, 0),
(228, 6, 6, 2, 0, 0),
(229, 6, 6, 3, 0, 0),
(230, 6, 7, 0, 0, 0),
(231, 6, 7, 1, 0, 0),
(232, 6, 7, 2, 0, 0),
(233, 6, 7, 3, 0, 0),
(234, 6, 8, 0, 0, 0),
(235, 6, 8, 1, 0, 0),
(236, 6, 8, 2, 0, 0),
(237, 6, 8, 3, 0, 0),
(238, 6, 9, 0, 0, 0),
(239, 6, 9, 1, 0, 0),
(240, 6, 9, 2, 0, 0),
(241, 6, 10, 0, 0, 0),
(242, 6, 10, 1, 0, 0),
(243, 6, 10, 2, 0, 0),
(244, 6, 11, 0, 0, 0),
(245, 6, 11, 1, 0, 0),
(246, 6, 11, 2, 0, 0),
(247, 6, 12, 0, 0, 0),
(248, 6, 12, 1, 0, 0),
(249, 6, 12, 2, 0, 0),
(250, 6, 12, 3, 0, 0);"); 
    } else if ($prg == "3"){
      // junior
      $query = $this->db->query("INSERT INTO `$syllabus_table` 
      (`id`, `section`, `topic`, `ind`, `status`, `assigned`)
      VALUES
         (1, 1, 0, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 1, 0, 0),
(4, 1, 1, 2, 0, 0),
(5, 1, 1, 3, 0, 0),
(6, 1, 2, 0, 0, 0),
(7, 1, 2, 1, 0, 0),
(8, 1, 2, 2, 0, 0),
(9, 1, 2, 3, 0, 0),
(10, 1, 3, 0, 0, 0),
(11, 1, 3, 1, 0, 0),
(12, 1, 3, 2, 0, 0),
(13, 1, 4, 0, 0, 0),
(14, 1, 4, 1, 0, 0),
(15, 1, 4, 2, 0, 0),
(16, 1, 4, 3, 0, 0),
(17, 1, 5, 0, 0, 0),
(18, 1, 5, 1, 0, 0),
(19, 1, 5, 2, 0, 0),
(20, 1, 5, 3, 0, 0),
(21, 1, 6, 0, 0, 0),
(22, 1, 6, 1, 0, 0),
(23, 1, 6, 2, 0, 0),
(24, 1, 6, 3, 0, 0),
(25, 1, 7, 0, 0, 0),
(26, 1, 7, 1, 0, 0),
(27, 1, 7, 2, 0, 0),
(28, 1, 8, 0, 0, 0),
(29, 1, 8, 1, 0, 0),
(30, 1, 8, 2, 0, 0),
(31, 1, 8, 3, 0, 0),
(32, 1, 9, 0, 0, 0),
(33, 1, 9, 1, 0, 0),
(34, 1, 9, 2, 0, 0),
(35, 1, 9, 3, 0, 0),
(36, 1, 10, 0, 0, 0),
(37, 1, 10, 1, 0, 0),
(38, 1, 10, 2, 0, 0),
(39, 1, 10, 3, 0, 0),
(40, 2, 0, 0, 0, 0),
(41, 2, 1, 0, 0, 0),
(42, 2, 1, 1, 0, 0),
(43, 2, 1, 2, 0, 0),
(44, 2, 1, 3, 0, 0),
(45, 2, 2, 0, 0, 0),
(46, 2, 2, 1, 0, 0),
(47, 2, 2, 2, 0, 0),
(48, 2, 2, 3, 0, 0),
(49, 2, 3, 0, 0, 0),
(50, 2, 3, 1, 0, 0),
(51, 2, 3, 2, 0, 0),
(52, 2, 4, 0, 0, 0),
(53, 2, 4, 1, 0, 0),
(54, 2, 4, 2, 0, 0),
(55, 2, 5, 0, 0, 0),
(56, 2, 5, 1, 0, 0),
(57, 2, 5, 2, 0, 0),
(58, 2, 5, 3, 0, 0),
(59, 2, 6, 0, 0, 0),
(60, 2, 6, 1, 0, 0),
(61, 2, 6, 2, 0, 0),
(62, 2, 7, 0, 0, 0),
(63, 2, 7, 1, 0, 0),
(64, 2, 7, 2, 0, 0),
(65, 2, 8, 0, 0, 0),
(66, 2, 8, 1, 0, 0),
(67, 2, 8, 2, 0, 0),
(68, 2, 9, 0, 0, 0),
(69, 2, 9, 1, 0, 0),
(70, 2, 9, 2, 0, 0),
(71, 2, 10, 0, 0, 0),
(72, 2, 10, 1, 0, 0),
(73, 2, 10, 2, 0, 0),
(74, 2, 10, 3, 0, 0),
(75, 2, 11, 0, 0, 0),
(76, 2, 11, 1, 0, 0),
(77, 2, 11, 2, 0, 0),
(78, 3, 0, 0, 0, 0),
(79, 3, 1, 0, 0, 0),
(80, 3, 1, 1, 0, 0),
(81, 3, 1, 2, 0, 0),
(82, 3, 1, 3, 0, 0),
(83, 3, 2, 0, 0, 0),
(84, 3, 2, 1, 0, 0),
(85, 3, 2, 2, 0, 0),
(86, 3, 2, 3, 0, 0),
(87, 3, 3, 0, 0, 0),
(88, 3, 3, 1, 0, 0),
(89, 3, 3, 2, 0, 0),
(90, 3, 3, 3, 0, 0),
(91, 3, 4, 0, 0, 0),
(92, 3, 4, 1, 0, 0),
(93, 3, 4, 2, 0, 0),
(94, 3, 5, 0, 0, 0),
(95, 3, 5, 1, 0, 0),
(96, 3, 5, 2, 0, 0),
(97, 3, 6, 0, 0, 0),
(98, 3, 6, 1, 0, 0),
(99, 3, 6, 2, 0, 0),
(100, 3, 7, 0, 0, 0),
(101, 3, 7, 1, 0, 0),
(102, 3, 7, 2, 0, 0),
(103, 3, 7, 3, 0, 0),
(104, 3, 8, 0, 0, 0),
(105, 3, 8, 1, 0, 0),
(106, 3, 8, 2, 0, 0),
(107, 3, 9, 0, 0, 0),
(108, 3, 9, 1, 0, 0),
(109, 3, 9, 2, 0, 0),
(110, 3, 10, 0, 0, 0),
(111, 3, 10, 1, 0, 0),
(112, 3, 10, 2, 0, 0),
(113, 3, 11, 0, 0, 0),
(114, 3, 11, 1, 0, 0),
(115, 3, 11, 2, 0, 0),
(116, 3, 11, 3, 0, 0),
(117, 3, 12, 0, 0, 0),
(118, 3, 12, 1, 0, 0),
(119, 3, 12, 2, 0, 0),
(120, 4, 0, 0, 0, 0),
(121, 4, 1, 0, 0, 0),
(122, 4, 1, 1, 0, 0),
(123, 4, 1, 2, 0, 0),
(124, 4, 1, 3, 0, 0),
(125, 4, 2, 0, 0, 0),
(126, 4, 2, 1, 0, 0),
(127, 4, 2, 2, 0, 0),
(128, 4, 2, 3, 0, 0),
(129, 4, 3, 0, 0, 0),
(130, 4, 3, 1, 0, 0),
(131, 4, 3, 2, 0, 0),
(132, 4, 3, 3, 0, 0),
(133, 4, 4, 0, 0, 0),
(134, 4, 4, 1, 0, 0),
(135, 4, 4, 2, 0, 0),
(136, 4, 4, 3, 0, 0),
(137, 4, 5, 0, 0, 0),
(138, 4, 5, 1, 0, 0),
(139, 4, 5, 2, 0, 0),
(140, 4, 6, 0, 0, 0),
(141, 4, 6, 1, 0, 0),
(142, 4, 6, 2, 0, 0),
(143, 4, 7, 0, 0, 0),
(144, 4, 7, 1, 0, 0),
(145, 4, 7, 2, 0, 0),
(146, 4, 7, 3, 0, 0),
(147, 4, 8, 0, 0, 0),
(148, 4, 8, 1, 0, 0),
(149, 4, 8, 2, 0, 0),
(150, 4, 8, 3, 0, 0),
(151, 4, 9, 0, 0, 0),
(152, 4, 9, 1, 0, 0),
(153, 4, 9, 2, 0, 0),
(154, 4, 9, 3, 0, 0),
(155, 4, 10, 0, 0, 0),
(156, 4, 10, 1, 0, 0),
(157, 4, 10, 2, 0, 0),
(158, 4, 11, 0, 0, 0),
(159, 4, 11, 1, 0, 0),
(160, 4, 11, 2, 0, 0),
(161, 5, 0, 0, 0, 0),
(162, 5, 1, 0, 0, 0),
(163, 5, 1, 1, 0, 0),
(164, 5, 1, 2, 0, 0),
(165, 5, 2, 0, 0, 0),
(166, 5, 2, 1, 0, 0),
(167, 5, 2, 2, 0, 0),
(168, 5, 3, 3, 0, 0),
(169, 5, 3, 1, 0, 0),
(170, 5, 3, 2, 0, 0),
(171, 5, 4, 0, 0, 0),
(172, 5, 4, 1, 0, 0),
(173, 5, 4, 2, 0, 0),
(174, 5, 4, 3, 0, 0),
(175, 5, 5, 0, 0, 0),
(176, 5, 5, 1, 0, 0),
(177, 5, 5, 2, 0, 0),
(178, 5, 5, 3, 0, 0),
(179, 5, 6, 0, 0, 0),
(180, 5, 6, 1, 0, 0),
(181, 5, 6, 2, 0, 0),
(182, 5, 7, 0, 0, 0),
(183, 5, 7, 1, 0, 0),
(184, 5, 7, 2, 0, 0),
(185, 5, 8, 0, 0, 0),
(186, 5, 8, 1, 0, 0),
(187, 5, 8, 2, 0, 0),
(188, 5, 8, 3, 0, 0),
(189, 5, 9, 0, 0, 0),
(190, 5, 9, 1, 0, 0),
(191, 5, 9, 2, 0, 0),
(192, 5, 9, 3, 0, 0),
(193, 5, 10, 0, 0, 0),
(194, 5, 10, 1, 0, 0),
(195, 5, 10, 2, 0, 0),
(196, 5, 10, 3, 0, 0),
(197, 5, 11, 0, 0, 0),
(198, 5, 11, 1, 0, 0),
(199, 5, 11, 2, 0, 0),
(200, 6, 0, 0, 0, 0),
(201, 6, 1, 0, 0, 0),
(202, 6, 1, 1, 0, 0),
(203, 6, 1, 2, 0, 0),
(204, 6, 2, 0, 0, 0),
(205, 6, 2, 1, 0, 0),
(206, 6, 2, 2, 0, 0),
(207, 6, 2, 3, 0, 0),
(208, 6, 3, 0, 0, 0),
(209, 6, 3, 1, 0, 0),
(210, 6, 3, 2, 0, 0),
(211, 6, 3, 3, 0, 0),
(212, 6, 4, 0, 0, 0),
(213, 6, 4, 1, 0, 0),
(214, 6, 4, 2, 0, 0),
(215, 6, 5, 0, 0, 0),
(216, 6, 5, 1, 0, 0),
(217, 6, 5, 2, 0, 0),
(218, 6, 5, 3, 0, 0),
(219, 6, 6, 0, 0, 0),
(220, 6, 6, 1, 0, 0),
(221, 6, 6, 2, 0, 0),
(222, 6, 7, 0, 0, 0),
(223, 6, 7, 1, 0, 0),
(224, 6, 7, 2, 0, 0),
(225, 6, 8, 0, 0, 0),
(226, 6, 8, 1, 0, 0),
(227, 6, 8, 2, 0, 0),
(228, 6, 9, 0, 0, 0),
(229, 6, 9, 1, 0, 0),
(230, 6, 9, 2, 0, 0),
(231, 6, 10, 0, 0, 0),
(232, 6, 10, 1, 0, 0),
(233, 6, 10, 2, 0, 0),
(234, 6, 10, 3, 0, 0),
(235, 6, 11, 0, 0, 0),
(236, 6, 11, 1, 0, 0),
(237, 6, 11, 2, 0, 0),
(238, 7, 0, 0, 0, 0),
(239, 7, 1, 0, 0, 0),
(240, 7, 1, 1, 0, 0),
(241, 7, 1, 2, 0, 0),
(242, 7, 2, 0, 0, 0),
(243, 7, 2, 1, 0, 0),
(244, 7, 2, 2, 0, 0),
(245, 7, 3, 0, 0, 0),
(246, 7, 3, 1, 0, 0),
(247, 7, 3, 2, 0, 0),
(248, 7, 4, 0, 0, 0),
(249, 7, 4, 1, 0, 0),
(250, 7, 4, 2, 0, 0),
(251, 7, 5, 0, 0, 0),
(252, 7, 5, 1, 0, 0),
(253, 7, 5, 2, 0, 0),
(254, 7, 6, 0, 0, 0),
(255, 7, 6, 1, 0, 0),
(256, 7, 6, 2, 0, 0),
(257, 7, 7, 0, 0, 0),
(258, 7, 7, 1, 0, 0),
(259, 7, 7, 2, 0, 0),
(260, 7, 8, 0, 0, 0),
(261, 7, 8, 1, 0, 0),
(262, 7, 8, 2, 0, 0),
(263, 7, 9, 0, 0, 0),
(264, 7, 9, 1, 0, 0),
(265, 7, 9, 2, 0, 0),
(266, 7, 10, 0, 0, 0),
(267, 7, 10, 1, 0, 0),
(268, 7, 10, 2, 0, 0);");
    } else if ($prg == "4"){
      // senior
      $query = $this->db->query("INSERT INTO `$syllabus_table` 
      (`id`, `section`, `topic`, `ind`, `status`, `assigned`) 
      VALUES
         (1, 1, 0, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 1, 0, 0),
(4, 1, 1, 2, 0, 0),
(5, 1, 1, 3, 0, 0),
(6, 1, 2, 0, 0, 0),
(7, 1, 2, 1, 0, 0),
(8, 1, 2, 2, 0, 0),
(9, 1, 2, 3, 0, 0),
(10, 1, 3, 0, 0, 0),
(11, 1, 3, 1, 0, 0),
(12, 1, 3, 2, 0, 0),
(13, 1, 4, 0, 0, 0),
(14, 1, 4, 1, 0, 0),
(15, 1, 4, 2, 0, 0),
(16, 1, 4, 3, 0, 0),
(17, 1, 5, 0, 0, 0),
(18, 1, 5, 1, 0, 0),
(19, 1, 5, 2, 0, 0),
(20, 1, 5, 3, 0, 0),
(21, 1, 6, 0, 0, 0),
(22, 1, 6, 1, 0, 0),
(23, 1, 6, 2, 0, 0),
(24, 1, 7, 0, 0, 0),
(25, 1, 7, 1, 0, 0),
(26, 1, 7, 2, 0, 0),
(27, 1, 7, 3, 0, 0),
(28, 1, 8, 0, 0, 0),
(29, 1, 8, 1, 0, 0),
(30, 1, 8, 2, 0, 0),
(31, 1, 8, 3, 0, 0),
(32, 2, 0, 0, 0, 0),
(33, 2, 1, 0, 0, 0),
(34, 2, 1, 1, 0, 0),
(35, 2, 1, 2, 0, 0),
(36, 2, 1, 3, 0, 0),
(37, 2, 2, 0, 0, 0),
(38, 2, 2, 1, 0, 0),
(39, 2, 2, 2, 0, 0),
(40, 2, 2, 3, 0, 0),
(41, 2, 3, 0, 0, 0),
(42, 2, 3, 1, 0, 0),
(43, 2, 3, 2, 0, 0),
(44, 2, 3, 3, 0, 0),
(45, 2, 4, 0, 0, 0),
(46, 2, 4, 1, 0, 0),
(47, 2, 4, 2, 0, 0),
(48, 2, 4, 3, 0, 0),
(49, 2, 5, 0, 0, 0),
(50, 2, 5, 1, 0, 0),
(51, 2, 5, 2, 0, 0),
(52, 2, 5, 3, 0, 0),
(53, 2, 6, 0, 0, 0),
(54, 2, 6, 1, 0, 0),
(55, 2, 6, 2, 0, 0),
(56, 2, 7, 0, 0, 0),
(57, 2, 7, 1, 0, 0),
(58, 2, 7, 2, 0, 0),
(59, 2, 7, 3, 0, 0),
(60, 2, 8, 0, 0, 0),
(61, 2, 8, 1, 0, 0),
(62, 2, 8, 2, 0, 0),
(63, 2, 9, 0, 0, 0),
(64, 2, 9, 1, 0, 0),
(65, 2, 9, 2, 0, 0),
(66, 2, 10, 0, 0, 0),
(67, 2, 10, 1, 0, 0),
(68, 2, 10, 2, 0, 0),
(69, 2, 10, 3, 0, 0),
(70, 2, 11, 0, 0, 0),
(71, 2, 11, 1, 0, 0),
(72, 2, 11, 2, 0, 0),
(73, 2, 11, 3, 0, 0),
(74, 3, 0, 0, 0, 0),
(75, 3, 1, 0, 0, 0),
(76, 3, 1, 1, 0, 0),
(77, 3, 1, 2, 0, 0),
(78, 3, 2, 0, 0, 0),
(79, 3, 2, 1, 0, 0),
(80, 3, 2, 2, 0, 0),
(81, 3, 2, 3, 0, 0),
(82, 3, 3, 0, 0, 0),
(83, 3, 3, 1, 0, 0),
(84, 3, 3, 2, 0, 0),
(85, 3, 3, 3, 0, 0),
(86, 3, 4, 0, 0, 0),
(87, 3, 4, 1, 0, 0),
(88, 3, 4, 2, 0, 0),
(89, 3, 5, 0, 0, 0),
(90, 3, 5, 1, 0, 0),
(91, 3, 5, 2, 0, 0),
(92, 3, 5, 3, 0, 0),
(93, 3, 6, 0, 0, 0),
(94, 3, 6, 1, 0, 0),
(95, 3, 6, 2, 0, 0),
(96, 3, 7, 0, 0, 0),
(97, 3, 7, 1, 0, 0),
(98, 3, 7, 2, 0, 0),
(99, 3, 8, 0, 0, 0),
(100, 3, 8, 1, 0, 0),
(101, 3, 8, 2, 0, 0),
(102, 3, 8, 3, 0, 0),
(103, 3, 9, 0, 0, 0),
(104, 3, 9, 1, 0, 0),
(105, 3, 9, 2, 0, 0),
(106, 3, 10, 0, 0, 0),
(107, 3, 10, 1, 0, 0),
(108, 3, 10, 2, 0, 0),
(109, 3, 11, 0, 0, 0),
(110, 3, 11, 1, 0, 0),
(111, 3, 11, 2, 0, 0),
(112, 3, 12, 0, 0, 0),
(113, 3, 12, 1, 0, 0),
(114, 3, 12, 3, 0, 0),
(115, 3, 13, 0, 0, 0),
(116, 3, 13, 1, 0, 0),
(117, 3, 13, 2, 0, 0),
(118, 3, 13, 3, 0, 0),
(119, 4, 0, 0, 0, 0),
(120, 4, 1, 0, 0, 0),
(121, 4, 1, 1, 0, 0),
(122, 4, 1, 2, 0, 0),
(123, 4, 1, 3, 0, 0),
(124, 4, 2, 0, 0, 0),
(125, 4, 2, 1, 0, 0),
(126, 4, 2, 2, 0, 0),
(127, 4, 2, 3, 0, 0),
(128, 4, 3, 0, 0, 0),
(129, 4, 3, 1, 0, 0),
(130, 4, 3, 2, 0, 0),
(131, 4, 3, 3, 0, 0),
(132, 4, 4, 0, 0, 0),
(133, 4, 4, 1, 0, 0),
(134, 4, 4, 2, 0, 0),
(135, 4, 4, 3, 0, 0),
(136, 4, 5, 0, 0, 0),
(137, 4, 5, 1, 0, 0),
(138, 4, 5, 2, 0, 0),
(139, 4, 6, 0, 0, 0),
(140, 4, 6, 1, 0, 0),
(141, 4, 6, 2, 0, 0),
(142, 4, 6, 3, 0, 0),
(143, 4, 7, 0, 0, 0),
(144, 4, 7, 1, 0, 0),
(145, 4, 7, 2, 0, 0),
(146, 4, 7, 3, 0, 0),
(147, 4, 8, 0, 0, 0),
(148, 4, 8, 1, 0, 0),
(149, 4, 8, 2, 0, 0),
(150, 4, 8, 3, 0, 0),
(151, 4, 9, 0, 0, 0),
(152, 4, 9, 1, 0, 0),
(153, 4, 9, 2, 0, 0),
(154, 4, 9, 3, 0, 0),
(155, 4, 10, 0, 0, 0),
(156, 4, 10, 1, 0, 0),
(157, 4, 10, 2, 0, 0),
(158, 5, 0, 0, 0, 0),
(159, 5, 1, 0, 0, 0),
(160, 5, 1, 1, 0, 0),
(161, 5, 1, 2, 0, 0),
(162, 5, 1, 3, 0, 0),
(163, 5, 2, 0, 0, 0),
(164, 5, 2, 1, 0, 0),
(165, 5, 2, 2, 0, 0),
(166, 5, 2, 3, 0, 0),
(167, 5, 3, 0, 0, 0),
(168, 5, 3, 1, 0, 0),
(169, 5, 3, 2, 0, 0),
(170, 5, 4, 0, 0, 0),
(171, 5, 4, 1, 0, 0),
(172, 5, 4, 2, 0, 0),
(173, 5, 4, 3, 0, 0),
(174, 5, 5, 0, 0, 0),
(175, 5, 5, 1, 0, 0),
(176, 5, 5, 2, 0, 0),
(177, 5, 5, 3, 0, 0),
(178, 5, 6, 0, 0, 0),
(179, 5, 6, 1, 0, 0),
(180, 5, 6, 2, 0, 0),
(181, 5, 6, 3, 0, 0),
(182, 5, 7, 0, 0, 0),
(183, 5, 7, 1, 0, 0),
(184, 5, 7, 2, 0, 0),
(185, 5, 8, 0, 0, 0),
(186, 5, 8, 1, 0, 0),
(187, 5, 8, 2, 0, 0),
(188, 5, 8, 3, 0, 0),
(189, 5, 9, 0, 0, 0),
(190, 5, 9, 1, 0, 0),
(191, 5, 9, 2, 0, 0),
(192, 5, 9, 3, 0, 0),
(193, 5, 10, 0, 0, 0),
(194, 5, 10, 1, 0, 0),
(195, 5, 10, 2, 0, 0),
(196, 5, 11, 0, 0, 0),
(197, 5, 11, 1, 0, 0),
(198, 5, 11, 2, 0, 0),
(199, 5, 12, 0, 0, 0),
(200, 5, 12, 1, 0, 0),
(201, 5, 12, 2, 0, 0),
(202, 5, 12, 3, 0, 0),
(203, 6, 0, 0, 0, 0),
(204, 6, 1, 0, 0, 0),
(205, 6, 1, 1, 0, 0),
(206, 6, 1, 2, 0, 0),
(207, 6, 2, 0, 0, 0),
(208, 6, 2, 1, 0, 0),
(209, 6, 2, 2, 0, 0),
(210, 6, 3, 0, 0, 0),
(211, 6, 3, 1, 0, 0),
(212, 6, 3, 2, 0, 0),
(213, 6, 4, 0, 0, 0),
(214, 6, 4, 1, 0, 0),
(215, 6, 4, 2, 0, 0),
(216, 6, 5, 0, 0, 0),
(217, 6, 5, 1, 0, 0),
(218, 6, 5, 2, 0, 0),
(219, 6, 5, 3, 0, 0),
(220, 6, 6, 0, 0, 0),
(221, 6, 6, 1, 0, 0),
(222, 6, 6, 2, 0, 0),
(223, 6, 6, 3, 0, 0),
(224, 6, 7, 0, 0, 0),
(225, 6, 7, 1, 0, 0),
(226, 6, 7, 2, 0, 0),
(227, 6, 8, 0, 0, 0),
(228, 6, 8, 1, 0, 0),
(229, 6, 8, 2, 0, 0),
(230, 6, 8, 3, 0, 0),
(231, 6, 9, 0, 0, 0),
(232, 6, 9, 1, 0, 0),
(233, 6, 9, 2, 0, 0),
(234, 6, 9, 3, 0, 0),
(235, 6, 10, 0, 0, 0),
(236, 6, 10, 1, 0, 0),
(237, 6, 10, 2, 0, 0),
(238, 6, 10, 3, 0, 0);");
    } else {
      // general 
      $query = $this->db->query("INSERT INTO `$syllabus_table` 
      (`id`, `section`, `topic`, `ind`, `status`, `assigned`)   
        VALUES
        (1, 1, 0, 0, 0, 0),
(2, 1, 1, 0, 0, 0),
(3, 1, 1, 1, 0, 0),
(4, 1, 1, 2, 0, 0),
(5, 1, 1, 3, 0, 0),
(6, 1, 2, 0, 0, 0),
(7, 1, 2, 1, 0, 0),
(8, 1, 2, 2, 0, 0),
(9, 1, 2, 3, 0, 0),
(10, 1, 3, 0, 0, 0),
(11, 1, 3, 1, 0, 0),
(12, 1, 3, 2, 0, 0),
(13, 1, 4, 0, 0, 0),
(14, 1, 4, 1, 0, 0),
(15, 1, 4, 2, 0, 0),
(16, 1, 4, 3, 0, 0),
(17, 1, 5, 0, 0, 0),
(18, 1, 5, 1, 0, 0),
(19, 1, 5, 2, 0, 0),
(20, 1, 5, 3, 0, 0),
(21, 1, 6, 0, 0, 0),
(22, 1, 6, 1, 0, 0),
(23, 1, 6, 2, 0, 0),
(24, 1, 7, 0, 0, 0),
(25, 1, 7, 1, 0, 0),
(26, 1, 7, 2, 0, 0),
(27, 1, 7, 3, 0, 0),
(28, 1, 8, 0, 0, 0),
(29, 1, 8, 1, 0, 0),
(30, 1, 8, 2, 0, 0),
(31, 1, 8, 3, 0, 0),
(32, 2, 0, 0, 0, 0),
(33, 2, 1, 0, 0, 0),
(34, 2, 1, 1, 0, 0),
(35, 2, 1, 2, 0, 0),
(36, 2, 1, 3, 0, 0),
(37, 2, 2, 0, 0, 0),
(38, 2, 2, 1, 0, 0),
(39, 2, 2, 2, 0, 0),
(40, 2, 2, 3, 0, 0),
(41, 2, 3, 0, 0, 0),
(42, 2, 3, 1, 0, 0),
(43, 2, 3, 2, 0, 0),
(44, 2, 3, 3, 0, 0),
(45, 2, 4, 0, 0, 0),
(46, 2, 4, 1, 0, 0),
(47, 2, 4, 2, 0, 0),
(48, 2, 4, 3, 0, 0),
(49, 2, 5, 0, 0, 0),
(50, 2, 5, 1, 0, 0),
(51, 2, 5, 2, 0, 0),
(52, 2, 5, 3, 0, 0),
(53, 2, 6, 0, 0, 0),
(54, 2, 6, 1, 0, 0),
(55, 2, 6, 2, 0, 0),
(56, 2, 6, 3, 0, 0),
(57, 3, 0, 0, 0, 0),
(58, 3, 1, 0, 0, 0),
(59, 3, 1, 1, 0, 0),
(60, 3, 1, 2, 0, 0),
(61, 3, 1, 3, 0, 0),
(62, 3, 2, 0, 0, 0),
(63, 3, 2, 1, 0, 0),
(64, 3, 2, 2, 0, 0),
(65, 3, 3, 0, 0, 0),
(66, 3, 3, 1, 0, 0),
(67, 3, 3, 2, 0, 0),
(68, 3, 3, 3, 0, 0),
(69, 3, 4, 0, 0, 0),
(70, 3, 4, 1, 0, 0),
(71, 3, 4, 2, 0, 0),
(72, 3, 4, 3, 0, 0),
(73, 3, 5, 0, 0, 0),
(74, 3, 5, 1, 0, 0),
(75, 3, 5, 2, 0, 0),
(76, 3, 5, 3, 0, 0),
(77, 3, 5, 4, 0, 0),
(78, 3, 6, 0, 0, 0),
(79, 3, 6, 1, 0, 0),
(80, 3, 6, 2, 0, 0),
(81, 3, 6, 3, 0, 0),
(82, 3, 7, 0, 0, 0),
(83, 3, 7, 1, 0, 0),
(84, 3, 7, 2, 0, 0),
(85, 3, 8, 0, 0, 0),
(86, 3, 8, 1, 0, 0),
(87, 3, 8, 2, 0, 0),
(88, 3, 8, 3, 0, 0),
(89, 3, 9, 0, 0, 0),
(90, 3, 9, 1, 0, 0),
(91, 3, 9, 2, 0, 0),
(92, 3, 9, 3, 0, 0),
(93, 3, 10, 0, 0, 0),
(94, 3, 10, 1, 0, 0),
(95, 3, 10, 2, 0, 0),
(96, 3, 11, 0, 0, 0),
(97, 3, 11, 1, 0, 0),
(98, 3, 11, 2, 0, 0),
(99, 3, 12, 0, 0, 0),
(100, 3, 12, 1, 0, 0),
(101, 3, 12, 2, 0, 0),
(102, 3, 13, 0, 0, 0),
(103, 3, 13, 1, 0, 0),
(104, 3, 13, 2, 0, 0),
(105, 3, 14, 0, 0, 0),
(106, 3, 14, 1, 0, 0),
(107, 3, 14, 2, 0, 0),
(108, 3, 15, 0, 0, 0),
(109, 3, 15, 1, 0, 0),
(110, 3, 15, 2, 0, 0),
(111, 3, 15, 3, 0, 0),
(112, 3, 16, 0, 0, 0),
(113, 3, 16, 1, 0, 0),
(114, 3, 16, 2, 0, 0),
(115, 4, 0, 0, 0, 0),
(116, 4, 1, 0, 0, 0),
(117, 4, 1, 1, 0, 0),
(118, 4, 1, 2, 0, 0),
(119, 4, 1, 3, 0, 0),
(120, 4, 2, 0, 0, 0),
(121, 4, 2, 1, 0, 0),
(122, 4, 2, 2, 0, 0),
(123, 4, 2, 3, 0, 0),
(124, 4, 3, 0, 0, 0),
(125, 4, 3, 1, 0, 0),
(126, 4, 3, 2, 0, 0),
(127, 4, 3, 3, 0, 0),
(128, 4, 4, 0, 0, 0),
(129, 4, 4, 1, 0, 0),
(130, 4, 4, 2, 0, 0),
(131, 4, 4, 3, 0, 0),
(132, 4, 5, 0, 0, 0),
(133, 4, 5, 1, 0, 0),
(134, 4, 5, 2, 0, 0),
(135, 4, 5, 3, 0, 0),
(136, 4, 6, 0, 0, 0),
(137, 4, 6, 1, 0, 0),
(138, 4, 6, 2, 0, 0),
(139, 4, 6, 3, 0, 0),
(140, 4, 7, 0, 0, 0),
(141, 4, 7, 1, 0, 0),
(142, 4, 7, 2, 0, 0),
(143, 4, 7, 3, 0, 0),
(144, 4, 8, 0, 0, 0),
(145, 4, 8, 1, 0, 0),
(146, 4, 8, 2, 0, 0),
(147, 4, 9, 0, 0, 0),
(148, 4, 9, 1, 0, 0),
(149, 4, 9, 2, 0, 0),
(150, 4, 10, 0, 0, 0),
(151, 4, 10, 1, 0, 0),
(152, 4, 10, 2, 0, 0),
(153, 5, 0, 0, 0, 0),
(154, 5, 1, 0, 0, 0),
(155, 5, 1, 1, 0, 0),
(156, 5, 1, 2, 0, 0),
(157, 5, 1, 3, 0, 0),
(158, 5, 2, 0, 0, 0),
(159, 5, 2, 1, 0, 0),
(160, 5, 2, 2, 0, 0),
(161, 5, 2, 3, 0, 0),
(162, 5, 3, 0, 0, 0),
(163, 5, 3, 1, 0, 0),
(164, 5, 3, 2, 0, 0),
(165, 5, 3, 3, 0, 0),
(166, 5, 4, 0, 0, 0),
(167, 5, 4, 1, 0, 0),
(168, 5, 4, 2, 0, 0),
(169, 5, 4, 3, 0, 0),
(170, 5, 5, 0, 0, 0),
(171, 5, 5, 1, 0, 0),
(172, 5, 5, 2, 0, 0),
(173, 5, 5, 3, 0, 0),
(174, 5, 6, 0, 0, 0),
(175, 5, 6, 1, 0, 0),
(176, 5, 6, 2, 0, 0),
(177, 5, 6, 3, 0, 0),
(178, 5, 7, 0, 0, 0),
(179, 5, 7, 1, 0, 0),
(180, 5, 7, 2, 0, 0),
(181, 5, 7, 3, 0, 0),
(182, 5, 8, 0, 0, 0),
(183, 5, 8, 1, 0, 0),
(184, 5, 8, 2, 0, 0),
(185, 5, 8, 3, 0, 0),
(186, 5, 9, 0, 0, 0),
(187, 5, 9, 1, 0, 0),
(188, 5, 9, 2, 0, 0),
(189, 6, 0, 0, 0, 0),
(190, 6, 1, 0, 0, 0),
(191, 6, 1, 1, 0, 0),
(192, 6, 1, 2, 0, 0),
(193, 6, 2, 0, 0, 0),
(194, 6, 2, 1, 0, 0),
(195, 6, 2, 2, 0, 0),
(196, 6, 3, 0, 0, 0),
(197, 6, 3, 1, 0, 0),
(198, 6, 3, 2, 0, 0),
(199, 6, 4, 0, 0, 0),
(200, 6, 4, 1, 0, 0),
(201, 6, 4, 2, 0, 0),
(202, 6, 5, 0, 0, 0),
(203, 6, 5, 1, 0, 0),
(204, 6, 5, 2, 0, 0),
(205, 6, 6, 0, 0, 0),
(206, 6, 6, 1, 0, 0),
(207, 6, 6, 2, 0, 0),
(208, 6, 6, 3, 0, 0),
(209, 6, 7, 0, 0, 0),
(210, 6, 7, 1, 0, 0),
(211, 6, 7, 2, 0, 0),
(212, 6, 7, 3, 0, 0),
(213, 6, 8, 0, 0, 0),
(214, 6, 8, 1, 0, 0),
(215, 6, 8, 2, 0, 0),
(216, 6, 8, 3, 0, 0),
(217, 6, 9, 0, 0, 0),
(218, 6, 9, 1, 0, 0),
(219, 6, 9, 2, 0, 0),
(220, 6, 9, 3, 0, 0),
(221, 7, 0, 0, 0, 0),
(222, 7, 1, 0, 0, 0),
(223, 7, 1, 1, 0, 0),
(224, 7, 1, 2, 0, 0),
(225, 7, 2, 0, 0, 0),
(226, 7, 2, 1, 0, 0),
(227, 7, 2, 2, 0, 0),
(228, 7, 3, 0, 0, 0),
(229, 7, 3, 1, 0, 0),
(230, 7, 3, 2, 0, 0),
(231, 7, 4, 0, 0, 0),
(232, 7, 4, 1, 0, 0),
(233, 7, 4, 2, 0, 0),
(234, 7, 5, 0, 0, 0),
(235, 7, 5, 1, 0, 0),
(236, 7, 5, 2, 0, 0),
(237, 7, 5, 3, 0, 0),
(238, 7, 6, 0, 0, 0),
(239, 7, 6, 1, 0, 0),
(240, 7, 6, 2, 0, 0),
(241, 7, 7, 0, 0, 0),
(242, 7, 7, 1, 0, 0),
(243, 7, 7, 2, 0, 0),
(244, 7, 8, 0, 0, 0),
(245, 8, 8, 1, 0, 0),
(246, 7, 8, 2, 0, 0),
(247, 8, 0, 0, 0, 0),
(248, 8, 1, 0, 0, 0),
(249, 8, 1, 1, 0, 0),
(250, 8, 1, 2, 0, 0),
(251, 8, 1, 3, 0, 0),
(252, 8, 1, 4, 0, 0),
(253, 8, 1, 5, 0, 0),
(254, 8, 2, 0, 0, 0),
(255, 8, 2, 1, 0, 0),
(256, 8, 2, 2, 0, 0),
(257, 8, 2, 3, 0, 0),
(258, 8, 2, 4, 0, 0),
(259, 8, 3, 0, 0, 0),
(260, 8, 3, 1, 0, 0),
(261, 8, 3, 2, 0, 0),
(262, 8, 3, 3, 0, 0),
(263, 8, 3, 4, 0, 0),
(264, 8, 4, 0, 0, 0),
(265, 8, 4, 1, 0, 0),
(266, 8, 4, 2, 0, 0),
(267, 8, 5, 0, 0, 0),
(268, 8, 5, 1, 0, 0),
(269, 8, 5, 2, 0, 0),
(270, 8, 6, 0, 0, 0),
(271, 8, 6, 1, 0, 0),
(272, 8, 6, 2, 0, 0),
(273, 8, 6, 3, 0, 0);");
    }
    return $query;
  }
  function assign (){
    $pin = $this->input->post('pin');
    $section = $this->input->post('section');
    $syllabus_table = "sl_".$pin;
    $this->db->where('section', $section);
    $this->db->set('assigned', 1);
    $query = $this->db->update($syllabus_table);
    return $query;
  }
  function get_all(){
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
    //$this->db->where('assigned', '1');
    $this->db->join($syllabus_master, $syllabus_master.'.id = '.$syllabus_table.'.id');
    $this->db->order_by('section', 'asc');
    $this->db->order_by('topic', 'asc');
    $this->db->order_by('ind', 'asc');
    $result = $this->db->get();
    return $result->result();
  }
  function assign_section(){
    $pin = $this->input->post('pin');
    $section = $this->input->post('section');
    $assign = $this->input->post('assign');
    
    $syllabus_table = "sl_".$pin;
    
    $this->db->where('section', $section);
    $this->db->set('assigned', $assign);
    $query = $this->db->update($syllabus_table);
    return $query;
  }
  function assign_topic(){
    $pin = $this->input->post('pin');
    $section = $this->input->post('section');
    $topic = $this->input->post('topic');
    $assign = $this->input->post('assign');
    
    $syllabus_table = "sl_".$pin;
    
    $this->db->where('section', $section);
    $this->db->where('topic', $topic);
    $this->db->set('assigned', $assign);
    $query = $this->db->update($syllabus_table);
    return $query;
  }
  function assign_indicator(){
    $pin = $this->input->post('pin');
    $id = $this->input->post('id');
    $assign = $this->input->post('assign');
    
    $syllabus_table = "sl_".$pin;
    
    $this->db->where('id', $id);
    $this->db->set('assigned', $assign);
    $query = $this->db->update($syllabus_table);
    return $query;
    
  }
} 