<?php
class Schedule_model extends CI_Model{
  function get_schedules(){
    $this->db->order_by('table_name', 'DESC');
    $query = $this->db->get('schedules');
    return $query->result();
  }
 function get_schedule(){
   $d = $this->input->get('d');
   $to_look = "schd_".$d;
   $this->db->select('*');
   $this->db->from($to_look);
   $query = $this->db->get();
   return $query->result();
 }
  function get_note(){
    $d = $this->input->post('d');
    $this->db->where('table_name',$d);
    $query = $this->db->get('schedules');
    return $query->result();
  }
  function update_note(){
    $d = $this->input->post('d');
    $str = $this->input->post('str');
    $this->db->where('table_name', $d);
    $this->db->set('note', $str);
    $query = $this->db->update('schedules');
    return $query;
  }
  function update_schedule(){
    $id             = $this->input->post('id');
    $col            = $this->input->post('col');
    $str            = $this->input->post('str');
    $d              = $this->input->post('d');
    $schedule_table = "schd_".$d;
    $this->db->set($col,$str);
    $this->db->where('id', $id);
    $result = $this->db->update($schedule_table);
    return $result;
  }
  function set_nick_name(){
    $col = $this->input->post('col');
    $id = $this->input->post('id');
    $nick_name = $this->input->post('nick_name');
    $d = $this->input->post('d');
    $schedule_table = "schd_".$d;
    $this->db->set($col, $nick_name);
    $this->db->where('id', $id);
    $query = $this->db->update($schedule_table);
    return $query;
  }
  function get_nick_name(){
    $str = $this->input->post('str');
    $this->db->where('pin', $str);
    $this->db->select('nick_name');
    $query = $this->db->get('students');
    return $query->result();
  }
 function add_teacher(){
   $d = $this->input->post('d');
   $name = $this->input->post('name');
   $schedule_table = "schd_".$d;
   $data = array (
        'name' => $this->input->post('name')
   );
   $query = $this->db->insert($schedule_table, $data);
   return $query;
 }
  function delete_teacher(){
    $id = $this->input->post('id');
    $d = $this->input->post('d');
    $table = "schd_".$d;
    $this->db->where('id', $id);
    $query = $this->db->delete($table);
    return $query;
  }
  function date_availability($d){
    $this->db->where('table_name', $d);
    $query = $this->db->get('schedules');
    if($query->num_rows()>0){
      return true;
    } else {
      return false;
    }
  }
  function add_schedule(){
    $d = $this->input->post('d');
    $data = array(
      'table_name' => $d
    );
    $query = $this->db->insert('schedules', $data);
    return $query;
  }
  function create_schedule(){
    $d = $this->input->post('d');
    $schedule_table = "schd_".$d;
    $fields = array(
      'id' => array(
        'type' => 'INT',
        'constraint' => 5,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'name' => array(
        'type' => 'varchar',
        'constraint' => '255',
        'default' => ''
      ),
      '_9' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_9r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_9p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_9n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_10' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_10r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_10p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_10n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_11' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_11r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_11p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_11n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_12' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_12r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_12p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_12n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_13' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_13r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_13p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_13n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_14' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_14r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_14p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_14n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_15' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_15r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_15p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_15n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_16' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_16r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_16p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_16n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_17' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_17r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_17p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_17n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_18' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_18r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_18p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_18n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_19' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_19r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_19p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_19n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      ),
      '_20' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_20r' => array(
        'type' => 'varchar',
        'constraint' => '24',
        'default' => ''
      ),
      '_20p' => array(
        'type' => 'varchar',
        'constraint' => '4',
        'default' => ''
      ),
      '_20n' => array(
        'type' => 'varchar',
        'constraint' => '120',
        'default' => ''
      )
    );
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->add_field($fields);
    $result = $this->dbforge->create_table($schedule_table, TRUE);
    return $result;
  }
  function insert_teachers(){
    $d = $this->input->post('d');
    $schedule_table = "schd_".$d;
    $query = $this->db->query("INSERT INTO `$schedule_table`
    (`id`, `name`, `_9`, `_9r`, `_9p`, `_10`, `_10r`, `_10p`, `_11`, `_11r`, `_11p`, `_12`, `_12r`, `_12p`, `_13`, `_13r`, `_13p`, `_14`, `_14r`, `_14p`, `_15`, `_15r`, `_15p`, `_16`, `_16r`, `_16p`, `_17`, `_17r`, `_17p`, `_18`, `_18r`, `_18p`, `_19`, `_19r`, `_19p`, `_20`, `_20r`, `_20p`)
    VALUES
    (1, 'Mr. Sugi', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (2, 'Ms. Herna', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (3, 'Mr. Ivan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (4, 'Ms. Priskil', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (5, 'Ms. Olga', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (6, 'Ms. Feb', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (7, 'Mr. Sumer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (8, 'Ms. Michel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (9, 'Ms. Yuni', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (10, 'Ms. Eta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (11, 'Mr. Caesar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (12, 'Ms. Jee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
    (13, 'Ms. Ayu', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');");
    return $query;
  }
}
