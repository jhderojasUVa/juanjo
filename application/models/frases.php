<? // Modelo de los menus
class Frases extends CI_Model {
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this -> load -> database();
    }
	
	function ver_frase($idfrase) {
		// Ver a una frase concreta
		$sql = "SELECT idfrase, frase FROM frases WHERE idfrase='".$idfrase."'";
		return $this -> db -> query($sql) -> result();
	}
	
	function ver_frase_aleatoria() {
		// Ver a una frase aleatoria
		
		// ¿Sabias que hay una función en MySQL que devuelve un random?... pues toma moreno
		$sql = "Select frase FROM frases ORDER BY RAND() LIMIT 1";
		$frase = $this -> db -> query($sql);
		foreach ($frase -> result() as $row) {
			return $row -> frase;
		}
	}
	
	function add_frase($texto) {
		// Funcion que añade una frase
		// $texto = texto de la frase
		$sql = "INSERT INTO frases(frase) VALUE ('".$texto."')";
		$this -> db -> query($sql);
	}
	
	function del_frase($idfrase) {
		// Funcion que borra una frase
		// $idfrase = id de la frase
		$sql = "DELETE FROM frases WHERE idfrase='".$idfrase."'";
		$this -> db -> query($sql);
	}
	
	function modificar_frase($idfrase, $texto) {
		// Funcion para modificar una frase
		// $idfrase = identificador de la frase
		// $texto = texto nuevo
		$sql = "UPDATE frases SET frase='".$texto."' WHERE idfrase='".$idfrase."'";
		$this -> db -> query($sql);
	}
	
	function ver_todas_frases() {
		// Funcion que devuelve todas las frases ordenadas por la frase
		$sql = "SELECT idfrase, frase FROM frases ORDER BY frase";
		return $this -> db -> query($sql) -> result();
	}
}
?>