<?php
session_start();

if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 

  }


require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
require("../funciones/general.php");
require("menu.php");

  if(isset($_REQUEST['palabra']))
    {
	  $buscar=$_POST['palabra'];	
		
      $query = mysql_query("SELECT * FROM Proveedores,Tipo_proveedor WHERE Proveedores.Idtp=Tipo_proveedor.Idtp AND Proveedores.NombreEmp LIKE '%$buscar%' ORDER BY Proveedores.NombreEmp ASC"); 

    }else{
	 $query=mysql_query("SELECT * FROM Proveedores,Tipo_proveedor WHERE Proveedores.Idtp=Tipo_proveedor.Idtp ORDER BY Proveedores.Idtp ASC");	
    }

$total_registros=mysql_num_rows($query);

 ?>


<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Listado de Proveedores</title>
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
       divgeneral($_SESSION['Username'],'LISTADO DE PROVEEDORES',$total_registros);?>
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

          echo '      <table class="table table-bordered table-condensed">
                  <tr>
                    <th id="bordecolor" class="text-center thcolor">Fecha de Registro</th>
                    <th id="bordecolor" class="text-center thcolor">Tipo</th>
                    <th id="bordecolor" class="text-center thcolor">Nombre del Proveedor</th>
                    <th id="bordecolor" class="text-center thcolor">Direccion</th>
                    <th id="bordecolor" class="text-center thcolor">Colonia</th>
                    <th id="bordecolor" class="text-center thcolor">C.P.</th>
                    <th id="bordecolor" class="text-center thcolor">Delegación</th>
                    <th id="bordecolor" class="text-center thcolor">Representante Legal</th>
                    <th id="bordecolor" class="text-center thcolor">Telefono</th>
                    <th id="bordecolor" class="text-center thcolor">RFC</th>
                    <th id="bordecolor" class="text-center thcolor">Email</th>
                    <th id="bordecolor" class="text-center thcolor">&nbsp;</th>
                    <th id="bordecolor" class="text-center thcolor">&nbsp;</th>
                    <th id="bordecolor" class="text-center thcolor">&nbsp;</th>';
     }
       ?>             
                    
                  </tr>
                  <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>
                                    
                 <tr>

                    <td id="bordecolor"><?php echo $fila['Fecha'];?></td>
                    <td id="bordecolor"><?php echo $fila['Tipo'];?></td>
                    <td id="bordecolor"><?php echo $fila['NombreEmp'];?></td>
                    <td id="bordecolor"><?php echo $fila['Direccion'];?></td>
                    <td id="bordecolor"><?php echo $fila['Colonia'];?></td>
                    <td id="bordecolor"><?php echo $fila['CP'];?></td>
                    <td id="bordecolor"><?php echo $fila['Delegacion'];?></td>
                    <td id="bordecolor"><?php echo $fila['RepreLegal'];?></td>
                    <td id="bordecolor"><?php echo $fila['Telefono'];?></td>                    
                    <td id="bordecolor"><?php echo $fila['RFC'];?></td>
                    <td id="bordecolor"><?php echo $fila['Correo'];?></td> 
                      
                    


                 

                 <td id="bordecolor"><a href="documentos.php?idpm=<?php echo $fila['Idpm'];?>"><i id="otherButton" class="fa fa-file-text"></i></a></td>
    
                    <td id="bordecolor"><!-- ENLACE PARA ACTUALIZAR EL REGISTRO $fila['idalumno'] -->
                   <a href="actualizapm.php?idpm=<?php echo $fila['Idpm'];?>&p=<?php echo $_GET['p'];?>" title="Actualiza Registro2" target="_self">
                     <i id="otherButton" class="fa fa-pencil"></i>
                   </a>
                    
                      </td>
               
                    <td id="bordecolor"><!-- ENLACE PARA ELIMINAR EL REGISTRO $fila['idalumno'] -->
                  <a href="eliminapm.php?idpm=<?php echo $fila['Idpm'];?>&p=<?php echo $_GET['p'];?>" title="Elimina Registro" target="_self">
                     <i id="otherButton" class="fa fa-times"></i>
                   </a>
                  </td>
                    
                  


                
                  </tr>
                  <?php }?>

                </table>

          

                <br>
<br>
<br>
<br>
<br>

  </div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
