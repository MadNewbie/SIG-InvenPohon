<?php
/**
 *
 */
class Info_grafis extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Pohon_model");
    $this->load->model("Jenis_pohon_model");
    $this->load->model("Nama_jalan_model");
  }

  public function index()
  {
    $this->benchmark->mark('start');
    # menampilkan data rekap pohon
    if(isset($_SESSION['tingkat_user'])){
      switch ($_SESSION['tingkat_user']) {
        case 'administrator':
          $this->template->load('template/admin','info_grafis/index');
          break;
        case 'surveyor':
          $this->template->load('template/surveyor','info_grafis/index');
          break;
        default:
        $this->template->load('template/general','info_grafis/index');
        break;
      }
    }else{
      $this->template->load('template/general','info_grafis/index');
    }
    $this->benchmark->mark('end');
  }

  public function detail($id_pohon)
  {
    $this->benchmark->mark('start');
    $rawDataPohon = $this->Pohon_model->getById($id_pohon);
    // var_dump($rawId);
    // die();
    $dataJenis = $this->Jenis_pohon_model->getAll();
    $dataJalan = $this->Nama_jalan_model->getAll();
    // die();
    foreach ($dataJenis as $key => $value) {
      if ($rawDataPohon[0]->id_jenis_pohon == $value->id_jenis_pohon) {
        $rawDataPohon[0]->nama_lokal = $value->nama_lokal;
        $rawDataPohon[0]->nama_ilmiah = $value->nama_ilmiah;
        break;
      }
    }
    foreach ($dataJalan as $key => $value) {
      if ($rawDataPohon[0]->id_nama_jalan == $value->id_nama_jalan) {
        $rawDataPohon[0]->nama_jalan = $value->nama_jalan;
        break;
      }
    }
    $dataPohon = array('result'=>$rawDataPohon);
    if(isset($_SESSION['tingkat_user'])){
      switch ($_SESSION['tingkat_user']) {
        case 'administrator':
          $this->template->load('template/admin','info_grafis/detail',$dataPohon);
          break;
        case 'surveyor':
          $this->template->load('template/surveyor','info_grafis/detail',$dataPohon);
          break;
        default:
        $this->template->load('template/general','info_grafis/detail',$dataPohon);
        break;
      }
    }else{
      $this->template->load('template/general','info_grafis/detail',$dataPohon);
    }
    $this->benchmark->mark('end');
  }
}
