<?php
/**
 *
 */
class Jenis_pohon extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Jenis_pohon_model');
  }

  public function insert()
  {
    # memasukkan data jenis pohon baru
    if ($_POST) {
      # jika tombol submit ditekan
      $data = $_POST['data'];
      $data = (object)$data;
      $this->Jenis_pohon_model->insert($data);
    }else{
      $this->load->view('Jenis_pohon/insert');
    }
  }
}
