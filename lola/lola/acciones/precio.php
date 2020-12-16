<?php
	include('conexion.php');
    global $pdo;
    header('Content-type: application/json');
    $query = "SELECT * FROM  productos WHERE precio >=".$_POST['minimo']."AND precio <= ".$_POST['maximo'].";";
    $result = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    echo json_encode($result);
    

?>