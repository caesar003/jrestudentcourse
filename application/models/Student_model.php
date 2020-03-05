<?php
class Student_model extends CI_Model{
  function student_data(){
    $result=$this->db->get('students');
    return $result->result();
  }
  function after_teaching_list(){
    $this->db->where('after_teaching', 'yes');
    $result=$this->db->get('students');
    return $result->result();
  }
  function get_cities(){
    $term = $this->input->post('keyword');
    $this->db->like('city', $term, 'after');
    $this->db->order_by('city', 'asc');
    $query = $this->db->get('cities');
    return $query->result();
  }
  function search_blog($term){
    $this->db->like('city', $term);
    $this->db->order_by('city', 'ASC');
    $this->db->limit(10);
    $query = $this->db->get('cities');
    return $query->result();
  }
  function pin_availability($pin){
    $this->db->where('pin', $pin);
    $query = $this->db->get('students');
    if($query->num_rows()>0){
      return true;
    } else {
      return false;
    }
  }
  function save_student(){
    $data = array(
      'grp'       => $this->input->post('grp'),
      'pin' 			 => $this->input->post('pn'),
      'complete_name'    => $this->input->post('cn'),
      'nick_name' 		 => $this->input->post('nn'),
      'address' 		 => $this->input->post('ad'),
      'place_of_birth'   => $this->input->post('pb'),
      'date_of_birth'    => $this->input->post('db'),
      'phone' 		     => $this->input->post('ph'),
      'cnst2'           => $this->input->post('cn2'),
      'nnst2'         => $this->input->post('nn2'),
      'adrst2'          => $this->input->post('ad2'),
      'pobst2'          => $this->input->post('pb2'),
      'dobst2'          => $this->input->post('db2'),
      'phst2'           => $this->input->post('ph2'),
      'cnst3'           => $this->input->post('cn3'),
      'nnst3'           => $this->input->post('nn3'),
      'adrst3'          => $this->input->post('ad3'),
      'pobst3'          => $this->input->post('pb3'),
      'dobst3'          => $this->input->post('db3'),
      'phst3'           => $this->input->post('ph3'),
      'cnst4'           => $this->input->post('cn4'),
      'nnst4'           => $this->input->post('nn4'),
      'adrst4'          => $this->input->post('ad4'),
      'pobst4' => $this->input->post('pb4'),
      'dobst4' => $this->input->post('db4'),
      'phst4' => $this->input->post('ph4'),
      'program' 		 => $this->input->post('pr'),
      'program_duration' => $this->input->post('pd'),
      'starting_date' 	 => $this->input->post('sd'),
      'reason' 		     => $this->input->post('re'),
      'target' 		     => $this->input->post('ta'),
      'difficulties'     => $this->input->post('di'),
      'bground' 		 => $this->input->post('bg'),
      'self_introduction'=> $this->input->post('si'),
      'weakness_point'   => $this->input->post('we'),
      'action_plan'      => $this->input->post('ap'),
      'note' => $this->input->post('note')
    );
    $result = $this->db->insert('students', $data);
    return $result;
  }
  function create_course_table(){
    $pin = $this->input->post('pn');
    $course_table = "s_".$pin;
    $fields = array(
      'meeting' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'course_date' => array(
        'type' => 'datetime',
        'null' => false
      ),
      'teacher' => array(
        'type' =>'VARCHAR',
        'constraint' => '255',
        'default' => ''
      ),
      'duration' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE,
      ),
      'material' => array(
        'type' => 'VARCHAR',
        'constraint' => '2000',
      ),
      'co' => array(
          'type' => 'int',
          'constraint' => 11,
          'after' => 'material'
        ),
      'evaluation' => array(
        'type' => 'varchar',
        'constraint' => '2500',
        'default' => '',
      ),
      'w' =>array(
        'type' => 'varchar',
        'constraint' => '255',
        'default' => ''
      ),
      's' =>array(
        'type' => 'varchar',
        'constraint' => '255',
        'default' => ''
      ),
      'test' =>array (
        'type' => 'varchar',
        'constraint' => '255',
        'default' => ''
      ),
      'test_number' => array (
        'type' => 'varchar',
        'constraint' => '255',
        'default' => '',
      ),
      'test_name' => array(
        'type' => 'varchar',
        'constraint' => '255',
        'default' => '',
      ),
      'of_test_number' => array(
        'type' => 'varchar',
        'constraint' => '255',
        'default' => '',
      ),
      'of_test' => array (
        'type' => 'varchar',
        'constraint' => '255',
        'default' => ''
      )
    );
    $this->dbforge->add_key('meeting', TRUE);
    $this->dbforge->add_field($fields);
    $result = $this->dbforge->create_table($course_table, TRUE);
    return $result;
  }
  function create_syllabus_table(){
    $pin = $this->input->post('pn');
    $syllabus_table = "syll_".$pin;
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
      'assign' => array(
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
  function insert_into_syllabus(){
    $pin 			= $this->input->post('pn');
    $syllabus_table = "syll_".$pin;
    $query          = $this->db->query("INSERT INTO `$syllabus_table`
      (`id`, `section`, `topic`, `ind`, `status`, `assign`)
      VALUES
      (100, 1, 0, 0, '', 0),
      (110, 1, 1, 0, '', 0),
      (111, 1, 1, 1, '', 0),
      (112, 1, 1, 2, '', 0),
      (113, 1, 1, 3, '', 0),
      (120, 1, 2, 0, '', 0),
      (121, 1, 2, 1, '', 0),
      (122, 1, 2, 2, '', 0),
      (123, 1, 2, 3, '', 0),
      (130, 1, 3, 0, '', 0),
      (131, 1, 3, 1, '', 0),
      (132, 1, 3, 2, '', 0),
      (140, 1, 4, 0, '', 0),
      (141, 1, 4, 1, '', 0),
      (142, 1, 4, 2, '', 0),
      (143, 1, 4, 3, '', 0),
      (150, 1, 5, 0, '', 0),
      (151, 1, 5, 1, '', 0),
      (152, 1, 5, 2, '', 0),
      (153, 1, 5, 3, '', 0),
      (160, 1, 6, 0, '', 0),
      (161, 1, 6, 1, '', 0),
      (162, 1, 6, 2, '', 0),
      (163, 1, 6, 3, '', 0),
      (170, 1, 7, 0, '', 0),
      (171, 1, 7, 1, '', 0),
      (172, 1, 7, 2, '', 0),
      (180, 1, 8, 0, '', 0),
      (181, 1, 8, 1, '', 0),
      (182, 1, 8, 2, '', 0),
      (183, 1, 8, 3, '', 0),
      (190, 1, 9, 0, '', 0),
      (191, 1, 9, 1, '', 0),
      (192, 1, 9, 2, '', 0),
      (193, 1, 9, 2, '', 0),
      (200, 2, 0, 0, '', 0),
      (210, 2, 1, 0, '', 0),
      (211, 2, 1, 1, '', 0),
      (212, 2, 1, 2, '', 0),
      (213, 2, 1, 3, '', 0),
      (220, 2, 2, 0, '', 0),
      (221, 2, 2, 1, '', 0),
      (222, 2, 2, 2, '', 0),
      (223, 2, 2, 3, '', 0),
      (230, 2, 3, 0, '', 0),
      (231, 2, 3, 1, '', 0),
      (232, 2, 3, 2, '', 0),
      (240, 2, 4, 0, '', 0),
      (241, 2, 4, 1, '', 0),
      (242, 2, 4, 2, '', 0),
      (250, 2, 5, 0, '', 0),
      (251, 2, 5, 1, '', 0),
      (252, 2, 5, 2, '', 0),
      (253, 2, 5, 3, '', 0),
      (260, 2, 6, 0, '', 0),
      (261, 2, 6, 1, '', 0),
      (262, 2, 6, 2, '', 0),
      (270, 2, 7, 0, '', 0),
      (271, 2, 7, 1, '', 0),
      (272, 2, 7, 2, '', 0),
      (280, 2, 8, 0, '', 0),
      (281, 2, 8, 1, '', 0),
      (282, 2, 8, 2, '', 0),
      (290, 2, 9, 0, '', 0),
      (291, 2, 9, 1, '', 0),
      (292, 2, 9, 2, '', 0),
      (300, 3, 0, 0, '', 0),
      (310, 3, 1, 0, '', 0),
      (311, 3, 1, 1, '', 0),
      (312, 3, 1, 2, '', 0),
      (313, 3, 1, 3, '', 0),
      (320, 3, 2, 0, '', 0),
      (321, 3, 2, 1, '', 0),
      (322, 3, 2, 2, '', 0),
      (323, 3, 2, 3, '', 0),
      (330, 3, 3, 0, '', 0),
      (331, 3, 3, 1, '', 0),
      (332, 3, 3, 2, '', 0),
      (340, 3, 4, 0, '', 0),
      (341, 3, 4, 1, '', 0),
      (342, 3, 4, 2, '', 0),
      (350, 3, 5, 0, '', 0),
      (351, 3, 5, 1, '', 0),
      (352, 3, 5, 2, '', 0),
      (360, 3, 6, 0, '', 0),
      (361, 3, 6, 1, '', 0),
      (362, 3, 6, 2, '', 0),
      (370, 3, 7, 0, '', 0),
      (371, 3, 7, 1, '', 0),
      (372, 3, 7, 2, '', 0),
      (373, 3, 7, 3, '', 0),
      (380, 3, 8, 0, '', 0),
      (381, 3, 8, 1, '', 0),
      (382, 3, 8, 2, '', 0),
      (390, 3, 9, 0, '', 0),
      (391, 3, 9, 1, '', 0),
      (392, 3, 9, 2, '', 0),
      (400, 4, 0, 0, '', 0),
      (410, 4, 1, 0, '', 0),
      (411, 4, 1, 1, '', 0),
      (412, 4, 1, 2, '', 0),
      (413, 4, 1, 3, '', 0),
      (420, 4, 2, 0, '', 0),
      (421, 4, 2, 1, '', 0),
      (422, 4, 2, 2, '', 0),
      (423, 4, 2, 3, '', 0),
      (430, 4, 3, 0, '', 0),
      (431, 4, 3, 1, '', 0),
      (432, 4, 3, 2, '', 0),
      (433, 4, 3, 3, '', 0),
      (440, 4, 4, 0, '', 0),
      (441, 4, 4, 1, '', 0),
      (442, 4, 4, 2, '', 0),
      (443, 4, 4, 3, '', 0),
      (450, 4, 5, 0, '', 0),
      (451, 4, 5, 1, '', 0),
      (452, 4, 5, 2, '', 0),
      (460, 4, 6, 0, '', 0),
      (461, 4, 6, 1, '', 0),
      (462, 4, 6, 2, '', 0),
      (463, 4, 6, 3, '1', 0),
      (470, 4, 7, 0, '', 0),
      (471, 4, 7, 1, '', 0),
      (472, 4, 7, 2, '', 0),
      (473, 4, 7, 3, '', 0),
      (480, 4, 8, 0, '', 0),
      (481, 4, 8, 1, '', 0),
      (482, 4, 8, 2, '', 0),
      (483, 4, 8, 3, '', 0),
      (490, 4, 9, 0, '', 0),
      (491, 4, 9, 1, '', 0),
      (492, 4, 9, 2, '', 0),
      (493, 4, 9, 3, '', 0),
      (500, 5, 0, 0, '', 0),
      (510, 5, 1, 0, '', 0),
      (511, 5, 1, 1, '0', 0),
      (512, 5, 1, 2, '', 0),
      (513, 5, 1, 3, '', 0),
      (520, 5, 2, 0, '', 0),
      (521, 5, 2, 1, '', 0),
      (522, 5, 2, 2, '0', 0),
      (523, 5, 2, 3, '', 0),
      (530, 5, 3, 0, '', 0),
      (531, 5, 3, 1, '', 0),
      (532, 5, 3, 2, '0', 0),
      (540, 5, 4, 0, '', 0),
      (541, 5, 4, 1, '', 0),
      (542, 5, 4, 2, '', 0),
      (543, 5, 4, 3, '', 0),
      (550, 5, 5, 0, '', 0),
      (551, 5, 5, 1, '', 0),
      (552, 5, 5, 2, '', 0),
      (553, 5, 5, 3, '', 0),
      (560, 5, 6, 0, '', 0),
      (561, 5, 6, 1, '', 0),
      (562, 5, 6, 2, '', 0),
      (563, 5, 6, 3, '', 0),
      (570, 5, 7, 0, '', 0),
      (571, 5, 7, 1, '', 0),
      (572, 5, 7, 2, '', 0),
      (580, 5, 8, 0, '', 0),
      (581, 5, 8, 1, '', 0),
      (582, 5, 8, 2, '', 0),
      (583, 5, 8, 3, '', 0),
      (590, 5, 9, 0, '', 0),
      (591, 5, 9, 1, '', 0),
      (592, 5, 9, 2, '', 0),
      (593, 5, 9, 3, '', 0),
      (600, 6, 0, 0, '', 0),
      (610, 6, 1, 0, '', 0),
      (611, 6, 1, 1, '', 0),
      (612, 6, 1, 2, '', 0),
      (620, 6, 2, 0, '', 0),
      (621, 6, 2, 1, '', 0),
      (622, 6, 2, 2, '', 0),
      (630, 6, 3, 0, '', 0),
      (631, 6, 3, 1, '', 0),
      (632, 6, 3, 2, '', 0),
      (640, 6, 4, 0, '', 0),
      (641, 6, 4, 1, '', 0),
      (642, 6, 4, 2, '', 0),
      (650, 6, 5, 0, '', 0),
      (651, 6, 5, 1, '', 0),
      (652, 6, 5, 2, '', 0),
      (653, 6, 5, 3, '', 0),
      (660, 6, 6, 0, '', 0),
      (661, 6, 6, 1, '', 0),
      (662, 6, 6, 2, '', 0),
      (663, 6, 6, 3, '', 0),
      (670, 6, 7, 0, '', 0),
      (671, 6, 7, 1, '', 0),
      (672, 6, 7, 2, '', 0),
      (680, 6, 8, 0, '', 0),
      (681, 6, 8, 1, '', 0),
      (682, 6, 8, 2, '', 0),
      (683, 6, 8, 3, '', 0),
      (690, 6, 9, 0, '', 0),
      (691, 6, 9, 1, '', 0),
      (692, 6, 9, 2, '', 0),
      (693, 6, 9, 3, '', 0),
      (700, 7, 0, 0, '', 0),
      (710, 7, 1, 0, '', 0),
      (711, 7, 1, 1, '', 0),
      (712, 7, 1, 2, '', 0),
      (713, 7, 1, 3, '', 0),
      (720, 7, 2, 0, '', 0),
      (721, 7, 2, 1, '', 0),
      (730, 7, 3, 0, '', 0),
      (731, 7, 3, 1, '', 0),
      (732, 7, 3, 2, '', 0),
      (740, 7, 4, 0, '', 0),
      (741, 7, 4, 1, '', 0),
      (742, 7, 4, 2, '', 0),
      (750, 7, 5, 0, '', 0),
      (751, 7, 5, 1, '', 0),
      (752, 7, 5, 2, '', 0),
      (761, 7, 6, 1, '', 0),
      (762, 7, 6, 2, '', 0),
      (763, 7, 6, 3, '', 0),
      (770, 7, 7, 0, '', 0),
      (771, 7, 7, 1, '', 0),
      (772, 7, 7, 2, '', 0),
      (780, 7, 8, 0, '', 0),
      (781, 7, 8, 1, '', 0),
      (782, 7, 8, 2, '', 0),
      (783, 7, 8, 3, '', 0),
      (790, 7, 9, 0, '', 0),
      (791, 7, 9, 1, '', 0),
      (792, 7, 9, 2, '', 0),
      (800, 8, 0, 0, '', 0),
      (810, 8, 1, 0, '', 0),
      (811, 8, 1, 1, '', 0),
      (812, 8, 1, 2, '', 0),
      (813, 8, 1, 3, '', 0),
      (814, 8, 1, 4, '', 0),
      (815, 8, 1, 5, '', 0),
      (820, 8, 2, 0, '', 0),
      (821, 8, 2, 1, '', 0),
      (822, 8, 2, 2, '', 0),
      (823, 8, 2, 3, '', 0),
      (824, 8, 2, 4, '', 0),
      (830, 8, 3, 0, '', 0),
      (831, 8, 3, 1, '', 0),
      (832, 8, 3, 2, '', 0),
      (833, 8, 3, 3, '', 0),
      (834, 8, 3, 4, '', 0),
      (840, 8, 4, 0, '', 0),
      (841, 8, 4, 1, '', 0),
      (842, 8, 4, 2, '', 0),
      (850, 8, 5, 0, '', 0),
      (851, 8, 5, 1, '', 0),
      (852, 8, 5, 2, '', 0),
      (860, 8, 6, 0, '', 0),
      (861, 8, 6, 1, '', 0),
      (862, 8, 6, 2, '', 0),
      (863, 8, 6, 3, '', 0),
      (1100, 1, 10, 0, '', 0),
      (1101, 1, 10, 1, '', 0),
      (1102, 1, 10, 2, '', 0),
      (1103, 1, 10, 3, '', 0),
      (2100, 2, 10, 0, '', 0),
      (2101, 2, 10, 1, '', 0),
      (2102, 2, 10, 2, '', 0),
      (2103, 2, 10, 3, '', 0),
      (2110, 2, 11, 0, '', 0),
      (2111, 2, 11, 1, '', 0),
      (2112, 2, 11, 2, '', 0),
      (2120, 2, 12, 0, '', 0),
      (2121, 2, 12, 1, '', 0),
      (2122, 2, 12, 2, '', 0),
      (2123, 2, 12, 3, '', 0),
      (2130, 2, 13, 0, '', 0),
      (2131, 2, 13, 1, '', 0),
      (2132, 2, 13, 2, '', 0),
      (2140, 2, 14, 0, '', 0),
      (2141, 2, 14, 1, '', 0),
      (2142, 2, 14, 2, '', 0),
      (2143, 2, 14, 3, '', 0),
      (2150, 2, 15, 0, '', 0),
      (2151, 2, 15, 1, '', 0),
      (2152, 2, 15, 2, '', 0),
      (2153, 2, 15, 3, '', 0),
      (2160, 2, 16, 0, '', 0),
      (2161, 2, 16, 1, '', 0),
      (2162, 2, 16, 2, '', 0),
      (2170, 2, 17, 0, '', 0),
      (2171, 2, 17, 1, '', 0),
      (2172, 2, 17, 2, '', 0),
      (2180, 2, 18, 0, '', 0),
      (2181, 2, 18, 1, '', 0),
      (2182, 2, 18, 2, '', 0),
      (2190, 2, 19, 0, '', 0),
      (2191, 2, 19, 1, '', 0),
      (2192, 2, 19, 2, '', 0),
      (3100, 3, 10, 0, '', 0),
      (3101, 3, 10, 1, '', 0),
      (3102, 3, 10, 2, '', 0),
      (3110, 3, 11, 0, '', 0),
      (3111, 3, 11, 1, '', 0),
      (3112, 3, 11, 2, '', 0),
      (3113, 3, 11, 3, '1', 0),
      (3120, 3, 12, 0, '', 0),
      (3121, 3, 12, 1, '', 0),
      (3122, 3, 12, 2, '', 0),
      (3130, 3, 13, 0, '', 0),
      (3131, 3, 13, 1, '', 0),
      (3132, 3, 13, 2, '', 0),
      (3140, 3, 14, 0, '', 0),
      (3141, 3, 14, 1, '', 0),
      (3142, 3, 14, 2, '', 0),
      (3150, 3, 15, 0, '', 0),
      (3151, 3, 15, 1, '', 0),
      (3152, 3, 15, 2, '', 0),
      (3153, 3, 15, 3, '', 0),
      (3160, 3, 16, 0, '', 0),
      (3161, 3, 16, 1, '', 0),
      (3162, 3, 16, 2, '', 0),
      (3163, 3, 16, 3, '', 0),
      (3170, 3, 17, 0, '', 0),
      (3171, 3, 17, 1, '', 0),
      (3172, 3, 17, 2, '', 0),
      (3173, 3, 17, 3, '', 0),
      (4100, 4, 10, 0, '', 0),
      (4101, 4, 10, 1, '', 0),
      (4102, 4, 10, 2, '', 0),
      (5100, 5, 10, 0, '', 0),
      (5101, 5, 10, 1, '', 0),
      (5102, 5, 10, 2, '', 0),
      (5110, 5, 11, 0, '', 0),
      (5111, 5, 11, 1, '0', 0),
      (5112, 5, 11, 2, '', 0),
      (5120, 5, 12, 0, '', 0),
      (5121, 5, 12, 1, '', 0),
      (5122, 5, 12, 2, '', 0),
      (5123, 5, 12, 3, '', 0),
      (6100, 6, 10, 0, '', 0),
      (6101, 6, 10, 1, '', 0),
      (6102, 6, 10, 2, '', 0),
      (6103, 6, 10, 3, '', 0),
      (6110, 6, 11, 0, '', 0),
      (6111, 6, 11, 1, '', 0),
      (6112, 6, 11, 2, '', 0),
      (6113, 6, 11, 3, '', 0),
      (6120, 6, 12, 0, '', 0),
      (6121, 6, 12, 1, '', 0),
      (6122, 6, 12, 2, '', 0),
      (6123, 6, 12, 3, '', 0),
      (6130, 6, 13, 0, '', 0),
      (6131, 6, 13, 1, '', 0),
      (6132, 6, 13, 2, '', 0),
      (6133, 6, 13, 3, '', 0),
      (6140, 6, 14, 0, '', 0),
      (6141, 6, 14, 1, '', 0),
      (6142, 6, 14, 2, '', 0),
      (6150, 6, 15, 0, '', 0),
      (6151, 6, 15, 1, '', 0),
      (6152, 6, 15, 2, '', 0),
      (6160, 6, 16, 0, '', 0),
      (6161, 6, 16, 1, '', 0),
      (6162, 6, 16, 2, '', 0),
      (6170, 6, 17, 0, '', 0),
      (6171, 6, 17, 1, '', 0),
      (6172, 6, 17, 2, '', 0);");
    return $query;
  }
  function create_student_directories(){
    $pin = $this->input->post('pn');
    $result = mkdir('assets/students/'.$pin);
    return $result;
  }
  function update_student(){
    $pin 			   = $this->input->post('pin');
    $complete_name     = $this->input->post('complete_name');
    $nick_name 		   = $this->input->post('nick_name');
    $address 		   = $this->input->post('address');
    $place_of_birth    = $this->input->post('place_of_birth');
    $date_of_birth     = $this->input->post('date_of_birth');
    $phone 		       = $this->input->post('phone');
    $program 		   = $this->input->post('program');
    $program_duration  = $this->input->post('program_duration');
    $starting_date 	   = $this->input->post('starting_date');
    $reason 		   = $this->input->post('reason');
    $target 		   = $this->input->post('target');
    $difficulties      = $this->input->post('difficulties');
    $bground 		   = $this->input->post('bground');
    $self_introduction = $this->input->post('self_introduction');
    $weakness_point    = $this->input->post('weakness_point');
    $action_plan       = $this->input->post('action_plan');

    $pin             = $this->input->post('pn');
    $grp             = $this->input->post('grp');
    $complete_name   = $this->input->post('cn');
    $cnst2	         = $this->input->post('cn2');
    $cnst3	         = $this->input->post('cn3');
    $cnst4           = $this->input->post('cn4');

    $nick_name	     = $this->input->post('nn');
    $nnst2           = $this->input->post('nn2');
    $nnst3           = $this->input->post('nn3');
	$nnst4	         = $this->input->post('nn4');

	$address	     = $this->input->post('ad');
	$adrst2	         = $this->input->post('ad2');
	$adrst3	         = $this->input->post('ad3');
	$adrst4	         = $this->input->post('ad4');

	$place_of_birth	 = $this->input->post('pb');
	$pobst2	         = $this->input->post('pb2');
	$pobst3	         = $this->input->post('pb3');
	$pobst4          = $this->input->post('pb4');

	$date_of_birth   = $this->input->post('db');
    $dobst2          = $this->input->post('db2');
    $dobst3          = $this->input->post('db3');
    $dobst4          = $this->input->post('db4');

    $phone           = $this->input->post('ph');
    $phst2           = $this->input->post('ph2');
    $phst3           = $this->input->post('ph3');
    $phst4           = $this->input->post('ph4');

    $program         = $this->input->post('pr');
    $program_duration= $this->input->post('pd');
    $starting_date   = $this->input->post('sd');
    $reason          = $this->input->post('re');
    $target          = $this->input->post('ta');
    $difficulties	 = $this->input->post('di');
    $bground	     = $this->input->post('bg');
    $self_introduction	= $this->input->post('si');
    $weakness_point	 = $this->input->post('wp');
    $action_plan	 = $this->input->post('ap');
    $note = $this->input->post('note');
    $fsp             = $this->input->post('fsp');

    $this->db->set('complete_name', $complete_name);
    $this->db->set('grp', $grp);
    $this->db->set('cnst2',$cnst2);
    $this->db->set('cnst3',$cnst3);
    $this->db->set('cnst4',$cnst4);
    $this->db->set('nick_name', $nick_name);
    $this->db->set('nnst2',$nnst2);
    $this->db->set('nnst3',$nnst3);
	$this->db->set('nnst4',$nnst4);
    $this->db->set('address', $address);
    $this->db->set('adrst2',$adrst2);
	$this->db->set('adrst3',$adrst3);
	$this->db->set('adrst4',$adrst4);
    $this->db->set('place_of_birth', $place_of_birth);
    $this->db->set('pobst2',$pobst2);
	$this->db->set('pobst3',$pobst3);
	$this->db->set('pobst4',$pobst4);
    $this->db->set('date_of_birth', $date_of_birth);
    $this->db->set('dobst2', $dobst2);
    $this->db->set('dobst3', $dobst3);
    $this->db->set('dobst4', $dobst4);
    $this->db->set('phone', $phone);
    $this->db->set('phst2',$phst2);
    $this->db->set('phst3',$phst3);
    $this->db->set('phst4',$phst4);
    $this->db->set('program', $program);
    $this->db->set('program_duration', $program_duration);
    $this->db->set('starting_date', $starting_date);
    $this->db->set('reason', $reason);
    $this->db->set('target', $target);
    $this->db->set('difficulties', $difficulties);
    $this->db->set('bground', $bground);
    $this->db->set('self_introduction', $self_introduction);
    $this->db->set('weakness_point', $weakness_point);
    $this->db->set('action_plan', $action_plan);
    $this->db->set('note', $note);
    $this->db->set('fsp',$fsp);
    $this->db->where('pin', $pin);
    $result=$this->db->update('students');
    return $result;
  }
  function delete_student(){
      $pin = $this->input->post('pin');
      $this->db->where('pin', $pin);
      $query = $this->db->delete('students');
      return $query;
  }
  function delete_table(){
      $pin = $this->input->post('pin');
      $student_table = "s_".$pin;
      $query = $this->dbforge->drop_table($student_table);
      return $query;
  }
  function delete_directory(){
    $pin = $this->input->post('pin');
    $stdir = "assets/students/".$pin;
    if(is_dir($stdir)){
      $files = glob($stdir.'*'.GLOB_MARK);
      foreach($files as $file){
        delete_directory($file);
      }
      rmdir($stdir);
    } else if(is_file($stdir)){
      unlink($stdir);
    }
    //return $stdir;
  }
  function del_dir_contents(){
    $pin = $this->input->post('pin');
    $stdir = "assets/students/".$pin;
    $query = delete_files($stdir, TRUE);
    return $query;
  }
  function del_dir(){
    $pin = $this->input->post('pin');
    $stdir = "assets/students/".$pin;
    $query = rmdir($stdir);
    return $query;
  }
  function set_fsp(){
    $pin = $this->input->post('pin');
    $fsp = 'yes';
    $this->db->set('fsp', $fsp);
    $this->db->where('pin', $pin);
    $result = $this->db->update('students');
    return $result;
  }
  function create_fsp_table(){
    $fsp = $this->input->post('fsp');
    $pin = $this->input->post('pn');
    if($fsp !=''){
      $fsp_table = "fsp_".$pin;
      $fields = array(
        'id' => array(
          'type'           => 'INT',
          'constraint'     => 5,
          'unsigned'       => TRUE,
          'auto_increment' => TRUE
        ),
        'material' => array(
          'type' => 'varchar',
          'constraint' => '255',
          'default' => ''
        ),
        'fsp_result' => array(
          'type' => 'varchar',
          'constraint' => '255',
          'default' => ''
        ),
        'comment' => array(
          'type' => 'varchar',
          'constraint' => '255',
          'default' => ''
        )
      );
      $this->dbforge->add_key('id', TRUE);
      $this->dbforge->add_field($fields);
      $result = $this->dbforge->create_table($fsp_table, TRUE);
      return $result;
    }

  }
}
