<?php
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS


session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }



date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");

$proveedor=mysql_query("SELECT * FROM partida WHERE IdPartida='$_GET[idpart]'"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($proveedor); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]


if (isset($_POST['boton_actualiza'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{	
mysql_query("UPDATE partida SET IdPartida='$_POST[partida]', Nombre='$_POST[nombre]', Descripcion='$_POST[desc]' WHERE IdPartida='$_GET[idpart]'");// INSTRUCCION SQL QUE MODIFICA EL CONTENIDO DE LOS CAMPOS QUE CORRESPONDEN AL ALUMNO $_GET[ida].
if(mysql_error())
  echo "Error: ".mysql_error();
else
header("Location:listadopartida.php?p=1"); // DESPUES DE LA ACTUALIZACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
}



?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Actualizar Partida</title>
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
				<legend class="text-center">Actualizar Partida</legend>


<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
  No. Partida
       <input type="text" class="form-control"  name="partida" value="<?php echo $fila['IdPartida'];?>">
  Nombre
       <input class="form-control" type="text" name="nombre" value="<?php echo $fila['Nombre'];?>">

  Descripcion  
       <textarea class="form-control" name="desc" cols="45" rows="5"><?php echo $fila['Descripcion'];?> </textarea>

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