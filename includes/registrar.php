<?php
include("pdo_postgres0.php");

function handler($pdo,$table)
{
    $datos = $_REQUEST;
    if (count($_REQUEST) < 3) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO $table (name,surname,address,city,zip_code,foto_file) VALUES (?,?,?,?,?,?)";
                       
    echo $query;
    try { 
        $a=array($_REQUEST['nombre'], $_REQUEST['apellidos'],$_REQUEST['direccion'],$_REQUEST['ciudad'], $_REQUEST['cp'],$_REQUEST['foto'] );
        print_r ($a);
        $consult = $pdo->prepare($query);
        $a=$consult->execute(array($_REQUEST['nombre'], $_REQUEST['apellidos'],$_REQUEST['direccion'],$_REQUEST['ciudad'], $_REQUEST['cp'],$_REQUEST['foto']));
        if (1>$a)echo "InCorrecto";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

$table = "a_cliente";
var_dump($_POST);


handler( $pdo,$table);
?>