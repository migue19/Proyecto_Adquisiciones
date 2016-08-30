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

$busquedap=mysql_query("SELECT * FROM presupuesto");
$lis2=mysql_fetch_array($busquedap);

$presupuesto= $lis2['Presupuesto']   ;


    //Checamos si busco por el formulario y dio en el boton BUSCAR (metodo POST)
  
    if(isset($_REQUEST['palabra']))
    {
    $buscar=$_POST['palabra'];  
 
 //$query = mysql_query("SELECT * FROM productos WHERE //Partida LIKE '%$buscar%' ORDER BY Idpm ASC");
$query=mysql_query("SELECT * FROM productos,proveedores,clientes WHERE productos.Idpm=proveedores.Idpm AND clientes.idcliente=productos.idcli AND (productos.Descripcion  LIKE '%$buscar%' or productos.IdPartida  LIKE '%$buscar%' or productos.AOP  LIKE '%$buscar%' or clientes.Nombre  LIKE '%$buscar%' or proveedores.NombreEmp like '%$buscar%') ORDER BY NombreEmp ASC");
$busqueda=mysql_query("SELECT sum(importe) FROM productos,proveedores,clientes WHERE productos.Idpm=proveedores.Idpm AND clientes.idcliente=productos.idcli AND (productos.Descripcion  LIKE '%$buscar%' or productos.IdPartida  LIKE '%$buscar%' or productos.AOP  LIKE '%$buscar%' or clientes.Nombre  LIKE '%$buscar%' or proveedores.NombreEmp like '%$buscar%') ORDER BY NombreEmp ASC");
    $lis=mysql_fetch_array($busqueda);

    $Total= $lis['sum(importe)']   ;
    $TotalIva=$Total*0.16;
    $TotalIva=$TotalIva+$Total;


    }else{
  $query=mysql_query("SELECT * FROM productos,proveedores,clientes WHERE productos.Idpm=proveedores.Idpm AND clientes.idcliente=productos.idcli ORDER BY NombreEmp ASC");
  //$query=mysql_query("SELECT * FROM productos //WHERE 1 ORDER BY Partida ASC"); 
    $busqueda=mysql_query("SELECT sum(importe) FROM productos,proveedores,clientes WHERE productos.Idpm=proveedores.Idpm AND clientes.idcliente=productos.idcli");
    $lis=mysql_fetch_array($busqueda);

    $Total= $lis['sum(importe)'];
    $TotalIva=$Total*0.16;
    $TotalIva=$TotalIva+$Total;
    }

$total_registros=mysql_num_rows($query);
 ?>





<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Listado de Productos</title>
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
       divgeneral($_SESSION['Username'],'LISTADO DE PRODUCTOS',$total_registros);?>
    </div>
    <div class="span6"></div>
   
  </div>
         <?php barsearch('Buscar por AOP'); ?>
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

                      <th id="bordecolor" class="text-center thcolor">AOP</th>
                      <th id="bordecolor" class="text-center thcolor">No. Autorizacion Finanzas</th>
                      <th id="bordecolor" class="text-center thcolor">Numero de Factura</th>
                      <th id="bordecolor" class="text-center thcolor">Fecha de Registro</th>
                      <th id="bordecolor" class="text-center thcolor">Unidad Solicitante</th>
                      <th id="bordecolor" class="text-center thcolor">Proveedor</th>
                      <th id="bordecolor" class="text-center thcolor">Partida</th>
                      <th id="bordecolor" class="text-center thcolor"><p>Descripcion</p></th>
                      <th id="bordecolor" class="text-center thcolor">Precio unitario</th>
                      <th id="bordecolor" class="text-center thcolor"><p>Cantidad</p></th>
                      <th id="bordecolor" class="text-center thcolor">Importe</th>
                      <th id="bordecolor" class="text-center thcolor">Importe + IVA</th>
                      <th id="bordecolor" class="text-center thcolor">&nbsp;</th>';
                    
                  
                    echo '<th id="bordecolor" class="text-center thcolor">&nbsp;</th>';
                
                    
                    
                    
            echo      '</tr>';
}

            ?>
                  <?php
                  while($fila=mysql_fetch_array($query)) { // BUCLE PARA IMPRIMIR TODOS LOS REGISTROS DE LA TABLA ALUMNOS
                  ?>         
                         <tr>
                          <td id="bordecolor" align="center"><a id="linkcolor" href="excelAOP.php?aop=<?php echo $fila['AOP'];?>&prov=<?php echo $fila['Idpm'];?>"><?php echo $fila['AOP'];?></a> </td>
                          <td id="bordecolor" align="center"><?php echo $fila['NoFinanzas'];?></td>
                          <td id="bordecolor" align="center"><?php echo $fila['Factura'];?></td>
                          <td id="bordecolor" align="center"><?php echo $fila['Fechapro'];?></td>
                          <td id="bordecolor" align="center"><?php echo $fila['Nombre'];?></td>
                          <td id="bordecolor" align="center"><?php echo $fila['NombreEmp'];?></td>
                          <td id="bordecolor" align="center"><?php echo $fila['IdPartida'];?></td>
                          <td id="bordecolor" align="center"><?php echo $fila['Descripcion'];?></td>
                          <td id="bordecolor" align="center"><?php echo "$  ";
                          echo $fila['Preciouni'];?></td>
                            <td align="center"><?php echo $fila['Cantidad'];?></td>
                            <td align="center"><?php echo "$  ";
                          echo $fila['Importe'];?></td>

                          <td align="center"><?php echo "$  ";
                          echo $fila['ImporteIva'];?></td>
                             
                            
                            <td><!-- ENLACE PARA ACTUALIZAR EL REGISTRO $fila['idalumno'] -->
                           <a href="actualizapro.php?idpr=<?php echo $fila['Idpr'];?>&p=<?php echo $_GET['p'];?>&idus=<?php echo $fila['Idusuario'];?>" title="Actualiza Registro2" target="_self">
                             <i id="otherButton" class="fa fa-pencil"></i>
                           </a>
                          </td>
                          <td><!-- ENLACE PARA ELIMINAR EL REGISTRO $fila['idalumno'] -->
                          <a href="eliminapro.php?idpr=<?php echo $fila['Idpr'];?>&p=<?php echo $_GET['p'];?>" title="Elimina Registro" target="_self">
                             <i id="otherButton" class="fa fa-times"></i>
                           </a>
                          </td>
                          
                          </tr>
                          <?php }?>
<?php
                 
if($total_registros>0){
echo '<tr>
  <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
   <td>&nbsp;</td>
    <td>&nbsp;</td>
     <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
  <td id="prin">Total:</td>
  <td align="center">$'. $Total.'</td>
  <td align="center">$'. $TotalIva.'</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>';

}

  ?>
  </table>

<br>
<br>
<br>

  </div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
