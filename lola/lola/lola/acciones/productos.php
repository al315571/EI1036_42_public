<?php 

include('conexion.php');

	if(isset($_REQUEST['accion'])) {
		$action = $_REQUEST['accion']; 
		switch ($action) {
            case 'listarJSON':
                listarProductosJSON();
                break;
			case 'listar':
				listarProductos();
				break;
			case 'subirimagen':
				subirImagen();
				break;
			case 'subirproducto':
				subirProducto();
				break;
			default:
				echo "Error 404 not found";
				break;
		}
	}

    function listarProductosJSON() {
        global $pdo;
        header('Content-type: application/json');
        $query = "SELECT * FROM  productos;";
        $result = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode($result);
    }


	function listarProductos() {
		global $pdo;
		$query = "SELECT * FROM productos";
		$result=ejecutarConsultas($pdo,$query,NULL);
		return $result;
	}

	function subirProducto() {
			global $pdo;
			$query = "INSERT INTO productos (nombre,imagen) VALUES (?,?)";
			$result=ejecutarConsultas($pdo,$query,[$_POST["producto"],$_POST["url"]]);
			if (1>$result) {
				echo "Problema con la insercion del producto en el carrito";
			}
	}

	function subirImagen() {
		$target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["tmp_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["tmp_file"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["tmp_file"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["tmp_file"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
	}

?>