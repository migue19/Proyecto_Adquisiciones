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


$query=mysql_query("SELECT * FROM transferencias,partida WHERE transferencias.IdPartida=partida.IdPartida and (partida.IdPartida  LIKE '%$buscar%' or partida.Nombre LIKE '%$buscar%')");

    }else{
			
	$query=mysql_query("SELECT * FROM transferencias,partida WHERE transferencias.IdPartida=partida.IdPartida ORDER BY transferencias.Fecha");
			
	//$query=mysql_query("SELECT * FROM productos //WHERE 1 ORDER BY Partida ASC");	
    }

$total_registros=mysql_num_rows($query);

?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Listado de Transaciones</title>
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
       divgeneral($_SESSION['Username'],'LISTADO DE TRANSFERENCIAS',$total_registros);?>
    </div>
    <div class="span6"></div>
   
  </div>

<?php barsearch('Buscar por Nombre'); ?>
  <BR>

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
                      <th class="text-center thcolor">No. Partida</th>  
                      <th class="text-center thcolor">Partida</th>  
                      <th class="text-center thcolor">Presupuesto Inicial</th>
                      <th class="text-center thcolor">Presupuesto Actual</th>
                      <th class="text-center thcolor">Monto</th>
                      <th class="text-center thcolor">Comentario</th>
                      <th class="text-center thcolor">Fecha</th>
                       
                    
                    
                  </tr>';

}
                  ?>
                  <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>         
                         <tr>
                          <td align="center"><?php echo $fila['IdPartida'];?></td>
                            <td align="center"><?php echo $fila['Nombre'];?></td>
                            <td align="center"><?php echo $fila['PresuIni'];?></td>
                            <td align="center"><?php echo $fila['PresuActual'];?></td>
                            <td align="center"><?php echo $fila['Monto'];?></td>
                            <td align="center"><?php echo $fila['Comentario'];?></td>
                            <td align="center"><?php echo $fila['Fecha'];?></td>
                           
                          </tr>
                          <?php }?>

                 
               
                </table>



  </div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
