<?php
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

$query=mysql_query("SELECT * FROM clientes WHERE Nombre LIKE '%$buscar%' ORDER BY Nombre ASC");
    }else{
			
	$query=mysql_query("SELECT * FROM clientes ORDER BY Nombre ASC");

    }

$total_registros=mysql_num_rows($query);


?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Listado de Clientes</title>
 
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
       divgeneral($_SESSION['Username'],'LISTADO DE UNIDADES SOLICITANTES',$total_registros);?>
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


            echo    '<table class="table table-bordered table-condensed">
                  <tr>

                
                      <th class="text-center thcolor">Nombre</th>
                      <th class="text-center thcolor">Direccion</th>
                      <th class="text-center thcolor">Colonia</th>
                      <th class="text-center thcolor">C.P.</th>
                      <th class="text-center thcolor">Delegacion</th>
                      <th class="text-center thcolor">Responsable</th>
                      <th class="text-center thcolor">&nbsp;</th>
                      <th class="text-center thcolor">&nbsp;</th>   
                  </tr>';

}
                  ?>
                  <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>         
                         <tr>
                            <td align="center"><?php echo $fila['Nombre'];?></td>
                            <td align="center"><?php echo $fila['DireccionC'];?></td>
                            <td align="center"><?php echo $fila['ColoniaC'];?></td>
                            <td align="center"><?php echo $fila['CPC'];?></td>
                            <td align="center"><?php echo $fila['DelegacionC'];?></td>
                            <td align="center"><?php echo $fila['Responsable'];?></td>
                        
                            
                            <td><!-- ENLACE PARA ACTUALIZAR EL REGISTRO $fila['idalumno'] -->
                           <a href="actualizacli.php?idpm=<?php echo $fila['Idcliente'];?>&p=<?php echo $_GET['p'];?>" title="Actualiza Registro2" target="_self">
                             <i id="otherButton" class="fa fa-pencil"></i>
                           </a>
                          </td>
                          
                            <td><!-- ENLACE PARA ELIMINAR EL REGISTRO $fila['idalumno'] -->
                          <a href="eliminacli.php?idcli=<?php echo $fila['Idcliente'];?>&p=<?php echo $_GET['p'];?>" title="Elimina Registro" target="_self">
                             <i id="otherButton" class="fa fa-times"></i>
                           </a>
                          </td>
                          
                          </tr>
                          <?php }?>

              
                </table>

<br>
<br>
<br>

  </div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
