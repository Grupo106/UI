<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
    $this->load->library('session');
    $this->load->model('usuario_model');


		if(! $_SESSION['SISENER_SESSION']['loggedIn']){

			//$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
 			$this->load->view("login");	
 		}
	}

    public function consulta() {
        $data['usuarios'] = $this->usuario_model->obtener_usuarios();  
        $data['section'] = 'usuarios';
        $this->load->view('usuario-consulta', $data);
    }

    public function nuevo() {
        $this->load->view('usuario-nuevo', array('section' => 'usuarios'));
    }

    public function modificar() {
        $id = $this->input->get('id');
        $data = $this->usuario_model->obtener_usuarios_porId($id);
        $data->section = 'usuarios';
        $this->load->view('usuario-modificacion', $data);
    }

    public function guardar() {
        $id = $this->input->post('id');
        if($this->input->post('password')){

        $pass=$this->input->post('password');
        $password = $this->usuario_model->generateHash($pass);
        $data = array('password' => $password, 
                      'nombre' => $this->input->post('nombre'),
                      'apellido' => $this->input->post('apellido'),
                      'mail' => $this->input->post('mail'),
                      'rol' =>  $_POST['rol']);
        }
        else if($this->input->post('password2')){

        $pass=$this->input->post('password2');
        $password = $this->usuario_model->generateHash($pass);
        $data = array('password' => $password, 
                      'nombre' => $this->input->post('nombre'),
                      'apellido' => $this->input->post('apellido'),
                      'mail' => $this->input->post('mail'),
                      'rol' =>  $_POST['rol']);
        }
        else {
            $data = array('nombre' => $this->input->post('nombre'),
                      'apellido' => $this->input->post('apellido'),
                      'mail' => $this->input->post('mail'),
                      'rol' =>  $_POST['rol']);
        }

        if($id=="") {
            $data['usuario'] = $this->input->post('usuario');
            $existeUsuario = $this->usuario_model->existeNombreUsuario($data['usuario']);
            if($existeUsuario) {
                echo 2;
            } else {
            echo $this->usuario_model->insertar($data);
          }
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
