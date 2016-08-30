<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Politica extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

    public function consulta() {
        $this->load->view('politica-consulta');
    }

    public function nueva() {
        $this->load->view('politica-nueva');
    }
}
?>