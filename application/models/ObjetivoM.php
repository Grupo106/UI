<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class ObjetivoM extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }

    function obtener_objetivo_por_id($id_objetivo){
        $this->db->where('id_objetivo', $id_objetivo);
        $query = $this->db->get('objetivo');
        
        return $query->result_array();
    }

    function obtener_objetivo_por_politica($id_politica){
        $this->db->where('id_politica', $id_politica);
        $query = $this->db->get('objetivo');
        
        return $query->result_array();
    }

    function crear($data){
        $this->db->insert('objetivo',$data);

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function actualizar($id_objetivo, $data){
        $this->db->where('id_objetivo', $id_objetivo);
        $this->db->update('objetivo', $data);  

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function eliminar_por_id($id_objetivo){
        $this->db->where('id_objetivo', $id_objetivo);
        $this->db->delete('objetivo');

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function eliminar_otros_id($id_politica, $array_objetivos){
        $this->db->where('id_politica', $id_politica);

        ChromePhp::log($array_objetivos);
        
        $this->db->where_not_in('id_objetivo', $array_objetivos);

        $this->db->delete('objetivo');

        return true;
    }

    function eliminar_por_politica($id_politica){
        $this->db->where('id_politica', $id_politica);
        $this->db->delete('objetivo');

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
}
?>