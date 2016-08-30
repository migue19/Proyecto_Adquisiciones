<?php
//require("../conexion/conexion.php"); // PRIMERO QUE NADA ME CONECTO A LA BAD

function barsearch($placeholder)
{
  echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">
              <div class="input-group col-sm-3" style="margin-top: 5px;">
                <input class="form-control" name="palabra" placeholder="'.$placeholder.'">
                <span class="input-group-btn"><button id="buttoncolor" class="btn btn-info" type="submit"><i class="fa fa-search"></i></button></span>
              </div>
            </form>';
} 

function divgeneral($usuario,$titulo,$registros)
{
  echo '<div id="divcolor" class="alert alert-info">
        <h4 id="whitec">BIENVENIDO :'.$usuario.'</h4>
        <h5 id="whitec">'.$titulo.'</h5>
        <h6 id="whitec">Mostrando ('.$registros.') registros total</h6>
   <a id="buttoncolor" class="btn btn-info" href="javascript:window.print(); void 0;">Imprimir  <i class="fa fa-print"></i></a> 
      </div>';
}

function buttonform()
{
  echo '<input id="buttonGreen" name="boton_registra" class="btn btn-block btn-info" type="submit" value="Registrar"></form>
      <form action="'.$_SERVER['PHP_SELF'].'" method="post">
      <input id="buttonGreen" name="boton_regresa" class="btn btn-block btn-info"type="submit" value="Regresa">
      </form>';
}



function obtiene_estado($idedo) // FUNCION QUE DEVUELVE LA DESCRIPCION DEL ESTADO (P/E. Pubela, Sonora, Aguascalientes, etc.)
{
$query=mysql_query("SELECT estado FROM estados WHERE idestado=$idedo");
$resultado=mysql_fetch_array($query);
return($resultado['estado']); // Regresa el valor solicitado
}

function obtiene_genero($idgenero) // FUNCION QUE DEVUELVE LA DESCRIPCION DEL GENERO (P/E. Femenino, Masculino, etc.)
{
$query=mysql_query("SELECT genero FROM generos WHERE idgenero=$idgenero");
$resultado=mysql_fetch_array($query);
return($resultado['genero']); // Regresa el valor solicitado
}

function obtiene_carrera($idcarrera) // FUNCION QUE DEVUELVE LA DESCRIPCION DE LA CARRERA (P/E. Computacion, Leyes, Ing. Civil, etc.)
{
$query=mysql_query("SELECT carrera FROM carreras WHERE idcarrera=$idcarrera");
$resultado=mysql_fetch_array($query);
return($resultado['carrera']); // Regresa el valor solicitado
}
?>