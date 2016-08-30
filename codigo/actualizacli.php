<?php
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

$res_alumno=mysql_query("SELECT * FROM clientes WHERE Idcliente=$_GET[idpm]"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($res_alumno); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]

date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");


if (isset($_POST['boton_actualiza'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{		
mysql_query("UPDATE clientes SET DireccionC='$_POST[direccion]',CPC='$_POST[cp]',DelegacionC='$_POST[delegacion]',ColoniaC='$_POST[colonia]' ,Nombre='$_POST[nombre]', Responsable='$_POST[resp]'  WHERE idcliente=$_GET[idpm]"); // INSTRUCCION SQL QUE MODIFICA EL CONTENIDO DE LOS CAMPOS QUE CORRESPONDEN AL ALUMNO $_GET[ida].
//$cadenacambios='Nombre: '.$_POST['nombre'].' Responsable: '.$_POST['resp'];
//$cadenaantes='Nombre: '.$fila['Nombre'].' Responsable: '.$fila['Responsable'];


//mysql_query("INSERT INTO registrocambios(Fecha,Cambios,Antes,Tabla,Idusuario) VALUES('$fecha1','$cadenacambios','$cadenaantes','Clientes','$_SESSION[Idusuario]')");
//,Antes,Tabla,Idusuario
if(mysql_error())
  echo "Error: ".mysql_error();
else
header("Location:listadocli.php?msj=1&p=$_GET[p]"); // DESPUES DE LA ACTUALIZACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
}

?>





<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Actualizar Cliente</title>
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
        <legend class="text-center">Actualizar Cliente</legend>

<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
<label for="">Nombre</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="<?php echo $fila["Nombre"];?>">
<label for="">Direccion</label>
    <input class="form-control" name="direccion" type="text" id="nombre" value="<?php echo $fila["DireccionC"];?>">
<label for="">Colonia</label>
    <input class="form-control" name="colonia" type="text" id="nombre" value="<?php echo $fila["ColoniaC"];?>">
<label for="">C.P.</label>
    <input class="form-control" name="cp" type="text" id="nombre" value="<?php echo $fila["CPC"];?>">
<label for="">Delegacion</label>
    <input class="form-control" name="delegacion" type="text" id="nombre" value="<?php echo $fila["DelegacionC"];?>">
                    
  <label for="">Responsable</label>
    <input class="form-control" name="resp" type="text" id="resp" value="<?php echo $fila["Responsable"];?>">
 
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