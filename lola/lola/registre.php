<!DOCTYPE html>
<html>
<head>
	<title> Mascarum - Registro</title>
	 <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
	<?php include 'includes/nav.php'; ?>
	<?php include 'includes/carrito.php'; ?>
	<?php include 'includes/header.php'; ?>
	<div class="content"> 
		<section class="acceso">
			<h1 class="titulo"> Registro </h1>
			<form class="formulario">
				<div class="agrupado">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" placeholder="nombre">
				</div>
				<div class="agrupado">
					<label for="apellidos">Apellidos</label>
					<input type="text" name="apellidos" placeholder="apellidos">
				</div>
				<div class="agrupado">
					<label for="correo">Correo</label>
					<input type="email" name="correo" placeholder="correo">
				</div>
				<div class="agrupado">
					<label for="contraseña">Contraseña</label>
					<input type="password" name="contraseña" placeholder="contraseña">
				</div>
				<div class="agrupado">
					<label for="foto">Foto</label>
					<input type="text" name="foto" placeholder="foto">
				</div>
				<div class="agrupado"> 
					<input type="submit" class="clasico" value="enviar">
				</div>
			</form>
		</section>
	</div>

	<?php include 'includes/footer.php'; ?>

</body>
<script src="assets/js/carrito.js"></script>
</html>