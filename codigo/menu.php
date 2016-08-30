
<!DOCTYPE html>

<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">  <img src="../img/issste.png" height="80" width="80" class="img-responsive"></a>
  </div>
 
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">
    
      <li>
                <a id="whitec" href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-pencil-square-o"></i>  Altas y Consultas<b class="caret"></b></a>
                <ul class="dropdown-menu multi-level">
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-archive"></i>   Partidas</a>
                        <ul class="dropdown-menu">
                            <li><a href="listadopartida.php?p=1">Listado</a></li> 
                            <li><a href="registropartida.php">Alta</a></li>
                        </ul>
                       
                    </li>

                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i>  Proveedores</a>
                        <ul class="dropdown-menu">
                            <li><a href="listadopm.php?p=1">Listado</a></li> 
                            <li><a href="registropm.php">Alta</a></li>
                        </ul>
                        
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i>  Productos</a>
                        <ul class="dropdown-menu">
                            <li><a href="listadopro.php?p=1">Listado</a></li>
                            <li><a href="registropro.php?id=1">Alta</a></li>
                        </ul>
                        
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-building"></i>  Unidad Solicitante</a>
                        <ul class="dropdown-menu">
                            <li><a href="listadocli.php?p=1">Listado</a></li>
                            <li><a href="registrocli.php?p=1">Alta</a></li>
                        </ul>
                        
                    </li>

                </ul>
              </li>
       

       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-money"></i> Suficiencia Presupuestal <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="listadopresu.php?p=1">Listado Presupuesto</a></li>
          <li><a href="registropresu.php?p=1">Alta Presupuesto</a></li>
          <li><a href="listadotrans.php?p=1">Listado Transferencias</a></li>
        </ul>
      </li>
      
      <?php


        if($_SESSION['Privilegio']==1)
        echo    '<li><a href="listadocambios.php?p=1"><i class="fa fa-exchange"></i> Registro Cambios</a></li>';

        ?>
        <li><a href="cuenta.php"><i class="fa fa-user"></i> Mi Cuenta</a></li>

        <?php

        if($_SESSION['Privilegio']==1)
        echo   ' <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-lock"></i> Administradores<b class="caret"></b></a>
        <ul class="dropdown-menu">
        <li><a href="listadoadmin.php?p=1">Listado</a></li> 
        <li><a href="registroadmin.php">Alta</a></li>
        </ul>
        </li>';



         ?>




      <li><a href="logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
    </ul>
  </div>
</nav>



<div class="navbar navbar-default navbar-fixed-bottom">
  <div class="container">
    <p class="navbar-text">Sistema Elaborado por Miguel Mexicano Herrera</p>
  </div>

</div>














