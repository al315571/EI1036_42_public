<main>
	<h1>GestiÓn de Usuarios </h1>
	<form class="fom_usuario" action="?action=registrar" method="POST">

		<legend>Datos básicos</legend>
		<label for="nombre">name</label>
		<br/>
		<input type="text" name="userName" class="item_requerid" size="50" maxlength="50" value="<?php print $userName ?>"
		 placeholder="Miguel" />
		<br/>
		<label for="nombre">surname</label>
		<br/>
		<input type="text" name="surName" class="item_requerid" size="50" maxlength="50" value="<?php print $userName ?>"
		 placeholder="Cervantes" />
		<br/>
		<label for="nombre">address</label>
		<br/>
		<input type="text" name="addressName"  size="50" maxlength="50" value="<?php print $userName ?>"
		 placeholder="Camí D´Onda, 51" />
		<br/>
		<label for="nombre">city</label>
		<br/>
		<input type="text" name="city"  size="50" maxlength="50" value="<?php print $userName ?>"
		 placeholder="Borriana" />
		<br/>
		<label for="nombre">zip_code</label>
		<br/>
		<input type="text" name="zip_codeName" size="5" maxlength="5" value="<?php print $userName ?>"
		 placeholder="12530"/>
		<br/>
		<label for="nombre">foto_file</label>
		<br/>
		<a href="https://static.zara.net/photos///contents/mkt/spots/aw20-north-new-in-woman/subhome-xmedia-40//w/1024/landscape_0.jpg?ts=1601651911788.zara.com">Enlace</a>
		</br>
		<!--
		<label for="email">Email</label>
		<br/>
		<input type="text" name="email" class="item_requerid" size="20" maxlength="25" value="<?php print $email ?>"
		 placeholder="kiko@ic.es" />
		<br/>
		<label for="passwd">Clave</label>
		<br/>
		<input type="password" name="passwd" class="item_requerid" size="8" maxlength="25" value="<?php print $passwd ?>"
		/>
		<br/>-->
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>