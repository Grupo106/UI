<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

    public function consulta() {

        $this->load->model('usuario_model');
        $data['usuarios'] = $this->usuario_model->obtener_usuarios();

        //$this->usuario_model->crear_usuario();
        
        $this->load->view('usuario-consulta', $data);
    }

    public function nuevo() {
        $this->load->view('usuario-nuevo');
    }

    public function eliminar() {
        $id = $this->input->get('id');
        //Eliminar usuario con ese id
    }

    public function modificar() {
        $id = $this->input->get('id');
        $this->load->model('usuario_model');
        $data = $this->usuario_model->obtener_usuarios_porId($id);

        $this->load->view('usuario-modificacion', $data);
    }

    public function guardar() {
        $this->load->model('usuario_model');

        $data = array('usuario' => $this->input->post('usuario'),
                      'password' => $this->input->post('password'), 
                      'nombre' => $this->input->post('nombre'),
                      'apellido' => $this->input->post('apellido'),
                      'mail' => $this->input->post('mail'),
                      'rol' =>  $_POST['rol']);

        $this->usuario_model->crear_usuario($data);
    }               
}
?>