<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    
    public function autenticar() {

    	$this->load->view('login');
    }

/*
    	public function login() {
		session_start();

		if($_SESSION[SISENER_SESSION]['loggedIn']) {
			redirect("/admin/productos");
		}
		$this->load->model("user_model");
		$userLoggedIn = $this->user_model->login($_POST);
		if($userLoggedIn) {
			$_SESSION[SISENER_SESSION] = $userLoggedIn;
			$_SESSION[SISENER_SESSION]['loggedIn'] = true;
			redirect("/admin/productos");
			exit;
		} else {
			redirect("/admin");
			exit;
		}
	}
*/
}
?>