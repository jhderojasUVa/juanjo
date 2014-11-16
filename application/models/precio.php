<? // Modelo de los precios
class Precio extends CI_Model {
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this -> load -> database();
    }
	
	function ver_precio() {
		// Funcion para ver el precio
		$sql = "SELECT precio FROM precio";
		$precio = $this -> db -> query($sql) -> result();
		foreach ($precio as $row) {
			return $row -> precio;
		}
	}
	
	function cambiar_precio($precio) {
		// Funcion para cambiar el precio del menu
		$sql = "UPDATE precio SET precio='".$precio."'";
		$this -> db -> query($sql);
	}
}
?>