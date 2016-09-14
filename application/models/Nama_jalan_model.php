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

  public function fetch_nama_jalan($limit,$start)
  {
    # mengambil jenis_pohon berdasarkan mulai dan jumlah yang telah ditentukan
    $this->db->limit($limit,$start);
    $this->db->select('id_nama_jalan,nama_jalan');
    $query = $this->db->get('nama_jalan');
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return false;
    }
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
      return $query->result_object();
    }else{
      return NULL;
    }
  }

  public function getById($data)
  {
    # input dalam bentuk objek
    # output dalam bntuk objek
    # mengambil data nama jalan berdasarkan id
    $where = array('id_nama_jalan' => $data);
    $query = $this->db->get_where('nama_jalan',$where);
    if (!$query->result()==NULL) {
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getByNama($data)
  {
    # mengambil id jalan dengan parameter nama jalan
    $this->db->select('id_nama_jalan');
    $this->db->where('nama_jalan',$data);
    $query = $this->db->get('nama_jalan');
    if (!$query->result()==NULL) {
      return $query->row(0);
    }else{
      return NULL;
    }
  }
}
