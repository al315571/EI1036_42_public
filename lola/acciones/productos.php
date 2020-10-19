<?php 

include('conexion.php');
	$action = $_REQUEST['accion']; 
	switch ($action) {
		case 'listar':
			listarProductos();
			break;
		default:
			echo "Error 404 not found";
			break;
	}

	function listarProductos() {
		$query = "SELECT * FROM productos";
		$result=ejecutarConsultas($pdo,$query,NULL);
		return $result;
	}

?>