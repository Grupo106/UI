<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayuda extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->helper('url');
	}

    public function ayuda() {
        $this->load->view('ayuda', array('section'=>'ayuda'));
    }
}
?>
