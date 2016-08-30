<?php
require("../conexion/conexion.php"); // CONEXION A LA BD
session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

$res_alumno=mysql_query("SELECT * FROM usuarios WHERE Idusuario=$_GET[idus]"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($res_alumno); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]

date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");


if (isset($_POST['boton_actualiza'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{		
mysql_query("UPDATE usuarios SET Nombre='$_POST[nombre]', Privilegio='$_POST[privilegio]', Login='$_POST[username]'  WHERE Idusuario=$_GET[idus]"); // INSTRUCCION SQL QUE MODIFICA EL CONTENIDO DE LOS CAMPOS QUE CORRESPONDEN AL ALUMNO $_GET[ida].
if(mysql_error())
  echo "Error: ".mysql_error();
else
header("Location:listadoadmin.php?msj=1&p=$_GET[p]"); // DESPUES DE LA ACTUALIZACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Actualizar Administrador</title>
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
        <legend class="text-center">Actualizar Administrador</legend>

<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

<label for="">Nombre</label>
<input class="form-control" name="nombre" type="text" id="nombre" value="<?php echo $fila["Nombre"];?>">
<label for="">Privilegio</label>
<input class="form-control" name="privilegio" type="text" id="area" value="<?php echo $fila["Privilegio"];?>">
<label for="">Username</label>      
<input class="form-control" name="username" type="text" id="resp" value="<?php echo $fila["Login"];?>">
   
    <br>

 <input id="buttonGreen" name="boton_actualiza" class="btn btn-block btn-info" type="submit" value="ACTUALIZA">
</form>

</div>
      </div>
    </div>
    <div class="span4"></div>



  </div>




</div>
</body>
</html>