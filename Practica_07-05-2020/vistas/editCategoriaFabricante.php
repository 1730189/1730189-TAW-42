<?php
include_once("../conexion.php");


$nombreFijo = $_POST['editar'];

$cuery = "SELECT id, nombre FROM categoria_fabricante WHERE id = '$nombreFijo'";

$result = mysqli_query($BD,$cuery);

while($row = mysqli_fetch_assoc($result)){
  $id = $row['id'];
  $nombre = $row['nombre'];
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Editar Categoria Fabricante</title>

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
  <div>
    <br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3>Editar Fabricante</h3>
              </div>
              <form role="form" id="quickForm" action="../controladores/act_CatFab.php" method="post">

                <center>
                <table class="table table-hover">
                <tr>
                <td><B>Nombre:</B></td>
                <td> <INPUT TYPE="text" NAME="nombre" id="nombre" value="<?php echo $nombre ?>" SIZE=40 MAXLENGTH=50 required></td>

                <td ALIGN=CENTER colspan="2">
                  <br>
                <button class="btn btn-success" type="submit" name="editar"
            value="<?php echo htmlspecialchars($nombreFijo); ?>">Editar</button>

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
