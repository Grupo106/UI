<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoreo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('paqueteModel');

        if(! $_SESSION['SISENER_SESSION']['loggedIn']){

        //$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
        $this->load->view("login");
        }
	}

    public function tiempo_real() {

        $data = array(
            'consumoTotal' => $this->obtenerConsumoTotal(),
            'consumoClasificado' => $this->obtenerConsumoClasificado(),
        );
        $this->load->view('monitoreo-actual', $data);
    }


    public function obtenerConsumoClasificado(){

        $hasta = time();
        $desde = strtotime('-1 second', time());
        system('analizador '.$desde.' '.$hasta, $consumoClasificado);
        print_r($consumoClasificado);
        die();
        //return file_get_contents("./analisis/datos_0.json");
    }

    public function obtenerConsumoClasificadoActual(){

        $hasta = time();
        $desde = strtotime('-1 second', time());
        system('analizador '.$desde.' '.$hasta, $consumoClasificado);
        echo $consumoClasificado;
        //$hasta = date('Y-m-d H:i:s');
        //$desde = date('Y-m-d H:i:s', strtotime('-1 second', time()));
        
        //$i = $this->input->post('index');
        //echo file_get_contents("./analisis/datos_".$i.".json");
    }



    public function obtenerConsumoTotal(){

        $array = array();
        $horaActual = strtotime("2016-09-05 19:56:43"); //time();

        //Por cada uno de los 50 ultimos segundos, obtengo el total de bytes
        for ($i = 50; $i > 0 ; $i--){
            $a = $i - 1;
            $desde = date('Y-m-d H:i:s', strtotime("-$i second", $horaActual));
            $hasta = date('Y-m-d H:i:s', strtotime("-$a second", $horaActual));
            $consumoTotal = array(
                'hora'  => $hasta,
                'bajada' => $this->paqueteModel->obtenerTotal(0,$desde, $hasta),
                'subida' => $this->paqueteModel->obtenerTotal(1,$desde, $hasta),
            );
            array_push($array, $consumoTotal);
        }
        return $array;
    }

    public function obtenerConsumoTotalActual() {
        //$hasta = date('Y-m-d H:i:s');
        //$desde = date('Y-m-d H:i:s', strtotime('-1 second', time()));

        $desde = date('Y-m-d H:i:s', strtotime("2016-09-05 19:56:43"));
        $hasta = date('Y-m-d H:i:s', strtotime("2016-09-05 19:56:44"));

        $consumoTotal = array(
            'hora'  => $hasta,
            'bajada' => $this->paqueteModel->obtenerTotal(0,$desde, $hasta),
            'subida' => $this->paqueteModel->obtenerTotal(1,$desde, $hasta),
        );
        echo json_encode($consumoTotal);
    }


    public function historico() {
        $this->load->view('monitoreo-historico');
    }

    public function por_periodo() {
        $this->load->view('monitoreo-periodo');
    }
}
?>