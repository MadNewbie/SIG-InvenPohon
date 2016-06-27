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

  public function fetch_pohon($limit,$start)
  {
    # mengambil data fisik pohon sejumlah limit untuk ditampilkan
    $this->db->limit($limit,$start);
    $this->db->select('id_pohon, id_nama_jalan, id_jenis_pohon, total_kerusakan');
    $query = $this->db->get('pohon');
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return false;
    }
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

  public function updateById($data)
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
    $where = array('id_pohon' => $data);
    $query = $this->db->get_where('pohon',$where);
    if (!$query->result()==NULL) {
      return $query->result_object();
    }else{
      return NULL;
    }
  }

  public function getByLocation($data)
  {
    # input dalam bentuk objek
    # output dalam bentuk objek
    # mengambil data pohon berdasarkan lokasi
    $where = array('id_nama_jalan' => $data);
    $query = $this->db->get_where('pohon',$where);
    if (!$query->result()==NULL) {
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getByLocationArray($data)
  {
    # input dalam bentuk objek
    # output dalam bentuk objek
    # mengambil data pohon berdasarkan lokasi
    // $this->db->select('')
    //
    // $query = $this->db->get('pohon');
    $where = array('id_nama_jalan' => $data);
    $query = $this->db->get_where('pohon',$where);
    if (!$query->result()==NULL) {
      return $query->result_array();
    }else{
      return NULL;
    }
  }

  public function getByJenis($data)
  {
    # input dalam bentuk objek
    # output dalam bentuk objek
    # mengambil data pohon berdasarkan jenis
    $where = array('id_jenis_pohon' => $data);
    $query = $this->db->get_where('pohon',$where);
    if(!$query->result()==NULL){
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getByPosition($data)
  {
    # mengambil data pohon berdasarkan posisi gps
    file_put_contents("where data pohon query",json_encode($data));
    $this->db->select('*');
    $this->db->like("longitude",$data->longitude,"after");
    $this->db->like("latitude",$data->latitude,"after");
    $query = $this->db->get("pohon");
    file_put_contents("query",json_encode($query->result_object()));
    if(!$query->result()==NULL){
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function getAllId()
  {
    # mengambil semua id_pohon
    $this->db->select('id_pohon');
    $query = $this->db->get("pohon");
    if (!$query->result()==NULL) {
      return $query->result_object();
    }else{
      return NULL;
    }
  }
}
