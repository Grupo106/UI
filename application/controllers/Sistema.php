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
        $ip = "192.212.212.1";
        $mascara = "192.212.212.2";
        $enlace = "192.212.212.3";
        $dns1 = "192.212.212.4";
        $dns2 = "192.212.212.5";
        $anchoBajada = 4;
        $anchoSubida = 5;

        $data = array("ip" => $ip,
                      "mascara" => $mascara,
                      "enlace" => $enlace, 
                      "dns1" => $dns1,
                      "dns2" => $dns2,
                      "anchoBajada" => $anchoBajada,
                      "anchoSubida" => $anchoSubida);

        $this->load->view('sistema-configuracion', $data);
    }

    public function guardar() {

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

    public function informacion() {

        $mem = `free -m | awk 'NR==2{printf "%.2f", $3*100/$2 }'`;
        $usoCpu= `top -b -n1 | grep "Cpu(s)" | awk '{print $2 + $4}'`;
        $discRig = `df -h | awk '$NF=="/"{printf "%s", $5}'`;
       /*$usoCpu = 1;
        $tempCpu = 2;
        //$ram = 3;
        $dicRig = 4;
        $intRed = 5;
*/
        $tempCpu = 3;
        $intRed = 4;

        $data = array("usoCpu" => $usoCpu . "%",
                      "tempCpu" => $tempCpu,
                      "ram" => $mem . "%", 
                      "discRig" => $discRig,
                      "intRed" => $intRed);

        $this->load->view('sistema-informacion', $data);

    }



    public function save() {
        
    }
}
?>