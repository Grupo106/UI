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

            $_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
            $this->load->view("login");
        }
    }

    public function tiempo_real() {

        $data = $this->obtenerConsumoUltimosSegundos();
        $this->load->view('monitoreo-actual', $data);
    }

    public function por_periodo() {

        $data['fechaMinima'] = $this->paqueteModel->obtenerFechaMinima();
        $this->load->view('monitoreo-periodo', $data);
    }


    public function obtenerConsumoUltimosSegundos(){

        $hasta = date('Y-m-d H:i:s');
        $desde = date('Y-m-d H:i:s', strtotime('-50 second', time()));
        $consumoTotal = $this->obtenerConsumoTotal($desde, $hasta, "second");
        $valorMaximo =  $this->obtenerValorMaximo($consumoTotal);

        $data = array(
            'consumoTotal' => $consumoTotal,
            'consumoClasificado' => $this->obtenerConsumoClasificado(),
            'maximoBajada' => $valorMaximo['bajada'],
            'maximoSubida' => $valorMaximo['subida'],
        );
        return $data;
    }

    //Metodo llamado desde la view, para buscar datos por periodo
    public function obtenerConsumoPorPeriodo() {
        
        $desde = $this->input->post('fechaDesde');
        $hasta = $this->input->post('fechaHasta');

        $dateTimeDesde = new DateTime($desde);
        $dateTimeHasta = new DateTime($hasta);

        $intervalo = $this->obtenerIntervalo($dateTimeDesde, $dateTimeHasta);
        $consumoTotal = $this->obtenerConsumoTotal($desde, $hasta, explode("-", $intervalo)[0]);
        $valorMaximo = $this->obtenerValorMaximo($consumoTotal);

        $data = array(
            'consumoTotal' => $consumoTotal,
            'consumoClasificado' => $this->obtenerConsumoClasificadoPorFecha($dateTimeDesde, $dateTimeHasta),
            'intervaloBusqueda' => $intervalo,
            'maximoBajada' => $valorMaximo['bajada'],
            'maximoSubida' => $valorMaximo['subida'],
        );
        echo json_encode($data);
    }


    public function obtenerConsumoTotal($desde, $hasta, $intervalo){
        return $this->paqueteModel->obtenerTotal($desde, $hasta, $intervalo);
    }

    public function obtenerConsumoClasificado(){
        $segundosAnalizar = 3;
        return shell_exec('analizar '.$segundosAnalizar);
    }

    public function obtenerConsumoClasificadoPorFecha($dateTimeDesde, $dateTimeHasta){

        $stringISODesde = date('Y-m-d\TH:i', $dateTimeDesde->getTimestamp());
        $stringISOHasta = date('Y-m-d\TH:i', $dateTimeHasta->getTimestamp());

        return shell_exec('analizar '.$stringISODesde.' '.$stringISOHasta);
    }


    //Metodo llamado desde la view cada 3 segundos para actualizar el grafico de torta
    public function obtenerConsumoClasificadoActual(){
        $this->output->set_content_type('application/json');
        $this->output->set_output($this->obtenerConsumoClasificado());
    }

    //Metodo llamado desde la view, para actualizar el grafico de linea
    public function obtenerConsumoTotalActual() {

        $hasta = date('Y-m-d H:i:s');
        $desde = date('Y-m-d H:i:s', strtotime('-1 second', time()));
        $data = $this->paqueteModel->obtenerTotal($desde, $hasta, "second")[0];
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
    }


    
    public function obtenerIntervalo($dateTimeDesde, $dateTimeHasta){

        $diferencia = $dateTimeHasta->diff($dateTimeDesde);
        if($diferencia->m > 10){
            $intervalo = "month";
        } else if ($diferencia->d > 10){
            $intervalo = "day";
        } else if ($diferencia->d > 0 || $diferencia->h > 10){
            $intervalo = "hour";
        } else if ($diferencia->h > 0 || $diferencia->i > 10){
            $intervalo = "minute";
        } else {
            $intervalo = "second";
        }
        if(($intervalo=="hour" || $intervalo=="minute") && ($dateTimeDesde->format('Y-m-d') == $dateTimeHasta->format('Y-m-d'))) {
            $intervalo = $intervalo.'-sameDay';
        }
        return $intervalo;
    }
    
    public function obtenerValorMaximo($consumoTotal){
        $valoresBajada = array();
        $valoresSubida = array();

        foreach($consumoTotal as $obj){
            $valoresBajada[] = $obj['bajada'];
            $valoresSubida[] = $obj['subida'];
        }
        $data = array(
            'bajada' => max($valoresBajada),
            'subida' => max($valoresSubida),
        );
        return $data;
    }

    public function historico() {
        $this->load->view('monitoreo-historico');
    }

    
}
?>