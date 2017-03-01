<?php

class Account_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function action_login($params = array())
  {
    $username = strtolower(trim($params['username']));
    $password = $params['password'];

    if(empty($username))
    return $this->daftkung->convResponse("กรุณาป้อน ชื่อเข้าใช้งาน ด้วยค่ะ");

    $account = $this->db->query("SELECT * FROM `accounts` WHERE `accounts`.`account_username` = {$this->db->escape($username)} OR `accounts`.`account_email` = {$this->db->escape($username)}");
    if($account->num_rows() == 0)
    return $this->daftkung->convResponse("ไม่พบชื่อเข้าใช้งานหรืออีเมล์นี้ในระบบค่ะ");

    if(empty($password))
    return $this->daftkung->convResponse("กรุณาป้อน รหัสผ่าน ด้วยค่ะ");

    if($this->daftkung->decrypt($account->row(0)->account_password) != $password)
    return $this->daftkung->convResponse("รหัสผ่านไม่ถูกต้องค่ะ");

    // UPDATE LAST LOGIN
    $this->db->update('accounts',array('account_lastlogin' => DATE_TIME));

    // SET SESSION LOGIN
    $this->session->set_userdata('bi_aid',$account->row(0)->account_id);
    // setcookie('butour_aid', $account->row(0)->account_id, time() + (86400 * 30), "/");

    return $this->daftkung->convResponse("เข้าสู่ระบบสำเร็จค่ะ",TRUE);
  }


}
