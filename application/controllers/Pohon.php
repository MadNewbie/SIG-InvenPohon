<?php
/**
 *
 */
class Pohon extends CI_Controller
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
    # halaman utama menu pohon
    $config = array('base_url' => base_url()."pohon/index", 'total_rows'=>count($this->Pohon_model->getAll()),'per_page'=>8,'uri_segment'=>3,'num_tag_close'=>' ','num_tag_open'=>' ','num_tag_full'=>' ');;
    $this->pagination->initialize($config);
    $page=($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
    $data['result'] =  $this->Pohon_model->fetch_pohon($config['per_page'], $page);
    $data['links'] = $this->pagination->create_links();
    $data['jenis_pohon'] = $this->Jenis_pohon_model->getAll();
    $data['nama_jalan'] = $this->Nama_jalan_model->getAll();
    $this->template->load('template/surveyor','pohon/index',$data);
  }

  public function insert()
  {
    # memasukkan data fisik pohon baru
    if ($_POST) {
      # Jika tombol submit ditekan mengambil data dari form
      $kerusakan_ab = 0;
      $kerusakan_cd = 0;
      $kerusakan_m = 0;
      $data = $_POST['data'];
      $data = (object) $data;
      foreach ($data->ab as $key => $value) {
        # memasukkan data kerusakan
        switch ($value) {
          case 'ab_1':
            $kerusakan_ab+=0;
            break;
          case 'ab_2':
            $kerusakan_ab+=1;
            break;
          case 'ab_3':
            $kerusakan_ab+=2;
            break;
          case 'ab_4':
            $kerusakan_ab+=3;
            break;
          case 'ab_5':
            $kerusakan_ab+=4;
            break;
          case 'ab_6':
            $kerusakan_ab+=5;
            break;
          default:
            $kerusakan_ab+=0;
            break;
        }
        $data->$value = 1;
      }
      foreach ($data->cd as $key => $value) {
        # memasukkan data kerusakan
        switch ($value) {
          case 'cd_1':
            $kerusakan_cd+=0;
            break;
          case 'cd_2':
            $kerusakan_cd+=1;
            break;
          case 'cd_3':
            $kerusakan_cd+=2;
            break;
          case 'cd_4':
            $kerusakan_cd+=3;
            break;
          case 'cd_5':
            $kerusakan_cd+=4;
            break;
          case 'cd_6':
            $kerusakan_cd+=5;
            break;
          default:
            $kerusakan_cd+=0;
            break;
        }
        $data->$value = 1;
      }
      $per_kerusakan_penyakit = ((($kerusakan_ab/15)*100)+(($kerusakan_cd/15)*100))/2;
      foreach ($data->m as $key => $value) {
        # memasukkan data kerusakan
        switch ($value) {
          case 'm_1':
            $kerusakan_m+=0;
            break;
          case 'm_2':
            $kerusakan_m+=1;
            break;
          case 'm_3':
            $kerusakan_m+=2;
            break;
          case 'm_4':
            $kerusakan_m+=3;
            break;
          case 'm_5':
            $kerusakan_m+=4;
            break;
          case 'm_6':
            $kerusakan_m+=5;
            break;
          default:
            $kerusakan_m+=0;
            break;
        }
        $data->$value = 1;
      }
      $per_kerusakan_total = (($kerusakan_m/15)*100+$per_kerusakan_penyakit)/2;
      $data->total_kerusakan = $per_kerusakan_total;
      $data->tanggal = date('Ymd');
      $data->id_user = $_SESSION['id_user'];
      // unset($data->ab,$data->cd,$data->m);
      // var_dump($data);
      // die();
      $data->validasi = 0;
      $this->Pohon_model->insert($data);
      redirect('pohon');
    }else{
      $data = array('nama_jalan' => $this->Nama_jalan_model->getAll(), 'jenis_pohon' => $this->Jenis_pohon_model->getAll());
      $this->template->load('template/surveyor','pohon/insert',$data);
    }
  }
}
