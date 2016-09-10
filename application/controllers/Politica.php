<?php
class Politica extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->model('politicaM');

        if(! $_SESSION['SISENER_SESSION']['loggedIn']){

        //$_SESSION[SISENER_SESSION]['loggedIn'] = TRUE;
        $this->load->view("login");
        }
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