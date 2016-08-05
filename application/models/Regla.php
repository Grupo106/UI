<?php
class Regla extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }

    // Obtener todas las reglas de la DB
    function obtener_reglas(){
        $query = $this->db->get('reglas');
        
        return $query->result_array();
    }
}
?>