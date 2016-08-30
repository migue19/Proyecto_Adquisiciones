<?php
header("Content-Type: text/html;charset=utf-8");

$servidor="us-cdbr-azure-west-a.cloudapp.net"; // SERVIDOR A CONECTARME
$usuario="b99aca731eebb6"; // USUARIO QUE TENDRA ACCESO A LA BD
$contrasenia="23e89c9b"; // CONTRASEÑA DEL USUARIO ANTERIOR
$conexion=@mysql_connect($servidor,$usuario,$contrasenia); // SINTAXIS MySQL PARA HACER CONEXION A LA BD CON PHP
$basedatos=mysql_select_db("Gestion",$conexion); // SINTAXIS MySQL PARA SELECCIONAR LA BD CON PHP
if((!$conexion) || (!$basedatos)) // SI CUALQUIERA DE LAS 2 ANTERIORES, CONEXION O SELECCION DE LA BD, FALLO ENTONCES MANDO UN MENSAJE A PANTALLA
 echo "No se pudo establecer la conexion";
mysql_query("SET NAMES 'utf8'");
 
?>

