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

    function existe_usuarios(){

        $query = $this->db->get('usuarios');
        
        if($query->num_rows() > 0) {
            return true;
        }
        return false;
    }

    function existeNombreUsuario($userName) {

      $this->db->where('usuario',$userName);
      $query = $this->db->get('usuarios');
      if($query->num_rows() > 0) {
            return true;
        }
      return false;
    }


    function obtener_usuarios_porId($id){

        $this->db->where('id_usu',$id);
        $query = $this->db->get('usuarios');
        return $query->first_row();
    }

    function obtener_usuario_login($user, $pass){

        $this->db->where('usuario',$user);
        //$this->db->where('password',$pass);
        $query = $this->db->get('usuarios');
        $password_db = $query->result();
        $pass_db = $password_db[0]->password;
        $securePassword = $this->generateHash($pass, $pass_db);
        
         $this->db->where('usuario',$user);
         $this->db->where('password',$securePassword);
         $query = $this->db->get('usuarios');
         $datos = $query->result();

        if($datos){
            $data['idUsuario']= $datos[0]->id_usu;
            $data['nombreUsuario']= $datos[0]->nombre;
            $data['apellidoUsuario']= $datos[0]->apellido;
            $data['rolUsuario']= $datos[0]->rol;
            $data['mailUsuario']= $datos[0]->mail;
            $data['userUsuario']= $datos[0]->usuario;
            $data['passUsuario']= $datos[0]->password;
            return $data;
        }
        else {
            return null; 
        }
    }


    function insertar($data){

    $this->db->insert('usuarios',$data);
    if($this->db->affected_rows()>0){
            
             /*$data1 = array('usuario' => $this->session->userUsuario, 
                    'descripcion' => "Creación de usuario ".$data['usuario']." por usuario ".$this->session->userUsuario);
             $this->db->insert('logs',$data1);*/
            return true;
        } 
    return false;  

    }

    function actualizar($id,$data){
        $this->db->where('id_usu', $id);
        $this->db->update('usuarios', $data);  
        if($this->db->affected_rows()>0){

           /*  $data1 = array('usuario' => $this->session->userUsuario, 
                    'descripcion' => "Actualización de usuario con ID ".$id." por usuario ".$this->session->userUsuario);
             $this->db->insert('logs',$data1);*/
            return true;
        } 
        return false;
    }

    function eliminar($id){
        $this->db->where('id_usu', $id);
        $this->db->delete('usuarios');
        if($this->db->affected_rows()>0){
             /*   $data1 = array('usuario' => $this->session->userUsuario, 
                    'descripcion' => "Eliminación de usuario con ID ".$id." por usuario ".$this->session->userUsuario);
             $this->db->insert('logs',$data1);*/
            return true;
        } 
        return false;
    }



    public function generateHash($plainText, $salt = null)
    {
        if ($salt == null)
        { $salt = substr(md5(uniqid(rand(), true)), 0, 10);}
        else
        { $salt = substr($salt, 0, 10); }

        return $salt . sha1($salt . $plainText);
    }

   /* public function generateHash($plainText, $salt = null)
    {
        if ($salt === null)
        { $salt = substr(md5(uniqid(rand(), true)), 0, 10);}
        else
        { $salt = substr($salt, 0, 10); }

        return $salt . sha1($salt . $plainText);
    }
    */
}
?>