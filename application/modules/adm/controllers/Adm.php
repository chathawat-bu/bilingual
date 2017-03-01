<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CTRL_ADM
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    redirect('./adm/contact');
  }

  public function logout()
  {
    $this->session->set_userdata('bi_aid',NULL);
  }

  public function profile()
  {
    $this->daftkung->addConfig('js',array('assets/js/adm/profile.js'));
    $this->template->title("Profile")->build('profile/index');
  }

  public function get_account()
  {
     echo json_encode(array(
       'username' => $this->account_data->account_username,
       'image' => "./uploads/accounts/768/{$this->account_data->account_image}",
       'fname' => $this->account_data->account_fname,
       'lname' => $this->account_data->account_lname,
       'email' => $this->account_data->account_email,
       'level' => $this->account_data->level_id,
       'lastlogin' => $this->daftkung->convDate($this->account_data->account_lastlogin)
     ));
  }

}
