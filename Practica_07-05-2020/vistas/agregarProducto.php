<?php
include_once '../Conexion.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Producto</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div >
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3>Agregar Producto</h3>
              </div>
              <form role="form" id="quickForm" action="../controladores/addProducto.php" method="post">

                <center>
                <table class="table table-hover">
                
                <tr>
                <td><B>Nombre:</B></td>
                <td> <INPUT TYPE="text" NAME="nombre" id="nombre" value="" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Descripcion:</B></td>
                <td> <INPUT TYPE="text" NAME="descripcion" id="nombre" value="" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Precio Venta:</B></td>
                <td> $<INPUT TYPE="number" NAME="venta" id="nombre" value="" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Precio Compra:</B></td>
                <td> $<INPUT TYPE="number" NAME="compra" id="nombre" value="" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Color:</B></td>
                <td> <INPUT TYPE="text" NAME="color" id="nombre" value="" SIZE=40 MAXLENGTH=50 required></td>

                <tr>
                <td><B>Categoria:</B></td>
                <td> <SELECT NAME="categoria">
                  <option>...</option>
                <?php
                $q33 = "SELECT id, nombre FROM categoria";
                $r33 = mysqli_query($BD,$q33);

                while($row33 = mysqli_fetch_assoc($r33)){
                  $clave1=$row33['id'];
                  $clave2=$row33['nombre'];
                  echo "<option value = '$clave1'>".$clave2."</option>";
                }

                ?></td>

                <td ALIGN=CENTER colspan="2">
                  <br>
                <INPUT NAME = "agregar" TYPE="submit" VALUE="Agregar Producto">

                </table>
                </center>

              </form>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>


  <script src="../../plugins/jquery/jquery.min.js"></script>
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="../../dist/js/adminlte.min.js"></script>
  <script src="../../dist/js/demo.js"></script>

</body>
</html>