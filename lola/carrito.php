<!DOCTYPE html>
<html>
<head>
	<title> Mascarum - Quienes Somos </title>
	 <link rel="stylesheet" href="assets/css/estilos.css">
	 <style type="text/css">
	 	.carrito {
	 		width: 30%;
	 		margin: 0 auto;
	 		text-align: center;
	 		border: 1px solid #d0d0d0;
	 	}
	 </style>
</head>
<body>
	<?php include 'includes/nav.php'; ?>
	<?php include 'includes/header.php'; ?>
	<div class="content"> 
		<h1 class="titulo">Carrito de la compra</h1>
		<table class="carrito">
			<th>Producto</th>
			<th>Acciones</th>
			<tr>
				<td>1</td>
				<td><a href="acciones/carrito.php?accion=eliminar&producto=1"><input type="submit" class="eliminar" value="eliminar"></a></td>
			</tr>
		</table>
	</div>
	<?php include 'includes/footer.php'; ?>

</body>

</html>