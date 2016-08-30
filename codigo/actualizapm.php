<?php
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS

session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");

$proveedor=mysql_query("SELECT * FROM proveedores WHERE Idpm=$_GET[idpm]"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($proveedor); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]


if (isset($_POST['boton_actualiza'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{	
mysql_query("UPDATE proveedores SET Colonia='$_POST[colonia]', CP='$_POST[cp]' ,RepreLegal='$_POST[reprelegal]',Delegacion='$_POST[delegacion]' ,Idtp='$_POST[tipo]', NombreEmp='$_POST[nombre]', Direccion='$_POST[Dire]', Telefono='$_POST[Telef]', RFC='$_POST[rfc]', Correo='$_POST[correo]' WHERE Idpm=$_GET[idpm]");// INSTRUCCION SQL QUE MODIFICA EL CONTENIDO DE LOS CAMPOS QUE CORRESPONDEN AL ALUMNO $_GET[ida].
if(mysql_error())
  echo "Error: ".mysql_error();
else
header("Location:listadopm.php?p=1"); // DESPUES DE LA ACTUALIZACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Actualizar Proveedor</title>
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
				<legend class="text-center">Actualizar Proveedor</legend>


<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
Tipo	
<select name="tipo" id='idtipo' class="form-control">
        <option value="0">-- Selecciona --</option>
        <?php // HAGO UN RECORRIDO DE LA TABLA "ESTADOS" PARA DEJAR SELECCIONADO EL QUE YA ESTABA ALMACENADO, USO DE "SELECTED"
		     $query2=mysql_query("SELECT * FROM tipo_proveedor");			 
			 while ($resultado=mysql_fetch_array($query2))
			 {    // COMPARO EL idestado DEL ALUMNO CON EL idestado DE LA TABLA ESTADOS
			   if ($fila['Idtp']==$resultado['Idtp']) 
			    $seleccionado="selected"; // SI COINCIDEN ENTONCES HAGO USO DE SELECTED
			   else
			    $seleccionado="";
			   echo "<option value=\"$resultado[Idtp]\" $seleccionado>$resultado[Tipo]</option>"; // USO DE "SELECTED"
			 }
		  ?>
      </select>

Nombre
  <input class="form-control" type="text" name="nombre" value="<?php echo $fila['NombreEmp'];?>">
Fecha
  <input class="form-control" type="datetime-local" name="fecha" value="<?php echo $fecha1;?>"> 
Direccion
   <input class="form-control" type="text" name="Dire" value="<?php echo $fila['Direccion'];?>"> 
Colonia
   <input class="form-control" type="text" name="colonia" value="<?php echo $fila['Colonia'];?>">
C.P.
   <input class="form-control" type="text" name="cp" value="<?php echo $fila['CP'];?>">
Representante Legal
   <input class="form-control" type="text" name="reprelegal" value="<?php echo $fila['RepreLegal'];?>">
Delegacion
   <input class="form-control" type="text" name="delegacion" value="<?php echo $fila['Delegacion'];?>">            


Telefono
   <input class="form-control" type="text" name="Telef" value="<?php echo $fila['Telefono'];?>"> 
RFC
 <input class="form-control" type="text" name="rfc" value="<?php echo $fila['RFC'];?>"> 
Correo Electronico 
 <input class="form-control" type="email" name="correo" value="<?php echo $fila['Correo'];?>"> 

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