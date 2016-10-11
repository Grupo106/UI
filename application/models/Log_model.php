<?php
class Log_model extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }

    
    function insertarLog($data){

    $this->db->insert('logs',$data);
    if($this->db->affected_rows()>0){
            return true;
        } 
    return false;  

    }

	function obtenerLogInicio(){
		$query = $this->db->limit(5);
		$query = $this->db->order_by("id_log","DESC");
        $query = $this->db->get('logs');
        
        return $query->result_array();
    }

	function obtenerLog(){
        $query = $this->db->get('logs');
        
        return $query->result_array();
    }

}
?>