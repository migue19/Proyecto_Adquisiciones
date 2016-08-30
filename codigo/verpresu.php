<?php
header("Content-Type: text/html;charset=utf-8");
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
mysql_query("SET NAMES 'utf8'");



$query=mysql_query("SELECT * FROM presupuesto WHERE IdPartida='$_GET[partida]' and FechaIni='$_GET[fecha]' "); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($query); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]
$total_registros=mysql_num_rows($query);

if($total_registros!=0)	
echo '
      <td width="29%" align="center">Presupuesto</td>
      <td width="7%">&nbsp;</td>
      <td width="64%"><input name="ini2" type="text" id="area" readonly="readonly" value="'.$fila['Presupuesto'].'"></td>

';

else
echo '
      <td width="29%" align="center">Presupuesto</td>
      <td width="7%">&nbsp;</td>
      <td width="64%"><input name="ini2" type="text" id="area" readonly="readonly" value="No hay presupuesto"></td>

';







