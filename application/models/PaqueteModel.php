<?php
class PaqueteModel extends CI_Model{
	
    function __construct(){
        $this->load->database();
    }

    function obtenerTotal($desde, $hasta){

        $query =    "SELECT
                      hora,
                      coalesce(bytes_bajada,0) AS bajada,
                      coalesce(bytes_subida,0) AS subida
                    FROM
                     generate_series(
                       '".$desde."'::timestamp,
                       '".$hasta."'::timestamp,
                       '1 second') AS hora
                    LEFT OUTER JOIN
                      (SELECT
                         date_trunc('second', hora_captura) as hora_captura,
                         sum(bytes) as bytes_bajada
                       FROM paquetes
                       WHERE hora_captura >= '".$desde."' AND hora_captura < '".$hasta."' and direccion = 0
                       GROUP BY date_trunc('second',hora_captura)) datos_bajada
                    ON (hora = datos_bajada.hora_captura) 
                    LEFT OUTER JOIN
                      (SELECT
                         date_trunc('second', hora_captura) as hora_captura,
                         sum(bytes) as bytes_subida
                       FROM paquetes
                       WHERE hora_captura >= '".$desde."' AND hora_captura < '".$hasta."' and direccion = 1
                       GROUP BY date_trunc('second',hora_captura)) datos_subida
                    ON (hora = datos_subida.hora_captura)";

        $query = $this->db->query($query);
        return $query->result_array();
    }

}
?>