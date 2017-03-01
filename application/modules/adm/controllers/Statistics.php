<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CTRL_ADM
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->daftkung->addConfig('js',array(
      'vendors/inspinia-admin/js/plugins/datapicker/bootstrap-datepicker.js',
      'vendors/Highcharts-5.0.7/code/highcharts.js',
      'vendors/Highcharts-5.0.7/code/modules/exporting.js',
      'assets/js/adm/statistics.js'
    ));
    $this->daftkung->addConfig('css',array('vendors/inspinia-admin/css/plugins/datapicker/datepicker3.css'));
    $this->template->title("ข้อมูลสถิติ")->build('statistics/index');
  }

  public function load_st1()
  {
    $get_date = explode('-', $this->input->get('date'));
    $date = "{$get_date[1]}-{$get_date[0]}-1";
    $total_data = date("t", strtotime($date));
    $text_date = $this->daftkung->convDate($date);
    $array_text_date = explode(' ',$text_date);

    $xAxis_categories = $series = array();
    $series_data[0] = $series_data[1] = $series_data[2] = $series_data[3] = array();

    for($d = 1; $d <= $total_data; $d++):
      array_push($xAxis_categories, $d);
      $query_data = "{$get_date[1]}-{$get_date[0]}-{$d}";
      $count_session = $this->db->query("SELECT `dk_butourism_visitors`.`visitor_id` FROM `dk_butourism_visitors` WHERE DATE(`dk_butourism_visitors`.`visitor_create`) = {$this->db->escape($query_data)}")->num_rows();
      array_push($series_data[0],(int)$count_session);
    endfor;

    for($d = 1; $d <= $total_data; $d++):
      $query_data = "{$get_date[1]}-{$get_date[0]}-{$d}";
      $count_session = $this->db->query("SELECT `dk_butourism_visitor_actions`.`session_id` FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 1 AND DATE(`dk_butourism_visitor_actions`.`action_create`) = {$this->db->escape($query_data)}")->num_rows();
      array_push($series_data[1],(int)$count_session);
    endfor;

    for($d = 1; $d <= $total_data; $d++):
      $query_data = "{$get_date[1]}-{$get_date[0]}-{$d}";
      $count_session = $this->db->query("SELECT `dk_butourism_visitor_actions`.`session_id` FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 2 AND DATE(`dk_butourism_visitor_actions`.`action_create`) = {$this->db->escape($query_data)}")->num_rows();
      array_push($series_data[2],(int)$count_session);
    endfor;

    for($d = 1; $d <= $total_data; $d++):
      $query_data = "{$get_date[1]}-{$get_date[0]}-{$d}";
      $count_session = $this->db->query("SELECT `dk_butourism_visitor_actions`.`session_id` FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 3 AND DATE(`dk_butourism_visitor_actions`.`action_create`) = {$this->db->escape($query_data)}")->num_rows();
      array_push($series_data[3],(int)$count_session);
    endfor;

    $series = array(
      array(
        'name' => "จำนวนผู้เข้าชมเว็บไซต์ (".array_sum($series_data[0]).")",
        'data' => $series_data[0]
      ),
      array(
        'name' => "จำนวนผู้เข้าชมมาดูคลิปต่อ (".array_sum($series_data[1]).")",
        'data' => $series_data[1]
      ),
      array(
        'name' => "จำนวนผู้เข้ามาดูข้อมูล (".array_sum($series_data[2]).")",
        'data' => $series_data[2]
      ),
      array(
        'name' => "จำนวนการกดสมัคร (".array_sum($series_data[3]).")",
        'data' => $series_data[3]
        )
      );

      echo json_encode(array(
        'title' => "ข้อมูลสถิติการเข้าเว็บชมเว็บไซต์",
        'subtitle' => "ประจำเดือน {$array_text_date[1]} {$array_text_date[2]}",
        'xAxis' => array(
          'categories' => $xAxis_categories
        ),
        'series' => $series
      ));
    }

    public function load_st2()
    {
      $get_date = explode('-', $this->input->get('date'));
      $date = "{$get_date[1]}-{$get_date[0]}-1";
      $total_data = date("t", strtotime($date));
      $text_date = $this->daftkung->convDate($date);
      $array_text_date = explode(' ',$text_date);

      $series_data = $table_data = array();
      $subject_clip = $this->db->query("SELECT * FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 1 AND (YEAR(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[1]}' AND MONTH(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[0]}') GROUP BY `dk_butourism_visitor_actions`.`action_detail` ORDER BY `dk_butourism_visitor_actions`.`action_detail` ASC");
      foreach ($subject_clip->result() as $key => $value):
        $count_session = $this->db->query("SELECT *, COUNT(`dk_butourism_visitor_actions`.`action_id`) AS cc, SUM(`dk_butourism_visitor_actions`.`action_count`) AS sum FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 1 AND (YEAR(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[1]}' AND MONTH(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[0]}') AND `dk_butourism_visitor_actions`.`action_detail` = {$this->db->escape($value->action_detail)} ")->row(0);
        array_push($series_data, array(
          'name' => iconv_substr($value->action_detail, 0,20, "UTF-8")."...",
          'y' => (int)$count_session->cc
        ));
        array_push($table_data,array(
          'name' => $value->action_detail,
          'session' => (int)$count_session->cc,
          'click' => (int)$count_session->sum
        ));

      endforeach;

      echo json_encode(array(
        'title' => "ข้อมูลสถิติการเข้าชมวิดีโอ",
        'subtitle' => "ประจำเดือน {$array_text_date[1]} {$array_text_date[2]}",
        'series' => array(
          'data' => $series_data
        ),
        'table' => array(
          'data' => $table_data
        )
      ));
    }

    public function load_st3()
    {
      $get_date = explode('-', $this->input->get('date'));
      $date = "{$get_date[1]}-{$get_date[0]}-1";
      $total_data = date("t", strtotime($date));
      $text_date = $this->daftkung->convDate($date);
      $array_text_date = explode(' ',$text_date);

      $series_data = $table_data = array();
      $subject_clip = $this->db->query("SELECT * FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 2 AND (YEAR(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[1]}' AND MONTH(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[0]}') GROUP BY `dk_butourism_visitor_actions`.`action_detail` ORDER BY `dk_butourism_visitor_actions`.`action_detail` ASC");
      foreach ($subject_clip->result() as $key => $value):
        $count_session = $this->db->query("SELECT *, COUNT(`dk_butourism_visitor_actions`.`action_id`) AS cc, SUM(`dk_butourism_visitor_actions`.`action_count`) AS sum FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 2 AND (YEAR(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[1]}' AND MONTH(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[0]}') AND `dk_butourism_visitor_actions`.`action_detail` = {$this->db->escape($value->action_detail)} ")->row(0);
        array_push($series_data, array(
          'name' => iconv_substr($value->action_detail, 0,20, "UTF-8")."...",
          'y' => (int)$count_session->cc
        ));


      endforeach;

      $subject = array("สาขาวิชาการจัดการการโรงแรมและภัตตาคาร (หลักสูตรนานาชาติ)", "สาขาวิชาภาษาอังกฤษ", "สาขาวิชาภาษาไทย", "สาขาวิชาการจัดการธุรกิจสายการบิน (หลักสูตรภาษาไทย)", "สาขาวิชาการจัดการธุรกิจสายการบิน (หลักสูตร 2 ภาษา)", "สาขาวิชาการจัดการการโรงแรม", "สาขาการจัดการการท่องเที่ยวและธุรกิจไมซ์");
      foreach ($subject as $key => $value):
        $count_session = $this->db->query("SELECT *, COUNT(`dk_butourism_visitor_actions`.`action_id`) AS cc, SUM(`dk_butourism_visitor_actions`.`action_count`) AS sum FROM `dk_butourism_visitor_actions` WHERE `dk_butourism_visitor_actions`.`action_topic` = 2 AND (YEAR(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[1]}' AND MONTH(`dk_butourism_visitor_actions`.`action_create`) = '{$get_date[0]}') AND `dk_butourism_visitor_actions`.`action_detail` = {$this->db->escape($value)}")->row(0);
        array_push($table_data,array(
          'name' => $value,
          'session' => (int)$count_session->cc,
          'click' => (int)$count_session->sum,
        ));
      endforeach;

      echo json_encode(array(
        'title' => "ข้อมูลสถิติการเข้าดูข้อมูลสาขาวิชา",
        'subtitle' => "ประจำเดือน {$array_text_date[1]} {$array_text_date[2]}",
        'series' => array(
          'data' => $series_data
        ),
        'table' => array(
          'data' => $table_data
        )
      ));
    }



  }
