<?php
include_once ('../../allware/conexion.php');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$a = $cnn->query("SET NAMES 'utf8'");
$tec= $_POST['tec'];
$acre= $_POST['acre'];
$start = $_POST['start'];
$end = $_POST['end'];
//var_dump($_FILES['file']);
//echo $_FILES["file"]["name"];
$file = $_POST['file'];
echo $file;
$files_post = $_FILES['file'];
echo $files_post;
$files = array();
$file_count = count($files_post['name']);
$file_keys = array_keys($files_post);
    
for ($i=0; $i < $file_count; $i++) 
{ 
	foreach ($file_keys as $key) 
	{
		$files[$i][$key] = $files_post[$key][$i];
	}
}


foreach ($files as $fileID => $file)
{
	$fileContent = file_get_contents($file['tmp_name']);

	file_put_contents($file['name'], $fileContent);
}
//$archivo = (isset($_FILES['file'])) ? $_FILES['file'] : null;
//echo $archivo;
/* $file= $_POST['file'];

$file = $_FILES['file'];

$fileTmpPath = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileType = $_FILES['file']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));
$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
$archivo = (isset($_FILES['file'])) ? $_FILES['file'] : null;
echo "<pre>"; print_r($archivo); echo "</pre>";
foreach ($_FILES["file"]["error"] as $clave => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $nombre_tmp = $_FILES["file"]["tmp_name"][$clave];
        // basename() puede evitar ataques de denegació del sistema de ficheros;
        // podría ser apropiado más validación/saneamiento del nombre de fichero
        $nombre = basename($_FILES["file"]["name"][$clave]);
        move_uploaded_file($nombre_tmp, "datos/$nombre");
    }
}
echo "<pre>"; print_r($nombre_tmp); echo "</pre>";
echo "<pre>"; print_r($nombre); echo "</pre>";
$uploadFileDir = './acreditaciones_esp/uploaded_files/';
$dest_path = $uploadFileDir . $newFileName;
 
foreach ($file as $files){
    echo $files;
    echo "<pre>"; print_r($newFileName); echo "</pre>";
}
foreach($file as $key-> $keye){
    echo $keye;
    echo "<pre>"; print_r($keye); echo "</pre>";

}
echo "<pre>"; print_r($keye); echo "</pre>";
echo "<pre>"; print_r($fileNameCmps); echo "</pre>";
echo "<pre>"; print_r($uploadFileDir); echo "</pre>";
echo "<pre>"; print_r($dest_path); echo "</pre>";
 */




foreach ($tec as $tecnicos){
    foreach ($acre as $acred){
$sql = "INSERT into TITAN_ACREDITACION_REL_TECNICOS (ID_TECNICO, ID_ACREDITACION  )
values ('$tecnicos','$acred')";

 $res = mysqli_query($cnn,$sql);
}}
 echo "<pre>"; print_r($sql); echo "</pre>";
