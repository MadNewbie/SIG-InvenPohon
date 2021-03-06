<?php
/**
 *
 */
class User extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function index()
  {
    # main menu kelola user
    # mengatur pagination
    $config = array('base_url' => base_url()."user/index", 'total_rows' => count($this->User_model->getAll()), 'per_page' => 8, 'uri_segment'=>3,'num_tag_close'=>' ','num_tag_open'=>' ','num_full_tag_close'=>' ');
    # menginisialisasi pagination
    $this->pagination->initialize($config);
    #cek uri
    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0 ;
    #ambil data
    $data['result'] =  $this->User_model->fetch_user($config['per_page'], $page);
    #membuat link
    $data['links'] = $this->pagination->create_links();
    $this->template->load('template/admin','user/index',$data);
  }

  public function insert()
  {
    # menambahkan user
    if ($_POST) {
      # jika tombol submit ditekan mengambil data dari tabel
      $data = $_POST['data'];
      #mengubah tipe data yang baru diambil menjadi objek
      $data = (object)$data;
      unset($data->id_user);
      #memasukkan password default yaitu tanggal lahir
      $data->password = sha1($data->tanggal_lahir);
      #menjadikan user baru menjadi surveyor
      $data->tingkat_user = "surveyor";
      #memasukkan data user baru ke dalam basis data
      $this->User_model->insert($data);
    }else{
      redirect('user');
    }
    redirect('user');
  }

  public function password()
  {
    # mengubah password
    if ($_POST) {
      # mengubah password
      $data = $_POST['data'];
      $data = (object)$data;
      #cek validasi password
      if ($data->password_baru == $data->verifikasi_password) {
        $data = array('id_user' => $_SESSION['id_user'],'password' => $data->password_baru );
        $this->User_model->update($data);
      }else{
        $this->load->view('user/password');
      }
    }else{
      $this->load->view('user/password');
    }
  }

  public function retrieve($id_user)
  {
    # mengambil data user berdasarkan id_user
    $data = $this->User_model->retrieve($id_user);
    echo json_encode($data);
  }

  public function edit()
  {
    # mengubah user
    if ($_POST) {
      # jika tombol submit ditekan mengambil data dari tabel
      $data = $_POST['data'];
      #mengubah tipe data yang baru diambil menjadi objek
      $data = (object)$data;
      #mengubah data user ke dalam basis data
      $this->User_model->update($data);
    }else{
      redirect('user');
    }
    redirect('user');
  }
}
