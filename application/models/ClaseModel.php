<?php
class ClaseModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function obtenerTodos(){
        $query = $this->db->get('clase_trafico');
        return $query->result_array();
    }

    function insertar($data){
        $this->db->insert('clase_trafico',$data);
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

    function actualizar($id,$data){
        $this->db->where('id_clase', $id);
        $this->db->update('clase_trafico', $data);  
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

    function obtener($id){
        $this->db->where('id_clase', $id);
        $query = $this->db->get('clase_trafico');
        return $query->result();
    }

    function eliminar($id){
        $this->db->where('id_clase', $id);
        $this->db->delete('clase_trafico');
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }
}
?>