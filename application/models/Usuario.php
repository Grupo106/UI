<?php
class Usuario_model extends CI_Model{
	
	// Cargar base
    function __construct(){
        $this->load->database();
    }



    // Obtener todas las reglas de la DB
    function obtener_usuarios(){
        $this->load->model('usuarios_model');
        $query = $this->db->get('usuarios');
        
        return $query->result_array();
    }


    function crear_usuario(){

        $usuario='admin';
        $password='123456';
        $nombre='juan';
        $apellido='rodriguez';
        $mail='jrodriguez@netcop.com';
        $rol='administrador';

    $data = array(
           'usuario' => $usuario,
           'password' => $password,           
           'nombre' => $nombre,
           'apellido' => $apellido,
           'mail' => $mail,          
           'rol' => $rol
            );

    $this->db->insert('usuarios',$data);
    $id = $this->db->insert_id();  
    }

}
?>