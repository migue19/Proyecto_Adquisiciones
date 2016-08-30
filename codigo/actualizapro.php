<?php

header("Content-Type: text/html;charset=utf-8");
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
mysql_query("SET NAMES 'utf8'");




session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");
$Tabla='Productos';



$res_alumno=mysql_query("SELECT * FROM Productos WHERE Idpr=$_GET[idpr]"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]
$fila=mysql_fetch_array($res_alumno); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]

if (isset($_POST['boton_actualiza'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{
$importe=$_POST['preuni']*$_POST['cant'];
$importeiva=$importe*0.16;
$importeiva=$importeiva+$importe;
  
mysql_query("UPDATE productos SET NoFinanzas='$_POST[autorizacion]', Idpm='$_POST[nombre]', IdPartida='$_POST[partida]', Descripcion='$_POST[descripcion]', Preciouni='$_POST[preuni]', Cantidad='$_POST[cant]',Importe='$importe', ImporteIva='$importeiva',Fechapro='$_POST[fecha]', Idcli='$_POST[soli]', AOP='$_POST[aop]', Factura='$_POST[factura]' WHERE Idpr='$_GET[idpr]'");
//mysql_query("INSERT INTO registrocambios(Fecha,Antes,Cambios,Tabla) VALUES('$fecha1','Descripcion: $fila[Descripcion]  Importe: $fila[Importe]','Partida: $_POST[partida] NombreEmp:$_POST[nombre]','$Tabla')");

 // INSTRUCCION SQL QUE MODIFICA EL CONTENIDO DE LOS CAMPOS QUE CORRESPONDEN AL ALUMNO $_GET[ida].
if(mysql_error())
  echo "Error: ".mysql_error();
else
header("Location:listadopro.php?msj=1&p=$_GET[p]"); // DESPUES DE LA ACTUALIZACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Actualizar Productos</title>
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
        <legend class="text-center">Actualizar Producto</legend>


<div class="form-group">
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">

<label for="">AOP</label>
       <input class="form-control" type="text" name="aop" id="aop" value="<?php echo $fila['AOP']?>">

       <label for="">No. Factura</label>
       <input class="form-control" type="text" name="factura" id="factura" value="<?php echo $fila['Factura']?>">
<label for="">No. Autorizacion Finanzas</label>
       <input class="form-control" type="text" name="autorizacion" value="<?php echo $fila['NoFinanzas']?>">
    

    <label for="">Partida</label>
      <select class="form-control" name="partida" id="partida">
        <option value="0">-- Selecciona --</option>
        <?php // HAGO UN RECORRIDO DE LA TABLA "ESTADOS" PARA DEJAR SELECCIONADO EL QUE YA ESTABA ALMACENADO, USO DE "SELECTED"
         $query=mysql_query("SELECT * FROM partida WHERE 1 ORDER BY IdPartida ASC");       
       while ($resultado=mysql_fetch_array($query))
       {    // COMPARO EL idestado DEL ALUMNO CON EL idestado DE LA TABLA ESTADOS
         if ($fila['IdPartida']==$resultado['IdPartida']) 
          $seleccionado="selected"; // SI COINCIDEN ENTONCES HAGO USO DE SELECTED
         else
          $seleccionado="";
         echo "<option value=\"$resultado[IdPartida]\" $seleccionado>$resultado[IdPartida]</option>"; // USO DE "SELECTED"
       }
      ?>
      </select>
<label for="">Proveedor</label>
   <select class="form-control" name="nombre" id="nombre">
        <option value="0">-- Selecciona --</option>
        <?php // HAGO UN RECORRIDO DE LA TABLA "ESTADOS" PARA DEJAR SELECCIONADO EL QUE YA ESTABA ALMACENADO, USO DE "SELECTED"
         $query=mysql_query("SELECT * FROM proveedores WHERE 1 ORDER BY NombreEmp ASC");       
       while ($resultado=mysql_fetch_array($query))
       {    // COMPARO EL idestado DEL ALUMNO CON EL idestado DE LA TABLA ESTADOS
         if ($fila['Idpm']==$resultado['Idpm']) 
          $seleccionado="selected"; // SI COINCIDEN ENTONCES HAGO USO DE SELECTED
         else
          $seleccionado="";
         echo "<option value=\"$resultado[Idpm]\" $seleccionado>$resultado[NombreEmp]</option>"; // USO DE "SELECTED"
       }
      ?>
      </select>
      
      <label for="">Unidad Solicitante</label>
      <select class="form-control" name="soli" id="soli">
        <option value="0">-- Selecciona --</option>
        <?php // HAGO UN RECORRIDO DE LA TABLA "ESTADOS" PARA DEJAR SELECCIONADO EL QUE YA ESTABA ALMACENADO, USO DE "SELECTED"
         $query=mysql_query("SELECT * FROM clientes WHERE 1 ORDER BY Nombre ASC");       
       while ($resultado=mysql_fetch_array($query))
       {    // COMPARO EL idestado DEL ALUMNO CON EL idestado DE LA TABLA ESTADOS
         if ($fila['Idcli']==$resultado['Idcliente']) 
          $seleccionado="selected"; // SI COINCIDEN ENTONCES HAGO USO DE SELECTED
         else
          $seleccionado="";
         echo "<option value=\"$resultado[Idcliente]\" $seleccionado>$resultado[Nombre]</option>"; // USO DE "SELECTED"
       }
      ?>
      </select>
   <label for="">Fecha</label><!-- CON EL VALOR "VALUE" IMPRIMO EL NOMBRE DENTRO DE LA CAJA DE TEXTO -->
        <input class="form-control" type="datetime-local" name="fecha" value="<?php echo "$fecha1";?>">
     

    
    <label for="">Descripcion</label>
      <textarea class="form-control" name="descripcion" id="descripcion" cols="45" rows="5"><?php echo $fila['Descripcion']?></textarea>
    
      <label for="">Precio Unitario</label>
      <div class="input-group">
                  <div class="input-group-addon">$</div>
                <input class="form-control" type="number" step=".1" name="preuni" id="preuni" value="<?php echo $fila['Preciouni']?>">
        </div>
            
   <label for="">Cantidad</label>
       <input class="form-control" type="number" step="1" name="cant" id="cant" value="<?php echo $fila['Cantidad']?>">
    
     
<br>
<input id="buttonGreen" name="boton_actualiza" class="btn btn-block btn-info" type="submit" id="boton_actualiza" value="ACTUALIZA">


</form>

</div>

     </div>
    </div>



    <div class="span4"></div>



  </div>




</div>
</body>
</html>