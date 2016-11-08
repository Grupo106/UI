<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("LoginRequired.php");

include('application/libraries/ChromePhp.php');

class Politica extends LoginRequired {
	public function __construct() {
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('politicaM');
        $this->load->model('objetivoM');
        $this->load->model('claseModel');
        $this->load->model('rangoHorarioM');
        $this->load->model('log_model');
	}

    public function consulta() {
        $listapoliticas = $this->politicaM->obtener_politicas();

        $data = array(
            'politicas' => $listapoliticas
        );

        // Cargar vista
        $this->load->view('consultar-politicas', $data);
    }

    public function nueva() {
    	if(strcmp($this->session->rolUsuario, "Administrador") == 0) {
	        $data['listadoClasesO'] = $this->claseModel->obtenerPorGrupo('i');
            $data['listadoClasesD'] = $this->claseModel->obtenerPorGrupo('o');
            $data['listadoClasesOD'] = $this->claseModel->obtenerConOrigenYDestino();
	        $data['arp'] = $this->_arp();
	        $this->load->view('nueva-politica', $data);
        }
        	else
        		$this->load->view('errors/index.html');
    }

    public function eliminar() {
        if(strcmp($this->session->rolUsuario, "Administrador") == 0) {
            $id_politica = $this->input->post('id');
            $nombrePolitica = $this->politicaM->obtener_nombre_por_id($id_politica);

            // Si puedo eliminar los 3 componentes, ok
            if($this->politicaM->eliminar($id_politica)) {
            shell_exec('/usr/bin/sudo /usr/local/bin/despachar');
            $this->guardarEnLog(3, $nombrePolitica);

            return true;
            }

            else
                return false;
        }
        else
            $this->load->view('errors/index.html');
    }

    public function editar() {
    	if(strcmp($this->session->rolUsuario, "Administrador") == 0) {
	        $id_politica = $this->input->get('id_politica');

	        $data['politica']        = $this->politicaM->obtener_politicas_por_id($id_politica);
	        $data['listadoClasesO']  = $this->claseModel->obtenerPorGrupo('i');
            $data['listadoClasesD']  = $this->claseModel->obtenerPorGrupo('o');
            $data['listadoClasesOD'] = $this->claseModel->obtenerConOrigenYDestino();
	        $rango_horario 		     = $this->rangoHorarioM->obtener_horario_por_politica($id_politica);

	        $objetivos = $this->objetivoM->obtener_objetivo_por_politica($id_politica);

            // Cargo relaciones objetivo-clase
            foreach ($objetivos as $objetivo) {
                $set = $this->claseModel->obtener_por_id($objetivo['id_clase']);

                $clase = array(
                        'id_clase'    => $set[0]['id_clase'],
                        'nombre'      => $set[0]['nombre'],
                        'descripcion' => $set[0]['descripcion'],
                        'tipo'        => $set[0]['tipo']
                    );

                ChromePhp::log('proceso objetivo');
                ChromePhp::log($objetivo);

	            $objetivo['clase'] = $clase;

	            if($objetivo['tipo'] == 'd')
	                $relacionClasesD[] = $objetivo;
	            else
	                $relacionClasesO[] = $objetivo;
	        }

            // Verifico si esta asignada una unica clase origen y destino
            if ($this->esObjetivoOrigenDestino($relacionClasesD, $relacionClasesO)) {
                $relacionClasesOD[] = $relacionClasesD[0];
                $relacionClasesOD[] = $relacionClasesO[0];
                $data['relacionClasesOD'] = $relacionClasesOD;
            }

            else {
                $data['relacionClasesD'] = $relacionClasesD;
                $data['relacionClasesO'] = $relacionClasesO;
            }

            ChromePhp::log('relacionClasesOD');
            ChromePhp::log($data['relacionClasesOD']);
            ChromePhp::log('relacionClasesD');
            ChromePhp::log($data['relacionClasesD']);
            ChromePhp::log('relacionClasesO');
            ChromePhp::log($data['relacionClasesO']);

	        // Compacto array de horarios
	        foreach($rango_horario as $key => $item)
	        {
	           $arr[$item['hora_inicial']][$item['hora_fin']][$item['id_rango_horario']] = $item;
	        }
	        ksort($arr, SORT_NUMERIC);
	        $data['rango_horario'] = $arr;

	        // Calculo index para fila de dias
	        $index_dias = -1;
	        foreach ($arr as $fila) {
	            $index_dias+= count($fila);
	        }
	        $data['index_dias'] = $index_dias;
	        $data['arp'] = $this->_arp();

	        $this->load->view('editar-politica', $data);
        }
        else
        	$this->load->view('errors/index.html');
    }

    public function cambiar_estado() {
        $id_politica = $this->input->post('id_politica');
        $nombrePolitica = $this->politicaM->obtener_nombre_por_id($id_politica);

        echo $this->politicaM->alternar_estado($id_politica);
        $this->guardarEnLog(2, $inputNombre);
        shell_exec('/usr/bin/sudo /usr/local/bin/despachar');
    }

    public function guardar() {
        // Propiedades politica
        $inputidPolitica  = $this->input->post('id_politica');
        $inputNombre      = $this->input->post('inputNombre');
        $inputDescripcion = $this->input->post('inputDescripcion');
        $inputActiva      = $this->input->post('activa');

        $fl_politica_nueva = 0;

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

        // Construyo array de datos de politica
        $politica = array(
            'nombre'           => $inputNombre,
            'descripcion'      => $inputDescripcion,
            'prioridad'        => $inputPrioridad,
            'activa'           => $inputActiva,
            'velocidad_bajada' => $inputBajada,
            'velocidad_subida' => $inputSubida
        );

        // Hay que crear politica
        if($this->input->post('id_politica') == "x"){
            $inputidPolitica = $this->politicaM->crear($politica);
            $fl_politica_nueva++;
        }

        // Construyo array de horarios y horarios nuevos
        $horarios_politica = array();
        $horarios_politica_nue = array();
        $linea = 0;

        while($this->input->post('dias_cant') >= $linea) {
            $dia=1;

            // Si hay dias seleccionados y ha horarios validos
            if($this->verificarCargaHorario($this->input, $linea)) {
                for($dia; $dia<=7; $dia++) {
                    if (isset($_POST['activo_' . $dia . '_' . $linea])) {
                        $horario = array(
                            'id_politica'   => $inputidPolitica,
                            'dia'           => $dia,
                            'hora_inicial'  => $this->input->post('hr_desde_' . $linea),
                            'hora_fin'      => $this->input->post('hr_hasta_' . $linea)
                        );

                        $indice = $this->input->post('id_rango_horario_' . $dia . '_' . $linea);

                        // Franja horaria nueva
                        if(is_null($indice))
                            $horarios_politica_nue[] = $horario;
                        else
                            $horarios_politica[$indice] = $horario;
                    }
                }
            }

            $linea++;
        }

        // Obtengo ids de horarios validos para eliminar todos los otros en la db
        $horarios_finales = array_keys($horarios_politica);

        // Si se setea clase de tráfico internet y lan, omito agregado de origen y destino
        if (!empty($_POST['id_claseTraficoA']) && $this->input->post('id_claseTraficoA') != "") {
            $array_clases = array();

            $claseE = array(
                    'id_clase'          => $this->input->post('id_claseTraficoA'),
                    'tipo'              => 'e',
                    'direccion_fisica'  => null,
                    'id_politica'       => $inputidPolitica
                );

            $claseD = array(
                    'id_clase'          => $this->input->post('id_claseTraficoA'),
                    'tipo'              => 'd',
                    'direccion_fisica'  => null,
                    'id_politica'       => $inputidPolitica
                );

            $id_objetivoA_O = $this->input->post('id_objetivoA_O');
            $id_objetivoA_D = $this->input->post('id_objetivoA_D');

            $array_clases[($id_objetivoA_O == "") ? 'E' : $id_objetivoA_O] = $claseE;
            $array_clases[($id_objetivoA_D == "") ? 'D' : $id_objetivoA_D] = $claseD;
        }

        else {
            // Construyo array de clases Origen
            $array_clases = array();

            $i=0;
            while(isset($_POST['id_objetivoO_' . $i])) {
                $clase = array(
                        'id_clase'          => (($this->input->post('id_claseTraficoO_' . $i) == "") ? null : $this->input->post('id_claseTraficoO_' . $i)),
                        'tipo'              => 'e',
                        'direccion_fisica'  => ($this->validarMac($this->input->post('macO_' . $i)) ? $this->input->post('macO_' . $i) : null),
                        'id_politica'       => $inputidPolitica
                    );

                $id_objetivo = $this->input->post('id_objetivoO_' . $i);
                $array_clases[($id_objetivo == "") ? ('E' . $i) : $id_objetivo] = $clase;
                $i++;
                ChromePhp::log($clase);
            }

            // Construyo array de clases Destino
            $i=0;
            while(isset($_POST['id_objetivoD_' . $i])) {
                $clase = array(
                        'id_clase'          => (($this->input->post('id_claseTraficoD_' . $i) == "") ? null : $this->input->post('id_claseTraficoD_' . $i)),
                        'tipo'              => 'd',
                        'direccion_fisica'  => ($this->validarMac($this->input->post('macD_' . $i)) ? $this->input->post('macD_' . $i) : null),
                        'id_politica'       => $inputidPolitica
                    );

                $id_objetivo = $this->input->post('id_objetivoD_' . $i);
                $array_clases[($id_objetivo == "") ? ('D' . $i) : $id_objetivo] = $clase;
                $i++;
                ChromePhp::log($clase);
            }

            // Verifico si hay clases origen y destino a eliminar
            if($this->input->post('id_objetivoA_O') != '' || $this->input->post('id_objetivoA_D') != '') {
                $clase = array(
                        'id_clase'          => null,
                        'tipo'              => 'e',
                        'direccion_fisica'  => null,
                        'id_politica'       => $inputidPolitica
                    );

                $array_clases[$this->input->post('id_objetivoA_O')] = $clase;

                $clase = array(
                        'id_clase'          => null,
                        'tipo'              => 'd',
                        'direccion_fisica'  => null,
                        'id_politica'       => $inputidPolitica
                    );

                $array_clases[$this->input->post('id_objetivoA_D')] = $clase;
            }
        }


            ChromePhp::log('guardar array_clases');
            ChromePhp::log($array_clases);



        // Actualizo horarios y datos de politica
        // Si es nueva no necesito actualizar ni limpiar
        if($fl_politica_nueva) {
            if(
                $this->agregar_horarios_politica($horarios_politica_nue)
                && $this->registrar_objetivos($array_clases, !empty($_POST['id_claseTraficoA']))
              ) {
                shell_exec('/usr/bin/sudo /usr/local/bin/despachar');
                $this->guardarEnLog(1, $inputNombre);
                echo true;
            }
            else
                echo false;
        }

        // Politica ya existia, actualizar y limpiar
        else {
            ChromePhp::log('ya existe');
            if(
                $this->actualizar_horarios_politica($horarios_politica)
                && $this->limpiar_horarios_politica($inputidPolitica, $horarios_finales)
                && $this->agregar_horarios_politica($horarios_politica_nue)
                && $this->politicaM->actualizar($inputidPolitica, $politica)
                && $this->registrar_objetivos($array_clases, !empty($_POST['id_claseTraficoA']))
              ) {
                ChromePhp::log('ok');
                shell_exec('/usr/bin/sudo /usr/local/bin/despachar');
                $this->guardarEnLog(2, $inputNombre);
                echo true;
            }
            else
                echo false;
        }
    }

    public function actualizar_horarios_politica($horarios_politica) {
        foreach($horarios_politica as $id_rango_horario => $data){
            if (!$this->rangoHorarioM->actualizar($id_rango_horario, $data))
                return false;
        }

        ChromePhp::log('actualizar_horarios_politica ok');
        return true;
    }

    public function limpiar_horarios_politica($idPolitica, $horarios_finales) {
        if (sizeof($horarios_finales) > 0)
            $this->rangoHorarioM->eliminar_otros($idPolitica, $horarios_finales);

        ChromePhp::log('limpiar_horarios_politica ok');
        return true;
    }

    public function agregar_horarios_politica($horarios_politica_nue) {
        foreach($horarios_politica_nue as $data){
            if (!$this->rangoHorarioM->crear($data))
                return false;
        }

        ChromePhp::log('agregar_horarios_politica ok');
        return true;
    }

    public function registrar_objetivos($array, $fl_clase_ed) {
        $loop = 0;
        foreach($array as $id_objetivo => $data){

            ChromePhp::log('a registrar');
            ChromePhp::log($id_objetivo);
            ChromePhp::log($data);


            // Si es clase ED (con origen y destino)
            if ($fl_clase_ed && $loop++ == 0)
                $this->objetivoM->eliminar_por_politica($data['id_politica']);

            // Verifico si tengo que crear o actualizo
            if(strpos($id_objetivo, 'E') === 0 || strpos($id_objetivo, 'D') === 0) {
                if (!$this->objetivoM->crear($data))
                    return false;
            }

            elseif(intval($id_objetivo) > 0) {
                $this->objetivoM->actualizar($id_objetivo, $data);
            }

            // Verifico si elimino
            if(strpos($id_objetivo, '-') === 0)
                $this->objetivoM->eliminar_por_id(str_replace('-', '', $id_objetivo));
        }

        ChromePhp::log('registrar_objetivos ok');
        return true;
    }

    public function verificarCargaHorario($input, $linea) {
        // Devuelve true si horarios validos y algun dia seleccionado
        return
            $input->post('hr_desde_' . $linea) <> "-1" && $input->post('hr_hasta_' . $linea) <> "-1"
            &&
            (
                $input->post('activo_1_' . $linea)
                || $input->post('activo_2_' . $linea)
                || $input->post('activo_3_' . $linea)
                || $input->post('activo_4_' . $linea)
                || $input->post('activo_5_' . $linea)
                || $input->post('activo_6_' . $linea)
                || $input->post('activo_7_' . $linea)
            );
    }

    public function esObjetivoOrigenDestino($arrayClasesD, $arrayClasesO) {
        //   Devuelve true si la cantidad de clases de cada array es 1,
        // las clases son iguales y son origenYdestino
        return
            sizeof($arrayClasesO) == "1" && sizeof($arrayClasesD) == "1"
            &&
            $arrayClasesO[0]['id_clase'] == $arrayClasesD[0]['id_clase']
            &&
            $arrayClasesO[0]['id_clase'] != null && $arrayClasesD[0]['id_clase'] != null
            &&
            $this->claseModel->esClaseOrigenyDestino($arrayClasesO[0]['id_clase'])
            ;
    }

    public static function validarMac($mac) {
        return (preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $mac) == 1);
    }

    /**
    * Obtiene la lista de ip y mac address asociadas obtenidas a traves del
    * protocolo ARP.
    */
    private function _arp() {
        $output = shell_exec("/bin/ip neigh show | awk '/DELAY|REACHABLE|STALE/{print $5,$1}'");
        $arp = array();
        foreach(explode("\n", $output) as $line) {
            $item = explode(" ", $line);
            array_push($arp, array("mac" => $item[0], "ip" => $item[1]));
        }
        return $arp;
    }

    /**
    * Obtiene el nombre del host a partir de la ip.
    */
    public function obtener_nombre($ip) {
        $this->output->set_header("Content-Type: text/plain")
                     ->set_output(gethostbyaddr($ip));
    }

    public function guardarEnLog($accion, $nombrePolitica) {
        $username = $this->session->userUsuario;

        if($accion==1) {
            $data = array(
                'usuario'     => $username,
                'descripcion' => "Creación de política de tráfico " . $nombrePolitica . " por usuario ". $username
                );

            $this->log_model->insertarLog($data);
        }

        else if($accion==2) {
            $data = array(
                'usuario'     => $username,
                'descripcion' => "Actualización de política de tráfico " . $nombrePolitica . " por usuario " . $username
                );

            $this->log_model->insertarLog($data);
        }

        else if($accion==3) {
            $data = array(
                'usuario'     => $username,
                'descripcion' => "Se eliminó la política de tráfico " . $nombrePolitica . " por usuario " . $username);

            $this->log_model->insertarLog($data);
        }
    }
}
?>
