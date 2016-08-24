<?php
class PuertoModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function insertar($data, $id_clase, $tipo){
        $this->db->insert('puerto',$data);
        if($this->db->affected_rows()>0){
            $id_puerto = $this->db->insert_id();
            $data = array(
                'id_clase' => $id_clase,
                'id_puerto' => $id_puerto,
                'grupo' => $tipo
            );  
            return $this->insertarClase($data);
        } 
        return false;
    }

    function insertarClase($data){
        $this->db->insert('clase_puerto',$data);
        if($this->db->affected_rows()>0){
            return $this->db->insert_id();  
        } 
        return false;
    }

    function actualizar($id,$data){
        $this->db->where('id_puerto', $id);
        $this->db->update('puerto', $data);  
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

    function eliminar($id){
        $this->db->where('id_puerto', $id);
        $this->db->delete('puerto');
        if($this->db->affected_rows()>0){
            return $this->eliminarClase($id);
        } 
        return false;
    }

    function eliminarClase($id){
        $this->db->where('id_puerto', $id);
        $this->db->delete('clase_puerto');
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

    function obtenerIDPuertosPorClase($id_clase){
        $this->db->where('id_clase', $id_clase);
        $query = $this->db->get('clase_puerto');
        return $query->result();
    }

    function obtener($id_clase, $grupo){
        $this->db->select('*');
        $this->db->from('clase_puerto'); 
        $this->db->join('puerto', 'puerto.id_puerto=clase_puerto.id_puerto');
        $this->db->where('clase_puerto.id_clase',$id_clase);
        $this->db->where('clase_puerto.grupo',$grupo);
        $this->db->order_by('puerto.id_puerto','asc');         
        $query = $this->db->get(); 
        return $query->result_array();
    }
}
?>