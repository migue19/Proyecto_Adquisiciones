
<?php 

/*echo $_REQUEST['palabra'];
echo "\n";
*/

$buscar=$_POST['palabra'];




if (!isset($buscar)){ 
      echo "Debe especificar una cadena a buscar"; 
      //echo "</html></body> \n"; 
      exit; 
} 
$link = mysql_connect("localhost", "root"); 
mysql_select_db("Gestion", $link); 
$result = mysql_query("SELECT * FROM proveedores WHERE NombreEmp LIKE '%$buscar%' ORDER BY NombreEmp", $link); 
if ($row = mysql_fetch_array($result)){ 
      echo "<table border = '1'> \n"; 
//Mostramos los nombres de las tablas 
echo "<tr> \n"; 
while ($field = mysql_fetch_field($result)){ 
            echo "<td>$field->name</td> \n"; 
} 
      echo "</tr> \n"; 
do { 
            echo "<tr> \n"; 
            echo "<td>".$row["NombreEmp"]."</td> \n"; 
            echo "<td>".$row["Actcost"]."</td> \n"; 
            echo "<td>".$row["ComIdent"]."</td> \n"; 
            echo "<td>".$row["CRFC"]."</td> \n";
            echo "</tr> \n"; 
      } while ($row = mysql_fetch_array($result)); 
            echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
?> 
  