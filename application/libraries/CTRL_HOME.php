<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CTRL_HOME extends CI_Controller
{

  public $segment;

  public function __construct()
  {
    parent::__construct();
    $this->_loadthemes();
    $this->_gentsegment();
  }

  public function _gentsegment()
  {
    $this->segment = array(
      1 => $this->uri->segment(1), 2 => $this->uri->segment(2),
      3 => $this->uri->segment(3), 4 => $this->uri->segment(4),
      5 => $this->uri->segment(5), 6 => $this->uri->segment(6)
    );
  }

  private function _loadthemes()
  {
    $this->template->set_theme('home')->set_layout('index');
    $this->daftkung->addConfig('js',array("themes/home/assets/js/app.js"));
    $this->daftkung->addConfig('css',array(
      "assets/css/margin-padding.css",
      "themes/home/assets/fonts/karnvayla/karnvayla.css",
    ));

  }

}
