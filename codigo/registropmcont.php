<?php

date_default_timezone_set('America/Mexico_City');

$res=$_GET['param_id'];
$fecha1=date("Y-m-d")."T".date("H:i:s");


//echo "<option value=".$res.">".$res."</option>";

if($res==1)
{	
//echo "<p>perro</p>";
echo "
 
    <tr>
      <td width=\"29%\" align=\"center\">Copia de Acta Constitutiva</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idactcons\" id=\"idactcons\">
        Entregado</td>
        
     <td>&nbsp;</td>   
    </tr>
 
    <tr>
      <td width=\"29%\" align=\"center\">Comprobante de Identificacion Oficial</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"identif\" id=\"identif\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Copia del RFC de la Empresa</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idrfc\" id=\"idrfc\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Copia del Ultimo Estado de Cuenta Bancario</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idestabanc\" id=\"idestabanc\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Comprobante de Domicilio Fiscal</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idcomdom\" id=\"idcomdom\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Carta Membretada</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idcartmem\" id=\"idcartmem\">
      Entregado</td>
    </tr>
    
    <tr>
      <td width=\"29%\" align=\"center\">Correo Electronico</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><label for=\"email\"></label>
       <input type=\"email\" name=\"email\" id=\"email\"></td>
    </tr>";

}

if($res==2)
{

echo "
<tr>
      <td width=\"29%\" align=\"center\">Nombre </td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><label>
        <input name=\"nombre\" type=\"text\" id=\"nombre\">

      </label></td>
      
      <td>&nbsp;</td>
      
    </tr>
	
	
	
	<tr>
	 <td align=\"center\">Fecha</td>
	 <td>&nbsp;</td>
     <td> <input type=\"datetime-local\" name=\"fecha\" value=\"$fecha1\"> </td>	
	
	
	</tr>
	
    
 
    <tr>
      <td width=\"29%\" align=\"center\">Comprobante de Identificacion Oficial</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"identif\" id=\"identif\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Copia del RFC de la Empresa</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idrfc\" id=\"idrfc\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Copia del Ultimo Estado de Cuenta Bancario</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idestabanc\" id=\"idestabanc\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Comprobante de Domicilio Fiscal</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idcomdom\" id=\"idcomdom\">
      Entregado</td>
    </tr>
     <tr>
      <td width=\"29%\" align=\"center\">Carta Membretada</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><input type=\"checkbox\" name=\"idcartmem\" id=\"idcartmem\">
      Entregado</td>
    </tr>
    
    <tr>
      <td width=\"29%\" align=\"center\">Correo Electronico</td>
      <td width=\"7%\">&nbsp;</td>
      <td width=\"64%\"><label for=\"email\"></label>
       <input type=\"email\" name=\"email\" id=\"email\"></td>
    </tr>";

}