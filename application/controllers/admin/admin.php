<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Pagina principal
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
	
	 
	public function index()	{
		// Pagina de login
		// Iniciamos la sesion y la recuperamos, por si acaso
		$this -> sesiones -> inicio();
		$logeado = $this -> session -> userdata("idu");
		
		// Recuperamos los datos
		$usuario = $this -> input -> post("usuario");
		$password = $this -> input -> post("password");
		
		$datos["error"] = "";
		if ($usuario=="" && $password =="" && $logeado==0) {
			// Si entra de nuevas
			$this -> load -> view("admin/login", $datos);
		} else if ($usuario=="" && $password =="" && $logeado==1) {
			// Viene de antes
			$this -> load -> view("admin/ok");
		} else {
			// Si ha enviado algo
			// Comprobamos el usuario y contraseña
			$this -> sesiones -> login($usuario, $password);
			$logeado = $this -> session -> userdata("idu");
			if ($logeado==1) {
				// Si el login es correcto
				// Leemos el menu para enviarlo
				
				$this -> load -> view("admin/ok",$datos);
			} else {
				// Si es falso
				$datos["error"] = "Usuario o contrase&ntilde;a incorrectos";
				$this -> load -> view("admin/login", $datos);
			}
		}
	}
	
	/*
	*
	*
	*
	*	De aqui en adelante van todo lo relacionado con los platos
	*
	*
	*	Todas las acciones que se pueden hacer en el menu de platos
	*
	*
	*
	*/
	
	/*
	/* Acciones para PLATOS
	/*
	*/
	
	public function platos() {
		// Pagina de platos
		$datos["error"] = "";
		$datos["opcion"] = 0;
		
		// Cargamos la opcion
		$datos["opcion"] = $this -> input -> get("opcion");
		// Nos traemos la sesion
		$logeado = $this -> session -> userdata("idu");
		// Lo primero es ver si esta autentificado, sino, a la mierda que va
		if ($logeado==1 && $datos["opcion"]==0) {
			$datos["menu_hoy"] = $this -> menu -> ver_ultimo_menu();
			// Si esta logeado
			$this -> load -> view("admin/platos",$datos);
		} else if ($logeado==1 && $datos["opcion"]==1) {
			// Quiere añadir un plato
			$this -> load -> view("admin/platos",$datos);
		} else if ($logeado==1 && $datos["opcion"]==2) {
			// Quiere ver todos los platos
			$datos["platos"] = $this -> menu -> ver_platos();
			$this -> load -> view("admin/platos",$datos);
		} else {
			// Si no esta logeado
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	public function plato_add() {
		// Pagina para añadir platos
		
		// Primero ver si esta logeado y tal
		// Nos traemos la sesion
		$logeado = $this -> session -> userdata("idu");
		$add = $this -> input -> post("add");
		if ($logeado == 1 && $add == 1) {
			// Recogemos todos los datos
			$plato = $this -> input -> post("plato");
			$vegetariano = $this -> input -> post("vegetariano");
				if ($vegetariano=="") { $vegetariano = 0; }
			$de_regimen = $this -> input -> post("de_regimen");
				if ($de_regimen =="") { $de_regimen =0; }
 			$calorias = $this -> input -> post("calorias");
			$hidratos = $this -> input -> post("hidratos");
			
			// Y a la base de datos
			$this -> menu -> add_plato($plato, $vegetariano, $de_regimen, $calorias, $hidratos);
			// Le enviamos a la principal de los platos
			$datos["platos"] = $this -> menu -> ver_platos();
			$this -> load -> view("admin/platos", $datos);
		} else {
			// Si no esta logeado
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	public function plato_modificar() {
		// Pagina para modificar un plato
		$datos["error"] = "";
		$mofidicar = 0;
		$modificar = $this -> input -> post("modificar");
		// Nos traemos la sesion
		$logeado = $this -> session -> userdata("idu");
		
		if ($logeado==1 && $modificar==0) {
			// Acaba de entrar, hay que mostrarle el plato
			$idplato = $this -> input -> get("id");
			$datos["platos"] = $this -> menu -> ver_un_plato($idplato);
			$this -> load -> view("admin/plato_editar", $datos);
		} else if ($logeado==1 && $modificar==1) {
			// Ha modificado cosas, hay que actualizar
			// Leemos los datos del palto
			$idplato = $this -> input -> post("id");
			$plato = $this -> input -> post("plato");
			$vegetariano = $this -> input -> post("vegetariano");
				if ($vegetariano=="") { $vegetariano = 0; }
			$de_regimen = $this -> input -> post("de_regimen");
				if ($de_regimen =="") { $de_regimen =0; }
			$calorias = $this -> input -> post("calorias");
			$hidratos = $this -> input -> post("hidratos");
			// Lo modificamos
			$this -> menu -> modifica_plato($idplato, $plato, $vegetariano, $de_regimen, $calorias, $hidratos);
			// Le enviamos a la principal de los platos
			$datos["platos"] = $this -> menu -> ver_platos();
			$this -> load -> view("admin/platos", $datos);
		} else {
			// Viene de la calle, a la calle que va
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	public function plato_borrar() {
		// Pagina que muestra todos los platos
		$datos["error"] = "";
		$borrar = 0;
		$borrar = $this -> input -> post("borrar");
		// Nos traemos la sesion
		$logeado = $this -> session -> userdata("idu");
		
		if ($logeado==1 && $borrar==0) {
			// Mostramos el plato con la advertencia
			// Pillamos el ID
			$idplato = $this -> input -> get("id");
			$datos["platos"] = $this -> menu -> ver_un_plato($idplato);
			$this -> load -> view("admin/plato_borrar", $datos);
		} else if ($logeado==1 && $borrar==1) {
			// Pues lo quiere borrar... luego que no diga
			$idplato  = $this -> input -> post("id");
			// Borramos
			$this -> menu -> borra_plato ($idplato);
			// Le enviamos al generico y tal
			$datos["platos"] = $this -> menu -> ver_platos();
			$this -> load -> view("admin/platos",$datos);
		} else {
			// Si no esta logeado
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	/*
	/* Acciones para FRASES
	/*
	*/
	
	public function frases() {
		// Funcion para las frases, la generica
		// Pagina de platos
		$datos["error"] = "";
		$datos["opcion"] = 0;
		
		// Cargamos la opcion
		$datos["opcion"] = $this -> input -> get("opcion");
		// Nos traemos la sesion
		$logeado = $this -> session -> userdata("idu");
		// Lo primero es ver si esta autentificado, sino, a la mierda que va
		if ($logeado==1 && $datos["opcion"]==0) {
			// Si esta logeado
			$this -> load -> view("admin/frases",$datos);
		} else if ($logeado==1 && $datos["opcion"]==1) {
			// Quiere añadir un plato
			$this -> load -> view("admin/frases",$datos);
		} else if ($logeado==1 && $datos["opcion"]==2) {
			// Quiere ver todos los platos
			$datos["frases"] = $this -> frases -> ver_todas_frases();
			$this -> load -> view("admin/frases",$datos);
		} else {
			// Si no esta logeado
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	public function frase_add() {
		// Funcion para añadir una frase
		// Primero la sesion, siempre
		$logeado = $this -> session -> userdata("idu");
		$add=0;
		$add = $this -> input -> post("add");
		if ($logeado==1 && $add==1) {
			// Si esta logeado y quiere añadir
			$texto = $this -> input -> post("frase");
			$this -> frases -> add_frase($texto);
			$datos["frases"] = $this -> frases -> ver_todas_frases();
			$this -> load -> view("admin/frases",$datos);
		} else {
			// Si viene de la calle
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	public function frase_borrar() {
		// Funcion para borrar una frase
		
		$borrar = 0;
		$borrar = $this -> input -> post("borrar");
		// Nos traemos la sesion
		$logeado = $this -> session -> userdata("idu");
		if ($logeado==1 && $borrar==0) {
			// Viene de nuevas
			$idfrase = $this -> input -> get("id");
			$datos["frase"] = $this -> frases -> ver_frase($idfrase);
			$this -> load -> view("admin/frases_borrar", $datos);
		} else if ($logeado==1 && $borrar==1) {
			// Va a borrar
			$idfrase = $this -> input -> post("idfrase");
			$this -> frases -> del_frase($idfrase);
			$datos["frases"] = $this -> frases -> ver_todas_frases();
			$this -> load -> view("admin/frases",$datos);
		} else {
			// Se quiere colar
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	public function frase_modificar() {
		// Funcion para modificar una frase
		$logeado = $this -> session -> userdata("idu");
		$modificar = 0;
		$modificar = $this -> input -> post("modificar");
		
		if ($logeado==1 && $modificar==0) {
			// Quiere ver el continencio
			$idfrase = $this -> input -> get("id");
			$datos["frase"] = $this -> frases -> ver_frase($idfrase);
			$this -> load -> view("admin/frases_modificar", $datos);
		} else if ($logeado==1 && $modificar==1) {
			// La modifica con lo que leemos lo que manda
			$idfrase = $this -> input -> post("idfrase");
			$texto = $this -> input -> post("frase");
			$this -> frases -> modificar_frase($idfrase, $texto);
			$datos["frases"] = $this -> frases -> ver_todas_frases();
			$this -> load -> view("admin/frases",$datos);
		} else {
			// Viene de la calle o caduco la sesion
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	/*
	/* Acciones para PRECIO
	/*
	*/
	
	public function precios() {
		// Funcion para modificar el precio
		$logeado = $this -> session -> userdata("idu");
		$modificar = 0;
		$modificar = $this -> input -> post("modificar");
		
		if ($logeado==1 && $modificar==0) {
			// Si acaba de entrar
			$datos["precio"] = $this -> precio -> ver_precio();
			$this -> load -> view("admin/precio",$datos);
		} else if ($logeado==1 && $modificar==1) {
			// Si lo hay que modificar
			$precio = $this -> input -> post("precio");
			$this -> precio -> cambiar_precio($precio);
			$datos["precio"] = $precio;
			$this -> load -> view("admin/precio",$datos);
		} else {
			// Si viene de la calle
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	/*
	/* Acciones para MENU
	/*
	*/
	
	public function menu() {
		// Funcion generica para menu
		$datos["error"] = "";
		$datos["opcion"] = 0;
		// Cargamos la opcion
		$datos["opcion"] = $this -> input -> get("opcion");
		if (!$datos["opcion"]) {
			$datos["opcion"]=0;
		}
		// Nos traemos la sesion
		$logeado = $this -> session -> userdata("idu");
		// Lo primero es ver si esta autentificado, sino, a la mierda que va
		if ($logeado==1 && $datos["opcion"]==0) {
			// Si esta logeado
			// Esta es la opcion por defecto con lo que mostramos el menu de hoy
			$datos["menu_hoy"] = $this -> menu -> ver_ultimo_menu();
			$this -> load -> view("admin/menu",$datos);
		} else if ($logeado==1 && $datos["opcion"]==1) {
			// Quiere añadir un menu
			$this -> load -> view("admin/menu_add", $datos);
		} else if ($logeado==1 && $datos["opcion"]==2) {
			// Quiere ver un menu
			if (!isset($fecha)) {
				$datos["fecha"] = date("m-d-Y");
			}
			$this -> load -> view("admin/menu_vista",$datos);
		} else {
			// Si no esta logeado
			$this -> load -> view("admin/login", $datos);
		}
	}
	
	public function menu_vista() {
		// Funcion para ver un menu
		// Necesario la fecha, obviamente
		$datos["error"] = "";
		$datos["opcion"] = 0;
		$logeado = $this -> session -> userdata("idu");
		if ($logeado==1) {
			// Pillamos la fecha
			$datos["fecha"] = $this -> input -> post("ano") . "-" . $this -> input -> post("mes") . "-" . $this -> input -> post("dia");
			$datos["menu"] = $this -> menu -> ver_menu($datos["fecha"]);
			$this -> load ->  view("admin/menu_vista",$datos);
		} else {
			// No esta logeado
			$this -> load -> view("admin/login",$datos);
		}
	}
	
	public function menu_add() {
		// Funcion para añadir platos a un menu a una fecha
		// Nos traemos la sesion
		$datos["error"] = "";
		$datos["opcion"] = 0;
		$logeado = $this -> session -> userdata("idu");
		// Lo primero es ver si esta autentificado, sino, a la mierda que va
		if ($logeado==1 && $datos["opcion"]==0) {
			// Tomamos los datos
			$add = $this -> input -> post("add");
			$plato = $this -> input -> post("plato");
			$descripcion_plato = $this -> input -> post("descripcion");
			$orden = $this -> input -> post("posicion");
			$hidratos = $this -> input -> post("hidratos");
			$vegetariano = $this -> input -> post("vegetariano");
			if ($vegetariano!=1) { $vegetariano=0; }
			$calorias = $this -> input -> post("calorias");
			$fecha = $this -> input -> post("ano")."-".$this -> input -> post("mes")."-".$this -> input -> post("dia");
			if ($add==1) {
				// BIEN
				$this -> menu -> add_platomenu($plato, $descripcion_plato, $orden, $hidratos, $vegetariano, $calorias, $fecha);
				$this -> load -> view("admin/ok");
			} else {
				// NO!
			}
		} else {
			// No esta logeado
			$this -> load -> view("admin/login",$datos);
		}
	}
	
	public function menu_del() {
		// Funcion para eliminar un menu concreto
		// Lo primero es ver si esta autentificado, sino, a la mierda que va
		$datos["error"] = "";
		$datos["opcion"] = 0;
		$logeado = $this -> session -> userdata("idu");
		if ($logeado==1) {
			// Pillamos el idplato
			$idplato = $this -> input -> get("id");
			$ok = $this -> input -> get("ok");
			$fecha = $this -> input -> get("fecha");
			
			$datos["fecha"]=$fecha;
			if ($ok==1) {
				// Eliminamos
				$this -> menu -> del_platomenu($idplato);
				// Capturamos los datos para volver a sacar todo de forma correcta
				$datos["menu"] = $this -> menu -> ver_menu($datos["fecha"]);
				$datos["fecha"] = $fecha;
				$this -> load -> view("admin/menu_vista",$datos);
			}
		} else {
			// No esta logeado
			$this -> load -> view("admin/login",$datos);
		}
	}
	
	public function menu_cambiar() {
		// Funcion para cambiar un menu determinado
		// Lo primero es ver si esta autentificado, sino, a la mierda que va
		$datos["error"] = "";
		$datos["opcion"] = 0;
		$logeado = $this -> session -> userdata("idu");
		$enviado = 0;
		if ($this -> input -> post("enviado")) {
			$enviado = $this -> input -> post("enviado");
		}
		if ($logeado==1 && $enviado == 1) {
			// Pillamos el idplato
			$idplato = $this -> input -> post("idplato");
			$ok = $this -> input -> post("enviado");
			//Pillamos los datos
			$plato = $this -> input -> post("plato");
			$descripcion_plato = $this -> input -> post("descripcion");
			$orden = $this -> input -> post("posicion");
			$hidratos = $this -> input -> post("hidratos");
			$vegetariano = $this -> input -> post("vegetariano");
			if ($vegetariano!=1) { $vegetariano=0; }
			$calorias = $this -> input -> post("calorias");
			$fecha = $this -> input -> post("fecha");
			
			$datos["fecha"]=$fecha;
			if ($ok==1) {
				$this -> menu -> modifica_platomenu($idplato, $plato, $descripcion_plato, $orden, $hidratos, $vegetariano, $calorias, $fecha);
				$datos["menu"] = $this -> menu -> ver_menu($datos["fecha"]);
				$this -> load -> view("admin/menu_vista",$datos);
			}
			
		} else if ($logeado==1) {
			// Cogemos el ID
			$idplato = $this -> input -> get("id");
			// Sacamos el contenido
			$datos["plato"] = $this -> menu -> ver_plato_menu($idplato);
			$datos["fecha"] = $this -> menu -> ver_fecha_plato($idplato);
			$this -> load -> view("admin/menu_mod", $datos);
		} else {
			// No esta logeado
			$this -> load -> view("admin/login",$datos);
		}
	}
}