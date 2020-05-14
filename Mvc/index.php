//EL index mostraremos la salida de las vistas al usuario y a traves de el enviaremos las distintas acciones que el usuario envie al controlador

<?php

//Invocacion a los metodos
require_once"models/enlaces.php";
require_once"models/crud.php";
require_once"models/crudProd.php";

//Controlador
//Creacion de los objetos, que es la logica del negocio
require_once"controllers/controller.php";

//Muestra la funcion o metodo "pagina" que se encuentra en controllers/controller.php
$mvc->pagina();

?>