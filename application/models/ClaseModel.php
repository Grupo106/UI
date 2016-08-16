<?php
class ClaseModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function obtenerTodos(){
        $txtQuery = "select ct.id_clase, ct.nombre, ct.tipo, ct.activa, 
            c.direccion as direccion_o, c.prefijo as prefijo_o, p.numero as puerto_o, p.protocolo as protocolo_o,
            ci.direccion as direccion_i, ci.prefijo as prefijo_i, pi.numero as puerto_i, pi.protocolo as protocolo_i
            from clase_trafico ct
            left join clase_cidr cc on cc.id_clase = ct.id_clase and cc.grupo = 'o'
            left join cidr c on c.id_cidr = cc.id_cidr
            left join clase_puerto cp on cp.id_clase = ct.id_clase and cp.grupo = 'o'
            left join puerto p on p.id_puerto = cp.id_puerto
            left join clase_cidr cci on cci.id_clase = ct.id_clase and cci.grupo = 'i'
            left join cidr ci on ci.id_cidr = cci.id_cidr
            left join clase_puerto cpi on cpi.id_clase = ct.id_clase and cpi.grupo = 'i'
            left join puerto pi on pi.id_puerto = cpi.id_puerto
            order by ct.id_clase desc";
        $query = $this->db->query($txtQuery);
        return $query->result();
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
        $txtQuery = "select ct.id_clase, ct.nombre, ct.descripcion, ct.activa, 
        c.id_cidr as id_cidr_o, c.direccion as direccion_o, c.prefijo as prefijo_o, 
        p.id_puerto as id_puerto_o, p.numero as puerto_o, p.protocolo as protocolo_o,
        ci.id_cidr as id_cidr_i, ci.direccion as direccion_i, ci.prefijo as prefijo_i, 
        pi.id_puerto as id_puerto_i, pi.numero as puerto_i, pi.protocolo as protocolo_i
        from clase_trafico ct
        left join clase_cidr cc on cc.id_clase = ct.id_clase and cc.grupo = 'o'
        left join cidr c on c.id_cidr = cc.id_cidr
        left join clase_puerto cp on cp.id_clase = ct.id_clase and cp.grupo = 'o'
        left join puerto p on p.id_puerto = cp.id_puerto
        left join clase_cidr cci on cci.id_clase = ct.id_clase and cci.grupo = 'i'
        left join cidr ci on ci.id_cidr = cci.id_cidr
        left join clase_puerto cpi on cpi.id_clase = ct.id_clase and cpi.grupo = 'i'
        left join puerto pi on pi.id_puerto = cpi.id_puerto
        where ct.id_clase = ". $id;
        $query = $this->db->query($txtQuery);
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