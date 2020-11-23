<?php 

include('conexion.php');
	
	function insertarEnCarrito($cliente,$producto) {
		global $pdo;
		$query = "INSERT INTO carrito (client_id,product_id,fecha) VALUES (?,?,?)";
		$result=ejecutarConsultas($pdo,$query,[$cliente,$producto,date("Y-m-d")]);
		if (1>$result) {
			echo "Problema con la insercion del producto en el carrito";
		}
	}
	
	function eliminarDelCarrito($producto) {
		global $pdo;
		$query = "DELETE FROM carrito WHERE item_id=?";
		$result=ejecutarConsultas($pdo,$query,[$producto]);
		if (1>$result) {
			echo "Problema al eliminar el producto del carrito";
		}	
	}

	function listarCarrito() {
		global $pdo;
		$query = "SELECT * FROM carrito";
		$result=ejecutarConsultas($pdo,$query,NULL);
		return $result;
	}
	if(isset($_REQUEST['accion'])) {
		$action = $_REQUEST['accion']; 
		switch ($action) {
			case 'insertar': // ?action=add&client_id=5&product=3
				$cliente = $_REQUEST['client_id'];
				$producto = $_REQUEST['product'];
				insertarEnCarrito($cliente,$producto);
				header("Location: " . $_SERVER["HTTP_REFERER"]);
				break;
			case 'eliminar': // ?action=delete&item_id=15 
				$producto = $_REQUEST['item_id'];
				eliminarDelCarrito($producto);
				header("Location: " . $_SERVER["HTTP_REFERER"]);
				break;
			case 'listar':
				listarCarrito();
				break;
			case 'comprarCesta':
				$productos = explode(",",$_REQUEST['productos']);
				$cliente = 5;
				for($i = 0; $i < count($productos)-1; $i++) {
					insertarEnCarrito($cliente,$productos[$i]);
				}

				break;
			default:
				echo "Error 404 not found";
				break;
		}
	}

	

?>