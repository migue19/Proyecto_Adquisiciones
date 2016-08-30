<?php
require("../conexion/conexion.php"); 
// Camino a los include
set_include_path(get_include_path() . PATH_SEPARATOR . '../Classes/');
// PHPExcel
require_once 'PHPExcel.php';
// PHPExcel_IOFactory

include 'PHPExcel/IOFactory.php';

//parte del query
$query=mysql_query("SELECT * FROM productos,proveedores,clientes WHERE productos.AOP='$_GET[aop]' AND productos.Idpm=$_GET[prov] and productos.Idpm=proveedores.Idpm AND clientes.idcliente=productos.idcli ORDER BY NombreEmp ASC");
$fila=mysql_fetch_array($query);

// Creamos un objeto PHPExcel
$objPHPExcel = new PHPExcel();
// Leemos un archivo Excel 2007
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();
 //cargar el archivo de php
 $objPHPExcel = $objReader->load("../AOP/Plantilla.xlsx");
// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("Cattivo")
->setLastModifiedBy("Cattivo")
->setTitle("Documento Excel de Prueba")
->setSubject("Documento Excel de Prueba")
->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Pruebas de Excel");
 
// Agregar Informacion
$objPHPExcel->setActiveSheetIndex(0)
//nombre de la Aop
->setCellValue('L10', $fila['AOP'])
//Datos de la Unidad Solicitante
->setCellValue('D2', $fila['Nombre'])


//Datos Unidad Solicitante
->setCellValue('D2', $fila['Nombre'])
->setCellValue('D3', $fila['DireccionC'])
->setCellValue('D4', "Colonia ".$fila['ColoniaC'])
->setCellValue('D5', "C. P. ".$fila['CPC'])
->setCellValue('D6', $fila['DelegacionC'])

//No Finanzas
->setCellValue('M2', $fila['NoFinanzas'])
//Datos del Proveedor
->setCellValue('C7', $fila['NombreEmp'])
->setCellValue('C8', $fila['Direccion'])
->setCellValue('C9', $fila['Colonia'])
->setCellValue('C10', $fila['Delegacion']."  C.P. ".$fila['CP'])
->setCellValue('C11', $fila['Telefono'])
->setCellValue('C12', $fila['RepreLegal'])
->setCellValue('C13', $fila['RFC'])

//listado de productos
->setCellValue('A28', $fila['IdPartida'])
->setCellValue('B28', $fila['Descripcion'])
->setCellValue('L28', $fila['Cantidad'])
->setCellValue('M28', $fila['Preciouni']);

$i=29;
while($fila=mysql_fetch_array($query))
{

$objPHPExcel->setActiveSheetIndex(0)
//listado de productos
->setCellValue('A'.$i, $fila['IdPartida'])
->setCellValue('B'.$i, $fila['Descripcion'])
->setCellValue('L'.$i, $fila['Cantidad'])
->setCellValue('M'.$i, $fila['Preciouni']);
$i++;
}


// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');
// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
//header("Location:listadopro.php?p=1"); 
//header('Content-Disposition: attachment;filename="pruebaReal.xlsx"');
//header('Cache-Control: max-age=0');
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//$objWriter->save('php://output');
//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
/*header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="AOP.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');*/



$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="AOP.xls"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');

exit;
?>

