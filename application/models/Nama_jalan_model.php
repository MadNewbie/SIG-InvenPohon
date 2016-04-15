<?php
/**
 *
 */
class Nama_jalan_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    # input dalam bentuk objek
    # menambah data nama jalan
    if (!$this->db->insert('nama_jalan',$data)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function update($data)
  {
    # input dalam bentuk objek
    # mengubah data nama jalan yang tersimpan dalam basis data
    $where = array('id_nama_jalan' => $data->id_nama_jalan);
    unset($data->id_nama_jalan);
    if (!$this->db->update('nama_jalan',$data,$where)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function getAll()
  {
    # output dalam bentuk objek
    # mengambil semua data nama jalan dalam basis data
    $query = $this->db->get('nama_jalan');
    if (!$query->result()==NULL) {
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getById($data)
  {
    # input dalam bentuk objek
    # output dalam bntuk objek
    # mengambil data nama jalan berdasarkan id
    $where = array('id_nama_jalan' => $data->id_nama_jalan );
    $query = $this->db->get('nama_jalan',$where);
    if (!$query->result()==NULL) {
      return $query->result();
    }else{
      return NULL;
    }
  }
}
