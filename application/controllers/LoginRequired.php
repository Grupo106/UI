<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginRequired extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

        /* Si el usuario no inicio sesion, redirijo al sitio de login */
        if (!$this->session->has_userdata('loggedIn')) {
            $next = uri_string();
            redirect('/?next=/' . $next);
        }
    }
}
?>
