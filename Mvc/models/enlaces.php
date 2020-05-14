<?php
	//Modelo de enlace web
	class Paginas{
		public function enlacesPaginasModel($enlaces){
			if($enlaces == "ingresar" || ($enlaces)== "usuarios" || ($enlaces)== "productos" || ($enlaces)== "registroProducto" || ($enlaces)== "editar" || ($enlaces)== "editarProducto" || ($enlaces)== "salir"){
				$module = "views/modules/".$enlaces."php";
			}
			else if($enlaces == "index"){
				$module = "views/modules/registro.php";
			}
			else if($enlaces == "ok"){
				$modules = "views/modules/registro.php";
			}
			else if($enlaces == "fallo"){
				$modules = "views/modules/ingresar.php";
			}
			else if($enlaces == "cambio"){
				$modules = "views/modules/usuarios.php";
			}
			else{
				$modules = "views/modules/registro.php";
			}
			return $modules;
		}
	}

?>