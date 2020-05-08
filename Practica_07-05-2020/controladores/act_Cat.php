<?php
  include_once("../conexion.php");

  //Es el id del registro seleccionado
  $nombreFijo = $_POST['editar'];
  echo $nombreFijo;

  //El nuevo nombre que modificara al anterior
  $newnombre = $_POST['nombre'];

  //Sentencia cuery para modificar un registro con los nuevos datos
  $cuery = "UPDATE categoria SET nombre = '$newnombre' WHERE id = '$nombreFijo'";
  echo $cuery;

  //Conexion para realizar el cuery anteriormente mencionado
  $result = mysqli_query($BD, $cuery);

  //Sentencia if para mostrar errores en alguna seccion del archivo
  if ($result) {
    header('Location: ../');
  }
?>
