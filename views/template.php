<!--Es la plantilla que vera el usuario al ejecutar la aplicación -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Template</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

button{
  background-color: white;
  color: black;
  border: 2px solid #008CBA;
}

nav{
position:relative;
margin:auto;
width:100%;
height:auto;
background:black;
}

nav ul{
position:relative;
margin:auto;
width:80%;
text-align: center;
}

nav ul li{
display:inline-block;
width:12%;
line-height: 50px;
list-style: none;
}

nav ul li a{
color:white;
text-decoration: none;
}

section{
position: relative;
margin: auto;
width:400px;
}

section h1{
position: relative;
margin: auto;
padding:10px;
text-align: center;
}

section form{
position:relative;
margin:auto;
width:400px;
}

section form input{
display:inline-block;
padding:10px;
width:95%;
margin:5px;
}

section form input[type="submit"]{
position:relative;
margin:20px auto;
left:4.5%;

}

table{
position:relative;
margin:auto;
width:100%;
left:-10%;
}

table thead tr th{
padding:10px;
}

table tbody tr td{
padding:10px;
}
</style>

</head>

<body>

  <?php
  error_reporting(E_ERROR | E_PARSE);
  include "modules/navegacion.php";
  ?>

  <section>
    <?php
    $mvc = new MvcController();
    $mvc -> enlacesPaginasController();
     ?>
  </section>

</body>
</html>
