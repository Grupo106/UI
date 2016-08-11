<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('usuario_model');
	}

    public function consulta() {
        $data['usuarios'] = $this->usuario_model->obtener_usuarios();        
        $this->load->view('usuario-consulta', $data);
    }

    public function nuevo() {
        $this->load->view('usuario-nuevo');
    }

    public function modificar() {
        $id = $this->input->get('id');
        $data = $this->usuario_model->obtener_usuarios_porId($id);
        $this->load->view('usuario-modificacion', $data);
    }

    public function guardar() {
        $id = $this->input->post('id');
        $data = array('password' => $this->input->post('password'), 
                      'nombre' => $this->input->post('nombre'),
                      'apellido' => $this->input->post('apellido'),
                      'mail' => $this->input->post('mail'),
                      'rol' =>  $_POST['rol']);

        if($id=="") {
            $data['usuario'] = $this->input->post('usuario');
            echo $this->usuario_model->insertar($data);
        } else {
            echo $this->usuario_model->actualizar($id,$data);
        }
    }     


    public function eliminar() {
        $id = $this->input->post('id');
        echo $this->usuario_model->eliminar($id);
    }          
}
?>