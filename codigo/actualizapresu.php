<?php

require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS

session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

date_default_timezone_set('America/Mexico_City');

$fecha1=date("Y-m-d")."T".date("H:i:s");
$Tabla='Productos';



$res_alumno=mysql_query("SELECT * FROM presupuesto WHERE Idpresu=$_GET[idpre]"); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]
$fila=mysql_fetch_array($res_alumno); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]

if (isset($_POST['boton_actualiza'])) // EL SIGUIENTE CODIGO SE EJECUTA SI YA SE HA PULSADO EL BOTON "ACTUALIZA"
{
 
mysql_query("UPDATE presupuesto SET IdPartida='$_POST[partida]', Presupuesto='$_POST[presu]', FechaIni='$_POST[ini]',FechaFin='$_POST[fin]' WHERE Idpresu='$_GET[idpre]'");
//mysql_query("INSERT INTO registrocambios(Fecha,Antes,Cambios,Tabla) VALUES('$fecha1','Descripcion: $fila[Descripcion]  Importe: $fila[Importe]','Partida: $_POST[partida] NombreEmp:$_POST[nombre]','$Tabla')");

 // INSTRUCCION SQL QUE MODIFICA EL CONTENIDO DE LOS CAMPOS QUE CORRESPONDEN AL ALUMNO $_GET[ida].
if(mysql_error())
  echo "Error: ".mysql_error();
else
header("Location:listadopresu.php?msj=1&p=$_GET[p]"); // DESPUES DE LA ACTUALIZACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
}

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Actualizar Presupuesto</title>
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
        <legend class="text-center">Actualizar Presupuesto</legend>


<div class="form-group">
<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">
<label for="">Partida</label>
  <select class="form-control" name="partida" id="idpartida">
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
     
     <div id="iddiv"></div>

     <label for="">Presupuesto</label>
       <input class="form-control" type="number" step=".1" name="presu" id="presu" value="<?php echo $fila['Presupuesto']?>">
    

    <label for="">Fecha Inicio</label>
    <input name="ini" class="form-control" type="date" id="area" value="<?php echo $fila['FechaIni'];?>">
    

   <label for="">Fecha Fin</label>
    <input class="form-control" name="fin" type="date" id="area" value="<?php echo $fila['FechaFin'];?>">
    
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