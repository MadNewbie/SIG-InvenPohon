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

  public function fetch_jenis_pohon($limit,$start)
  {
    # mengambil jenis_pohon berdasarkan mulai dan jumlah yang telah ditentukan
    $this->db->limit($limit,$start);
    $this->db->select('id_jenis_pohon,nama_lokal,nama_ilmiah');
    $query = $this->db->get('jenis_pohon');
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return false;
    }
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
      return $query->result_object();
    }else{
      return NULL;
    }
  }

  public function getById($data)
  {
    # input dalam bentuk objek
    # output dalam bntuk objek
    # mengambil data jenis pohon berdasarkan id
    $where = array('id_jenis_pohon' => $data);
    $query = $this->db->get_where('jenis_pohon',$where);
    if (!$query->result()==NULL) {
      return $query->result_object();
    }else{
      return NULL;
    }
  }

  public function getByNamaIlmiah($data)
  {
    # mengambil data dengan parameter nama ilmiah
    $this->db->select('id_jenis_pohon');
    $this->db->where('nama_ilmiah',$data);
    $query = $this->db->get('jenis_pohon');
    if (!$query->result()==NULL) {
      return $query->row(0);
    }else{
      return NULL;
    }
  }
}
