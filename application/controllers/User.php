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
    $data = $this->User_model->getAll();
    $insert = array('user' => $data );
    $this->load->view('user/index',$insert);
  }
}
