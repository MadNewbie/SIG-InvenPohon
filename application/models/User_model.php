<?php
class User_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function fetch_user($limit,$start)
  {
    # mengambil user berdasarkan mulai dan jumlah yang telah ditentukan
    $this->db->limit($limit,$start);
    $this->db->select('id_user,nama_lengkap,username,tingkat_user');
    $query = $this->db->get('user');
    if ($query->num_rows() > 0) {
      return $query->result();
    }else{
      return false;
    }
  }

  public function insert($data)
  {
    #input dalam bentuk objek
    # memasukkan data user
    if (!$this->db->insert('user',$data)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function update($data)
  {
    # input dalam bentuk objek
    # merubah data user dengan user id sebagai acuan
    $where = array('id_user' => $data->id_user);
    unset($data->id_user);
    if (!$this->db->update('user',$data,$where)) {
      return $this->db->error();
    }else{
      return true;
    }
  }

  public function getAll()
  {
    # output dalam bentuk objek
    # untuk mengambil semua data user
    $this->db->select('nama_lengkap,username,tingkat_user');
    $query = $this->db->get('user');
    if($query->result()!=NULL){
      return $query->result();
    }else{
      return NULL;
    }
  }

  public function login($data)
  {
    # input dalam bentuk objek
    # mencocokan username dan password yang diinputkan dengan database
    # mengembalikan nilai true jika betul dan false jika salah

    $where = array('username' => $data->username, 'password'=> $data->password);
    $this->db->select('id_user,nama_lengkap,tingkat_user');
    $query = $this->db->get_where('user', $where);
    if (!$query->result() == NULL) {
      return $query->row(0);
    }else{
      return false;
    }
  }

  public function retrieve($id_user)
  {
    # mengambil semua data user berdasarkan id_user
    $where = array('id_user' => $id_user);
    $query = $this->db->get_where('user',$where);
    if(!$query->result()==NULL){
      return $query->result_object();
    }else{
      return false;
    }
  }
}
