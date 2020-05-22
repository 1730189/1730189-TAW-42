<?php
    require_once('bd/conexion.php');
    require_once('controlador/estudiante_controller.php');
    require_once('controlador/carrera_controller.php');

    $controllerE= new estudiante_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodoE=$_REQUEST['m'];
        if (method_exists($controllerE, $metodoE)) {
            $controllerE->$metodoE();
        }else{
            $controllerE->index();
        }
    }else{
        $controllerE->index();
    }

    /*$controllerC= new carrera_controller();
    
    if(!empty($_REQUEST['m'])){
        $metodoC=$_REQUEST['m'];
        if (method_exists($controllerC, $metodoC)) {
            $controllerC->$metodoC();
        }else{
            $controllerC->index();
        }
    }else{
        $controllerC->index();
    }*/


?>