<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CTRL_ADM
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('account_model','m_account');
  }

  public function index()
  {
    $this->daftkung->addConfig('js',array('assets/js/adm/auth/login.js'));
    $this->template->title("Login")->set_layout('login')->build("auth/login");
  }

  public function action_login()
  {
    echo $this->m_account->action_login($this->input->post());
  }

}
