<?php
header("Content-Type: text/html;charset=utf-8");

$servidor="localhost"; // SERVIDOR A CONECTARME
$usuario="root"; // USUARIO QUE TENDRA ACCESO A LA BD
$contrasenia=""; // CONTRASEÑA DEL USUARIO ANTERIOR
$conexion=@mysql_connect($servidor,$usuario,$contrasenia); // SINTAXIS MySQL PARA HACER CONEXION A LA BD CON PHP
$basedatos=mysql_select_db("gestion",$conexion); // SINTAXIS MySQL PARA SELECCIONAR LA BD CON PHP
if((!$conexion) || (!$basedatos)) // SI CUALQUIERA DE LAS 2 ANTERIORES, CONEXION O SELECCION DE LA BD, FALLO ENTONCES MANDO UN MENSAJE A PANTALLA
 echo "No se pudo establecer la conexion";
 mysql_query("SET NAMES 'utf8'");
?>