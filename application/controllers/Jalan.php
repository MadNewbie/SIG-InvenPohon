<?php
/**
 *
 */
class Jalan extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Nama_jalan_model');
  }

  public function insert()
  {
    # menambah data jalan
    if ($_POST) {
      # jika tombol submit ditekan
      $data = $_POST['data'];
      $data = (object)$data;
      $this->Nama_jalan_model->insert($data);
    }else{
      $this->load->view('jalan/add');
    }
  }

  public function update($id)
  {
    # mengubah data jalan
    if ($_POST) {
      # jika tombol submit ditekan
      $data = $_POST['data'];
      $data = (object)$data;
      $data->id = $id;
      $this->Nama_jalan_model->update($data);
    }else{
      $this->load->view('jalan/add');
    }
  }
}
