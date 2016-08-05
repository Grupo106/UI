<?php

class Reglas extends CI_Controller{

	function consultar_reglas(){
    	$this->load->model('regla');
    
    	$listaReglas = $this->regla->obtener_reglas();

    	$data = array(
	        'reglas' => $listaReglas
	    );      
        
        // Cargar vista
    	$this->load->view('consultar-reglas', $data);
	}
}
?>