<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

    public function consulta() {
        $this->load->view('usuario-consulta');
    }

    public function nuevo() {
        $this->load->view('usuario-nuevo');
    }
}
?>