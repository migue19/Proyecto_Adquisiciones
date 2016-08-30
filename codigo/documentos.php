<?php

require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS



$query=mysql_query("SELECT * FROM docuprov WHERE Idpm=$_GET[idpm]");


$fila=mysql_fetch_array($query);
?>



<!DOCTYPE html>

<html>
<head>
<title>Documentos</title>
<link rel="stylesheet" type="text/css" href="../css/mystyle.css"> 
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>	


<body>

<div class="row-fluid">
    <br><br><br><br>
  </div>	
	
<div class="container">
	<div class="row-fluid">
		<div class="span4"></div>
		<div class="span4">
			<table class="table">
				<tr>
					<th class="thcolor">Acta Constitutiva</td>
					<td> <a class="btn btn-block btn-primary" href="<?php echo $fila['Actcost'];?>">Ver</a></td>
				</tr>
				<tr>
					<th class="thcolor">Comprobante de Identificacion</td>
					<td> <a class="btn btn-block btn-primary" href="<?php echo $fila['Actcost'];?>">Ver</a></td>
				</tr>
				<tr>
					<th class="thcolor">Comprobante de RFC</td>
					<td> <a class="btn btn-block btn-primary" href="<?php echo $fila['Actcost'];?>">Ver</a></td>
				</tr>
				<tr>
					<th class="thcolor">Estado Bancario</td>
					<td> <a class="btn btn-block btn-primary" href="<?php echo $fila['Actcost'];?>">Ver</a></td>
				</tr>
				<tr>
					<th class="thcolor">Domicilio Fiscal</td>
					<td> <a class="btn btn-block btn-primary" href="<?php echo $fila['Actcost'];?>">Ver</a></td>
				</tr>
				<tr>
					<th class="thcolor">Carta Membretada</td>
					<td> <a class="btn btn-block btn-primary" href="<?php echo $fila['Actcost'];?>">Ver</a></td>
				</tr>

				<tr>
					<td><a class="btn btn-block btn-info" href="listadopm.php?p=1">Regresar</a></td>

				</tr>
				


			</table>
		</div>

		<div class="span4"></div>
	</div>



</div>



</body>

</html>
