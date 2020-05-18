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

	//Modelo ingresoUsuarioModel
	public function ingresoUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");

		$stmt = bindParam(":usuario", $datosModel["usuario"],PDO::PARAM_STR);

		$stmt = execute();

		//Fetch() obtiene una fila de un conjunto de resultados asociado al objeto $stmt
		return $stmt->fetch();

		$stmt -> close();
	}

	//Modelo vista usuarios
	public function vistaUsuarioModel($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");

		$stmt->execute();

		//fetchAll(): obtiene todas las filas de un conjunto de resultados asociaod al objeto PDO statemnt (stmt)
		return $stmt->fetchAll();

		$stmt -> close();
	}

	//Modelo Editar Usuarios
	public function editarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datosModel, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt->fetch();

		$stmt -> close();
	}

	//Modelo Actualizar Usuario
	public function actualizarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion:conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password=:password, email=:email WHERE id=:id");

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datosModel["id"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "Success";
		}
		else{
			return "Error";
		}

		$stmt -> close();
	}

	//Modelo Borrar Usuario
	public function borrarUsuarioModel($datosModel, $tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

		$stmt->bindParam("id", $datosModel, PDO::PARAM_INT);


		if($stmt->execute()){
			return "Success";
		}else{
			return "Error";
		}

		$stmt -> close();
	}

}




?>
