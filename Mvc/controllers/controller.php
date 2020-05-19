<?php
	class MvcController{
		#llamada a la plantilla
		public function pagina(){
			include "views/template.php";
		}

		//enlaces
		public function enlacesPaginasController(){
			if(isset($_GET['action'])){
				$enlaces = $_GET['action'];
			}else{
				$enlaces = 'index';
			}
			//Es el momento en que el controlador invoca el modelo enalcesPaginaModel para que muestre el listaaod de paginas
			$respuesta = Paginas::enlacesPaginasModel($enlaces);
			include $respuesta;
		}

		//registro
		public function registroUsuarioController(){
			if(isset($_POST["usuarioRegistro"])){
				//recibe a traves del metoddo post el name de usuario, passwoer y email se almacenan los datos en una variable o propiedad de tipo array asociativo cpn sus respectivas propiedades
				$datosController = array("usuario"=>$_POST["usuarioRegistro"],"password"=>$_POST["passwordRegistro"],"email"=>$_POST["emailRegistro"]);
				//se le dice al modelo model/crud.php (Datos:registroUsuarioModel), en que modelo Datos el metodo registroUsuarioMOdel reciba en sus parmatros los valores $datoaController y el nombre de la tabla a ala cual debe conectarse
				$respuesta = Datos::registroUsuariosModel($datosController,"usuarios");
				//se imprime la respuesta en la vista
				if($respuesta == "success"){
					header("location:index.php?action=ok");
				}else{
					header("location:index.php");
				}
			}
		}
		
		//INgreso usuarios
		public function ingresoUsuarioController(){
			if(isset($_POST["usuarioIngreso"])){
				$datosController= array("usuario"=>$_POST["usuarioIngreso"],"password"=>$_POST["passwordIngreso"]);
				$respuesta= Datos::ingresoUsuarioModel($datosController,"usuarios");
				//validar la repsuesta de modelo
				if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]== $_POST["passwordIngreso"]){
					session_start();
					$_SESSION["validar"]=true;
					header("location:index.php?action=usuarios");
				}else{
					header("location:index.php?action=fallo");
				}
			}
		}


		//Vista de usuarios
        public  function vistaUsuariosController(){
            $respuesta=Datos::vistaUsuarioModel("usuarios");
            foreach ($respuesta as $row => $item) {
                echo '<tr>
                        <td>'.$item["usuario"].'</td>
                        <td>'.$item["password"].'</td>
                        <td>'.$item["email"].'</td>
                        <td><a href=index.php?action=editar&idEditar='.$item["id"].'><button>Editar</button></td>

                        <td><a href=index.php?action=usuarios&idBorrar='.$item["id"].'><button>Borrar</button></td>';
            }
        }

		//Editar usuario
		public function editarUsuarioController(){
			$datosController=$_GET["idEditar"];
			$respuesta=Datos::editarUsuarioModel($datosController,"usuarios");
			//Diseñar la estructura de un formulario para que se muestre los datos de la consulta generada en el modelo.
			echo ('<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">
			<input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			<input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>
			<input type="text" value="'.$respuesta["email"].'" name="emailEditar" required>
			<input type="submit" value="Editar">');
		}

		public function actualizarUsuarioController(){
			if(isset($_POST["usuarioEditar"])){
				$datosController=array("id"=>$_POST["idEditar"], "usuario"=>$_POST["usuarioEditar"],"password"=>$_POST["passwordEditar"], "email"=>$_POST["emailEditar"]);
				$respuesta=Datos::actualizarUsuarioModel($datosController,"usuarios");
				if($respuesta=="success"){
					header("location:index.php?action=cambio");
				}else{
					echo("error");
				}
			}
		}
		public function borrarUsuariosController(){
			if(isset($_GET["idBorrar"])){
				$datosController=$_GET["idBorrar"];
				$respuesta=Datos::borrarUsuarioModel($datosController,"usuarios");
				if($respuesta=="success"){
					header("location:index.php?action=usuarios");
				}
			}
		}

		//LISTA DE MODELOS POR DESARROLLAR:
		/*
		* 1. registroUsuariosModel--ok
		* 2. ingresoUsuariosModel --ok
		* 3. vistaUsuarioModel --ok
		* 4. editarUsuarioModel--ok
		* 5. actualizarUsuarioModel--ok
		* 6. borrarUsuarioModel --ok
		*/
	}
?>