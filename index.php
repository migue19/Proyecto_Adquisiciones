<?php
require("conexion/conexion.php"); // CONEXION A LA BASE DE DATOS

if (isset($_POST['boton_valida'])) // VERIFICA QUE YA SE HAYA PULSADO EL BOTON "[ conectar ]"
{ // QUERY QUE SE ENCARGA DE VERIFICAR SI EL USUARIO LOGEADO (POR MEDIO DE login y password ) EXISTE EN LA BD
$query=mysql_query("SELECT * FROM usuarios WHERE login='$_POST[login]' AND password='$_POST[password]'"); 
$existe=mysql_fetch_array($query);
if($existe) // SI EL USUARIO EXISTE
{

session_start();
  // variables de tipo session
  $_SESSION['Username']=$existe['Nombre'];
  $_SESSION['Idusuario']=$existe['Idusuario'];
  $_SESSION['Privilegio']=$existe['Privilegio'];




//header("Location:codigo/listado.php?p=$existe[privilegio]"); // REDIRECCIONA AL SISTEMA EN LA PARTE DEL LISTADO
header("Location:codigo/listadopm.php?estatus=0"); 
}
else // SI NO EXISTE ENTONCES MANDO A PANTALLA UN MENSAJE DE ERROR
{
$mensaje="Nombre de Usuario y/o Contrase&ntilde;a INCORRECTOS.";
}
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Sistema Adquisiciones ISSSTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="css/mystyle.css"> 
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
 <link rel="shortcut icon" href="../img/issste.png" type="image/png" />

</head>

<body>

<div class="container">  <!--este es un contenedor-->

  <div class="row-fluid">
    <br><br><br><br>
  </div>

  <div class="row-fluid">
    <div class="span4"> </div>

    <div class="span4">       
           
              <div class="well">
                
                
                <form name="form1" method="post" action="<?php $_SERVER['PHP_SELF']?>">

                 
                <div align="center"><img align="middle" src="img/issste.png" height="230" width="230" class="img-responsive"></div>
                <h4 class="text-center">SISTEMA DE ADQUISICIONES</h4><br>

                <legend class="text-center">Autenticacion de Usuarios</legend> <br>

                  
                <input  class="form-control" name="login" type="text" id="login" placeholder="Nombre de Usuario">
              <br>
                <input  class="form-control" name="password" type="password" id="password" placeholder="Contrase&ntilde;a"><br>

                <input id="buttoncolor" name="boton_valida" type="submit" id="boton_conecta" value="[ conectar ]" class="btn btn-block btn-large btn-info">


               </form>
                
              </div>
              <?php
              if (isset($mensaje))
              {

              echo '<div class="span12">
              <div class="alert alert-danger">
              <h4 class="text-center">Alert!</h4><p class="text-center">'.$mensaje.'</p></div> </div>';
              }  
            ?>
  
    </div>


   <div class="span4"></div>
</div>


</div>    
  
</body>
</html>



