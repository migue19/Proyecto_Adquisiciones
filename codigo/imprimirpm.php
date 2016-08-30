<?php
/*
ESTE SCRIPT SE ENCARGA DE LISTAR TODA LA INFORMACION CONTENIDA EN LA TABLA ALUMNOS.
*/
session_start();
require("../conexion/conexion.php"); // CONEXION A LA BASE DE DATOS
require("menu.php");


  
  if(!isset($_SESSION['Username']))
  {
    header('location: ../index.php'); 
  }
    //Checamos  por el formulario y dio en el boton BUSCAR (metodo POST)
	
   $query=$_GET['query'];
   echo $query;

$total_registros=mysql_num_rows($query);

 ?>


<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Listado: Uso de SELECT</title>
<link rel="stylesheet" type="text/css" href="../css/mystyle.css"> 
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>

<body>
  
<div class="container">
  <div class="row-fluid">
    <div class="span6">
      <div class="alert alert-info">
        <h4>BIENVENIDO :   <?php echo $_SESSION['Username'];?></h4>
        <h5>LISTADO DE PROVEEDORES</h5>
        <h6>Mostrando ( <?php echo $total_registros; ?> ) registros total</h6>
         <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
  <button class="btn btn-info" name="Imprimir" type="submit">Imprimir &nbsp;&nbsp;   <i class="fa fa-print"></i></button> 
</form>
      </div>
    </div>
    <div class="span6"></div>
   
  </div>

   

              <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
              <!---->
              <div class="input-group col-sm-3" style="margin-top: 5px;">
              <input class="form-control" name="palabra" placeholder="Buscar por Nombre">
    <span class="input-group-btn"><button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button></span>
</div>
              </form>

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
                    <th class="text-center thcolor">Fecha de Registro</th>
                    <th class="text-center thcolor">Tipo</th>
                    <th class="text-center thcolor">Nombre del Proveedor</th>
                    <th class="text-center thcolor">Direccion</th>
                    <th class="text-center thcolor">Telefono</th>
                    <th class="text-center thcolor">RFC</th>
                    <th class="text-center thcolor">Correo Electronico</th>
                    <th class="text-center thcolor">Documentos</th>
                    

                    <th class="text-center thcolor">&nbsp;</th>';
                    
                  if ($_GET['p']==1) { 
                   echo '<th class="text-center thcolor">&nbsp;</th>';
                  } 
                    
       }

       ?>             
                    
                  </tr>
                  <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>
                                    
                 <tr>

                    <td><?php echo $fila['Fecha'];?></td>
                    <td><?php echo $fila['Tipo'];?></td>
                    <td><?php echo $fila['NombreEmp'];?></td>
                    <td><?php echo $fila['Direccion'];?></td>
                    <td><?php echo $fila['Telefono'];?></td>                    
                    <td><?php echo $fila['RFC'];?></td>
                    <td><?php echo $fila['Correo'];?></td> 
                    <td><a class="btn btn-block btn-info" href="documentos.php?idpm=<?php echo $fila['Idpm'];?>">Ver</a></td>  
                    
                    <td><!-- ENLACE PARA ACTUALIZAR EL REGISTRO $fila['idalumno'] -->
                   <a href="actualizapm.php?idpm=<?php echo $fila['Idpm'];?>&p=<?php echo $_GET['p'];?>" title="Actualiza Registro2" target="_self">
                     <i class="fa fa-pencil"></i>
                   </a>
                    
                      </td>
                  <?php if ($_GET['p']==1) { // SI EL PRIVILEGIO DEL USUARIO AUTENTIFICADO ES 1 (ADMINISTRADOR) ?>
                    <td><!-- ENLACE PARA ELIMINAR EL REGISTRO $fila['idalumno'] -->
                  <a href="eliminapm.php?idpm=<?php echo $fila['Idpm'];?>&p=<?php echo $_GET['p'];?>" title="Elimina Registro" target="_self">
                     <i class="fa fa-times"></i>
                   </a>
                  </td>
                  <?php } ?>
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
