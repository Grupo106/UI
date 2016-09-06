<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoreo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('paqueteModel');
	}

    public function tiempo_real() {
    	
        $datos = array();
        $horaActual = time();
        
        //$horaActual = strtotime("2016-09-05 19:56:43"); //time();

        for ($i = 100; $i > 0 ; $i--){

            $a = $i - 1;
            $desde = date('Y-m-d H:i:s', strtotime("-$i second", $horaActual));
            $hasta = date('Y-m-d H:i:s', strtotime("-$a second", $horaActual));
            $punto = array(
                'hora'  => $hasta,
                'bytes' => $this->paqueteModel->obtenerTotal($tipo, $desde, $hasta),
            );
            array_push($datos, $punto);
        }
        $data = array('totalesPorSegundo' => $datos);
        $this->load->view('monitoreo-actual', $data);
    }

    public function historico() {
    	$this->load->view('monitoreo-historico');
    }

    public function por_periodo() {
    	$this->load->view('monitoreo-periodo');
    }

    public function obtenerConsumoTotal() {
        $tipo = $this->input->post('tipo');
        $hasta = date('Y-m-d H:i:s');
        $desde = date('Y-m-d H:i:s', strtotime('-1 second', time()));

        //$desde = date('Y-m-d H:i:s', strtotime("2016-09-05 19:55:01"));
        //$hasta = date('Y-m-d H:i:s', strtotime("2016-09-05 19:55:02"));

        echo $this->paqueteModel->obtenerTotal($tipo, $desde, $hasta);
    }
}
?>