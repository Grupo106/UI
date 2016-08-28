<?php
class PoliticaM extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }

    // Obtener todas las politicas de la DB
    function obtener_politicas(){
        $query = $this->db->get('politica');
        
        return $query->result_array();
    }
}
?>