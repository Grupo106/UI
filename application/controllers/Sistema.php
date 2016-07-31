<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

    public function configuracion() {
        $this->load->view('sistema-configuracion');
    }

    public function informacion() {
        $this->load->view('sistema-informacion');
    }
}
?>