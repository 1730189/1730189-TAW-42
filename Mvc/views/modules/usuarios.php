<?php
	session_start();
	if(!$_SESSION["validar"]){
		header("location:index.php?action=ingresar");
		exit();
	}
?>

<H1>USUAROS</H1>
	<table border="1">
		<thead>
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th>¿Editar?</th>
				<th>¿Eliminar?</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$vistaUsuario= new MvcController();
				$vistaUsuario-> vistaUsuariosController();
				$vistaUsuario-> borrarUsuariosController();
			?>

		</tbody>
	</table>	
	<?php 
		if(isset($_GET["action"])){
			if($_GET["action"]=="cambio"){
				echo "Cambio exitoso";
			}
		}
	?>