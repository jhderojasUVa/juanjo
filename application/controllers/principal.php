<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

	/**
	 * Pagina principal
	 */
	
	public function __construct() {
        // Call the Model constructor
        parent::__construct();
		// Necesarios
		$this -> load -> database();
		$this->load->helper("url");
		// Modelos
		$this -> load -> model("menu");
		$this -> load -> model("frases");
		$this -> load -> model("precio");
    }
	
	 
	public function index()	{
		// Landing page
		// Preguntamos por una frase aleatoria
		$datos["texto"] = $this -> frases -> ver_frase_aleatoria();
		$this -> load -> view("inicio", $datos);
	}
	
	public function donde() {
		// Pagina de "Donde estamos"
		$this -> load -> view("donde");
	}
	
	public function menu() {
		// Menu
		$datos["menu"] = $this -> menu -> ver_ultimo_menu();
		$datos["precio"] = $this -> precio -> ver_precio();
		$this -> load -> view("menu", $datos);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */