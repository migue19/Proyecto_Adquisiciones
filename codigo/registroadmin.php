<?php

require("../conexion/conexion.php"); // CONEXION A LA BD
require("../funciones/general.php");

if (isset($_POST['boton_registra'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Registrar"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY INSERTA LOS DATOS PORPORCIONADOS EN EL FORMULARIO

mysql_query("INSERT INTO usuarios(Nombre,Privilegio,Login,Password) VALUES ('$_POST[nombre]', '$_POST[privilegio]', '$_POST[username]', '$_POST[password]')");

if(mysql_error())
echo "Error: ".mysql_error();

}

if (isset($_POST['boton_regresa'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Regresa"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY REGRESA A LISTADO
header("Location:listadoadmin.php?p=1"); 
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Registro de Administradores</title>
<link rel="stylesheet" type="text/css" href="../css/mystyle.css"> 
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

<script src="../js/jquery.js"></script>


</head>
<body>
 <div class="container">

    <div class="row-fluid">
    <br><br><br><br>
  </div>

  <div class="row-fluid">
    <div class="span4"></div>
    <div class="span4">
      <div class="well">
        <legend class="text-center">Alta de Administradores</legend>


<div class="form-group">
<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

      <label for="">Nombre</label>
      <input class="form-control" name="nombre" type="text" id="nombre">

      <label for="">Privilegio</label>
      <input class="form-control" name="privilegio" type="text" id="area" placeholder="solo 1 o 2">

     <label for="">Username</label>
      <input class="form-control" name="username" type="text" id="resp">

     <label for="">Password</label>
     <input class="form-control" name="password" type="password" id="resp">

 <br>

     <?php buttonform();?>

</div>


      </div>
    </div>
    <div class="span4"></div>



  </div>




</div>
</body>
</html>

