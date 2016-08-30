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

$_SESSION['factura']=$_POST['factura'];
$_SESSION['AOP']=$_POST['aop'];
$_SESSION['partida']=$_POST['partida'];
$_SESSION['proveedor']=$_POST['nombre'];
$_SESSION['unidad']=$_POST['soli'];
$_SESSION['autorizacion']=$_POST['autorizacion'];
$importe=$_POST['preuni']*$_POST['cant'];
$importeiva=$importe*0.16;
$importeiva=$importeiva+$importe;

    
mysql_query("INSERT INTO productos(Idpm,Descripcion, Preciouni, Cantidad,Importe,Fechapro,Idcli,IdPartida,AOP,Factura,ImporteIva,NoFinanzas)
VALUES ('$_POST[nombre]','$_POST[descripcion]','$_POST[preuni]','$_POST[cant]', '$importe',  '$_POST[fecha]', '$_POST[soli]','$_POST[partida]','$_POST[aop]','$_POST[factura]','$importeiva','$_POST[autorizacion]')");

if(mysql_error())
echo "Error: ".mysql_error();

}

if (isset($_POST['boton_regresa'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Regresa"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY REGRESA A LISTADO
header("Location:listadopro.php?p=1"); 
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Registro de Productos</title>
<link rel="stylesheet" type="text/css" href="../css/mystyle.css"> 
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

<script src="../js/jquery.js"></script>

<script type="text/javascript">
     $(document).on("ready",function(){
      $("#idpartida").change(function(){
        //alert($("#idpartida").val());
         var id = $("#idpartida").val();
         $.get("verpartida.php",{partida:id})
         .done(function(data){
         $("#iddiv").html(data);
      }) 

      })
     })
</script>

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
        <legend class="text-center">Alta de Productos</legend>


<div class="form-group">
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">

 <label>AOP</label>
       <input class="form-control" type="text" name="aop" id="aop" value="<?php if(isset($_SESSION['AOP'])) echo $_SESSION['AOP'];?>">
  
<label>No. Autorización Finanzas</label>
       <input class="form-control" type="text" name="autorizacion" value="<?php if(isset($_SESSION['autorizacion'])) echo $_SESSION['autorizacion'];?>">
  
  <label> Factura</label>
       <input class="form-control" type="text" name="factura" id="factura" value="<?php if(isset($_SESSION['factura'])) echo $_SESSION['factura'];?>">
   
<label>Partida</label>
   <select class="form-control" name="partida" id="idpartida">
          <option value="0">-- Selecciona --</option>
      <?php // LISTA DE FORMA DINAMICA LOS 32 ESTADOS ALMACENADOS EN LA BD
         $query=mysql_query("SELECT * FROM partida WHERE 1 ORDER BY IdPartida ASC");       
       while ($resultado=mysql_fetch_array($query))
       {
         if ($resultado['IdPartida']==$_SESSION['partida']) 
          $seleccionado="selected"; // SI COINCIDEN ENTONCES HAGO USO DE SELECTED
         else
          $seleccionado="";
         echo "<option value=\"$resultado[IdPartida]\" $seleccionado>$resultado[IdPartida]</option>"; 
       }
      ?>
    </select>
   

    <div id="iddiv"></div>
  
  <label>Proveedor</label>
    <select class="form-control" name="nombre" id="nombre">
          <option value="0">-- Selecciona --</option>
      <?php // LISTA DE FORMA DINAMICA LOS 32 ESTADOS ALMACENADOS EN LA BD
         $query=mysql_query("SELECT * FROM proveedores WHERE 1 ORDER BY NombreEmp ASC");       
       while ($resultado=mysql_fetch_array($query))
       {
          if ($resultado['Idpm']==$_SESSION['proveedor']) 
          $seleccionado="selected"; // SI COINCIDEN ENTONCES HAGO USO DE SELECTED
         else
          $seleccionado="";
         echo "<option value=\"$resultado[Idpm]\" $seleccionado>$resultado[NombreEmp]</option>"; 
       }
      ?>
    </select>

<label>Unidad Solicitante </label>
    <select class="form-control" name="soli" id="soli">
          <option value="0">-- Selecciona --</option>
      <?php // LISTA DE FORMA DINAMICA LOS 32 ESTADOS ALMACENADOS EN LA BD
         $query=mysql_query("SELECT * FROM clientes WHERE 1 ORDER BY Nombre ASC");       
       while ($resultado=mysql_fetch_array($query))
       {
        if ($resultado['Idcliente']==$_SESSION['unidad']) 
          $seleccionado="selected"; // SI COINCIDEN ENTONCES HAGO USO DE SELECTED
         else
          $seleccionado="";
         echo "<option value=\"$resultado[Idcliente]\" $seleccionado>$resultado[Nombre]</option>"; 
       }
      ?>
    </select>

    <label>Fecha</label> <!-- CON EL VALOR "VALUE" IMPRIMO EL NOMBRE DENTRO DE LA CAJA DE TEXTO -->
        <input class="form-control" type="datetime-local" name="fecha" value="<?php echo "$fecha1";?>">
   
    
  <label>Descripcion </label>
      <textarea class="form-control" name="descripcion" id="descripcion" cols="45" rows="5"></textarea>
    
 <label> Precio Unitario </label>   
 <div class="input-group">
                  <div class="input-group-addon">$</div> 
       <input class="form-control" type="number" step=".01" name="preuni" id="preuni">
     </div>
 <label> Cantidad </label>
       <input class="form-control" type="number" step="1" name="cant" id="cant">

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