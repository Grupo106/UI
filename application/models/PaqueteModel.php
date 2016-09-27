<?php
class PaqueteModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function obtenerTotal($desde, $hasta, $rango){

        $query =    "SELECT
                      hora,
                      coalesce(bytes_bajada,0) AS bajada,
                      coalesce(bytes_subida,0) AS subida
                    FROM
                     generate_series(
                       '".$desde."'::timestamp,
                       '".$hasta."'::timestamp,
                       '1 ".$rango."') AS hora
                    LEFT OUTER JOIN
                      (SELECT
                         date_trunc('".$rango."', hora_captura) as hora_captura,
                         sum(bytes) as bytes_bajada
                       FROM paquetes
                       WHERE hora_captura >= '".$desde."' AND hora_captura < '".$hasta."' and direccion = 0
                       GROUP BY date_trunc('".$rango."',hora_captura)) datos_bajada
                    ON (date_trunc('".$rango."',hora) = datos_bajada.hora_captura) 
                    LEFT OUTER JOIN
                      (SELECT
                         date_trunc('".$rango."', hora_captura) as hora_captura,
                         sum(bytes) as bytes_subida
                       FROM paquetes
                       WHERE hora_captura >= '".$desde."' AND hora_captura < '".$hasta."' and direccion = 1
                       GROUP BY date_trunc('".$rango."',hora_captura)) datos_subida
                    ON (date_trunc('".$rango."',hora) = datos_subida.hora_captura)";

        $query = $this->db->query($query);
        return $query->result_array();
    }

    function obtenerFechaMinima(){
       $this->db->select_min('hora_captura');
       $query = $this->db->get('paquetes');
       return $query->result()[0];
    }

}
?>