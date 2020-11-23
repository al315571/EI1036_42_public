<?php 

include('conexion.php');

	if(isset($_REQUEST['accion'])) {
		$action = $_REQUEST['accion']; 
		switch ($action) {
			case 'listar':
				listarProductos();
				break;
			case 'subirimagen':
				subirImagen();
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

	function subirImagen() {
		if($_POST["url"] != "" && $_POST["producto"] != "") { // Si ya disponemos a la URL asociamos el nuevo producto con la imagen
			global $pdo;
			$query = "INSERT INTO productos (nombre,imagen) VALUES (?,?)";
			$result=ejecutarConsultas($pdo,$query,[$_POST["producto"],$_POST["url"]]);
			if (1>$result) {
				echo "Problema con la insercion del producto en el carrito";
			}
		} else { // Si solamente tenemos la imagen la subimos
			$ruta = "./assets/img/";
			$foto = $ruta.$_FILES['tmp_file']['name'];
			if (move_uploaded_file($_FILES["tmp_file"]["tmp_name"], $foto)) {
			 	echo "Fichero subido de forma correcta";
			} else {
			    echo "Error al subir el fichero";
			}
		}	
	}

?>