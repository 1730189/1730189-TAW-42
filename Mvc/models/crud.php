<?php
	require_once "conexion.php";


	//heredar la calse conexion.php para poder acccesar y ttilizar la conexion a la base de dats, s extiende cuando se quiere manipular una funcion o méotod, en este caso manipularemos la funcion "conectar" de models/conexion.php
	class Datos extends Conexion{
		//registo de usuarios
		public function registroUsuariosModel($datosModel,$tabla){
			//prepare() Prepara la sentencia de sql para que sea ejectuada por el metodo Postantment. la sentencia de sql se puede contener desde 0 para ejectuat mas parametos
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario,password, email) VALUES(:usuario,:password,:email)");

			//bindParam() vincula una variable de php a un parametro de sustituion con nombre correspondiente a la sentencia SQL que fue usada para preparar la sentencia
			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);

			//regresar una respuesta satisfactoria o no

			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();
		}

		//modelo ingresoUsuarioModel
		public static function ingresoUsuarioModel($datosModel,$tabla){
			$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario=:usuario");
			$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
			$stmt->execute();
			//fetch() Obtiene una fila de un conjunto de resultados 
			return $stmt->fetch();

			$stmt->close();
		}
		
		//MOdelo vistaUsuarioModel
		public static function vistaUsuarioModel($tabla){
			$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password,email FROM $tabla");
			$stmt->execute();
			//fetchAll: obtiene todas las fils de un conjunto asociado al objeto PDO statment (stmt)

			return $stmt->fetchAll();
			$stmt->close();

		}

		//Editar usuarios
		public function editarUsuarioModel($datosModel,$tabla){
			$stmt =Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id=:id");
			$stmt->bindParam(":id",$datosModel,PDO::PARAM_INT);
			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();

		}

		public function actualizarUsuarioModel($datosModel,$tabla){
			$stmt=Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password=:password, email=:email WHERE id=:id");

			$stmt->bindParam(":usuario",$datosModel["usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);
			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_INT);
			if($stmt->execute()){
				return "success";
			}else{
				return "error";
			}
			$stmt->close();

		}

		public static function borrarUsuarioModel($datosModel,$tabla){
            $stmt=Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");
            $stmt->bindParam(":id",$datosModel, PDO::PARAM_INT);

            if($stmt->execute()){
                return "success";
            }else{
                return "error";
            }
            $stmt->close();
        }

	}
?>