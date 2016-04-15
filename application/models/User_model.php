<?php
class User_model extends CI_Model
{

  function __construct()
  {
    parent::__construct();
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
    $query = $this->db->get('user');
    if($query->reuslt()!=NULL){
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
    $this->db->select('id');
    $query = $this->db->get('user', $where);
    if (!$query->result() == NULL) {
      return $query->result();
    }else{
      return false;
    }
  }

}