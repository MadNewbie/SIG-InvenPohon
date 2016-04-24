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

  public function index()
  {
    # main menu untuk mengatur jenis pohon
    $config = array('base_url' => base_url()."jenis_pohon/index", 'total_rows' => count($this->Jenis_pohon_model->getAll()), 'per_page' => 8, 'uri_segment'=>3);
    # menginisialisasi pagination
    $this->pagination->initialize($config);
    #cek uri
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
    #ambil data
    $data['result'] =  $this->Jenis_pohon_model->fetch_jenis_pohon($config['per_page'], $page);
    #membuat link
    $data['links'] = $this->pagination->create_links();
    $this->template->load('template/admin','jenis_pohon/index',$data);
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
      $this->load->view('jenis_pohon/insert');
    }
  }
}
