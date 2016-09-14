<?php
/**
 *
 */
class Tentang_kami extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->template->load("template/general",'tentang_kami/home');
  }
}
