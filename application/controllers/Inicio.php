<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('usuario_model');

		 $anyuser = $this->usuario_model->existe_usuarios();  
		 if(!$anyuser) {
		 	$this->load->view("asistente-inicio");
		 }

		if(! $_SESSION['SISENER_SESSION']['loggedIn']){

			//$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
 			$this->load->view("login");

 			
 		}
	}

 	public function autenticar() {
    	session_start();
		$this->load->model('usuario_model');
    	$user = $this->input->post('login-usuario');
        $pass = $this->input->post('login-password');

        $userLoggedIn = $this->usuario_model->obtener_usuario_login($user, $pass);

        if(!$userLoggedIn)
        {
			//header("location:".URL);

        }
        else {

        	$_SESSION['SISENER_SESSION'] = $userLoggedIn;
			$_SESSION['SISENER_SESSION']['loggedIn'] = true;

        	//$this->load->view("login");
        	   //print_r($_SESSION['SISENER_SESSION']);
       			redirect("/inicio/index");
        }

    }


    public function index(){
    	$this->load->view("estructura/header.php");
    	$this->load->view("estructura/menu.php");
        $this->load->view("inicio");
    }

    public function desloguearse() {

		$_SESSION[SISENER_SESSION]['loggedIn'] = FALSE;
		redirect("/");
    }

}
?>
