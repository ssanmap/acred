<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$a = $cnn->query("SET NAMES 'utf8'");
$nombre= $_POST['nombre'];
$tipo= $_POST['tipo'];
$clasificacion= $_POST['clasificacion'];
$zona= $_POST['zona'];
$documentos= $_POST['documentos'];
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$pop = $_POST['pop'];
$fecha = date('Y-m-d H:i:s');
/* $json = json_encode($documentos, true);*/
 $datosdoc = '';
foreach ($documentos as $valor){
   $datosdoc = $valor .'|'.$datosdoc;
}
$zonas = '';
foreach ($zona as $valor){
   $zonas = $valor .'|'.$zonas;
}
//echo "<pre>"; print_r($zonas); echo "</pre>";
$sql = "INSERT into TITAN_ACREDITACIONES (NOMBRE, TIPO, CLASIFICACION, FECHA, DESDE, HASTA, POP  )
values ('$nombre','$tipo','$clasificacion', '$fecha','$desde', '$hasta', '$pop')";

 $res = mysqli_query($cnn,$sql);
 echo "<pre>"; print_r($sql); echo "</pre>";
 $last_id = mysqli_insert_id($cnn);
 echo "El id e s : " . $last_id;

 foreach ($documentos as $doc){

 $sqldos = "INSERT into TITAN_ACREDITACION_REL_DOCUMENTOS (ID_ACREDITACION,ID_NOMBRE_DOCUMENTO ) values ($last_id,'$doc')";
 $res = mysqli_query($cnn,$sqldos);
 }
 echo "<pre>"; print_r($sqldos); echo "</pre>";


 foreach ($zona as $valor){
/*    $zonas = $valor ;
 */ $sqltres = "INSERT into TITAN_ACREDITACION_ZONA (ID_ACREDITACION, ZONA) values ($last_id,'$valor')";
 $res = mysqli_query($cnn,$sqltres);
 }
 echo "<pre>"; print_r($sqltres); echo "</pre>";



//printf("El último registro insertado tiene el id %d\n", mysql_insert_id());
/* if (mysqli_query($cnn, $sql)) {
   $last_id = mysqli_insert_id($cnn);
   echo "El id e s : " . $last_id;
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($cnn);
} */

?>
 