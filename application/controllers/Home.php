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
    $this->benchmark->mark('start');
    # controller main menu cek session
    if(isset($_SESSION['tingkat_user'])){
      switch ($_SESSION['tingkat_user']) {
        case 'administrator':
          $this->template->load('template/admin','home/home');
          break;
        case 'surveyor':
          $this->template->load('template/surveyor','home/home');
          break;
        default:
        $this->template->load('template/general','home/home');
        break;
      }
    }else{
      $this->template->load('template/general','home/home');
    }
    $this->benchmark->mark('end');
  }
}
