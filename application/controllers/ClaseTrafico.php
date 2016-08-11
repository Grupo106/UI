<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Clasetrafico extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('claseModel');
	}

    public function consulta() {
        $data = array(
            'datos' => $this->claseModel->obtenerTodos()
        ); 
        $this->load->view('clase-consulta', $data);
    }

    public function nueva() {
        $this->load->view('clase-nueva');
    }

    public function editar() {
        $id = $this->input->get('id');
        $data['registro'] = $this->claseModel->obtener($id);
        $this->load->view('clase-nueva', $data);
    }

    public function guardar() {

        $id = $this->input->post('id');
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'tipo' => 1
        );
        if($id==""){
            echo $this->claseModel->insertar($data);
        } else {
            echo $this->claseModel->actualizar($id, $data);
        }
    }

    public function eliminar() {
        $id = $this->input->post('id');
        echo $this->claseModel->eliminar($id);
    }
}
?>