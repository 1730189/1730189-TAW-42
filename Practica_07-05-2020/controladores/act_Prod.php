<?php
  include_once("../conexion.php");

  //Es el id del registro seleccionado
  $nombreFijo = $_POST['editar'];
  echo $nombreFijo;

  //Los nuevos registros que modificaran a los anteriores
  $newnombre = $_POST['nombre'];
  $newdescripcion = $_POST['descripcion'];
  $newventa = $_POST['venta'];
  $newcompra = $_POST['compra'];
  $newcolor = $_POST['color'];
  $newcategoria = $_POST['categoria'];

  //Sentencia cuery para modificar los registros con los nuevos datos
  $cuery = "UPDATE producto SET nombre = '$newnombre', descripcion = '$newdescripcion', precio_venta = '$newventa', precio_compra = '$newcompra', color = '$newcolor', id_categoria = '$newcategoria' WHERE id = '$nombreFijo'";
  echo $cuery;

  //Conexion para realizar el cuery anteriormente mencionado
  $result = mysqli_query($BD, $cuery);

  //Sentencia if para mostrar errores en alguna seccion del archivo
  if ($result) {
    header('Location: ../');
  }
?>
