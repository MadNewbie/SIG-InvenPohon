<?php
/**
 *
 */
class Kondisi_fisik_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    if (!$this->db->insert('kondisi_fisik',$data)) {
      return $this->db->error_object();
    }else{
      return true;
    }
  }

  public function getById($data)
  {
    $where = array('id_pohon' => $data);
    $query = $this->db->get_where('pohon',$where);
    if (!$query->result()==NULL) {
      return $query->result_object();
    }else{
      return NULL;
    }
  }
}
