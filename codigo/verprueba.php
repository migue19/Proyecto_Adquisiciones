<?php
header("Content-Type: text/html;charset=utf-8");
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
mysql_query("SET NAMES 'utf8'");



$query=mysql_query("SELECT * FROM presupuesto WHERE IdPartida='$_GET[partida]' and FechaIni='$_GET[fecha]' "); // OBTENGO LA INFORMACION DEL ALUMNO $_GET[ida]

$fila=mysql_fetch_array($query); // LOS ALMACENO EN UN ARREGLO DE LA FORMA ['JUAN','PEREZ GOMEZ','12 PTE',....]


$total_registros=mysql_num_rows($query);

if($total_registros!=0)
{
$arre = array('idpresupuesto' => '<input name="idpre2" type="hidden" id="idpre2" value="'.$fila['Idpresu'].'">' ,
			 
			  'monto'=> '<label for="">Presupuesto</label> <input class="form-control" name="ini2" type="text" id="ini2" readonly="readonly" value="'.$fila['Presupuesto'].'"></td>'
			  );
}
else
{
$arre = array('idpresupuesto' => '<input name="idpre2" type="hidden" id="area" value="0">' ,

			  'monto'=> '<label for="">Presupuesto</label> <input class="form-control" name="ini2" type="text" id="area" readonly="readonly" value="No Hay Presupuesto"></td>'
			  );
}






echo json_encode($arre);













