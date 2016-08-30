<?php
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS

$query=mysql_query("SELECT * FROM partida WHERE IdPartida='$_GET[partida]' "); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($query); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]

echo '<label for="lnpart">Nombre Partida</label><input class="form-control" name="monto" type="text" readonly="readonly" id="area" value="'.$fila['Nombre'].'">';






