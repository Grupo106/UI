<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistente extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('usuario_model');
	}


    public function inicio() {
        $this->load->view('asistente-inicio');
    }

    public function informacion() {
        $this->load->view('asistente-informacion');
    }

    public function finalizar() {
        $this->load->view('asistente-finalizar');
    }  
    
    public function existeUsuario() {

        $existeUsuario = $this->usuario_model->existeNombreUsuario($this->input->post('usuario'));
        if($existeUsuario) {
            echo 0;
        } else
        {
            echo 1;
        }
    }

    public function guardar()
    {
        parse_str($_POST['usuario'], $usuario);
        parse_str($_POST['configuracion'],  $configuracion);

        $this->crearUsuario($usuario);
        $this->guardarConfiguracion($configuracion);
    }

    public function crearUsuario($usuario) {

        $pass=$usuario['password'];
        $password = $this->usuario_model->generateHash($pass);
        $data = array('usuario' => $usuario['usuario'],
                      'password' => $password, 
                      'nombre' => $usuario['nombre'],
                      'apellido' => $usuario['apellido'],
                      'mail' => $usuario['mail'],
                      'rol' =>  "Administrador");

        $this->usuario_model->insertar($data);
    } 

    public function guardarConfiguracion($configuracion) {
        
        if($configuracion['automatica'])
        {
            $dir = "/tmp/";
            $myfile = fopen($dir . "netcop-cfg.txt", "w") or die("Unable to open file!");

            $txt = "dhcp=si";
            fwrite($myfile, $txt . PHP_EOL);

            $txt = "bajada=1024";
            fwrite($myfile, $txt . PHP_EOL);

            $txt = "subida=1024";
            fwrite($myfile, $txt . PHP_EOL);

            fclose($myfile);
            echo true;
        }
        else
        {
            $dir = "/tmp/";
            $myfile = fopen($dir . "netcop-cfg.txt", "w") or die("Unable to open file!");

            $ip = $configuracion['ip'];
            $mascara =$configuracion['mascara'];
            $enlace = $configuracion['enlace'];
            $dns1 = $configuracion['dns1'];
            $dns2 = $configuracion['dns2'];
            $anchoSubida = $configuracion['anchoSubida'];
            $anchoBajada = $configuracion['anchoBajada'];

            $txt = "dhcp=no";
            fwrite($myfile, $txt . PHP_EOL);

            $txt = "ip=" . $ip;
            fwrite($myfile, $txt . PHP_EOL);

            $txt = "mascara=" . $mascara;
            fwrite($myfile, $txt . PHP_EOL);

            $txt = "gateway=" . $enlace;
            fwrite($myfile, $txt . PHP_EOL);

            $txt = "dns1=" . $dns1;
            fwrite($myfile, $txt . PHP_EOL);

            if($dns2 != null)
            {
                $txt = "dns2=" . $dns2;
                fwrite($myfile, $txt . PHP_EOL);
            }

            $txt = "bajada=" . $anchoBajada;
            fwrite($myfile, $txt . PHP_EOL);

            $txt = "subida=" . $anchoSubida;
            fwrite($myfile, $txt . PHP_EOL);

            fclose($myfile);
            echo true;
        }
    }           
}
?>