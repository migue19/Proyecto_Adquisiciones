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

mysql_query("INSERT INTO proveedores(NombreEmp,Direccion,Telefono,RFC,Correo,Idtp,Fecha,Colonia,CP,RepreLegal,Delegacion) VALUES ('$_POST[nombre]','$_POST[Dire]','$_POST[Telef]','$_POST[rfc]','$_POST[correo]', '$_POST[lista]', '$_POST[fecha]','$_POST[colonia]','$_POST[cp]','$_POST[reprelegal]','$_POST[delegacion]')");
//mysql_query("INSERT INTO proveedores(Idtp,Idusuario) VALUES('1','3')");
if(mysql_error())
echo "Error: ".mysql_error();

}

if (isset($_POST['boton_regresa'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Regresa"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY REGRESA A LISTADO
header("Location:listadopm.php?p=1"); 
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Registro de Proveedores</title>
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
				<legend class="text-center">Alta de Proveedores</legend>

<div class="form-group">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
 	<label for="">Tipo </label>
<select name="lista" id='idlista' required  class="form-control">
<option value=''>--Seleccione el tipo--</option>
<option value='1'>Persona Moral</option>
<option value='2'>Persona Fisica</option>
</select>


<label for="">Nombre</label>

    <input class="form-control" name="nombre" type="text" id="nombre" required>
    
   <label for="">Fecha </label>
     <input class="form-control" type="datetime-local" name="fecha" value="<?php echo $fecha1;?>"> 
     
   <label for="">Direccion </label>
      <input class="form-control" type="text" name="Dire" required>

      <label for="">Colonia </label>
      <input class="form-control" type="text" name="colonia" required>

       <label for="">Delegacion </label>
      <input class="form-control" type="text" name="delegacion" required>

       <label for="">C.P </label>
      <input class="form-control" type="text" name="cp" placeholder="Ejemplo: 72120" required>

      <label for="">Representante Legal </label>
      <input class="form-control" type="text" name="reprelegal" placeholder="Ejemplo: Juan Perez Lopez" required>

   <label for="">Telefono </label>
     <input class="form-control" type="text" name="Telef"> 

   <label for="">RFC </label>  
     <input class="form-control" type="text" name="rfc"> 

  <label for="">Correo Electronico </label>
    <input class="form-control" type="email" name="correo"> 
    
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