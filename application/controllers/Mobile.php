<?php
/**
 *
 */
class Mobile extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->model('Jenis_pohon_model');
    $this->load->model('Nama_jalan_model');
    $this->load->model('Pohon_model');
    $this->load->model('Kondisi_fisik_model');
  }

  public function login()
  {
    #login via smartphone
    $data = (object)$this->input->post();
    $data->password = sha1($data->password);
    if($this->User_model->login($data)==NULL){
      $data = array('error_msg' => "Username belum terdaftar atau password salah");
      $data = (object) $data;
      echo json_encode($data);
    }else{
      $user = $this->User_model->login($data);
      $user->error_msg = "";
      echo json_encode($user);
    }
  }

  public function load()
  {
    # loading data nama jalan dan jenis pohon
    $jenis_pohon = $this->Jenis_pohon_model->getAll();
    $jalan = $this->Nama_jalan_model->getAll();
    $data = array('jalan' => $jalan, 'jenis_pohon' => $jenis_pohon );
    echo json_encode($data);
  }

  public function upload_photo()
  {
    file_put_contents("lalala",json_encode($_FILES));

    # upload foto pohon
    $config = array('upload_path' => 'assets/uploads/pohon/', 'allowed_types'=>'jpg|jpeg', 'remove_spaces'=>'TRUE','overwrite'=>'TRUE');
    $this->load->library('upload',$config);
    if (!$this->upload->do_upload('foto_pohon')) {
      echo "Gagal upload";
      // file_put_contents("lalala","Gagal Upload", FILE_APPEND);
      // file_put_contents("lalala",json_encode($this->upload->display_errors()), FILE_APPEND);
      // $data->image = $this->upload->data('file_name');
    } else {
      $data_upload = $this->upload->data();
      $data = (object)[
        'foto_fisik'=>$data_upload['file_name']
      ];
      // $this->db->limit(1);
      // $this->db->order_by('id_pohon','DESC');
      // $this->db->select('id_pohon');
      // $query=$this->db->get('pohon');
      // $lastid=$query->row(0);
      $data->id_pohon = $data_upload['raw_name'];
      $this->Pohon_model->updateById($data);
      file_put_contents("data_upload",json_encode($data_upload));
      echo json_encode($data_upload);
      // file_put_contents("lalala","Berhasil  Upload", FILE_APPEND,json_encode($data_upload));
      // $data->image = $this->upload->data('file_name');
      // $data->status = 'Nonaktif';
      // $data->tanggal_gabung = date("Ymd");
    }
  }

  public function input_data()
  {
    # input data
    $ab=0;
    $cd=0;
    $m=0;
    $raw_data = (object)$this->input->post();
    $nama_jalan = $this->Nama_jalan_model->getByNama($raw_data->nama_jalan);
    $jenis_pohon = $this->Jenis_pohon_model->getByNamaIlmiah($raw_data->jenis_pohon);
    $data = (object)[
      'id_user'=>intval($raw_data->id_user),
      'tinggi'=>floatval($raw_data->tinggi),
      'id_nama_jalan'=>intval($nama_jalan->id_nama_jalan),
      'id_jenis_pohon'=>intval($jenis_pohon->id_jenis_pohon),
      'diameter_batang'=>floatval($raw_data->diameter_batang),
      'lebar_tajuk'=>floatval($raw_data->lebar_tajuk),
      'bentuk_tajuk'=>$raw_data->bentuk_tajuk,
      'latitude'=>floatval($raw_data->latitude),
      'longitude'=>floatval($raw_data->longitude),
    ];
    if ($raw_data->ab_1 == "true") {
      $data->ab_1=1;
      $ab+=0;
    }else{
      $data->ab_1=0;
    }
    if ($raw_data->ab_2 == "true") {
      $data->ab_2=1;
      $ab+=1;
    }else{
      $data->ab_2=0;
    }
    if ($raw_data->ab_3 == "true") {
      $data->ab_3=1;
      $ab+=2;
    }else{
      $data->ab_3=0;
    }
    if ($raw_data->ab_4 == "true") {
      $data->ab_4=1;
      $ab+=3;
    }else{
      $data->ab_4=0;
    }
    if ($raw_data->ab_5 == "true") {
      $data->ab_5=1;
      $ab+=4;
    }else{
      $data->ab_5=0;
    }
    if ($raw_data->ab_6 == "true") {
      $data->ab_6=1;
      $ab+=5;
    }else{
      $data->ab_6=0;
    }
    // $data->ab_tot=$ab;
    if ($raw_data->cd_1 == "true") {
      $data->cd_1=1;
      $cd+=0;
    }else{
      $data->cd_1=0;
    }
    if ($raw_data->cd_2 == "true") {
      $data->cd_2=1;
      $cd+=1;
    }else{
      $data->cd_2=0;
    }
    if ($raw_data->cd_3 == "true") {
      $data->cd_3=1;
      $cd+=2;
    }else{
      $data->cd_3=0;
    }
    if ($raw_data->cd_4 == "true") {
      $data->cd_4=1;
      $cd+=3;
    }else{
      $data->cd_4=0;
    }
    if ($raw_data->cd_5 == "true") {
      $data->cd_5=1;
      $cd+=4;
    }else{
      $data->cd_5=0;
    }
    if ($raw_data->cd_6 == "true") {
      $data->cd_6=1;
      $cd+=5;
    }else{
      $data->cd_6=0;
    }
    // $data->cd_tot=$cd;
    if ($raw_data->m_1 == "true") {
      $data->m_1=1;
      $ab+=0;
    }else{
      $data->m_1=0;
    }
    if ($raw_data->m_2 == "true") {
      $data->m_2=1;
      $m+=1;
    }else{
      $data->m_2=0;
    }
    if ($raw_data->m_3 == "true") {
      $data->m_3=1;
      $ab+=2;
    }else{
      $data->m_3=0;
    }
    if ($raw_data->m_4 == "true") {
      $data->m_4=1;
      $m+=3;
    }else{
      $data->m_4=0;
    }
    if ($raw_data->m_5 == "true") {
      $data->m_5=1;
      $m+=4;
    }else{
      $data->m_5=0;
    }
    if ($raw_data->m_6 == "true") {
      $data->m_6=1;
      $m+=5;
    }else{
      $data->m_6=0;
    }
    // $data->m_tot=$m;
    $per_ab=($ab/15)*100;
    $per_cd=($cd/15)*100;
    $per_m=($m/15)*100;
    $per_kerusakan_alami=($per_ab+$per_cd)/2;
    $per_kerusakan_total=($per_kerusakan_alami+$per_m)/2;
    // $data->per_ab = $per_ab;
    // $data->per_cd = $per_cd;
    // $data->per_m = $per_m;
    // $data->per_kerusakan_alami = $per_kerusakan_alami;
    $data->total_kerusakan = $per_kerusakan_total;
    $data->validasi = 0;
    $data->tanggal = date('Ymd');
    // file_put_contents("data",json_encode($raw_data));
    // file_put_contents("data olahan",json_encode($data));
    $this->Pohon_model->insert($data);
    unset($data->id_nama_jalan,$data->id_jenis_pohon,$data->longitude,$data->latitude,$data->foto_pohon,$data->validasi);
    $this->Kondisi_fisik_model->insert($data);
    // die();
    $this->db->limit(1);
    $this->db->order_by('id_pohon','DESC');
    $this->db->select('id_pohon');
    $query=$this->db->get('pohon');
    $lastid=$query->row(0);
    $result = array('id' => $lastid->id_pohon);
    echo json_encode($result);
  }

  public function edit_data()
  {
    # mengubah data pohon
    $ab=0;
    $cd=0;
    $m=0;
    $raw_data = (object) $this->input->post();
    $nama_jalan = $this->Nama_jalan_model->getByNama($raw_data->nama_jalan);
    $jenis_pohon = $this->Jenis_pohon_model->getByNamaIlmiah($raw_data->jenis_pohon);
    $data = (object)[
      'id_pohon'=>intval($raw_data->id_pohon),
      'id_user'=>intval($raw_data->id_user),
      'tinggi'=>floatval($raw_data->tinggi),
      'id_nama_jalan'=>intval($nama_jalan->id_nama_jalan),
      'id_jenis_pohon'=>intval($jenis_pohon->id_jenis_pohon),
      'diameter_batang'=>floatval($raw_data->diameter_batang),
      'lebar_tajuk'=>floatval($raw_data->lebar_tajuk),
      'bentuk_tajuk'=>$raw_data->bentuk_tajuk,
    ];
    if ($raw_data->ab_1 == "true") {
      $data->ab_1=1;
      $ab+=0;
    }else{
      $data->ab_1=0;
    }
    if ($raw_data->ab_2 == "true") {
      $data->ab_2=1;
      $ab+=1;
    }else{
      $data->ab_2=0;
    }
    if ($raw_data->ab_3 == "true") {
      $data->ab_3=1;
      $ab+=2;
    }else{
      $data->ab_3=0;
    }
    if ($raw_data->ab_4 == "true") {
      $data->ab_4=1;
      $ab+=3;
    }else{
      $data->ab_4=0;
    }
    if ($raw_data->ab_5 == "true") {
      $data->ab_5=1;
      $ab+=4;
    }else{
      $data->ab_5=0;
    }
    if ($raw_data->ab_6 == "true") {
      $data->ab_6=1;
      $ab+=5;
    }else{
      $data->ab_6=0;
    }
    // $data->ab_tot=$ab;
    if ($raw_data->cd_1 == "true") {
      $data->cd_1=1;
      $cd+=0;
    }else{
      $data->cd_1=0;
    }
    if ($raw_data->cd_2 == "true") {
      $data->cd_2=1;
      $cd+=1;
    }else{
      $data->cd_2=0;
    }
    if ($raw_data->cd_3 == "true") {
      $data->cd_3=1;
      $cd+=2;
    }else{
      $data->cd_3=0;
    }
    if ($raw_data->cd_4 == "true") {
      $data->cd_4=1;
      $cd+=3;
    }else{
      $data->cd_4=0;
    }
    if ($raw_data->cd_5 == "true") {
      $data->cd_5=1;
      $cd+=4;
    }else{
      $data->cd_5=0;
    }
    if ($raw_data->cd_6 == "true") {
      $data->cd_6=1;
      $cd+=5;
    }else{
      $data->cd_6=0;
    }
    // $data->cd_tot=$cd;
    if ($raw_data->m_1 == "true") {
      $data->m_1=1;
      $ab+=0;
    }else{
      $data->m_1=0;
    }
    if ($raw_data->m_2 == "true") {
      $data->m_2=1;
      $m+=1;
    }else{
      $data->m_2=0;
    }
    if ($raw_data->m_3 == "true") {
      $data->m_3=1;
      $ab+=2;
    }else{
      $data->m_3=0;
    }
    if ($raw_data->m_4 == "true") {
      $data->m_4=1;
      $m+=3;
    }else{
      $data->m_4=0;
    }
    if ($raw_data->m_5 == "true") {
      $data->m_5=1;
      $m+=4;
    }else{
      $data->m_5=0;
    }
    if ($raw_data->m_6 == "true") {
      $data->m_6=1;
      $m+=5;
    }else{
      $data->m_6=0;
    }
    // $data->m_tot=$m;
    $per_ab=($ab/15)*100;
    $per_cd=($cd/15)*100;
    $per_m=($m/15)*100;
    $per_kerusakan_alami=($per_ab+$per_cd)/2;
    $per_kerusakan_total=($per_kerusakan_alami+$per_m)/2;
    // $data->per_ab = $per_ab;
    // $data->per_cd = $per_cd;
    // $data->per_m = $per_m;
    // $data->per_kerusakan_alami = $per_kerusakan_alami;
    $data->total_kerusakan = $per_kerusakan_total;
    $data->validasi = 0;
    $data->tanggal = date('Ymd');
    // file_put_contents("data",json_encode($raw_data));
    // file_put_contents("data olahan",json_encode($data));
    file_put_contents("update",json_encode($data));
    $this->Pohon_model->updateById($data);
    unset($data->id_nama_jalan,$data->id_jenis_pohon,$data->longitude,$data->latitude,$data->foto_pohon,$data->validasi);
    $this->Kondisi_fisik_model->insert($data);
  }

  public function getDataByPosition()
  {
    # mengambil data pohon sesuai dengan posisi
    $raw_data = (object)$this->input->post();
    $data = (object)[
      'latitude'=>$raw_data->latitude,
      'longitude'=>$raw_data->longitude,
    ];
    $data_pohon = $this->Pohon_model->getByPosition($data);
    file_put_contents("data pohon query",json_encode($data_pohon));
    echo json_encode($data_pohon);
  }

  public function change_password()
  {
    # mengubah password user
    $raw_data = (object)$this->input->post();
    $data = (object)[
      'id_user'=>$raw_data->id_user,
      'password'=>sha1($raw_data->pass_baru)
    ];
    // file_put_contents("data password",json_encode($data));
    $data_lama = $this->User_model->retrieve($raw_data->id_user);
    // file_put_contents("data user",json_encode($data_lama));
    $pass_lama = sha1($raw_data->pass_lama);
    if($pass_lama!=$data_lama[0]->password){
      $result = (object)[
        'error_message'=>'password lama yang anda masukkan salah'
      ];
    }else{
      $this->User_model->update($data);
      $result = (object)[
        'error_message'=>''
      ];
    };
    echo json_encode($result);
  }

  public function test()
  {
    $this->db->limit(1);
    $this->db->order_by('id_pohon','DESC');
    $this->db->select('id_pohon');
    $query=$this->db->get('pohon');
    $lastid=$query->row(0);
    $result = array('id' => $lastid->id_pohon);
  }
}
