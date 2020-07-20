<?php
include_once ('../../allware/conexion.php');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$a = $cnn->query("SET NAMES 'utf8'");
//print_r($_FILES);
echo "post <pre>"; print_r($_POST); echo "</pre>";
$files_post = $_FILES['file'];
$tec= $_POST['tec'];
$acre= $_POST['acre'];
$start = $_POST['trip-start'];
$end = $_POST['trip-eb'];
echo $tec;
echo $acre;
//die();

$files = array();
$file_count = count($files_post['name']);
$file_keys = array_keys($files_post);

/* print_r($file_count);
print_r($file_keys); */

for ($i=0; $i < $file_count; $i++) 
{ 
	foreach ($file_keys as $key) 
	{
		$files[$i][$key] = $files_post[$key][$i];
	}
}


foreach ($files as $fileID => $file)
{
	$extension=explode('.',$file['name']);

	$fileContent = file_get_contents($file['tmp_name']);
	$ruta = "./upload/".md5($file['tmp_name']) . "." .$extension[1] ;
	print_r($ruta);
	//print_r($fileContent);

	$sql = "INSERT into TITAN_ACREDITACION_REL_TECNICO_DOC (ID_TECNICO, ID_ACREDITACION ,RUTA_FISICA, FECHA_INI, FECHA_FIN)
values ('$tec','$acre', '$ruta' , '$start', '$end')";
		
 if ( mysqli_query($cnn,$sql)){
	if(move_uploaded_file($file['tmp_name'],$ruta)){
		echo 'se mueve';
	}else{
		echo ' no se mueve';
	}
	
 }else{
	 echo 'conexion fallida';
 }

	//file_put_contents("./acreditaciones_esp/".$file['name'], $fileContent);
	//echo $file;
}

foreach ($tec as $tecn){
	foreach ($acre as $acred){
		foreach ($start as $starter){
			foreach ($end as $ends){



	$sqldos = "INSERT into TITAN_ACREDITACION_REL_TECNICO_DOC (ID_TECNICO,ID_ACREDITACION, FECHA_INI ,FECHA_FIN ) values 
	($tecn,'$acred', '$starter', '$ends')";
	$res = mysqli_query($cnn,$sqldos);
	}}}}
	echo "<pre>"; print_r($sqldos); echo "</pre>";
   
/* foreach ($tec as $tecnicos){
    foreach ($acre as $acred){
$sql = "INSERT into TITAN_ACREDITACION_REL_TECNICO_DOC (ID_TECNICO, ID_ACREDITACION  )
values ('$tecnicos','$acred')";

 $res = mysqli_query($cnn,$sql);
}} */

?>