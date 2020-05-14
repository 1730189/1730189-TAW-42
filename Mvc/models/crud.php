<?php
require_once "conexion.php";


//Heredar la clase conexion.php para poder accesar y utilizar la conexion a la base de datos, se extiende cuando se requiere manipular una funcion o metodo, en este caso manipularemos la funcion "conectar" de models/conexion.php
class Datos extends Conexion{

	//Registro de usuarios
	public function registroUsuarioModel($datosModel, $tabla){

		//Prepara la sentencia de SQL para que sea ejecutada por el metodo POSStatement. La sentencia de SQL se puede contener desde 0 para ejecutar mas parametros

		$stmt  = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario, :password, :email)");

		//bindParam() vincula una variable de php a un parametro de sustitucion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia

		$stmt->bindParam(":usuario, $datosModel["usuario"], PDO::PARAM_STR");
		$stmt->bindParam(":password, $datosModel["password"], PDO::PARAM_STR");
		$stmt->bindParam(":email, $datosModel["email"], PDO::PARAM_STR");

		//Regresar una respuesta satisfactoria o no

		if($stmt->execute()){
			return "Success";
		}else{
			return "Error";
		}

		$stmt->close();
	}

}




?>
