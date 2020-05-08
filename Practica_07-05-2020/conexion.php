<?php
$nombre_base_de_datos = "practica_no_cuenta"; //Colocamos el nombre de la base de datos que vamos a utilizar de phpmyadmin
$usuario = "root"; //El usuario con el que ingresamos a phpmyadmin
$contraseña = ""; //Contraseña para ingresar a phpmyadmin

$BD = mysqli_connect("localhost", "root", "", "practica_no_cuenta"); //Creamos una variable llamada BD donde con una funcion
																	 //de php ingresamos los datos anteriormente mencionados
																	 //para hacer una conexion hacia la base de datos 

if(mysqli_connect_error()){ //Una sentecia if que nos mostrara un error en el caso de que tengamos un dato equivocado
  echo "ERROR";
  exit();
}

?>
