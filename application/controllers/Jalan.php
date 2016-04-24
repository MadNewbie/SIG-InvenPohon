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

  public function index()
  {
    # main menu untuk mengatur jalan
    $config = array('base_url' => base_url()."jalan/index", 'total_rows' => count($this->Nama_jalan_model->getAll()), 'per_page' => 8, 'uri_segment'=>3);
    # menginisialisasi pagination
    $this->pagination->initialize($config);
    #cek uri
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
    #ambil data
    $data['result'] =  $this->Nama_jalan_model->fetch_nama_jalan($config['per_page'], $page);
    #membuat link
    $data['links'] = $this->pagination->create_links();
    $this->template->load('template/admin','jalan/index',$data);
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
