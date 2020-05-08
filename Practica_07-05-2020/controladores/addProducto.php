<?php
  include_once("../conexion.php");

  //Los nuevos valores del registro de la tabla seleccionada
  $newnombre = $_POST['nombre'];
  $newdescripcion = $_POST['descripcion'];
  $newventa = $_POST['venta'];
  $newcompra = $_POST['compra'];
  $newcolor = $_POST['color'];
  $newcategoria = $_POST['categoria'];

  echo $newnombre;
  echo "\n";
  echo $newdescripcion;
  echo "\n";
  echo $newventa;
  echo "\n";
  echo $newcompra;
  echo "\n";
  echo $newcolor;
  echo "\n";
  echo $newcategoria;

  //Cuery que realizara la creacion del nuevo registro
  $cuery = "INSERT INTO producto (nombre, descripcion, precio_venta, precio_compra, color, id_categoria) VALUES ('$newnombre', '$newdescripcion', $newventa, $newcompra, '$newcolor', $newcategoria)";
  echo $cuery;

  //Conexion para realizar el cuery anteriormente mencionado
  $result = mysqli_query($BD, $cuery);

  //Sentencia if para mostrar errores en alguna seccion del archivo
  if ($result) {
    header('Location: ../');
  }
?>
