<?php
/*
ESTE SCRIPT SE ENCARGA DE LISTAR TODA LA INFORMACION CONTENIDA EN LA TABLA ALUMNOS.
*/

session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
require("../funciones/general.php");
require("menu.php");



    //Checamos si busco por el formulario y dio en el boton BUSCAR (metodo POST)
	
    if(isset($_REQUEST['palabra']))
    {
	  $buscar=$_POST['palabra'];	
 
 //$query = mysql_query("SELECT * FROM productos WHERE //Partida LIKE '%$buscar%' ORDER BY Idpm ASC");


$query=mysql_query("SELECT * FROM registrocambios WHERE Tabla LIKE '%$buscar%'");



    }else{
			
	$query=mysql_query("SELECT * FROM registrocambios,usuarios WHERE registrocambios.Idusuario=usuarios.Idusuario");
			
	//$query=mysql_query("SELECT * FROM productos //WHERE 1 ORDER BY Partida ASC");	
    }

$total_registros=mysql_num_rows($query);



if($total_registros==0){ // SI LA CONSULTA REGRESO CERO REGISTROS

  echo "no hay resultados regresar a al pagina anterior";

}


?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Listado de Cambios</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/mystyle.css"> 
</head>

<body>
  


  <div class="container">
    <?php
if($total_registros==0){ // SI LA CONSULTA REGRESO CERO REGISTROS
echo "  !  NO SE ENCONTRARON RESULTADOS  !  <br>";
}
?>

  <div class="row-fluid">
    <div class="span6">
      <?php 
       divgeneral($_SESSION['Username'],'REGISTRO DE CAMBIOS',$total_registros);?>
    </div>
    <div class="span6"></div>
   
  </div>

                <table class="table table-bordered table-condensed">
                  <tr>

                
                      <th class="text-center thcolor">Fecha</th>
                       <th class="text-center thcolor">Sección</th>
                      <th class="text-center thcolor">Antes</th>
                      <th class="text-center thcolor">Cambios</th>
                       <th class="text-center thcolor">Usuario</th>
                    <th class="text-center thcolor">&nbsp;</th>
                
                    
                    
                    
                  </tr>
                  <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>         
                         <tr>
                            <td align="center"><?php echo $fila['Fecha'];?></td>
                            <td align="center"><?php echo $fila['Tabla'];?></td>
                            <td align="center"><?php echo $fila['Antes'];?></td>
                            <td align="center"><?php echo $fila['Cambios'];?></td>
                            <td align="center"><?php echo $fila['Nombre'];?></td>
                        
                         <td><!-- ENLACE PARA ELIMINAR EL REGISTRO $fila['idalumno'] -->
                          <a href="eliminacambios.php?idcam=<?php echo $fila['IdRegistroCambios'];?>&p=<?php echo $_GET['p'];?>" title="Elimina Registro" target="_self">
                             <i id="otherButton" class="fa fa-times"></i>
                           </a>
                          </td>
                          </tr>
                          <?php }?>

                 
                  
                </table>



  </div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
