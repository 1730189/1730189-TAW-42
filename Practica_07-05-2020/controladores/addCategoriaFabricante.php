<?php
  include_once("../conexion.php");

  //El nuevo valor del registro de la tabla seleccionada
  $newnombre = $_POST['nombre'];

  //Cuery que realizara la creacion del nuevo registro
  $cuery = "INSERT INTO categoria_fabricante (nombre) VALUES ('$newnombre')";
  echo $cuery;

  //Conexion para realizar el cuery anteriormente mencionado
  $result = mysqli_query($BD, $cuery);

  //Sentencia if para mostrar errores en alguna seccion del archivo
  if ($result) {
    header('Location: ../');
  }
?>
