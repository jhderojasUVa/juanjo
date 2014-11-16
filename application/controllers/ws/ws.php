<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ws extends CI_Controller {

	/**
	 * Pagina principal
	 * Web Services
	 *
	 * Recordad TODO por POST, salvo lo que se haga por get, que entonces por GET
	 *
	 * Respondemos en JSON
	 */
	
	public function __construct() {
        // Call the Model constructor
        parent::__construct();
		// Necesarios
		$this -> load -> database();
		$this->load->helper("url");
		$this->load->library('session');
		// Modelos
		$this -> load -> model("menu");
		$this -> load -> model("frases");
		$this -> load -> model("sesiones");
		$this -> load -> model("precio");
    }
	
	public function add_plato_menu() {
		// Funcion para añadir un plato al menu
		$logeado = $this -> session -> userdata("idu");
		
		if ($logeado==1){
			// Primero pillamos los datos necesarios
			$idplato = $this -> input -> post("idplato");
			$fecha = $this -> input -> post("fecha");
			$posicion = $this -> input -> post("posicion");
			$this -> menu -> add_plato_menu ($idplato, $fecha, $posicion);
			// Recordar que hay que usar el name del iframe para enviarselo
		}
	}
	
	public function del_plato_menu() {
		// Funcion para quitar platos del menu
		$logeado = $this -> session -> userdata("idu");
		
		if ($logeado==1){
			// Primero pillamos los datos necesarios
			$idplato = $this -> input -> post("idplato");
			$fecha = $this -> input -> post("fecha");
			$posicion = $this -> input -> post("posicion");
			$this -> menu -> borra_plato_menu ($idplato, $fecha, $posicion);
			// Recordar que hay que usar el name del iframe para enviarselo
		}
	}
	
	public function recargar_menu() {
		// Funcion para recargar el menu
		$logeado = $this -> session -> userdata("idu");
		
		if ($logeado==1){
			$fecha = $this -> input -> get("fecha");
			$datos["menu"] = $this -> menu -> ver_menu($fecha);
			// Esto sobra
			//$datos["platos"] = $this -> menu -> ver_platos();
			$this -> load -> view("ws/menu.php");
		}
	}
	
	public function recargar_platos() {
		// Funcion para recargar los platos
		$logeado = $this -> session -> userdate("idu");
		
		if ($logeado==1) {
			$datos["platos"] = $this -> menu -> ver_platos();
			$this -> load -> view("ws/platos.php");
		}
	}
	
	public function show_menu_json() {
		// Funcion que envia el menu por json por si alguien, algun dia, quiere explotarlo para una
		// App movil o algo
		
		// Pillamos por POST la fecha en formato Y-M-d
		$fecha = $this -> input -> post("fecha");
		// Si no hay fecha, cogemos hoy
		if (!$fecha) {
			$menu = $this -> menu -> ver_ultimo_menu();
		} else {
			$menu = $this -> menu -> ver_menu_fecha($fecha);
		}
		// Escupimos el resultado y que el cliente se encarge del resto de cosas
		$this -> output -> set_content_type("application/json");
		$this -> output -> set_output (json_encode($menu));
	}
	
}