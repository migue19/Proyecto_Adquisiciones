<?php
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
require("../funciones/general.php");

session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

$res_alumno=mysql_query("SELECT * FROM usuarios WHERE Idusuario=$_SESSION[Idusuario]"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($res_alumno); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]

date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");


if (isset($_POST['boton_registra'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{

  if(strcmp($fila['Password'], $_POST['anterior'])== 0)
  {

     if(strcmp($_POST['nueva'],$_POST['repetir'])==0)
      {

     mysql_query("UPDATE usuarios SET Password='$_POST[nueva]' WHERE Idusuario = $_SESSION[Idusuario]");
      }

      else
      {

        echo 'las contraseñas no coinciden'; 
      }

   }
 else
  {

    echo 'Contraseña de anterior incorrecta';
  }

}


if (isset($_POST['boton_regresa']))
{
header("Location:listadoadmin.php?p=1");
}



?>





<!DOCTYPE html>
<html>
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">-->

<title>Cuenta</title>
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
        <legend class="text-center">Cambiar Contraseña</legend>


<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
     <label for="">Contraseña Anterior</label>
      <input class="form-control" name="anterior" type="text" id="nombre">

    <label for="">Contraseña Nueva</label>
      <input class="form-control" name="nueva" type="password" id="area">


    <label for="">Repetir Contraseña </label> 
     <input class="form-control" name="repetir" type="password" id="resp">

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