<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftkung
{ 
  public $config;
  private $secretkey = "##daftlovejedi##";

  public function __construct()
  {
    $this->config = json_decode(file_get_contents('config.json'));
  }

  public function encrypt($value) {
    return rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->secretkey, $value, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))), "\0");
  }

  public function decrypt($value) {
    return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->secretkey, base64_decode($value), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)), "\0");
  }

  public function imageToBase64($path = '')
  {
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
  }

  public function addConfig($type = NULL, $params = array())
  {
    if($type !== NULL){
      if(strtoupper($type) === "CSS"){
        foreach ($params as $key => $value):
          array_push($this->config->css,$value);
        endforeach;
      } else if(strtoupper($type) === "JS"){
        foreach ($params as $key => $value):
          array_push($this->config->javascript,$value);
        endforeach;
      }
    }
  }

  public function getRealIpAddr()
  {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    return $_SERVER['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
    else
    return $_SERVER['REMOTE_ADDR'];
  }

  public function convResponse($message = NULL, $status = FALSE, $data = array())
  {
    if(is_bool($message)){
      return json_encode(array('status' => $message, 'message' => NULL, 'data' => $data));
    } else{
      return json_encode(array('status' => $status, 'message' => $message, 'data' => $data));
    }
  }

  public function convDate($date = "", $lang = "th", $option = "full", $time = TRUE) {
    $output = "";
    $month = array(
      'th' => array(
        'init' => array('ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'),
        'full' => array('มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'),
      ),
      'en' => array(
        'init' => array('Jan', 'Fab', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
        'full' => array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
      )
    );

    $date = explode(' ', empty($date) ? date('Y-m-d H:i:s') : $date);
    $d = explode('-', $date[0]);
    if (count($date) > 1):
      $t = explode(':', $date[1]);
    endif;
    $year = ($lang == 'th' ? $d[0] + 543 : $d[0]);
    $output = (int)$d[2] . ' ' . $month[$lang][$option][(int) $d[1]-1] . ' ' . ($option == "full" || $lang == 'en' ? $year : substr($year, 2));
    if ($time == TRUE && !empty($t)):
      $output .= ', ' . ($option == 'full' ? $t[0] . ':' . $t[1] . ':' . $t[2] : $t[0] . ':' . $t[1]) . ($lang == 'th' ? ' น.' : NULL);
    endif;
    return $output;
  }

  public function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
    $ipaddress = 'UNKNOWN';
    return $ipaddress;
  }

}
