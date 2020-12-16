<?php
	include('conexion.php');
    global $pdo;
    $resultado = array();
	$productos = $_REQUEST['productos'];
    $id_partidos = explode(",", $productos);
    try {
        for($i = 0; $i< sizeof($id_partidos); $i++) {
            $query = "INSERT INTO carrito (client_id,product_id,fecha) VALUES (?,?,?)";
            $result=ejecutarConsultas($pdo,$query,[1,$id_partidos[$i],date("Y-m-d")]);   
    }
    $resultado = array('resultado' => "OK" );
    echo json_encode($resultado);
    } catch (PDOExeption $e) {
        $resultado = array('resultado' => "KO" );
        echo json_encode($resultado);
    }
?>