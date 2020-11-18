<!DOCTYPE html>
<html>
<head>
	<title> Mascarum - Productos </title>
	 <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>
	<?php include 'includes/nav.php'; ?>
	<?php include 'includes/header.php'; ?>
	<?php include 'acciones/productos.php'; 
	$productos = listarProductos(); ?> 
	<div class="content"> 
		<h1 class="titulo">Productos</h1>
		<section class="productos">
			<div class="tabla">
				<?php foreach ($productos as $key => $listadoProductos) { ?>
				<div class="tabla-30">
					<div class="producto">
						<div class="cabecera-producto">
							<img src="<?php echo $listadoProductos['imagen']; ?>" class="img-producto">
						</div>
						<div class="cuerpo-producto">
							<h3><?php echo $listadoProductos['nombre']; ?></h3>
							<a href="acciones/carrito.php?accion=insertar&client_id=5&product=<?php echo $listadoProductos['product_id']; ?>"><input type="submit" class="clasico" value="Añadir"></a>
						</div>
					</div>
				</div>
				<?php } ?>
				
			</div>			
		</section>
	</div>
	<?php include 'includes/footer.php'; ?>

</body>

</html>