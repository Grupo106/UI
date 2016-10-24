<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class PoliticaM extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }

    function obtener_politicas(){
        $query = $this->db->get('politica');
        
        return $query->result_array();
    }

    function obtener_politicas_por_id($id_politica){
        $this->db->where('id_politica', $id_politica);
        $query = $this->db->get('politica');
        
        return $query->result_array();
    }

    function obtener_nombre_por_id($id_politica){
        $this->db->select('nombre');
        $this->db->where('id_politica', $id_politica);
        $query = $this->db->get('politica');
        
        return $query->row('nombre');
    }

    function obtener_politicas_bloqueo(){
        $query = $this->db->get('v_politica_bloqueo');
        
        return $query->result_array();
    }

    function obtener_politicas_limitacion(){
        $query = $this->db->get('v_politica_limitacion');
        
        return $query->result_array();
    }

    function obtener_politicas_priorizacion(){
        $query = $this->db->get('v_politica_priorizacion');
        
        return $query->result_array();
    }

    function crear($data){
        $this->db->set('fc_creacion', 'NOW()', FALSE);
        $this->db->insert('politica',$data);

        if($this->db->affected_rows() > 0)
            return $this->db->insert_id();  
        else
            return false;
    }

    function actualizar($id_politica, $data){
        $this->db->where('id_politica', $id_politica);
        $this->db->update('politica', $data);  

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function alternar_estado($id_politica){
        $this->db->set('activa', 'CASE WHEN activa THEN false ELSE true END', FALSE);
        $this->db->where('id_politica', $id_politica);
        $this->db->update('politica'); 

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }

    function eliminar($id){
        $this->db->where('id_politica', $id);
        $this->db->delete('politica');

        if($this->db->affected_rows() > 0)
            return true;
        else
            return false;
    }
}
?>