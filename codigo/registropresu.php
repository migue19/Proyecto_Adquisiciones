<?php

require("../conexion/conexion.php"); // CONEXION A LA BD
require("../funciones/general.php");

if (isset($_POST['boton_registra'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Registrar"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY INSERTA LOS DATOS PORPORCIONADOS EN EL FORMULARIO

mysql_query("INSERT INTO presupuesto(Presupuesto,FechaIni,FechaFin,IdPartida) VALUES ('$_POST[presu]', '$_POST[ini]', '$_POST[fin]', '$_POST[partida]')");
if(mysql_error())
echo "Error: ".mysql_error();
}

if (isset($_POST['boton_regresa'])) // CODIGO A EJECUTARSE CUANDO SE PULSE EL BOTON DE "Regresa"
{ // UNA VEZ PULSADO EL BOTON, ESTE QUERY REGRESA A LISTADO
header("Location:listadopresu.php?p=1"); 
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<title>Registro de Presupuesto</title>
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
        <legend class="text-center">Alta de Presupuesto</legend>


<div class="form-group">
<form name="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST">

<label for="">Partida</label>
<select class="form-control" name="partida" id="idpartida">
          <option value="0">-- Selecciona --</option>
      <?php // LISTA DE FORMA DINAMICA LOS 32 ESTADOS ALMACENADOS EN LA BD
         $query=mysql_query("SELECT * FROM partida WHERE 1 ORDER BY IdPartida ASC");       
       while ($resultado=mysql_fetch_array($query))
       {
         echo "<option value=\"$resultado[IdPartida]\">$resultado[IdPartida]</option>";
       }
      ?>
    </select>
    
    <div id="iddiv"></div>
    
    <label for="">Presupuesto</label>
    <input class="form-control" name="presu" type="text" id="nombre">
    
    <label for="">Fecha Inicio</label>
    <input class="form-control" name="ini" type="date" value="2015-01-01" id="area">

    
  <label for="">Fecha Fin</label>
     <input class="form-control" name="fin" value="2015-12-31" type="date" id="resp">

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

