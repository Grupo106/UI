<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Clasetrafico extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('claseModel');
        $this->load->model('cidrModel');
        $this->load->model('puertoModel');


        if(! $_SESSION['SISENER_SESSION']['loggedIn']){

            //$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
            $this->load->view("login");
        }
	}

    public function consulta() {
        
        $clases = $this->claseModel->obtenerTodos();
        $data = array('listado' => $clases);
        $this->load->view('clase-consulta', $data);
    }


    public function nueva() {
        $data['protocolos'] = $this->getListaProtocolos();
        $this->load->view('clase-nueva', $data);
    }

    public function editar() {
        $id = $this->input->get('id');
        $data['registro'] = $this->claseModel->obtener($id);
        $data['cidrO'] = $this->cidrModel->obtener($id, 'o');
        $data['puertoO'] = $this->puertoModel->obtener($id, 'o');
        $data['cidrI'] = $this->cidrModel->obtener($id, 'i');
        $data['puertoI'] = $this->puertoModel->obtener($id, 'i');
        $data['protocolos'] = $this->getListaProtocolos();
        $this->load->view('clase-nueva', $data);
    }

    public function guardar() {

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'tipo' => 1
        );
        if($this->input->post('activa')!=""){ 
            $data['activa'] = $this->input->post('activa'); 
        }

        $id_clase = $this->input->post('id');
        if($id_clase==""){
            $id_clase = $this->claseModel->insertar($data);
        } else {
            $this->claseModel->actualizar($id_clase, $data);
        }
        
        if ($id_clase!=false){
            $this->guardarCidr($this->input, $id_clase, 'O');
            $this->guardarPuerto($this->input, $id_clase, 'O');
            $this->guardarCidr($this->input, $id_clase, 'I');
            $this->guardarPuerto($this->input, $id_clase, 'I');
        }
        echo true;
    }

    public function guardarCidr($input, $id_clase, $grupo) {

        $index = $input->post('indexCidr'.$grupo);

        for ($i=0; $i <= $index ; $i++) { 

            $id_cidr = $input->post('idCidr'.$grupo.'_'.$i);
            $direccion = $input->post('direccion'.$grupo.'_'.$i);
            $prefijo = $input->post('prefijo'.$grupo.'_'.$i);

            if($direccion != ""){
                $data = array();
                $data['direccion'] = $direccion;
                if($prefijo !=""){ $data['prefijo'] = $prefijo; }
                
                if($id_cidr == ""){
                    $this->cidrModel->insertar($data, $id_clase, strtolower($grupo));
                } else {
                    $this->cidrModel->actualizar($id_cidr, $data);
                }
            }
            else if($id_cidr != ""){
                $this->cidrModel->eliminar($id_cidr);
            }
        }
        return true;
    }

    public function guardarPuerto($input, $id_clase, $grupo) {

        $index = $input->post('indexPuerto'.$grupo);

        for ($i=0; $i <= $index ; $i++) { 

            $id_puerto = $input->post('idPuerto'.$grupo.'_'.$i);
            $puerto = $input->post('puerto'.$grupo.'_'.$i);
            $protocolo = $input->post('protocolo'.$grupo.'_'.$i);

            if($puerto != ""){
                $data = array(
                    'numero' => $puerto,
                    'protocolo' => $protocolo,
                );
                if($id_puerto == ""){
                    $this->puertoModel->insertar($data, $id_clase, strtolower($grupo));
                } else {
                    $this->puertoModel->actualizar($id_puerto, $data);
                }
            }
            else if($id_puerto != ""){
                $this->puertoModel->eliminar($id_puerto);
            }
        }
        return true;
    }

    public function eliminar() {
        $id = $this->input->post('id');

        $puertos = $this->puertoModel->obtenerIDPuertosPorClase($id);
        foreach ($puertos as $row) {
           $this->puertoModel->eliminar($row->id_puerto);
        }
        $cidr = $this->cidrModel->obtenerIDCidrPorClase($id);
        foreach ($cidr as $row) {
           $this->cidrModel->eliminar($row->id_cidr);
        }
        echo $this->claseModel->eliminar($id);
    }

    public function activar() {
        $id = $this->input->post('id');
        $estado = $this->input->post('estado');
        $data = array('activa' => $estado); 

        echo $this->claseModel->actualizar($id, $data);
    }

    public function getListaProtocolos(){
        $options = array(
              '0'  => '',
              '6'  => 'TCP',
              '17' => 'UDP',
            );
        return $options;
    }
}
?>
