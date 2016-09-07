<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistente extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('usuario_model');
	}


    public function asistente() {
        $this->load->view('asistente-paso1');
    }

    public function asistenteInicial() {
        $this->load->view('asistente');
    }

    public function crearUsuario() {
        $pass=$this->input->post('password');
        $password = $this->usuario_model->generateHash($pass);
        $data = array('usuario' => $this->input->post('usuario'),
                      'password' => $password, 
                      'nombre' => $this->input->post('nombre'),
                      'apellido' => $this->input->post('apellido'),
                      'mail' => $this->input->post('mail'),
                      'rol' =>  "Administrador");

        echo $this->usuario_model->insertar($data);
    } 

    public function asistente2() {
        $this->load->view('asistente-paso2');
    }          

    public function asistente3() {
        $this->load->view('asistente-paso3');
    }             
}
?>