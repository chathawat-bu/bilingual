<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CTRL_HOME
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('register_model','reg');
  }

  public function index()
  {
    $this->daftkung->addConfig('css',array(
      'themes/home/assets/css/style.css'
    ));
    $this->daftkung->addConfig('js',array(
      'vendors/backstretch/jquery.backstretch.min.js',
      'themes/home/assets/js/home.js'
    ));

    $this->template->title('Bilingual Program')->build('index');
  }

  public function get_courses()
  {
    $json = array();
    $courses = $this->db->query("SELECT * FROM `courses` ORDER BY `courses`.`courses_id` ASC");
    foreach ($courses->result() as $key => $value) {
      array_push($json,array(
        'id' => $value->courses_id,
        'name' => $value->courses_name,
        'name_en' => $value->courses_name_en,
      ));
    }
    echo json_encode($json);
  }

  public function action_register()
  {
    echo $this->reg->action_register($this->input->post());
  }

  public function faculty($name = '')
  {
    $file_name = "./json/{$name}.json";
    if(!file_exists($file_name)){
      redirect('./');
    }

    $data['data'] =  json_decode(file_get_contents($file_name));
    $data['faculty'] = json_decode(file_get_contents("./json/faculty.json"));
    $data['gallery'] = get_filenames("./uploads/gallery/tmp");

    $this->daftkung->addConfig('css',array(
      'vendors/inspinia-admin/css/plugins/blueimp/css/blueimp-gallery.min.css',
      'themes/home/assets/css/faculty.css'
    ));
    $this->daftkung->addConfig('js',array(
      'vendors/inspinia-admin/js/plugins/blueimp/jquery.blueimp-gallery.min.js',
      'vendors/backstretch/jquery.backstretch.min.js',
      'themes/home/assets/js/faculty.js'
    ));

    $this->template->title($data['data']->title)->build('faculty',$data);
  }

}
