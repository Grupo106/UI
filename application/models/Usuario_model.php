<?php
class Usuario_model extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }



    // Obtener todas las reglas de la DB
    function obtener_usuarios(){

        $query = $this->db->get('usuarios');
        
        return $query->result_array();
    }


    function obtener_usuarios_porId($id){

        $this->db->where('id_usu',$id);
        $query = $this->db->get('usuarios');
        return $query->first_row();
    }

    function crear_usuario($data){

    $this->db->insert('usuarios',$data);
    $id = $this->db->insert_id();  

    }

}
?>