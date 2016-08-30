<?php
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS

session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

$res_alumno=mysql_query("SELECT * FROM presupuesto,partida WHERE presupuesto.IdPartida=partida.IdPartida and presupuesto.Idpresu='$_GET[idpre]'"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($res_alumno); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]

date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");


if (isset($_POST['boton_actualiza'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{		
//mysql_query("UPDATE clientes SET Nombre='$_POST[nombre]', Area='$_POST[area]', Responsable='$_POST[resp]'  WHERE idcliente=$_GET[idpm]"); // INSTRUCCION SQL QUE MODIFICA EL CONTENIDO DE LOS CAMPOS QUE CORRESPONDEN AL ALUMNO $_GET[ida].
//$cadenacambios='Nombre: '.$_POST['nombre'].' Area: '.$_POST['area'].' Responsable: '.$_POST['resp'];
//$cadenaantes='Nombre: '.$fila['Nombre'].' Area: '.$fila['Area'].' Responsable: '.$fila['Responsable'];

$actual= $_POST['ini1']+$_POST['monto'];
$actual2=$_POST['ini2']-$_POST['monto'];

$monto2=-($_POST['monto']);


mysql_query("INSERT INTO transferencias(PresuIni,PresuActual,Monto,Comentario,Fecha,Idpresu,IdPartida) VALUES('$_POST[ini1]','$actual','$_POST[monto]','$_POST[comen]','$fecha1','$_GET[idpre]','$_POST[partida1]')");
//,Antes,Tabla,Idusuario
mysql_query("UPDATE presupuesto SET Presupuesto='$actual' WHERE Idpresu=$_GET[idpre]");

mysql_query("INSERT INTO transferencias(PresuIni,PresuActual,Monto,Comentario,Fecha,Idpresu,IdPartida) VALUES('$_POST[ini2]','$actual2','$monto2','$_POST[comen]','$fecha1','$_POST[idpre2]','$_POST[partida]')");
//,Antes,Tabla,Idusuario
mysql_query("UPDATE presupuesto SET Presupuesto='$actual2' WHERE Idpresu=$_POST[idpre2]");



//header("Location:listadopresu.php?msj=1&p=$_GET[p]"); // DESPUES DE LA ACTUALIZACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
}

if (isset($_POST['boton_regresa'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Regresa"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY REGRESA A LISTADO
header("Location:listadopresu.php?p=1"); 
}

?>





<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Alta Transferencia</title>
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
         var fecha= "<?php echo $fila['FechaIni']; ?>" ; 

         $.get("verpartida.php",{partida:id})
         .done(function(data){
         $("#iddiv").html(data);
      }) 

          $.get("verprueba.php",{partida:id, fecha:fecha})
         .done(function(data2){
            
              var objJSON = eval("(function(){return " + data2 + ";})()");
              //alert(objJSON.idpresupuesto);
              //alert(objJSON.monto);
              $("#idpresu").html(objJSON.monto);
              $("#idnumero").html(objJSON.idpresupuesto);


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
        <legend class="text-center">Realizar una Transferencia</legend>

<div class="form-group">
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
      <label for="">Partida</label>
      <input class="form-control" name="partida1" type="text" readonly="readonly" id="nombre" value="<?php echo $fila["IdPartida"];?>">
 <label for="">Descripcion</label>
      <input class="form-control" name="desc1" type="text" id="nombre" readonly="readonly" value="<?php echo $fila["Nombre"];?>">

<label for="">Precio Inicial</label>
    <input class="form-control" name="ini1" type="text" id="nombre" readonly="readonly" value="<?php echo $fila["Presupuesto"];?>">
    
  <label for="">Fecha Inicial</label>
 <input class="form-control" name="fecha1" type="text" id="nombre" readonly="readonly" value="<?php echo $fila["FechaIni"];?>">
    
<label for="">Fecha Fin</label>
    <input class="form-control" name="fechafin1" type="text" id="nombre" readonly="readonly" value="<?php echo $fila["FechaFin"];?>">
    
   <label for="">Partida a Transferir</label> 
    <select class="form-control" name="partida" id="idpartida">
          <option value="0">-- Selecciona --</option>
      <?php // LISTA DE FORMA DINAMICA LOS 32 ESTADOS ALMACENADOS EN LA BD
         $query=mysql_query("SELECT * FROM partida WHERE 1 ORDER BY IdPartida ASC");       
       while ($resultado=mysql_fetch_array($query))
       {
         echo '<option value="'.$resultado['IdPartida'].'">'.$resultado['IdPartida'].'</option>'; 
       }
      ?>
    </select>


    <div id="iddiv"></div>
    <div id="idpresu"></div>
    <div id="idnumero"></div>

<br>
    <div class="alert alert-danger">
   <p class="text-center"><b>Nota: -50 se restara a la 1 partida y agregara a la segunda y viceversa </b></p>
    </div>

     <label for="">Monto de la Transferencia</label>
      <input class="form-control" name="monto" type="text" id="area" placeholder="ejemplo '50' o '- 50'">
    
    <label for="">Comentario</label>
      <input class="form-control" name="comen" type="text" id="resp">

   <label for="">Fecha</label>
      <input class="form-control" name="fecha" type="datetime-local" id="resp" value="<?php echo $fecha1;?>">
    <br>

 <input name="boton_actualiza" class="btn btn-block btn-info" type="submit" value="Transferir">
</form>

<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
  <input name="boton_regresa" class="btn btn-block btn-info" type="submit" value="Regresar">
</form>

</div>

      </div>
    </div>
    <div class="span4"></div>



  </div>




</div>
</body>
</html>