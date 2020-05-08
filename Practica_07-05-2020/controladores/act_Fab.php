<?php
  include_once("../conexion.php");

  //Es el id del registro seleccionado
  $nombreFijo = $_POST['editar'];
  echo $nombreFijo;

  //Los nuevos registros que modificaran a los anteriores
  $newnombre = $_POST['nombre'];
  $newdireccion = $_POST['direccion'];
  $newcorreo = $_POST['correo'];
  $newtelefono = $_POST['telefono'];
  $categoria = $_POST['categoria'];

  //Sentencia cuery para modificar los registros con los nuevos datos
  $cuery = "UPDATE fabricante SET nombre_fabricante = '$newnombre', direccion = '$newdireccion', correo = '$newcorreo', telefono = '$newtelefono', id_categoriafabricante = '$categoria' WHERE id = '$nombreFijo'";
  echo $cuery;

  //Conexion para realizar el cuery anteriormente mencionado
  $result = mysqli_query($BD, $cuery);

  //Sentencia if para mostrar errores en alguna seccion del archivo
  if ($result) {
    header('Location: ../');
  }
?>
