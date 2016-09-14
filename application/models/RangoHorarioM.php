<?php
class RangoHorarioM extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }

    function obtener_horario_por_politica($id_politica){
        $this->db->where('id_politica', $id_politica);
        $query = $this->db->get('rango_horario');
        
        return $query->result_array();
    }

    function crear($data){
        $this->db->insert('rango_horario',$data);

        if($this->db->affected_rows() > 0)
            return $this->db->insert_id();  
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

    function eliminar($id_rango_horario){
        $this->db->where('id_rango_horario', $id_rango_horario);
        $this->db->delete('rango_horario');

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
}
?>