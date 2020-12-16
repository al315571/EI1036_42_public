<!DOCTYPE html>
<html>
<head>
	<title> Mascarum - Registro</title>
	 <link rel="stylesheet" href="assets/css/estilos.css">
	 <style type="text/css">
	 	

	 	
	 </style>
</head>
<body>
	<?php include 'includes/nav.php'; ?>
	<?php include 'includes/carrito.php'; ?>
	<?php include 'includes/header.php'; ?>
	<?php include 'acciones/productos.php'; ?>
	<div class="content"> 
		<section class="acceso">
			<h1 class="titulo"> Inserta un producto </h1>
			<form class="formulario" action="?accion=subirproducto" method="post">
				<center>
					<label for="producto" id="lblproducto">Producto</label>
					<input type="text" name="producto" id="s_producto" required="">
					<input type="hidden" name="url" id="url" value="<?php if (isset($_FILES["subir"]["name"]))echo "assets/img/".$_FILES["subir"]["name"] ?>" required="">
					<div class="agrupado"> 
							<input type="submit" class="clasico" value="enviar" onclick="eliminar()">
					</div>
				</center>
			</form>
			<form action="?action=subirimagen" method="post" enctype="multipart/form-data" id="form_imagen"> 
				<div class="flotante" id="flotante">
					<div class="agrupado">
						<input class="eliminar-small" value="X" onclick="cerrar()">
						
						<label for="foto">Foto</label>
						<input type="file" accept="image/*" name="subir" id="foto" onchange="cargar(this)">
						<canvas id="canvas" width="200" height="100"></canvas>
						<div class="agrupado"> 
							<input type="submit" class="clasico" value="enviar" onclick="eliminar()">
						</div>
					</div>
				</div>
				<div class="agrupado"> 
					<input class="clasico" value="fichero" onclick="mostrar()" >
				</div>
			</form>
		</section>
	</div>

	<?php include 'includes/footer.php'; ?>

</body>
	<script src="assets/js/insertarProducto.js"></script>
	<script src="assets/js/carrito.js"></script>
</html>