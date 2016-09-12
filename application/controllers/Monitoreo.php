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
        $segundosAnalizar = 3;
        return shell_exec('analizar '.$segundosAnalizar);
    }

    public function obtenerConsumoClasificadoActual(){
        echo $this->obtenerConsumoClasificado();
    }


    public function obtenerConsumoTotal(){

        $hasta = date('Y-m-d H:i:s');
        $desde = date('Y-m-d H:i:s', strtotime('-50 second', time()));

        //$desde = date('Y-m-d H:i:s', strtotime("2016-09-05 19:55:00"));
        //$hasta = date('Y-m-d H:i:s', strtotime("2016-09-05 19:56:30"));
        return $this->paqueteModel->obtenerTotal($desde, $hasta);
    }

    public function obtenerConsumoTotalActual() {
        
        $hasta = date('Y-m-d H:i:s');
        $desde = date('Y-m-d H:i:s', strtotime('-1 second', time()));
        
        //$desde = date('Y-m-d H:i:s', strtotime("2016-09-05 19:56:30"));
        //$hasta = date('Y-m-d H:i:s', strtotime("2016-09-05 19:56:31"));
        echo json_encode($this->paqueteModel->obtenerTotal($desde, $hasta)[0]);
    }


    public function historico() {
        $this->load->view('monitoreo-historico');
    }

    public function por_periodo() {
        $this->load->view('monitoreo-periodo');
    }
}
?>