<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoreo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

    public function tiempo_real() {
    	$this->load->view('monitoreo-actual');
    }

    public function historico() {
    	$this->load->view('monitoreo-historico');
    }

    public function por_periodo() {
    	$this->load->view('monitoreo-periodo');
    }
}
?>