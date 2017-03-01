<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CTRL_ADM
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('register_model','register');
  }

  public function index()
  {
    $this->daftkung->addConfig('js',array('assets/js/adm/contact.js'));
    $this->template->title("ข้อมูลการติดต่อ")->build('contact/index');
  }

  public function page($page = 1)
  {
    $page = (($page - 1) < 0 ? 0 : ($page-1));
    $sql = "SELECT * FROM `register` LEFT OUTER JOIN `courses` ON `courses`.`courses_id` = `register`.`reg_courses` ORDER BY `register`.`reg_create` DESC";
    $total = $this->db->query($sql)->num_rows();
    $config['total_rows'] = $total;
    $config['per_page'] = 25;
    $config['uri_segment'] = 4;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $page = ($config['per_page']*$page);
    $data['num_order'] = ($page+1);
    $data['contacts'] = $this->db->query($sql." LIMIT {$page},{$config['per_page']}");

    $output['html'] = $this->load->view('contact/page',$data,TRUE);
    $output['total'] = $total;
    echo json_encode($output);
  }

  public function action_delete()
  {
    echo $this->register->action_delete($this->input->post());
  }
}
