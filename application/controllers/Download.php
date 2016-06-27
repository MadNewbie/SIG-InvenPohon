<?php
/**
 *
 */
class Download extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Pohon_model");
    $this->load->model("Jenis_pohon_model");
    $this->load->model("Nama_jalan_model");
  }

  public function generate_gis_location($id_nama_jalan)
  {
    # mengambil data pohon untuk gis
    $dataJalan = $this->Nama_jalan_model->getAll();
    $dataJenis = $this->Jenis_pohon_model->getAll();
    $data = $this->Pohon_model->getByLocation($id_nama_jalan);
    foreach ($data as $a => $b) {
      foreach ($dataJalan as $key => $value) {
        if($b->id_nama_jalan==$value->id_nama_jalan){
          $b->nama_jalan = $value->nama_jalan;
          break;
        }
      }
      foreach ($dataJenis as $key => $value) {
        if($b->id_jenis_pohon==$value->id_jenis_pohon){
          $b->nama_lokal = $value->nama_lokal;
          $b->nama_ilmiah = $value->nama_ilmiah;
          break;
        }
      }
    }
    $result = array('data' => $data);
    $this->load->view('info_grafis/report',$result);
  }

  public function generate_gis_jenis($id_jenis_pohon)
  {
    # mengambil data pohon untuk gis
    $dataJalan = $this->Nama_jalan_model->getAll();
    $dataJenis = $this->Jenis_pohon_model->getAll();
    $data = $this->Pohon_model->getByJenis($id_jenis_pohon);
    foreach ($data as $a => $b) {
      foreach ($dataJalan as $key => $value) {
        if($b->id_nama_jalan==$value->id_nama_jalan){
          $b->nama_jalan = $value->nama_jalan;
          break;
        }
      }
      foreach ($dataJenis as $key => $value) {
        if($b->id_jenis_pohon==$value->id_jenis_pohon){
          $b->nama_lokal = $value->nama_lokal;
          $b->nama_ilmiah = $value->nama_ilmiah;
          break;
        }
      }
    }
    $result = array('data' => $data);
    $this->load->view('info_grafis/report',$result);
  }

  public function generate_data_by_periode()
  {
    $data = (object) $this->input->post("data");
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
    $result = array('data' => $query->result_object());
    $this->load->view('info_grafis/report',$result);
  }

  public function generate_data_by_surveyor()
  {
    $data = (object) $this->input->post("data");
    $this->db->where('kondisi_fisik.id_user = ',$data->id_user);
    $this->db->join('pohon', 'pohon.id_pohon = kondisi_fisik.id_pohon');
    $this->db->join('nama_jalan', 'nama_jalan.id_nama_jalan = pohon.id_nama_jalan');
    $this->db->join('jenis_pohon', 'jenis_pohon.id_jenis_pohon = pohon.id_jenis_pohon');
    $this->db->select('kondisi_fisik.*, jenis_pohon.nama_lokal, jenis_pohon.nama_ilmiah, nama_jalan.nama_jalan');
    $query = $this->db->get('kondisi_fisik');
    $data = $query->result_object();
    $result = array('data' => $data);
    $this->load->view('info_grafis/report',$result);
  }
}
