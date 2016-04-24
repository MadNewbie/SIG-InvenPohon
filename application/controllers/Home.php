<?php
/**
 *
 */
class Home extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    # controller main menu cek session
    if (isset($_SESSION['tingkat_user'])) {
      $this->template->load("template/admin","home/home");
    }else{
      $this->template->load("template/general","home/home");
    }
  }
}
