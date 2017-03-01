<?php

class Register_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function action_register($input = array())
  {
    $email = strtolower(trim($input['email']));
    $name = trim($input['name']);
    $mobile = trim($input['mobile']);
    $courses = $input['courses'];

    if(empty($name))
    return $this->daftkung->convResponse("กรุณาป้อน ชื่อ - สกุล ด้วยค่ะ");

    if(empty($mobile))
    return $this->daftkung->convResponse("กรุณาป้อน เบอร์โทรศัพท์ ด้วยค่ะ");

    if(empty($email))
    return $this->daftkung->convResponse("กรุณาป้อน อีเมล ด้วยค่ะ");

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    return $this->daftkung->convResponse("รูปแบบอีเมลไม่ถูกต้องค่ะ");

    $_check_email = $this->db->query("SELECT * FROM `register` WHERE LOWER(TRIM(`register`.`reg_email`)) = {$this->db->escape($email)}");

    if($_check_email->num_rows() > 0)
    return $this->daftkung->convResponse("ไม่สามารถใช้อีเมล์ {$email} นี้ได้,​ เนื่องจากถูกใช้งานแล้วค่ะ");

    if(empty($courses))
    return $this->daftkung->convResponse("กรุณาระบุ คณะ ด้วยค่ะ");

    $this->db->insert('register',array(
      'reg_fullname' => $name,
      'reg_mobile' => $mobile,
      'reg_email' => $email,
      'reg_courses' => $courses,
      'reg_ipaddress' => $_SERVER['REMOTE_ADDR'],
      'reg_create' => DATE_TIME
    ));

    return $this->daftkung->convResponse("การลงทะเบียนเสร็จสมบูรณ์ ขอบคุณค่ะ",TRUE);
  }

  public function action_delete($input = array())
  {
    $this->db->where("reg_id",$input['id'])->delete('register');
    return $this->daftkung->convResponse(TRUE);
  }
}
