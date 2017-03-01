<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CTRL_ADM extends CI_Controller
{

  public $session_account, $segment, $account_data;

  public function __construct()
  {
    parent::__construct();
    $this->_gentsegment();
    $this->_authentication();
    $this->_loadthemes();
  }

  public function _gentsegment()
  {
    $this->segment = array(
      1 => $this->uri->segment(1), 2 => $this->uri->segment(2),
      3 => $this->uri->segment(3), 4 => $this->uri->segment(4),
      5 => $this->uri->segment(5), 6 => $this->uri->segment(6)
    );
  }

  private function _authentication()
  {
    $session_account = $this->session->userdata('bi_aid');

    if(empty($session_account) && ($this->segment[2] != 'auth' && !in_array($this->segment[3],array('login')))){
      redirect("adm/auth/login", "refresh", 301);
    }
    else if(!empty($session_account) && ($this->segment[2] == 'auth' && in_array($this->segment[3],array('login')))){
      redirect("adm", "refresh", 301);
    }
    else if(!empty($session_account)){
      $this->account_data = $this->db->query("SELECT * FROM `accounts` WHERE `accounts`.`account_id` = {$session_account}")->row(0);
    }

  }

  private function _loadthemes()
  {
    $this->daftkung->addConfig('css',array('vendors/inspinia-admin/css/animate.css', 'vendors/inspinia-admin/css/style.css','assets/css/adm/style.css'));
    $this->daftkung->addConfig('js',array("assets/js/adm/app.js"));
    $this->template->set_theme('adm')->set_layout('index');

  }

}
