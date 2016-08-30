<?php
/*
ESTE SCRIPT SE ENCARGA DE ELIMINAR TODA LA INFORMACION RELACIONADA CON EL ALUMNO $_GET[ida].
*/
require ("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
mysql_query("DELETE FROM partida WHERE IdPartida='$_GET[idpart]'"); // INSTRUCCION SQL QUE ELIMINA AL ALUMNO $_GET[ida].
header("Location:listadopartida.php?msj=2&p=$_GET[p]"); // DESPUES DE LA ELIMINACION REDIRECCIONO AL LISTADO PARA VER LOS CAMBIOS
?>