<?php
  include_once("../conexion.php");

  //Los nuevos valores del registro de la tabla seleccionada
  $newnombre = $_POST['nombre'];
  $newdireccion = $_POST['direccion'];
  $newcorreo = $_POST['correo'];
  $newtelefono = $_POST['telefono'];
  $newcategoria = $_POST['categoria'];

  //Cuery que realizara la creacion del nuevo registro
  $cuery = "INSERT INTO fabricante (nombre_fabricante, direccion, correo, telefono, id_categoriafabricante) VALUES ('$newnombre', '$newdireccion', '$newcorreo', '$newtelefono', $newcategoria)";
  echo $cuery;

  //Conexion para realizar el cuery anteriormente mencionado
  $result = mysqli_query($BD, $cuery);

  //Sentencia if para mostrar errores en alguna seccion del archivo
  if ($result) {
    header('Location: ../');
  }
?>
