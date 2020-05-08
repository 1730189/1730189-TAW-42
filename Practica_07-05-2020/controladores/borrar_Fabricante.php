<?php
include_once("../conexion.php");

//El id del registro que se eliminara
$nombre = $_POST['id'];
echo $nombre;

//Cuery para eliminar el registro mediant el id
$cuery = "DELETE FROM fabricante WHERE id='$nombre'";

echo $cuery;

//Conexion para realizar el cuery anteriormente mencionado
$result = mysqli_query($BD, $cuery);

//Sentencia if para mostrar errores en alguna seccion del archivo
if ($result) {
  header('Location: ../');
} else {
  header('Location: ../');
}
?>
