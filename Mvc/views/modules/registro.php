<h1>REGISTRO DE USUARIO</h1>

<form method="post">
    <input type="text" placeholder="usuario" name="usuarioRegistro" required>
    <input type="password" placeholder="password" name="passwordRegistro" required>
    <input type="email" placeholder="email" name="emailRegistro" required>
    <input type="submit" value="Enviar">
</form>

<?php
    //ENVIAR LOS PARAMETROS DEL REGISTRO AL CONTROLADOR
    $registro = new MvcController();
    $registro->registroUsuarioController();

    if(isset($_GET['action'])){
        if($_GET['action'] == 'ok'){
            echo 'Registro exitoso.';
        }
    }
    