<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Controlador extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');


		if(! $_SESSION[SISENER_SESSION]['loggedIn']){

			$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
 			$this->load->view("login");

 			
 		}
	}


    public function index(){

		//$this->load->view("estructura/header.php");
		$this->load->view("estructura/menu.php");
        $this->load->view("inicio");

    }

    public function desloguearse() {

		$_SESSION[SISENER_SESSION]['loggedIn'] = FALSE;
		        $this->load->view("login");
    }

    /*public function autenticar() {

		$this->load->view("estructura/menu.php");
    	$this->load->view('inicio');
    }*/




    public function tiempo_real() {

		//$this->load->view("estructura/header.php");
		$this->load->view("estructura/menu.php");
    	$this->load->view('monitoreo-actual');
    }

    public function historico() {

		//$this->load->view("estructura/header.php");
		$this->load->view("estructura/menu.php");
    	$this->load->view('monitoreo-historico');
    }

    public function por_periodo() {

		//$this->load->view("estructura/header.php");
		$this->load->view("estructura/menu.php");
    	$this->load->view('monitoreo-periodo');
    }

}



?>