<?php
include_once 'Conexion.php'; //Incluimos la conexion hecha anteriormente

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tarea</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #3D404C">

  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div style="background-color: #3D404C;">
      <br>
      <!--Inicio del Crud de Producto-->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header" style="background-color:#F04D43;">
                  <h3>Producto</h3>
                </div>

                <!--Agregamos un boton que dira "nuevo" para agregar mas productos posteriormente-->
                <a href="vistas/agregarProducto.php">
                  <input type="button" name="" value="Nuevo" class="btn btn-primary">
                </a>

                <form class="" action="vistas/editProducto.php" method="post">

                  <!--Ingresamos las filas con los campos de la base de datos para tener una mejor comprension del crud-->
                  <div class="crudAdmin" align="center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Venta</th>
                          <th>Compra</th>
                          <th>Color</th>
                          <th>Categoria</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //Hacemos un cuery hacia la base de datos mostrando, en este caso, los campos necesarios para mostrar la tabla de productos
                        $cueryProducto = "SELECT p.id AS id, p.nombre as nombre, p.descripcion as descripcion, p.precio_venta as venta, p.precio_compra as compra, p.color as color, c.nombre as categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id;";

                        //Hacemos la conexion entre la base de datos y el cuery para posteriomente mostrarlo
                        $resultProducto = mysqli_query($BD,$cueryProducto);
                        $numrowsProducto = mysqli_num_rows($resultProducto);

                        while ($rowProducto = mysqli_fetch_assoc($resultProducto)) {
                          //Le agregamos valores a las varibales dependiendo el orden asendente del id
                          $id = $rowProducto['id'];
                          $nombre = $rowProducto['nombre'];
                          $descripcion = $rowProducto['descripcion'];
                          $venta = $rowProducto['venta'];
                          $compra = $rowProducto['compra'];
                          $color = $rowProducto['color'];
                          $categoria = $rowProducto['categoria'];

                          $identificador = $rowProducto['id']; ?>

                          <tr>
                          <?php
                          //Mostramos los registros recolectados de la base de datos en cada columna para una mejor comprencion
                          echo "<td>".$id."</td>";
                          echo "<td>".$nombre."</td>";
                          echo "<td>".$descripcion."</td>";
                          echo "<td>".$venta."</td>";
                          echo "<td>".$compra."</td>";
                          echo "<td>".$color."</td>";
                          echo "<td>".$categoria."</td>";
                          ?>

                        <!--Un boton de Editar para modificar el registro que solicite el usuario-->
                        <td align="right">
                        <form action="vistas/editProducto.php" method="post">
                        <button class="btn btn-success" type="submit" name="editar"
                        value="<?php echo htmlspecialchars($identificador); ?>">Editar
                        </button>
                        </form>
                        </td>

                        <!--Un boton de Borrar para eliminar el registro que solicite el usuario-->
                        <td>
                        <form method="post" action="controladores/borrar_Producto.php">
                        <button type="submit" class="btn btn-danger" name="id"
                        value="<?php echo htmlspecialchars($identificador); ?>">Borrar
                        </button>
                        </form>
                        </td>
                        <?php
                        }

                        ?>

                        </tr>

                      </tbody>
                    </table>
                  </div>

                </form>


              </form>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--Fin del Crud de Producto-->
  <!--Inicio del Crud de Categoria-->
  <div style="background-color: #3D404C;">
      <br>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header" style="background-color:#F04D43;">
                  <h3>Categoria</h3>
                </div>

                <!--Agregamos un boton que dira "nuevo" para agregar mas categorias posteriormente-->
                <a href="vistas/agregarCategoria.php">
                  <input type="button" name="" value="Nuevo" class="btn btn-primary">
                </a>

                <form class="" action="vistas/editCategoria.php" method="post">

                  <!--Ingresamos las filas con los campos de la base de datos para tener una mejor comprension del crud-->
                  <div class="crudAdmin" align="center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //Hacemos un cuery hacia la base de datos mostrando, en este caso, los campos necesarios para mostrar la tabla de categorias
                        $cueryCategoria = "SELECT id, nombre FROM categoria";

                        //Hacemos la conexion entre la base de datos y el cuery para posteriomente mostrarlo
                        $resultCategoria = mysqli_query($BD,$cueryCategoria);
                        $numrowsCategoria = mysqli_num_rows($resultCategoria);

                        while ($rowCategoria = mysqli_fetch_assoc($resultCategoria)) {
                          //Le agregamos valores a las varibales dependiendo el orden asendente del id
                          $id = $rowCategoria['id'];
                          $nombre = $rowCategoria['nombre'];

                          $identificador = $rowCategoria['id'];?>

                          <tr>
                          <?php
                          //Mostramos los registros recolectados de la base de datos en cada columna para una mejor comprencion
                          echo "<td>".$id."</td>";
                          echo "<td>".$nombre."</td>";?>

                        <!--Un boton de Editar para modificar el registro que solicite el usuario-->
                        <td align="right">
                        <form action="vistas/editCategoria.php" method="post">
                        <button class="btn btn-success" type="submit" name="editar"
                        value="<?php echo htmlspecialchars($identificador); ?>">Editar
                        </button>
                        </form>
                        </td>

                        <!--Un boton de Borrar para eliminar el registro que solicite el usuario-->
                        <td>
                        <form method="post" action="controladores/borrar_Categoria.php">
                        <button type="submit" class="btn btn-danger" name="id"
                        value="<?php echo htmlspecialchars($identificador); ?>">Borrar
                        </button>
                        </form>
                        </td>
                        <?php
                        }

                        ?>

                        </tr>

                      </tbody>
                    </table>
                  </div>

                </form>


              </form>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--Fin del Crud de Categoria-->
  <!--Inicio del Crud de Fabricante-->
  <div style="background-color: #3D404C;">
      <br>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header" style="background-color:#F04D43;">
                  <h3>Fabricante</h3>
                </div>

                <!--Agregamos un boton que dira "nuevo" para agregar mas Fabricantes posteriormente-->
                <a href="vistas/agregarFabricante.php">
                  <input type="button" name="" value="Nuevo" class="btn btn-primary">
                </a>

                <form class="" action="vistas/editFabricante.php" method="post">

                  <!--Ingresamos las filas con los campos de la base de datos para tener una mejor comprension del crud-->
                  <div class="crudAdmin" align="center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Direccion</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Categoria</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //Hacemos un cuery hacia la base de datos mostrando, en este caso, los campos necesarios para mostrar la tabla de Fabricantes
                        $cueryFabricante = "SELECT f.id as id, f.nombre_fabricante as nombre, f.direccion as direccion, f.correo as correo, f.telefono as telefono, c.nombre as categoria FROM fabricante f INNER JOIN categoria_fabricante c ON f.id_categoriafabricante = c.id";

                        //Hacemos la conexion entre la base de datos y el cuery para posteriomente mostrarlo
                        $resultFabricante = mysqli_query($BD,$cueryFabricante);
                        $numrowsFabricante = mysqli_num_rows($resultFabricante);

                        while ($rowFabricante = mysqli_fetch_assoc($resultFabricante)) {
                          //Le agregamos valores a las varibales dependiendo el orden asendente del id
                          $id = $rowFabricante['id'];
                          $nombre = $rowFabricante['nombre'];
                          $direccion = $rowFabricante['direccion'];
                          $correo = $rowFabricante['correo'];
                          $telefono = $rowFabricante['telefono'];
                          $categoria = $rowFabricante['categoria'];

                          $identificador = $rowFabricante['id'];?>
                          <tr>
                          <?php

                          //Mostramos los registros recolectados de la base de datos en cada columna para una mejor comprencion
                          echo "<td>".$id."</td>";
                          echo "<td>".$nombre."</td>";
                          echo "<td>".$direccion."</td>";
                          echo "<td>".$correo."</td>";
                          echo "<td>".$telefono."</td>";
                          echo "<td>".$categoria."</td>";?>

                        <!--Un boton de Editar para modificar el registro que solicite el usuario-->
                        <td align="right">
                        <form action="vistas/editFabricante.php" method="post">
                        <button class="btn btn-success" type="submit" name="editar"
                        value="<?php echo htmlspecialchars($identificador); ?>">Editar
                        </button>
                        </form>
                        </td>

                        <!--Un boton de Borrar para eliminar el registro que solicite el usuario-->
                        <td>
                        <form method="post" action="controladores/borrar_Fabricante.php">
                        <button type="submit" class="btn btn-danger" name="id"
                        value="<?php echo htmlspecialchars($identificador); ?>">Borrar
                        </button>
                        </form>
                        </td>
                        <?php
                        }

                        ?>

                        </tr>

                      </tbody>
                    </table>
                  </div>

                </form>


              </form>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--Fin del Crud de Fabricante-->
  <!--Inicio del Crud de Categoria de Fabricante-->
  <div style="background-color: #3D404C;">
      <br>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header" style="background-color:#F04D43;">
                  <h3>Categoria Fabricante</h3>
                </div>

                <!--Agregamos un boton que dira "nuevo" para agregar mas Categorias de Fabricantes posteriormente-->
                <a href="vistas/agregarCategoriaFabricante.php">
                  <input type="button" name="" value="Nuevo" class="btn btn-primary">
                </a>

                <form class="" action="vistas/editCategoriaFabricante.php" method="post">

                  <!--Ingresamos las filas con los campos de la base de datos para tener una mejor comprension del crud-->
                  <div class="crudAdmin" align="center">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //Hacemos un cuery hacia la base de datos mostrando, en este caso, los campos necesarios para mostrar la tabla de Categorias de Fabricantes
                        $cueryCategoriaFabricante = "SELECT id, nombre FROM categoria_fabricante";

                        //Hacemos la conexion entre la base de datos y el cuery para posteriomente mostrarlo
                        $resultCategoriaFabricante = mysqli_query($BD,$cueryCategoriaFabricante);
                        $numrowsCategoriaFabricante = mysqli_num_rows($resultCategoriaFabricante);

                        while ($rowCategoriaFabricante = mysqli_fetch_assoc($resultCategoriaFabricante)) {
                          //Le agregamos valores a las varibales dependiendo el orden asendente del id
                          $id = $rowCategoriaFabricante['id'];
                          $nombre = $rowCategoriaFabricante['nombre'];

                          $identificador = $rowCategoriaFabricante['id'];?>
                          <tr>
                          <?php
                          //Mostramos los registros recolectados de la base de datos en cada columna para una mejor comprencion
                          echo "<td>".$id."</td>";
                          echo "<td>".$nombre."</td>";?>
                        

                        <!--Un boton de Editar para modificar el registro que solicite el usuario-->
                        <td align="right">
                        <form action="vistas/editCategoriaFabricante.php" method="post">
                        <button class="btn btn-success" type="submit" name="editar"
                        value="<?php echo htmlspecialchars($identificador); ?>">Editar
                        </button>
                        </form>
                        </td>

                        <!--Un boton de Borrar para eliminar el registro que solicite el usuario-->
                        <td>
                        <form method="post" action="controladores/borrar_CategoriaFabricante.php">
                        <button type="submit" class="btn btn-danger" name="id"
                        value="<?php echo htmlspecialchars($identificador); ?>">Borrar
                        </button>
                        </form>
                        </td>
                        <?php
                        }

                        ?>

                        </tr>

                      </tbody>
                    </table>
                  </div>

                </form>


              </form>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--Fin del Crud de Categoria de Fabricante-->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
