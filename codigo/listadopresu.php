<?php
session_start();
  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }

require("../conexion/conexion.php"); // CONEXION A LA BD
require("../funciones/general.php");
require("menu.php");
    //Checamos si busco por el formulario y dio en el boton BUSCAR (metodo POST)
	
    if(isset($_REQUEST['palabra']))
    {
	  $buscar=$_POST['palabra'];	
 
 //$query = mysql_query("SELECT * FROM productos WHERE //Partida LIKE '%$buscar%' ORDER BY Idpm ASC");


$query=mysql_query("SELECT * FROM presupuesto,partida WHERE presupuesto.IdPartida=partida.IdPartida AND (presupuesto.IdPartida LIKE '%$buscar%' or partida.Nombre Like '%$buscar%') ORDER BY FechaIni ASC");

    }else{
			
	$query=mysql_query("SELECT * FROM presupuesto,partida WHERE presupuesto.IdPartida=partida.IdPartida ORDER BY FechaIni ASC");
			
	//$query=mysql_query("SELECT * FROM productos //WHERE 1 ORDER BY Partida ASC");	
    }

$total_registros=mysql_num_rows($query);


?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Listado de Presupuesto</title>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/mystyle.css">
</head>

<body>
    <div class="container">
    
  <div class="row-fluid">
    <div class="span6">
     <?php 
       divgeneral($_SESSION['Username'],'LISTADO DE PRESUPUESTO',$total_registros);?>
    </div>
    <div class="span6"></div>
   
  </div>


 <?php barsearch('Buscar por Nombre'); ?>

<br>
              <?php
    if($total_registros==0){ // SI LA CONSULTA REGRESO CERO REGISTROS
    echo '<div>
             <br>
              <div class="alert alert-danger">
              <h4 class="text-center">Alerta!</h4><p class="text-center">No se encontraron resultados</p></div> </div>';
              } 

    else
      {



                echo '<table class="table table-bordered table-condensed">
                  <tr>
                      <th class="text-center thcolor">No. Partida</th>  
                      <th class="text-center thcolor">Partida</th>  
                      <th class="text-center thcolor">Presupuesto</th>
                      <th class="text-center thcolor">Fecha Inicial</th>
                      <th class="text-center thcolor">Fecha Final</th>
                       <th class="text-center thcolor">&nbsp;</th>
                      <th class="text-center thcolor">&nbsp;</th>';
                    
                   if ($_GET['p']==1) { 
                   echo '<th class="text-center thcolor">&nbsp;</th>';
                   } 
                    
                    
                    
                 echo '</tr>';
                 
}
                 ?> <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>         
                         <tr>
                          <td align="center"><?php echo $fila['IdPartida'];?></td>
                            <td align="center"><?php echo $fila['Nombre'];?></td>
                            <td align="center"><?php echo $fila['Presupuesto'];?></td>
                            <td align="center"><?php echo $fila['FechaIni'];?></td>
                            <td align="center"><?php echo $fila['FechaFin'];?></td>
                            <td><!-- ENLACE PARA ACTUALIZAR EL REGISTRO $fila['idalumno'] -->
                           <a href="registrotrans.php?idpre=<?php echo $fila['Idpresu'];?>&p=<?php echo $_GET['p'];?>" title="Actualiza Registro2" target="_self">
                             <i id="otherButton" class="fa fa-money"></i>
                             <!--  fa fa-credit-card-->
                           </a>
                          </td>
                            <td><!-- ENLACE PARA ACTUALIZAR EL REGISTRO $fila['idalumno'] -->
                           <a href="actualizapresu.php?idpre=<?php echo $fila['Idpresu'];?>&p=<?php echo $_GET['p'];?>" title="Actualiza Registro2" target="_self">
                             <i id="otherButton" class="fa fa-pencil"></i>
                             <!--  fa fa-credit-card-->
                           </a>
                          </td>
                          <?php if ($_GET['p']==1) { // SI EL PRIVILEGIO DEL USUARIO AUTENTIFICADO ES 1 (ADMINISTRADOR) ?>
                            <td><!-- ENLACE PARA ELIMINAR EL REGISTRO $fila['idalumno'] -->
                          <a href="eliminapresu.php?idpre=<?php echo $fila['Idpresu'];?>&p=<?php echo $_GET['p'];?>" title="Elimina Registro" target="_self">
                             <i id="otherButton" class="fa fa-times"></i>
                           </a>
                          </td>
                          <?php } ?>
                          </tr>
                          <?php }?>

                 
                  <?php
                  if (isset($_GET['msj'])) // CODIGOS DE LOS MENSAJES PERSONALIZADOS
                  {
                   if($_GET['msj']==1)
                    echo "Registro Actualizado";
                   if($_GET['msj']==2)
                    echo "Registro Eliminado";
                  }
                  ?>
                </table>



  </div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
