<?php
class CidrModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function insertar($data, $id_clase, $tipo){
        $this->db->insert('cidr',$data);
        if($this->db->affected_rows()>0){
            $id_cidr = $this->db->insert_id();  
            $data = array(
                'id_clase' => $id_clase,
                'id_cidr' => $id_cidr,
                'grupo' => $tipo
            );
            return $this->insertarClase($data);
        } 
        return false;
    }

    function insertarClase($data){
        $this->db->insert('clase_cidr',$data);
        if($this->db->affected_rows()>0){
            return $this->db->insert_id();  
        } 
        return false;
    }

    function actualizar($id,$data){
        $this->db->where('id_cidr', $id);
        $this->db->update('cidr', $data);  
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

    function eliminar($id){
        $this->db->where('id_cidr', $id);
        $this->db->delete('cidr');
        if($this->db->affected_rows()>0){
            return $this->eliminarClase($id);
        } 
        return false;
    }

    function eliminarClase($id){
        $this->db->where('id_cidr', $id);
        $this->db->delete('clase_cidr');
        if($this->db->affected_rows()>0){
            return true;
        } 
        return false;
    }

    function obtenerIDCidrPorClase($id_clase){
        $this->db->where('id_clase', $id_clase);
        $query = $this->db->get('clase_cidr');
        return $query->result();
    }
}
?>