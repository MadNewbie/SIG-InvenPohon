<?php
/**
 *
 */
class Auth extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function login()
  {
    if ($_POST) {
      $data = $_POST['data'];
      $data = (object) $data;
      $data->password = sha1($data->password);
      if ($this->User_model->login($data)==NULL) {
        #jika username dan password tidak ditemukan akan menampilkan notifikasi
        $this->session->set_flashdata('notif','Username belum terdaftar');
        redirect('Login');
      }else{
        #mengambil data user
        $user = $this->User_model->login($data);
        #menghapus session sebelumnya
        unset($_SESSION['__ci_last_regenerate']);
        #mengubah object menjadi array
        $user = get_object_vars($user);
        #mengatur data pada session
        $this->session->set_userdata($user);
        $this->load->view('home/home');
      }
    }else{
      $this->load->view('login/login');
    }
  }
}
