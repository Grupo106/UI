<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');

        if(! $_SESSION['SISENER_SESSION']['loggedIn']){

        //$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
        $this->load->view("login");
        }
	}

    public function configuracion() {

        //levantar info del archivo
        $ip = 1;
        $mascara = 2;
        $enlace = 3;
        $anchoBajada = 4;
        $anchoSubida = 5;

        $data = array("ip" => $ip,
                      "mascara" => $mascara,
                      "enlace" => $enlace, 
                      "anchoBajada" => $anchoBajada,
                      "anchoSubida" => $anchoSubida);

        $this->load->view('sistema-configuracion', $data);
    }

    public function guardar() {

        $ip = $this->input->post('ip');
        $mascara = $this->input->post('mascara');
        $enlace = $this->input->post('enlace');
        $anchoBajada = $this->input->post('anchoBajada');
        $anchoSubida = $this->input->post('anchoSubida');

        echo true;
        
        //guardar en el archivo
    }

    public function informacion() {

        $free = shell_exec('free');
        $free = (string)trim($free);
        $free_arr = explode("\n", $free);
        $mem = explode(" ", $free_arr[1]);
        $mem = array_filter($mem);
        $mem = array_merge($mem);
        $ram = $mem[2]/$mem[1]*100;

        $usoCpu = 1;
        $tempCpu = 2;
        //$ram = 3;
        $dicRig = 4;
        $intRed = 5;

        $data = array("usoCpu" => $usoCpu[0],
                      "tempCpu" => $tempCpu,
                      "ram" => $mem, 
                      "discRig" => $dicRig,
                      "intRed" => $intRed);

        $this->load->view('sistema-informacion', $data);

    }



    public function save() {
        
    }
}
?>