<main>
	<h1>GestiÓn de Usuarios </h1>
	<form class="fom_usuario" action="./includes/registrar.php" method="POST">

		<legend>Datos básicos</legend>
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" placeholder="Miguel" />
		<br/>
		<label for="apellidos">Apellidos</label>
		<br/>
		<input type="text" name="apellidos" class="item_requerid" size="20" maxlength="25" placeholder="Cervantes" />
		<br/>
		<label for="direccion">Dirección</label>
		<br/>
		<input type="text" name="direccion" class="item_requerid" size="20" maxlength="25" placeholder="Avenida de la universitat" />
		<br/>
		<label for="ciudad">Ciudad</label>
		<br/>
		<input type="text" name="ciudad" class="item_requerid" size="20" maxlength="25" placeholder="Castellon de la plana" />
		<br/>
		<label for="cp">Codigo Postal</label>
		<br/>
		<input type="text" name="cp" class="item_requerid" size="20" maxlength="25" placeholder="12006" />
		<br/>
		<label for="foto">foto</label>
		<br/>
		<input type="text" name="foto" class="item_requerid" size="20" maxlength="25" placeholder="foto" />
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>