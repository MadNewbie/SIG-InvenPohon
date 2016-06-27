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
    $this->benchmark->mark('start');
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
    $this->benchmark->mark('end');
  }

  public function insert()
  {
    $this->benchmark->mark('start');
    # memasukkan data jenis pohon baru
    if ($_POST) {
      # jika tombol submit ditekan
      $data = $_POST['data'];
      $data = (object)$data;
      $this->Jenis_pohon_model->insert($data);
    }else{
      redirect('jenis_pohon');
    }
    redirect('jenis_pohon');
    $this->benchmark->mark('end');
  }

  public function edit()
  {
    $this->benchmark->mark('start');
    # mengubah jenis pohon
    if ($_POST) {
      # jika tombol submit ditekan
      $data = $_POST['data'];
      $data = (object)$data;
      $this->Jenis_pohon_model->update($data);
    }else{
      redirect('jenis_pohon');
    }
    redirect('jenis_pohon');
    $this->benchmark->mark('end');
  }

  public function getAll()
  {
    $this->benchmark->mark('start');
    # mengambil semua jenis pohon
    $data = $this->Jenis_pohon_model->getAll();
    echo json_encode($data);
    $this->benchmark->mark('end');
  }

  public function retrieve($id_jenis_pohon)
  {
    $this->benchmark->mark('start');
    # mengambil data user berdasarkan id_user
    $data = $this->Jenis_pohon_model->getById($id_jenis_pohon);
    echo json_encode($data);
    $this->benchmark->mark('end');
  }
}
