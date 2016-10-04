<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("LoginRequired.php");

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('usuario_model');
    }
    
    /**
    * Sanitiza el path pasado por parametro para una redireccion segura
    */
    public function sanitizar_path($path = '/') {
        $path = $path ? $path : '/';
        return preg_match('/^\/(\w+\/?)*$/', $path) ? $path : '/';
    }

    public function autenticar() {
        session_start();
        $user = $this->input->post('login-usuario');
        $pass = $this->input->post('login-password');
        $next = $this->sanitizar_path($this->input->post('next'));

        $userLoggedIn = $this->usuario_model->obtener_usuario_login($user,
                                                                    $pass);
        if($userLoggedIn) {
            $this->session->set_userdata($userLoggedIn);
            $this->session->set_userdata('loggedIn', true);
            redirect($next);
        } else {
            $this->load->view("login", array('next' => $next,
                                             'error' => TRUE));
        }
    }

    public function index() {
        /* Si no existe ningun usuario, carga el asistente de instalacion */
        $anyuser = $this->usuario_model->existe_usuarios();  
        if (!$anyuser) {
            $this->load->view("asistente-inicio");
        }

        /* Si no hay usuario logueado, muestra formulario de login */
        elseif (!$this->session->has_userdata('loggedIn')) {
            $next = $this->sanitizar_path($this->input->get('next'));
            $this->load->view("login", array('next' => $next));
        }

        /* Si hay usuario logueado, Muestra la pagina de inicio */
        else {
            $this->load->view("estructura/header.php");
            $this->load->view("estructura/menu.php",
                              array('section' => 'inicio'));
            $this->load->view("inicio");
        }
    }

    public function desloguearse() {
        session_destroy();
        redirect("/");
    }
}
?>
