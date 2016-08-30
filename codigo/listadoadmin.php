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
    $query=mysql_query("SELECT * FROM usuarios WHERE Username LIKE '%$buscar%'");
    }else
    {	
	$query=mysql_query("SELECT * FROM usuarios");	
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
<title>Listado de Administradores</title>
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
       divgeneral($_SESSION['Username'],'LISTADO DE ADMINISTRADORES',$total_registros);?>
    </div>
    <div class="span6"></div>
   
  </div>

                <table class="table table-bordered table-condensed">
                  <tr>

                
                      <th class="text-center thcolor">Nombre</th>
                       <th class="text-center thcolor">Privilegio</th>
                      <th class="text-center thcolor">Username</th>
                       <th class="text-center thcolor">&nbsp;</th>
                    <th class="text-center thcolor">&nbsp;</th>
                  
                    
                    
                    
                  </tr>
                  <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>         
                         <tr>
                            <td align="center"><?php echo $fila['Nombre'];?></td>
                            <td align="center"><?php echo $fila['Privilegio'];?></td>
                            <td align="center"><?php echo $fila['Login'];?></td>
                            
                        
                             <td><!-- ENLACE PARA ACTUALIZAR EL REGISTRO $fila['idalumno'] -->
                              <a href="actualizaadmin.php?idus=<?php echo $fila['Idusuario'];?>&p=<?php echo $_GET['p'];?>" title="Actualiza Usuario" target="_self">
                                <i id="otherButton" class="fa fa-pencil"></i>
                            </a>
                    
                            </td>
                
                          <td><!-- ENLACE PARA ELIMINAR EL REGISTRO $fila['idalumno'] -->
                          <a href="eliminaadmin.php?idus=<?php echo $fila['Idusuario'];?>&p=<?php echo $_GET['p'];?>" title="Elimina Registro" target="_self">
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
