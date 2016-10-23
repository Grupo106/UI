<?php
class ClaseModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function obtenerTodos(){
        $this->db->order_by("nombre","asc");
        $query = $this->db->get('clase_trafico');
        return $query->result_array();
    }

    function obtenerPorGrupo($grupo){

        $grupoContrario = 'o';
        if($grupo=='o') $grupoContrario = 'i';

        $query1 = $this->getQueryPorGrupo($grupo);
        $query2 = $this->getQueryPorGrupo($grupoContrario);

        $query = $this->db->query($query1." EXCEPT ".$query2." ORDER BY nombre ASC");      
        return $query->result_array();
    }

    function obtenerConOrigenYDestino(){
        
        $query1 = $this->getQueryPorGrupo('o');
        $query2 = $this->getQueryPorGrupo('i');

        $query = $this->db->query($query1." INTERSECT ".$query2." ORDER BY nombre ASC");      
        return $query->result_array();
    }

    function getQueryPorGrupo($grupo){
        $this->db->select('clase_trafico.*');
        $this->db->from('clase_trafico'); 
        $this->db->join('clase_cidr', 'clase_cidr.id_clase=clase_trafico.id_clase');
        $this->db->where('clase_cidr.grupo',$grupo);
        $query1 = $this->db->get_compiled_select();

        $this->db->select('clase_trafico.*');
        $this->db->from('clase_trafico'); 
        $this->db->join('clase_puerto', 'clase_puerto.id_clase=clase_trafico.id_clase');
        $this->db->where('clase_puerto.grupo',$grupo);
        $query2 = $this->db->get_compiled_select();
        return "( ".$query1." UNION ".$query2." )";
    } 


    function insertar($data){
        $this->db->insert('clase_trafico',$data);
        if($this->db->affected_rows()>0){
            return $this->db->insert_id();  
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
        return $query->first_row();
    }

    function obtener_por_id($id){
        $this->db->where('id_clase', $id);
        $query = $this->db->get('clase_trafico');
        return $query->result_array();
    }

    function obtener_por_id_first_row($id){
        $this->db->where('id_clase', $id);
        $query = $this->db->get('clase_trafico');
        return $query->first_row();
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
