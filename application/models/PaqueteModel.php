<?php
class PaqueteModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function obtenerTotal($tipo, $desde, $hasta){

        $query = $this->db->query("select COALESCE( sum(bytes), 0 ) as total
                                    from paquetes where direccion=".$tipo." 
                                    and hora_captura >= '".$desde."' and hora_captura < '".$hasta."'");
        $result = $query->result();
        return $result[0]->total;
    }

}
?>