<?php

Class User_model extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  function gets(){
      return $this->db->query("SELECT * FROM user")->result();
  }

  function add($option){
    $this->db->set('email',$option['email']);
    $this->db->set('password',$option['password']);
    $this->db->set('created','NOW()',false);
    $this->db->insert('user');
    $result = $this->db->insert_id();
    return $result;
  }

  function getByEmail($option){
      return $this->db->get_where('user',array('email'=>$option['email']))->row();
  }
}
 ?>
