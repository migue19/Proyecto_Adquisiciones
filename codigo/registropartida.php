<?php

require("../conexion/conexion.php"); // CONEXION A LA BD
require("../funciones/general.php");
session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }


$usuario=$_SESSION['Idusuario'];


date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");

if (isset($_POST['boton_registra'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Registrar"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY INSERTA LOS DATOS PORPORCIONADOS EN EL FORMULARIO

mysql_query("INSERT INTO partida(IdPartida,Nombre,Descripcion) VALUES ('$_POST[partida]','$_POST[nombre]','$_POST[desc]')");
if(mysql_error())
echo "Error: ".mysql_error();
//mysql_query("INSERT INTO proveedores(Idtp,Idusuario) VALUES('1','3')");
}

if (isset($_POST['boton_regresa'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Regresa"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY REGRESA A LISTADO
header("Location:listadopartida.php?p=1"); 
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Registro de Partida</title>
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
				<legend class="text-center">Alta de Partidas</legend>



	

   <div class="form-group">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">

     <label for="lpartida">No Partida</label>
        <input class="form-control" name="partida" type="text" id="partida" required>

      <label for="lnombre">Nombre</label>

        <input class="form-control" name="nombre" type="text" id="nombre" required>
    
    <label for="ldescripcion">Descripcion</label>
     <textarea class="form-control" name="desc" cols="45" rows="5"> </textarea>
      
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