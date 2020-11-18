<?php 

include('conexion.php');

	if(isset($_REQUEST['accion'])) {
		$action = $_REQUEST['accion']; 
		switch ($action) {
			case 'listar':
				listarProductos();
				break;
			default:
				echo "Error 404 not found";
				break;
		}
	}

	function listarProductos() {
		global $pdo;
		$query = "SELECT * FROM productos";
		$result=ejecutarConsultas($pdo,$query,NULL);
		return $result;
	}

?>