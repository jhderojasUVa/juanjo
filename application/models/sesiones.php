<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
// Clase de calendario que hace todas las funciones para un calendario

class Sesiones extends CI_Model {
        
	function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this -> load -> database();
		$this->load->library('session');
    }
    
    function inicio() {
	    // Inicio y tal de la sesion por fastidiar
	    $session = array("idu" => 0);
		$this -> session -> set_userdata($session);
		return true;
    }
	
	function login($usuario, $password) {
		// Para entrar los usuarios
		// $usuario = login
		// $password = password
		$sql = "SELECT idu FROM usuarios WHERE login='".$usuario."' AND password='".$password."'";
		$login = $this -> db -> query($sql);
		if ($login -> num_rows()>0) {
			// El usuario existe
			$session = array("idu" => "1");
			$this -> session -> set_userdata($session);
			return 1;
		} else {
			// El usuario no existe
			$session = array("idu" => "0");
			$this -> session -> set_userdata($session);
			return 0;
		}
	}
	
}