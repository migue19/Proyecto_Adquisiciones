
<?php
require('../conexion/conexion.php');

	$numero=$_GET["num"];
	$idp=$_GET["id"];

 	 //Como no sabemos cuantos archivos van a llegar, iteramos la variable $_FILES
  	$ruta="../docuproveedores/"; //definimos la ruta donde se almacenaran los archivos
  	foreach ($_FILES as $key) {
	    if($key['error'] == UPLOAD_ERR_OK ){ //Verificamos si se subio correctamente
	      	$nombre = $key['name'];//Obtenemos el nombre del archivo
	      	$temporal = $key['tmp_name']; //Obtenemos el nombre del archivo temporal
	      	$tamano= ($key['size'] / 1000)."Kb"; //Obtenemos el tamaño en KB
	      	move_uploaded_file($temporal, $ruta . $nombre); //Movemos el archivo temporal a la ruta especificada
	      	//El echo es para que lo reciba jquery y lo ponga en el div "cargados"
             switch ($numero) {
             	case 1:
             		 $tipoarchi="Actcost";
             		break;
             	
             	default:
             		# code...
             		break;
             }


        mysql_query("INSERT INTO proveedores() VALUES('$nombre')");

	    echo "
	    	<p id='subido'>
	        <strong>Subido: ".$nombre."</strong><br />
	        </p>
	      ";
	    }else{
	    	echo $key['error']; //Si no se cargo mostramos el codigo del error
	    }
  	}

  	/* ============================================================================ */
  	/*																				*/
  	/*			Ahora lo unico que resta por hacer es conectarse a mysql y 			*/
  	/*			enviar las variables a las bases de datos, para eso puedes 			*/
  	/*			ingresar a este link donde encontraras la clase que hablamos 		*/
  	/*			sobre PHP y mysql, y donde explicamos como guardar datos en 		*/
  	/*			ella, Link : https://www.youtube.com/watch?v=ABD6kWbk-PE			*/
	/*																				*/
  	/*			Atte,																*/
  	/*			Pro-Gramadores														*/
  	/*																				*/
  	/* ============================================================================ */
?>
