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
	<div class="content"> 
		<section class="acceso">
			<h1 class="titulo"> Registro </h1>
			<form class="formulario" action="?action=upload" method="post" enctype="multipart/form-data">
				<div class="agrupado">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" placeholder="nombre">
				</div>
				<div class="flotante" id="flotante">
					<div class="agrupado">
						<input class="eliminar-small" value="X" onclick="cerrar()">
						<label for="nombre">Foto</label>
						<input type="file" accept="image/*" name="foto" placeholder="nombre" onchange="handleFiles()">
						<canvas id="canvas" width="200" height="100"></canvas>
						<div class="agrupado"> 
							<input type="submit" class="clasico" value="enviar">
						</div>
					</div>
				</div>
				<div class="agrupado"> 
					<input class="clasico" value="fichero" onclick="mostrar()">
				</div>
			</form>
		</section>
	</div>

	<?php include 'includes/footer.php'; ?>

</body>
	<script type="text/javascript">
		function mostrar() {
			document.getElementById('flotante').style.display = 'block';
		}
		function cerrar() {
			document.getElementById('flotante').style.display = 'none';
		}
		function carrito() {
			document.getElementById('carrito').style.display = 'block';
		}
		function carrito_off() {
			document.getElementById('carrito').style.display = 'none';
		}
		function handleFiles(e)	{
			let ctx	= document.getElementById('canvas').getContext('2d');
			let img	= new Image;
			img.src	= URL.createObjectURL(e.target.files[0]);
			img.onload= function()	{
				ctx.drawImage(img,	20,20);
			}
}
	</script>
</html>