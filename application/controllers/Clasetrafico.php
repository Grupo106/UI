<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class Clasetrafico extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('claseModel');
        $this->load->model('cidrModel');
        $this->load->model('puertoModel');
	}

    public function consulta() {
        
        $listado = array();
        $data = $this->claseModel->obtenerTodos();

        foreach($data as $registro){
            
            $id_clase = $registro->id_clase;
            if ($registro->tipo == 0) {$tipo = 'SISTEMA';} else { $tipo = 'USUARIO';}

            $clase = array();
            $clase['id_clase'] = $id_clase;
            $clase['nombre'] = $registro->nombre;
            $clase['tipo'] = $tipo;
            $clase['direccionO'] = $this->obtenerCidr($registro->direccion_o, $registro->prefijo_o);
            $clase['puertoO'] = $this->obtenerPuerto($registro->puerto_o, $registro->protocolo_o);
            $clase['direccionI'] = $this->obtenerCidr($registro->direccion_i, $registro->prefijo_i);
            $clase['puertoI'] = $this->obtenerPuerto($registro->puerto_i, $registro->protocolo_i);
            array_push($listado, $clase);
        }

        $data = array('listado' => $listado);
        $this->load->view('clase-consulta', $data);
    }


    public function obtenerPuerto($puerto, $protocolo){
   
        if(!is_null($puerto)){
            if ($protocolo == 6){ 
                return $puerto . " / " . "TCP";
            } else if ($protocolo == 17){ 
                return $puerto . " / " . "UDP";
            } 
            return $puerto;
        }
        return "";
    }

    public function obtenerCidr($direccion, $prefijo){

        if(!is_null($direccion)){
            return $direccion . " / " . $prefijo;
        }
        return "";
    }


    public function nueva() {
        $this->load->view('clase-nueva');
    }

    public function editar() {
        $id = $this->input->get('id');
        $data['registro'] = $this->claseModel->obtener($id);
        $data['protocolos'] = $this->getListaProtocolos();
        $this->load->view('clase-nueva', $data);
    }

    public function guardar() {

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'tipo' => 1
        );
        if($this->input->post('activa')!=""){ $data['activa'] = $this->input->post('activa'); }

        $id_clase = $this->input->post('id');
        if($id_clase==""){
            $id_clase = $this->claseModel->insertar($data);
        } else {
            $this->claseModel->actualizar($id_clase, $data);
        }
        
        if ($id_clase!=false){
            $this->guardarCidr($this->input, $id_clase, 'O');
            $this->guardarCidr($this->input, $id_clase, 'I');
            $this->guardarPuerto($this->input, $id_clase, 'O');
            $this->guardarPuerto($this->input, $id_clase, 'I');
        }
        echo true;
    }

    public function guardarCidr($input, $id_clase, $grupo) {

        $id_cidr = $input->post('id_cidr'.$grupo);
        $direccion = $input->post('direccion'.$grupo);
        $prefijo = $input->post('prefijo'.$grupo);

        if($direccion != ""){
            $data = array();
            $data['direccion'] = $direccion;
            if($prefijo !=""){ $data['prefijo'] = $prefijo; }
            
            if($id_cidr == ""){
                return $this->cidrModel->insertar($data, $id_clase, strtolower($grupo));
            } else {
                return $this->cidrModel->actualizar($id_cidr, $data);
            }
        }
        else if($id_cidr != ""){
            return $this->cidrModel->eliminar($id_cidr);
        }
        return true;
    }

    public function guardarPuerto($input, $id_clase, $grupo) {

        $id_puerto = $input->post('id_puerto'.$grupo);
        $puerto = $input->post('puerto'.$grupo);
        $protocolo = $input->post('protocolo'.$grupo);

        if($puerto != ""){
            $data = array(
                'numero' => $puerto,
                'protocolo' => $protocolo,
            );
            if($id_puerto == ""){
                return $this->puertoModel->insertar($data, $id_clase, strtolower($grupo));
            } else {
                return $this->puertoModel->actualizar($id_puerto, $data);
            }
        }
        else if($id_puerto != ""){
            return $this->puertoModel->eliminar($id_puerto);
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
