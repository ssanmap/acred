<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
$a = $cnn->query("SET NAMES 'utf8'");
$acre= $_POST['acre'];
$ac = '';

foreach ($acre as $acred){
    $ac = $acred  ;
$query = "SELECT
TITAN_ACREDITACIONES.NOMBRE,
TITAN_ACREDITACIONES.ID,
TITAN_ACREDITACIONES.DESDE,
TITAN_ACREDITACIONES.HASTA,
TITAN_ACREDITACION_REL_DOCUMENTOS.ID_NOMBRE_DOCUMENTO,
TITAN_ACREDITACIONES_DOC_NOMBRE.NOMBRE as NOMBRE_DOC
FROM
TITAN_ACREDITACIONES
INNER JOIN TITAN_ACREDITACION_REL_DOCUMENTOS ON TITAN_ACREDITACIONES.ID = TITAN_ACREDITACION_REL_DOCUMENTOS.ID_ACREDITACION
INNER JOIN TITAN_ACREDITACIONES_DOC_NOMBRE ON TITAN_ACREDITACION_REL_DOCUMENTOS.ID_NOMBRE_DOCUMENTO = TITAN_ACREDITACIONES_DOC_NOMBRE.ID
WHERE TITAN_ACREDITACIONES.ID in ( $ac )";
$result = mysqli_query($cnn,$query) ;
while($row = mysqli_fetch_assoc($result)){$arreglo[] = $row;}
//echo "<pre>"; print_r($arreglo ); echo "</pre>";

//echo "<pre>"; print_r($result); echo "</pre>";
$otro = array();
foreach ($arreglo as $clave => $documento) {
    $otro[$documento['ID']][$clave] = $documento['NOMBRE'] .",". $documento['NOMBRE_DOC'] . "," .  $documento['ID_NOMBRE_DOCUMENTO'];
    }
    $pe = array();
foreach ($arreglo as $clave => $d) {
    $pe[$d['ID']][$clave] = "&#8226; "  .$d['NOMBRE_DOC'] . ".<br>  ";
    }
    
      
foreach ($pe as $key => $value) {
  
   
    $trozos = explode(", ", $value);
    $prueba = implode(', ',$value) ;
    $string = rtrim($prueba, ',');
    $trozos = explode(',', $prueba);
    $array = str_split($prueba, ",");
    $coma = ",";
    $s = str_replace($coma," ",$prueba);
    //echo $s;

   
  //  echo "<pre>"; print_r($pe ); echo "</pre>";
    //echo "<pre>"; print_r($trozos[1] ); echo "</pre>";
   
    //var_dump($trozos);
    //echo $trozos[1];

    //echo "<pre>"; print_r($trozos[0] ); echo "</pre>";
    //echo $ac. 'es el seleccionado' ;

    
     if($key == $acred){
 $inpu = ' <div class="panel panel-primary">
 <div class="panel-heading">Acreditación '. $documento['NOMBRE'].'</div>
   <div class="panel-body"> <br>
   <p>Favor subir documentos : <br> <br>'./* implode(', ',$value) */$s  .'  </p>
   
 <br>
   <label for="start">desde :</label>
   <input type="date" id="start" name="trip-start">
   <label for="en">hasta :</label>
   <input type="date" id="end" name="trip-eb">   <br>
   <br> <input type="file" accept="image/*,.pdf" id="file" name="file[]"class="form-control" multiple>

 </div>
 </div>
 </div>';
 echo $inpu;
 }else{
     echo '';
 }
}

}

//echo "<pre>"; print_r($otro); echo "</pre>";
//$otro_keys = array_keys($nombre_count);

//$file_count = count($files_post['name']);



         
//echo "<pre>"; print_r($arreglo ); echo "</pre>";


//echo $inpu;
?>