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

    public function guardarConfiguracion() {
        
        if($_POST['automatica'])
        {
            $dir = "/var/tmp/";
            $myfile = fopen($dir . "netcop-cfg.tmp", "w") or die("Unable to open file!");

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
            $myfile = fopen($dir . "netcop-cfg.tmp", "w") or die("Unable to open file!");

            $ip = $this->input->post('ip');
            $mascara = $this->input->post('mascara');
            $enlace = $this->input->post('enlace');
            $dns1 = $this->input->post('dns1');
            $dns2 = $this->input->post('dns2');
            $anchoSubida = $this->input->post('anchoSubida');
            $anchoBajada = $this->input->post('anchoBajada');

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

    public function asistente2() {
        $this->load->view('asistente-paso2');
    }          

    public function asistente3() {
        $this->load->view('asistente-paso3');
    }             
}
?>