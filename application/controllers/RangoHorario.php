<?php
class RangoHorario extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('rangoHorarioM');
	}

    public function consulta_por_politica($id_politica){    
        $listaHorarios = $this->rangoHorarioM->obtener_horario_por_politica($id_politica);

        $data = array(
            'horarios' => $listaHorarios
        );      
        
        // Cargar vista
        //$this->load->view('', $data);
    }
}
?>