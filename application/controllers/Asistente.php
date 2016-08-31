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


    public function crearUsuario() {
        $id = $this->input->post('id');
        $data = array('usuario' => $this->input->post('usuario-usuario'),
                      'password' => $this->input->post('usuario-password'), 
                      'nombre' => $this->input->post('usuario-nombre'),
                      'apellido' => $this->input->post('usuario-apellido'),
                      'mail' => $this->input->post('usuario-mail'),
                      'rol' =>  "Administrador");

        $this->usuario_model->insertar($data);
        $this->load->view('asistente-paso2');
    }              
}
?>