<? // Modelo de los menus
class Menu extends CI_Model {
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this -> load -> database();
    }
	
	function ver_ultimo_menu(){
		// Funcion que devuelve un menu segun la fecha de hoy
		// Primero el "hoy"
		$hoy = date("Y-m-d");
		// La sentencia SQL de busqueda
		//$sql = "SELECT platos.plato menu.posicion FROM menu, platos WHERE menu.idplato=platos.idplato AND fecha='".$hoy."' ORDER BY menu.posicion";
		$sql="SELECT plato, descripcion_plato, orden, hidratos, calorias, vegetariano FROM menu WHERE fecha='".$hoy."' ORDER BY orden";
		return $this -> db -> query($sql) -> result();
	}
	
	function ver_menu($fecha) {
		// Funcion que devuelve un menu segun una fecha concreta en formato (m-d-a)
		$sql="SELECT idplato, plato, descripcion_plato, orden, vegetariano, hidratos, calorias FROM menu WHERE fecha='".$fecha."' ORDER BY orden";
		return $this -> db -> query($sql) -> result();
	}
	
	function add_platomenu($plato, $descripcion_plato, $orden, $hidratos, $vegetariano, $calorias, $fecha) {
		// Funcion que inserta un plato de menu en una fecha concreta
		// Plato = plato
		// orden = posicion
		// descripcion = su nombre lo indica
		// fecha... obvio
		$sql="INSERT INTO menu (plato, descripcion_plato, orden, hidratos, vegetariano, calorias, fecha) VALUES ('".$plato."', '".$descripcion_plato."', '".$orden."', '".$hidratos."', '".$vegetariano."', '".$calorias."', '".$fecha."')";
		$this -> db -> query($sql);
	}
	
	function ver_plato_menu($idplato) {
		// Funcion que muestra un plato del menu
		// Usada fundamentalmente para poder modificarlo
		// idplato = identificador del plato
		$sql="SELECT idplato, plato, descripcion_plato, orden, fecha, hidratos, vegetariano, calorias FROM menu WHERE idplato=".$idplato;
		return $this -> db -> query($sql) -> result();
	}
	
	function ver_fecha_plato($idplato) {
		// Funcion que devuelve la fecha de un plato
		// idplato = identificador del plato
		$sql="SELECT fecha FROM menu WHERE idplato=".$idplato;
		foreach ($this -> db -> query($sql) -> result() as $row) {
			return $row -> fecha;
		}
	}
	
	function del_platomenu($idplato) {
		// Funcion que borra un plato concreto
		// Neceista el idplato para buscarle
		// NO HAY UNDO!
		$sql="DELETE FROM menu WHERE idplato='".$idplato."'";
		$this -> db -> query($sql);
	}
	
	function modifica_platomenu($idplato, $plato, $descripcion_plato, $orden, $hidratos, $vegetariano, $calorias, $fecha) {
		// Funcion que modifica un plato concreto
		// Hace falto lo de añadir y de paso el ID para localizarlo, obvio
		$sql="UPDATE menu SET plato='".$plato."', descripcion_plato='".$descripcion_plato."', orden='".$orden."', hidratos='".$hidratos."', vegetariano='".$vegetariano."', calorias='".$calorias."', fecha='".$fecha."' WHERE idplato='".$idplato."'";
		$this -> db -> query($sql);
	}
}
?>