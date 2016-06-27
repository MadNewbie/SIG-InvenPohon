<?php
/**
 *
 */
class Rekap extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Pohon_model');
    $this->load->model('Jenis_pohon_model');
    $this->load->model('Nama_jalan_model');
  }

  public function index()
  {
    $this->benchmark->mark('start');
    $data = (object)$this->Pohon_model->getAll();
    $dataJalan = (object)$this->Nama_jalan_model->getAll();
    $dataJenis = (object)$this->Jenis_pohon_model->getAll();
    foreach ($data as $key => $value) {
      foreach ($dataJalan as $a => $b) {
        if($value->id_nama_jalan==$b->id_nama_jalan){
          $value->nama_jalan = $b->nama_jalan;
          break;
        }
      }
      foreach ($dataJenis as $a => $b) {
        if($value->id_jenis_pohon==$b->id_jenis_pohon){
          $value->nama_ilmiah = $b->nama_ilmiah;
          $value->nama_lokal = $b->nama_lokal;
          break;
        }
      }
    }
    $result = array('data' => $data );
    if(isset($_SESSION['tingkat_user'])){
      switch ($_SESSION['tingkat_user']) {
        case 'administrator':
          $this->template->load('template/admin','rekap/index',$result);
          break;
        case 'surveyor':
          $this->template->load('template/surveyor','rekap/index',$result);
          break;
        default:
        $this->template->load('template/general','rekap/index',$result);
        break;
      }
    }else{
      $this->template->load('template/general','rekap/index',$result);
    }
    $this->benchmark->mark('end');
  }

  public function getByDate()
  {
    $data = (object) $this->input->post();
    if(!empty($data->awal)){
      $data->awal = date("Y-m-d",strtotime($data->awal));
      $this->db->where( 'kondisi_fisik.tanggal >=', $data->awal );
    }
    if(!empty($data->akhir)){
      $data->akhir = date("Y-m-d",strtotime($data->akhir));
      $this->db->where( 'kondisi_fisik.tanggal <=', $data->akhir );
    }
    $this->db->join('pohon', 'pohon.id_pohon = kondisi_fisik.id_pohon');
    $this->db->join('nama_jalan', 'nama_jalan.id_nama_jalan = pohon.id_nama_jalan');
    $this->db->join('jenis_pohon', 'jenis_pohon.id_jenis_pohon = pohon.id_jenis_pohon');
    $this->db->select('kondisi_fisik.*, jenis_pohon.nama_lokal, jenis_pohon.nama_ilmiah, nama_jalan.nama_jalan');
    $query = $this->db->get('kondisi_fisik');
    $data = $query->result_object();
    echo json_encode($data);
  }
}
