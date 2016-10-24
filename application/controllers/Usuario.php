<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("LoginRequired.php");

class Usuario extends LoginRequired {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->model('log_model');
    }

    public function consulta() {
        $data['usuarios'] = $this->usuario_model->obtener_usuarios();  
        $data['section'] = 'usuarios';
        $this->load->view('usuario-consulta', $data);
    }

    public function nuevo() {
        if(strcmp($this->session->rolUsuario, "Administrador") == 0) {

            $this->load->view('usuario-nuevo', array('section' => 'usuarios'));

        } else $this->load->view('errors/index.html');

    }

    public function modificar() {
            
        if(strcmp($this->session->rolUsuario, "Administrador") == 0) {

            $id = $this->input->get('id');
            $data = $this->usuario_model->obtener_usuarios_porId($id);
            $data->section = 'usuarios';
            $this->load->view('usuario-modificacion', $data);

        } else $this->load->view('errors/index.html');
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
                $this->guardarEnLog('1', $data);
            }
        } else {
            echo $this->usuario_model->actualizar($id,$data);
            $this->guardarEnLog('2', $id);
        }


    }     


    public function eliminar() {
        $id = $this->input->post('id');
        $this->guardarEnLog('3', $id);
        echo $this->usuario_model->eliminar($id);

    }    

    public function guardarEnLog($accion, $dato) {
        
        if($accion==1) {            
             $data1 = array('usuario' => $this->session->userUsuario, 
                    'descripcion' => "Creación de usuario ".$dato['usuario']." por usuario ".$this->session->userUsuario);
             $this->log_model->insertarLog($data1);

        }
        else if($accion==2) {
             $data = $this->usuario_model->obtener_usuarios_porId($dato);
             
             $data1 = array('usuario' => $this->session->userUsuario, 
                    'descripcion' => "Actualización de usuario ".$data->usuario." por usuario ".$this->session->userUsuario);
             $this->log_model->insertarLog($data1);

        }
        else if($accion==3) {
             $data = $this->usuario_model->obtener_usuarios_porId($dato);
             
             $data1 = array('usuario' => $this->session->userUsuario, 
                    'descripcion' => "Se dio de baja al usuario ".$data->usuario." por usuario ".$this->session->userUsuario);
             $this->log_model->insertarLog($data1);

        }
    }         
}
?>
