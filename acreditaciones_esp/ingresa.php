<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$a = $cnn->query("SET NAMES 'utf8'"); 

$nombres= $_POST['nombres'];
$apellidos= $_POST['apellidos'];
$rut= $_POST['rut'];
$telefono= $_POST['telefono'];
$email= $_POST['email'];
$zona= $_POST['zona'];
$empresa= $_POST['empresa'];
$fecha_ingreso= $_POST['fecha_ingreso'];
$proyecto= $_POST['proyecto'];

$sql = "INSERT into TITAN_ACREDITACIONES_TECNICOS (NOMBRES, APELLIDOS, RUT, TELEFONO, EMAIL, ZONA, EMPRESA, FECHA_ING, PROYECTO)
values ('$nombres','$apellidos','$rut','$telefono','$email','$zona','$empresa','$fecha_ingreso','$proyecto')";

 $res = mysqli_query($cnn,$sql);
 echo "<pre>"; print_r($sql); echo "</pre>";
?>