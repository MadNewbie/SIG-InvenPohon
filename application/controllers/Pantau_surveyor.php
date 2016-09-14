<?php
/**
 *
 */
class Pantau_surveyor extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Kondisi_fisik_model');
  }

  public function index()
  {
    $this->benchmark->mark('start');
    $this->db->join('pohon', 'pohon.id_pohon = kondisi_fisik.id_pohon');
    $this->db->join('nama_jalan', 'nama_jalan.id_nama_jalan = pohon.id_nama_jalan');
    $this->db->join('jenis_pohon', 'jenis_pohon.id_jenis_pohon = pohon.id_jenis_pohon');
    $this->db->select('kondisi_fisik.*, jenis_pohon.nama_lokal, jenis_pohon.nama_ilmiah, nama_jalan.nama_jalan');
    $query = $this->db->get('kondisi_fisik');
    $data = $query->result_object();
    $this->db->select('id_user,nama_lengkap');
    $query = $this->db->get('user');
    $user = $query->result_object();
    $result = array('data' => $data,'user'=>$user);
    $this->template->load('template/admin','pantau/index',$result);
    $this->benchmark->mark('end');
  }

  public function getByIdUser()
  {
    $dataUser = (object) $this->input->post();
    $this->db->where('kondisi_fisik.id_user = ',$dataUser->idUser);
    $this->db->join('pohon', 'pohon.id_pohon = kondisi_fisik.id_pohon');
    $this->db->join('nama_jalan', 'nama_jalan.id_nama_jalan = pohon.id_nama_jalan');
    $this->db->join('jenis_pohon', 'jenis_pohon.id_jenis_pohon = pohon.id_jenis_pohon');
    $this->db->select('kondisi_fisik.*, jenis_pohon.nama_lokal, jenis_pohon.nama_ilmiah, nama_jalan.nama_jalan');
    $query = $this->db->get('kondisi_fisik');
    $data = $query->result_object();
    $config = array('base_url' => '', 'total_rows' => count($data), 'per_page' => 10, 'uri_segment'=>3);
    $this->pagination->initialize($config);
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
    $this->db->where('kondisi_fisik.id_user = ',$dataUser->idUser);
    $this->db->join('pohon', 'pohon.id_pohon = kondisi_fisik.id_pohon');
    $this->db->join('nama_jalan', 'nama_jalan.id_nama_jalan = pohon.id_nama_jalan');
    $this->db->join('jenis_pohon', 'jenis_pohon.id_jenis_pohon = pohon.id_jenis_pohon');
    $this->db->limit($config['per_page'], $page);
    $this->db->select('kondisi_fisik.*, jenis_pohon.nama_lokal, jenis_pohon.nama_ilmiah, nama_jalan.nama_jalan');
    $query = $this->db->get('kondisi_fisik');
    $data = $query->result_object();
    $link = $this->pagination->create_links();
    $result['data'] = $data;
    $result['link'] = $link;
    $result = (object) $result;
    echo json_encode($result);
  }
}
