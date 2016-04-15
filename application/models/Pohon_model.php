<?php
/**
 *
 */
class Pohon_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function insert($data)
  {
    # input dalam bentuk objek
    # menambah data pohon
    if (!$this->db->insert('pohon',$data)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function update($data)
  {
    # input dalam bentuk objek
    # mengubah data pohon yang telah tersimpan
    $where = array('id_pohon' => $data->id_pohon );
    unset($data->id_pohon);
    if (!$this->db->update('pohon',$data,$where)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function getAll()
  {
    # output dalam bentuk objek
    # mengambil semua data pohon yang telah tersimpan
    $query = $this->db->get('pohon');
    if(!$query->result()==NULL){
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getById($data)
  {
    # input dalam bentuk objek
    # output dalam bentuk objek
    # mengambil data pohon berdasarkan id_pohon
    $where = array('id_pohon' => $data->id_pohon);
    $query = $this->db->get('pohon',$where);
    if (!$query->result()==NULL) {
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getByLocation($data)
  {
    # input dalam bentuk objek
    # output dalam bentuk objek
    # mengambil data pohon berdasarkan lokasi
    $where = array('id_nama_jalan' => $data->id_nama_jalan);
    $query = $this->db->get('pohon', $where);
    if (!$quey->result()==NULL) {
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getByJenis($data)
  {
    # input dalam bentuk objek
    # output dalam bentuk objek
    # mengambil data pohon berdasarkan jenis
    $where = array('id_jenis_pohon' => $data->id_jenis_pohon);
    $query = $this->db->get('pohon',$where);
    if(!$query->result()==NULL){
      return $query->result()
    }else{
      return NULL;
    }
  }
}
