<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistema extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->library('session');
		$this->load->helper('url');
        $this->load->model('paqueteModel');

        if(! $_SESSION['SISENER_SESSION']['loggedIn']){

        //$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
        $this->load->view("login");
        }
	}

    public function configuracion() {

        $data = array();
        $config = `/usr/local/bin/configurador`;
        $configArray = explode("\n",$config);

        for($i=0; $i< count($configArray); $i++)
        {
            $keyvalue = explode("=", $configArray[$i]);
            $data[$keyvalue[0]] = $keyvalue[1];          
        }
     
        $this->load->view('sistema-configuracion', $data);
    }

    public function guardar() {

        $dir = "/tmp/";
        $myfile = fopen($dir . "netcop-cfg.tmp", "w") or die("Unable to open file!");

        $ip = $this->input->post('ip');
        $mascara = $this->input->post('mascara');
        $enlace = $this->input->post('gateway');
        $dns1 = $this->input->post('dns1');
        $dns2 = $this->input->post('dns2');
        $anchoSubida = $this->input->post('subida');
        $anchoBajada = $this->input->post('bajada');

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

    public function informacion2() {

        $mem = `free -m | awk 'NR==2{printf "%.2f", $3*100/$2 }'`;
        $usoCpu= `top -b -n1 | grep "Cpu(s)" | awk '{print $2 + $4}'`;
        $discRig = `df -h | awk '{printf "%s", $5}'`;
       
        $discRigido = explode("%",$discRig);
        $discRig = $discRigido[1];


        $tempCpu = 3;
        $intRed = 5;

        $data = array("usoCpu" => $usoCpu . "%",
                      "tempCpu" => $tempCpu,
                      "ram" => $mem . "%", 
                      "discRig" => $discRig . "%",
                      "intRed" => $intRed);

        $this->load->view('sistema-informacion2', $data);

    }

    public function informacion() {

        $data = array(
            'consumoTotal' => $this->obtenerConsumoTotal(),
        );
        $this->load->view('sistema-informacion', $data);
    }

    public function obtenerConsumoTotal(){

        $fecha = date('Y-m-d H:i:s', strtotime('-25 second', time()));
        $data = array();
        for($i=0; $i<25; $i++)
        {
            $mem = `free -m | awk 'NR==2{printf "%.2f", $3*100/$2 }'`;
            $usoCpu= `top -b -n1 | grep "Cpu(s)" | awk '{print $2 + $4}'`;
            $discRig = `df -h | awk '{printf "%s", $5}'`;
            $discRigido = explode("%",$discRig);
            $discRig = $discRigido[1];

            $data[$i]['hora'] = $fecha;
            $data[$i]['cpu'] = $usoCpu;
            $data[$i]['ram'] = $mem;
            $data[$i]['disco'] = $discRig;
            $data[$i]['temp'] = 40; //averiguar comando de temp

           $fecha = date('Y-m-d H:i:s',strtotime('+1 seconds', strtotime($fecha)));
        }

        return $data;
        
    }

    public function obtenerConsumos() {
        
         $fecha = date('Y-m-d H:i:s', strtotime('-1 second', time()));

         $mem = `free -m | awk 'NR==2{printf "%.2f", $3*100/$2 }'`;
         $usoCpu= `top -b -n1 | grep "Cpu(s)" | awk '{print $2 + $4}'`;
         $discRig = `df -h | awk '{printf "%s", $5}'`;
         $discRigido = explode("%",$discRig);
         $discRig = $discRigido[1];

         $data = array('hora' =>$fecha ,
                       'cpu' => $usoCpu,
                       'ram' => $mem,
                       'disco' =>$discRig,
                       'temp' => 35);
         
         echo json_encode($data);
    }

    public function save() {
        
    }
}
?>