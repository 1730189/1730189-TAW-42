<?php
	class MvcController{
		//Llamada a la plantilla
		public function pagina(){
			include"views/template.php";
		}

		//Enlaces
		public function enlacesPaginasController(){
			if(isset($_GET['action'])){
				$enlaces = $_GET['action'];
			}
			else{
				$enlaces = 'index.php';
			}
			//Es el momento en que el controlador invoca al modelo enlacesPaginasModel para que muestre el listado de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		//Registro de usuarios
		public function registroUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){
				//Recibe a traves del metodo POST el name (HTML) de usuario, password y email se almacenan los datos en una variable o propiedad de tipo array asociativo con sus respectivas propiedades (usuario, password, email).
				$datosController = array("usuario"=>$_POST["usuarioRegistro"],
										"password"=>$_POST["passwordRegistro"],
										"email"=>$_POST["emailRegistro"]);
				//Se le dice al modelo model/crud.php (Datos::registroUsuariosModel), que en modelo Datos el metodo registroUsuarioModel reciba en sus parametros los valores $datosController y el nombre de la tabla a la cual debe conectarse (usuarios)
				$respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

				//Se imprime la respuesta en la vista
				if($respuesta == "success"){
					header("location:index.php?action=ok");
				}
				else{
					header("location:index.php");
				}
			}
		}
		//Ingreso usuarios
		public function ingresoUsuarioController(){
			if(isset($_POST["usuarioIngreso"])){
				$datosController = array("usuario" => $_POST["usuarioIngreso"
										 "password" => $_POST["passwordIngreso"]);
				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

				//Validar la respuesta del modelo para ver si es un usuario correcto
				if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
					session_start();
					$_SESSION["validar"] = true;
					header("location:index.php?action=usuarios");
				}else{
					header("location:index.php?action=fallo");
				}

			}
		}

		//Vista de usuarios
		public function vistaUsuarioController(){
			$respuesta = Datos::vistaUsuarioModel("usuarios");
			//Utilizar un foreach para iterar un array e imprimir la consulta del modelo

			foreach ($respuesta as $row => $item) {
				echo '<tr>
						  <td>'.$item["usuario"].'</td>
						  <td>'.$item["password"].'</td>
						  <td>'.$item["email"].'</td>
						  <td><a href= "index.php?action=editar='.$item["id"].'"<button>Editar</button></a></td>
						  </tr>
						  <td><a href= "index.php?action=usuario&idBorrar='.$item["id"].'"<button>Borrar</button></a></td>
					  </tr>';
			}
		}
		//EDITAR USUARIO
		public function editarUsuarioController(){
			$datosController = $_GET["id"];
			$respuesta = Datos::editarUsuarioModel($datosController,"usuario");

			//Diseñar la estructura de un formulario para que se muetren los datos de la consulta generada en el modelo
			echo '<input type="hidden" value=" '.$respuesta["id"].'" name="idEditar">
				<input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
				<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
				<input type="text" value="'.$respuesta["email"].'" name="emailEditar" required>
			';

		}

		//Actualizar usuario
		public function actualizarUsuarioController(){
			if(isset($_POST["usuarioEditar"])){
				$datosController = array("id" =>$_POST["idEditar"],
										 "usuario" =>$_POST["usuarioEditar"],
										 "password" =>$_POST["passwordEditar"],
										 "email" =>$_POST["emailEditar"]);

				$respuesta = Datos::actualizarUsuarioModel($datosController,"usuarios");

				if($respuesta == "success"){
					header("location:index.php?action=cambio");
				}else{
					echo "error";
				}
			}
		}

		//Borrar Usuario
		public function borrarUsuarioController(){
			if(isset($_GET["idBorrar"])){
				$datosController = $_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController,"usuarios");

				if($respuesta == "success"){
					header("location:index.php?action=usuarios");
				}
			}
		}

		//Lista de metodos de modelos por desarrollar:
		/*
		1. registroUsuarioModel
		2. ingresoUsuarioModel
		3. vistaUsuarioModel
		4. editarUsuarioModel
		5. actualizarUsuarioModel
		6. borrarUsuarioModel
		*/

	}
?>