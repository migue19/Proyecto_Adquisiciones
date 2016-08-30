<?php

require("../conexion/conexion.php"); // CONEXION A LA BD
require("../funciones/general.php");

if (isset($_POST['boton_registra'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Registrar"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY INSERTA LOS DATOS PORPORCIONADOS EN EL FORMULARIO

mysql_query("INSERT INTO clientes(Nombre,Responsable,ColoniaC,CPC,DireccionC,DelegacionC) VALUES ('$_POST[nombre]', '$_POST[resp]','$_POST[colonia]','$_POST[cp]','$_POST[direccion]','$_POST[delegacion]')");

if(mysql_error())
echo "Error: ".mysql_error();


}

if (isset($_POST['boton_regresa'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Regresa"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY REGRESA A LISTADO
header("Location:listadocli.php?p=1"); 
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Registro de Clientes</title>
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
        <legend class="text-center">Alta de Unidad Solicitante</legend>


<div class="form-group">
<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

<label for="">Nombre</label>
      <input class="form-control" name="nombre" type="text" id="nombre">
<label for="">Direccion</label>
      <input class="form-control" name="direccion" type="text" id="nombre">
<label for="">Colonia</label>
      <input class="form-control" name="colonia" type="text" id="nombre">      
<label for="">C.P.</label>
      <input class="form-control" name="cp" type="text" id="nombre">
<label for="">Delegacion</label>
      <input class="form-control" name="delegacion" placeholder="Ejemplo: Puebla,Pue" type="text" id="nombre">

<label for="">Responsable</label>    
      <input class="form-control" name="resp" type="text" id="resp">

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

