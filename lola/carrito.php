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
	<?php include 'acciones/carrito.php'; 
	$productos = listarCarrito(); ?>
	<div class="content"> 
		<h1 class="titulo">Carrito de la compra</h1>
		<table class="carrito">
			<th>Producto</th>
			<th>Fecha</th>
			<th>Acciones</th>
			<?php foreach ($productos as $key => $carrito) { ?>
			<tr>
				<td><?php echo $carrito['client_id']; ?></td>
				<td><?php echo $carrito['fecha']; ?></td>
				<td><a href="acciones/carrito.php?accion=eliminar&item_id=<?php echo $carrito['item_id']; ?>"><input type="submit" class="eliminar" value="eliminar"></a></td>
			</tr>
			<?php } ?>	
		</table>
	</div>
	<?php include 'includes/footer.php'; ?>

</body>

</html>