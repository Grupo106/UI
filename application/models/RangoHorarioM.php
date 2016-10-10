<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class RangoHorarioM extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }

    function obtener_horario_por_politica($id_politica){
        $this->db->order_by("hora_inicial","desc");
        $this->db->order_by("hora_fin","desc");
        $this->db->order_by("dia","asc");
        $this->db->where('id_politica', $id_politica);
        $query = $this->db->get('rango_horario');
        
        return $query->result_array();
    }

    function crear($data){
        $this->db->insert('rango_horario',$data);

        if($this->db->affected_rows() > 0)
            return true;  
        else
            return false;
    }

    function resetear($idPolitica){
        // Borra los horarios de toda una politica para volver a cargar
        $this->db->where('id_politica', $idPolitica);
        $this->db->delete('rango_horario');
    }

    function setear($data){
        // Carga todos los horarios de la politica
        $this->db->insert('rango_horario', $data);

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function eliminar_otros($idPolitica, $horarios_finales){
        $this->db->where('id_politica', $idPolitica);
        $this->db->where_not_in('id_rango_horario', $horarios_finales);
        $this->db->delete('rango_horario');

        return true;
    }

    function eliminar_horario_por_politica($id_politica){
        $this->db->where('id_politica', $id_politica);
        $this->db->delete('rango_horario');

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function actualizar($id_rango_horario, $data){
        $this->db->where('id_rango_horario', $id_rango_horario);
        $this->db->update('rango_horario', $data);

        if($this->db->affected_rows()>0)
            return true;
        else
            return false;
    }
}
?>