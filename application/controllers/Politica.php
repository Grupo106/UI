<?php
class Politica extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('politicaM');
	}

	function consulta(){    
    	$listapoliticas = $this->politicaM->obtener_politicas();

    	$data = array(
	        'politicas' => $listapoliticas
	    );      
        
        // Cargar vista
    	$this->load->view('consultar-politicas', $data);
	}
}
?>