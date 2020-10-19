<?php 

//include('conexion.php');
	
	function insertarEnCarrito($cliente,$producto) {
		$query = "INSERT INTO carrito (client_id,product_id,fecha) VALUES (?,?,?)";
		$result=ejecutarConsultas($pdo,$query,[$cliente,$producto,date("y-m-d")]);
		if (1>$result) {
			echo "Problema con la insercion del producto en el carrito";
		}
	}
	
	function eliminarDelCarrito($producto) {
		$query = "DELETE FROM carrito WHERE product_id=?";
		$result=ejecutarConsultas($pdo,$query,[$producto]);
		if (1>$result) {
			echo "Problema al eliminar el producto del carrito";
		}	
	}

	function listarCarrito() {
		$query = "SELECT * FROM carrito";
		$result=ejecutarConsultas($pdo,$query,NULL);
		return $result;
	}

	$action = $_REQUEST['accion']; 
	echo $action;
	switch ($action) {
		case 'insertar': // ?action=add&client_id=5&product=3
			$cliente = $_REQUEST['cliente'];
			$producto = $_REQUEST['producto'];
			echo $cliente;
			echo "<br>";
			echo $producto;
			insertarEnCarrito($cliente,$producto);
			break;
		case 'eliminar': // ?action=delete&item_id=15 
			$producto = $_REQUEST['item_id'];
			eliminarDelCarrito($producto);
			break;
		case 'listar':
			listarCarrito();
			break;
		default:
			echo "Error 404 not found";
			break;
	}

	

?>