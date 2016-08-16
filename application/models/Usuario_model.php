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

    function insertar($data){
    $this->db->insert('usuarios',$data);
    if($this->db->affected_rows()>0){
            return true;
        } 
    return false;  

    }

    function actualizar($id,$data){
        $this->db->where('id_usu', $id);
        $this->db->update('usuarios', $data);  
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

    function eliminar($id){
        $this->db->where('id_usu', $id);
        $this->db->delete('usuarios');
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

}
?>