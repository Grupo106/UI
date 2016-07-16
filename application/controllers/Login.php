<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct{
		parent::__construct();
	}

    public function autenticar()
    {
    	$usuario = $this->input->post("login-usuario");
    	$password = $this->input->post("login-password");
    	if($usuario = "sabrina"){
    		$this->load->view('menu-inicial');
 		}
    }
}
?>