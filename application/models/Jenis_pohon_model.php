<?php
/**
 *
 */
class Jenis_pohon_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    # memasukkan jenis pohon baru
    # input dalam bentuk objek
    if (!$this->db->insert('jenis_pohon',$data)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function update($data)
  {
    # input dalam bentuk objek
    # mengubah data jenis pohon yang tersimpan dalam basis data
    $where = array('id_jenis_pohon' => $data->id_jenis_pohon);
    unset($data->id_jenis_pohon);
    if (!$this->db->update('jenis_pohon',$data,$where)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function getAll()
  {
    # output dalam bentuk objek
    # mengambil semua data jenis pohon dalam basis data
    $query = $this->db->get('jenis_pohon');
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
    # mengambil data jenis pohon berdasarkan id
    $where = array('id_jenis_pohon' => $data->id_jenis_pohon );
    $query = $this->db->get('jenis_pohon',$where);
    if (!$query->result()==NULL) {
      return $query->result();
    }else{
      return NULL;
    }
  }
}