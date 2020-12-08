<!DOCTYPE html>
<html>
<head>
	<title> Mascarum - Productos </title>
	 <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
	<?php include 'includes/nav.php'; ?>
	<?php include 'includes/carrito.php'; ?>
	<?php include 'includes/header.php'; ?>
	<div class="content"> 
		<h1 class="titulo">Productos</h1>
		<section class="productos">
			<div class="agrupado">
					<label for="productos">Filtrar por nombre</label>
					<input list="productos" name="producto" id="producto" onchange="filtrarNombre(this)">
	 				<datalist id="productos"></datalist>
			</div>
			<div class="agrupado">
					<label for="minimo">Precio mínimo</label>
					<input type="text"  id="minimo">
					<label for="maximo">Precio máximo</label>
					<input type="text" id="maximo">
			</div>
			<div class="agrupado">
				<input type="submit" class="clasico" value="enviar" onclick="filtrarPrecio()">
			</div>
			
			<div class="tabla-scroll" id="visor">
			
			</div>			
		</section>
	</div>
	<?php include 'includes/footer.php'; ?>

</body>
<script src="assets/js/carrito.js"></script>
<script src="assets/js/productos.js"></script>
</html>