<?php
/**
 *
 */
class Bantuan extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->benchmark->mark('start');
    # controller main menu cek session
    if(isset($_SESSION['tingkat_user'])){
      switch ($_SESSION['tingkat_user']) {
        case 'administrator':
          $this->template->load('template/admin','bantuan/admin');
          break;
        case 'surveyor':
          $this->template->load('template/surveyor','bantuan/general');
          break;
        default:
        $this->template->load('template/general','bantuan/general');
        break;
      }
    }else{
      $this->template->load('template/general','bantuan/general');
    }
    $this->benchmark->mark('end');
  }
}
