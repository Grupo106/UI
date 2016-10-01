<?php
class Politica extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
        $this->load->model('politicaM');
        $this->load->model('rangoHorarioM');
        $this->load->library('session');
	}

//	public function consulta(){    
//    	$data['lista_bloqueos'] = $this->politicaM->obtener_politicas_bloqueo();
//    	$data['lista_limitacion'] = $this->politicaM->obtener_politicas_limitacion();
//    	$data['lista_priorizacion'] = $this->politicaM->obtener_politicas_priorizacion()//;
//        
//        // Cargar vista
//    	$this->load->view('consultar-politicas', $data);
//	}

    public function consulta(){    
        $listapoliticas = $this->politicaM->obtener_politicas();

        $data = array(
            'politicas' => $listapoliticas,
            'section' => 'politicas'
        );      
        
        // Cargar vista
        $this->load->view('consultar-politicas', $data);
    }

//    public function consulta_por_id($id){    
//        $listapoliticas = $this->politicaM->obtener_politicas();
//
//        $data = array(
//            'politicas' => $listapoliticas
//        );      
//        
//        // Cargar vista
//        $this->load->view('consultar-politicas', $data);
//    }

    public function nueva() {
        $this->load->view('nueva-politica', array('section'=>'politicas'));
    }

    public function editar() {
        $id_politica = $this->input->get('id_politica');

        $data['politica'] = $this->politicaM->obtener_politicas_por_id($id_politica);
        $data['section'] = 'politicas';
        //$data['rango_horario'] = $this->rangoHorarioM->obtener_horario_por_politica($id_politica);

        //$data['es_limitacion']   = is_numeric($data['politica']['velocidad_bajada']) OR is_numeric($data['politica']['velocidad_subida']);
        //$data['es_priorizacion'] = is_numeric($data['politica']['prioridad']);
        //$data['es_bloqueo']      = !$data['es_limitacion'] OR !$data['es_priorizacion'];

        $this->load->view('nueva-politica', $data);
    }

    public function cambiar_estado() {
        $id_politica = $this->input->post('id_politica');

        echo $this->politicaM->alternar_estado($id_politica);
    }

    public function guardar() {
        // Propiedades de politica
        $inputNombre      = $this->input->post('inputNombre');
        $inputDescripcion = $this->input->post('inputDescripcion');
        $inputidPolitica  = $this->input->post('id_politica');
//      $inputActiva      = $this->input->post('inputActiva');

        // Propiedades de horario
        $array_dias = array();
        $array_dias[] = $this->input->post('activo_do');
        $array_dias[] = $this->input->post('activo_lu');
        $array_dias[] = $this->input->post('activo_ma');
        $array_dias[] = $this->input->post('activo_mi');
        $array_dias[] = $this->input->post('activo_ju');
        $array_dias[] = $this->input->post('activo_vi');
        $array_dias[] = $this->input->post('activo_sa');
        $hr_desde = $this->input->post('hr_desde');
        $hr_hasta = $this->input->post('hr_hasta');

        // Convertir a null los inputs vacios
        switch ($this->input->post('tipo')){
            case 'bloqueo':
                $inputPrioridad = null;
                $inputBajada    = null;
                $inputSubida    = null;
            break;

            case 'limitacion':
                $inputPrioridad = null;
                $inputBajada    = is_numeric($this->input->post('inputBajada')) ? $this->input->post('inputBajada') : null;
                $inputSubida    = is_numeric($this->input->post('inputSubida')) ? $this->input->post('inputSubida') : null;
            break;

            case 'priorizacion':
                $inputPrioridad = is_numeric($this->input->post('inputPrioridad')) ? $this->input->post('inputPrioridad') : null;;
                $inputBajada    = null;
                $inputSubida    = null;
            break;
        }

        // Construyo array de horarios
        $horarios_politica = array();
        foreach ($array_dias as $num => $dia) {
            if (!is_null($dia)) {
                $horario = array(
                    'id_politica'   => $inputidPolitica,
                    'dia'           => $num+1,
                    'hora_inicial'  => $hr_desde,
                    'hora_fin'      => $hr_hasta
                );

                $horarios_politica[] = $horario;
            }
        }

        // Construyo array de datos de politica
        $politica = array(
            'nombre'           => $inputNombre,
            'descripcion'      => $inputDescripcion,
//          'activa'           => $inputActiva,
            'prioridad'        => $inputPrioridad,
            'velocidad_bajada' => $inputBajada,
            'velocidad_subida' => $inputSubida
        );

        // Actualizo horarios y datos de politica
        if($this->setear_horarios_politica($inputidPolitica, $horarios_politica) && $this->politicaM->actualizar($inputidPolitica, $politica))
            echo true;
        else
            echo false;
    }

    public function setear_horarios_politica($idPolitica, $horarios_politica) {
        // Limpia horarios y carga nuevamente, se detiene y devuelve false ante cualquier falla
        $this->rangoHorarioM->resetear($idPolitica);

        foreach($horarios_politica as $data){
            if (!$this->rangoHorarioM->setear($data))
                return false;
        }

        return true;
    }

	public function eliminar() {
        $id = $this->input->post('id');

        echo $this->politicaM->eliminar($id);
    }
}
?>
