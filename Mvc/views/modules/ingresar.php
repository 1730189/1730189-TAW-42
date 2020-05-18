<h1>INGRESAR</h1>

<form method="post">
	<INPUT type="text" placeholder="Usuario" name="usuarioIngreso" required>
	<INPUT type="text" placeholder="password" name="passwordIngreso" required>
	<INPUT type="submit" value="Enviar">
</form>

<?php
	$ingreso = new MvcController();
	$ingreso -> ingresoUsuarioController();

	if (isset($_GET["action"])) {
		if($_GET["action"] == "fallo"){
			echo "Fallo al ingresar";
		}
	}

?>