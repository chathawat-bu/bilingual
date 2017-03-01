<?php
/**
 *
 */
class Test extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    echo DATE_TIME;
    echo session_id();
    // $ss_account = $_COOKIE['ss_account'];
    // echo $ss_account;
  }

}
