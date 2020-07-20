<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./acreditaciones_esp/js/app.js"></script>
    <link rel="stylesheet" href="./acreditaciones_esp/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
</head>
<body>
<?php
            include_once ('../../allware/conexion.php');
            $conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
            $cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");
            $a = $cnn->query("SET NAMES 'utf8'");
            ?>
    <h1><center>Acreditaciones Especiales </center></h1>
<br>
<br>
<div id="respuesta"> </div>
<div class="row">
  <div class="col-sm-2">
    <div class="panel panel-primary">
      <div class="panel-heading">Panel de Selección</div>
        <div class="panel-body"> <br>
          <hr>
          <caption>
          <button class="btn btn-primary" id="boton" data-toggle="modal" data-target="#modalNuevo" style="margin-bottom:12px;">
            Agregar Técnico
            <span class="glyphicon glyphicon-plus"></span>
          </button>
            </caption>

            <caption>
          <button class="btn btn-primary" id="boton" data-toggle="modal" data-target="#modal2" style="margin-bottom:12px;">
            Agregar Acreditación
            <span class="glyphicon glyphicon-plus"></span>
          </button>
            </caption>

            <caption>
          <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom:12px;">
            Agregar Asociación
            <span class="glyphicon glyphicon-plus"></span>
          </button>
            </caption>
        </div>
      </div>
    </div>

    <div class="col-sm-10">
            <div id="tabla" style="margin-top:20px;"></div>
    </div>
</div>

        <!-- <div id="tabla" style="margin-top:20px;"></div> -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title" id="exampleModalLabel"><center>Asociación</center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id="formularioasoc" enctype="multipart/form-data" method="post" action="files.php">
   
        <div class="form-group col-xs-12">
                <div class="col-xs-5">
                <label class="col-xs-4">Tecnico:</label>
                    <div class="input-group col-xs-8">
                         <select class="form-control"  name="tec" id="tec" lang="es">
            <?php
            $queryt = "SELECT ID, NOMBRES  FROM `TITAN_ACREDITACIONES_TECNICOS` ";
            $resultadot =  mysqli_query($cnn,$queryt) ;
            //echo "<pre>"; print_r($query); echo "</pre>";
            while($row = mysqli_fetch_assoc($resultadot)){$arreglot[] = $row;}
                foreach ($arreglot as $key => $value) {
            echo  '<option value="'.$value['ID'].'" >'.$value['NOMBRES'].' </option> ';
                }
          ?>
      </select>
                    </div>
                </div>
                <div class="col-xs-5">
                <label class="col-xs-4">Acreditación:</label>
                    <div class="input-group col-xs-8">
                    <select class="form-control" multiple="multiple" name="acre" id="acre" lang="es">
            <?php
            $queryc = "SELECT ID, NOMBRE  FROM `TITAN_ACREDITACIONES` ";
            $resultadoc =  mysqli_query($cnn,$queryc) ;
            //echo "<pre>"; print_r($query); echo "</pre>";
            while($row = mysqli_fetch_assoc($resultadoc)){$arregloc[] = $row;}
                foreach ($arregloc as $key => $value) {
            echo  '<option value="'.$value['ID'].'" >'.$value['NOMBRE'].' </option> ';

           $consssssssssss = inpuer($hostGeret,$userGeret,$passGeret,$Aden);
                }
          ?>
      </select>
                    </div>
                </div>
                <div class="col-xs-2">
                <button type="button" class="btn btn-secondary" onclick="inputs();">Ejecutar</button>     
                       </div>
        </div>
        
        <div class="form-group col-xs-12">
             
                  
                    <div id="demo" class="col-xs-12"><br>  
                    <input type="hidden" accept="image/*,.pdf" id="file" name="file[]"class="form-control" multiple>
                    </div>
               
          </div>    
          <br>     
          <hr> 
          <hr>  
          </div>   
         
        <br>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="asociacion(); subir();" >Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
    <!-- fin 1 Modal -->
        <!-- Modal -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title"><center>Agregar Técnicos</center></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="formu">
      <div class="form-group col-xs-12">
              <div class="col-xs-6">
              <label class="col-xs-4">Nombres:</label>
                  <div class="input-group col-xs-8">
                        <input type="text" id="nombres" class="form-control" required/>
                  </div>
              </div>
              <div class="col-xs-6">
              <label class="col-xs-4">Apellidos:</label>
                  <div class="input-group col-xs-8">
                          <input type="text"  id="apellidos" class="form-control" required/>
                  </div>
              </div>
      </div>
      <div class="form-group col-xs-12">
              <div class="col-xs-6">
              <label class="col-xs-4">Rut:</label>
                  <div class="input-group col-xs-8">
                        <input type="text" id="rut" class="form-control" required/>
                  </div>
              </div>
              <div class="col-xs-6">
              <label class="col-xs-4">Telefono:</label>
                  <div class="input-group col-xs-8">
                          <input type="text"  id="telefono" class="form-control" required/>
                  </div>
              </div>
      </div>
      <div class="form-group col-xs-12">
              <div class="col-xs-6">
              <label class="col-xs-4">Email:</label>
                  <div class="input-group col-xs-8">
                        <input type="email" id="email" class="form-control" required/>
                  </div>
              </div>
              <div class="col-xs-6">
              <label class="col-xs-4">Zona:</label>
                  <div class="input-group col-xs-8">
                  <select id="zona" name="zona" class="form-control" >
                                     <option value="Z01">Z01 </option>
                                     <option value="Z02">Z02 </option>
                                     <option value="Z03">Z03 </option>
                                     <option value="Z04">Z04 </option>
                                     <option value="Z05">Z05 </option>
                                     <option value="Z06">Z06 </option>
                                     <option value="Z07">Z07 </option>
                                     <option value="Z08O">Z08O </option>
                                     <option value="Z08P">Z08P </option>
                                     <option value="Z09">Z09</option>
                                     <option value="Z10">Z10 </option>
                                     <option value="Z11">Z11 </option>
                                     <option value="Z12">Z12 </option>
                                     <option value="Z13">Z13 </option>
                                     <option value="Z14">Z14 </option>
                                     <option value="Z15">Z15 </option>
                                     <option value="Z16">Z16 </option>
                                     <option value="Z17">Z17 </option>
                                     <option value="Z18">Z18 </option>
                                     <option value="Z19">Z19 </option>
                                     <option value="Z20">Z20 </option>
                                     </select>
                  </div>
              </div>
      </div>
      <div class="form-group col-xs-12">
              <div class="col-xs-6">
              <label class="col-xs-4">Empresa:</label>
                  <div class="input-group col-xs-8">
                  <select id="empresa" name="empresa" class="form-control" >
                                     <option value="Electrotel">Electrotel </option>
                                     <option value="Icetel">Icetel </option>
                                     <option value="Telrad">Telrad </option>
                                     <option value="Traza">Traza </option>
                                     </select>
                  </div>
              </div>
              <div class="col-xs-6">
              <label class="col-xs-4">Fecha Ingreso:</label>
                  <div class="input-group col-xs-8">
                  <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control input-sm">
                  </div>
              </div>
      </div>
      <div class="form-group col-xs-12">
              <div class="col-xs-6">
              <label class="col-xs-4">Proyecto:</label>
                  <div class="input-group col-xs-8">
                  <select id="proyecto" name="proyecto" class="form-control" >
                                     <option value="Sitios">Sitios </option>
                                     <option value="FO">FO </option>
                                     </select>
                  </div>
                </div>
      </div>
      </form>`
   </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btn" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="ingreso();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
        <!-- fin del modal1 -->

  <!-- Modal -->
  <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="height:10000;"role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title"><center>Acreditación</center> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  id="f2" name="f2">
  <div class="form-group col-xs-12">
          <div class="col-xs-6">
              <label class="col-xs-4">Nombre:</label>
              <div class="col-xs-8">
              <input type="text" name="nombre" id="nombre"  class="form-control input-sm">
              </div>
          </div>
        <div class="col-xs-6">
            <label class="col-xs-4">Tipo:</label>
            <div class="col-xs-8">
            <input type="text" name="" id="tipo" class="form-control input-sm">
            </div>
        </div>
  </div>
  <div class="form-group col-xs-12">
          <div class="col-xs-6">
            <label class="col-xs-4">Clasificación:</label>
            <div class="col-xs-8">
              <select id="clasificacion" name="clas" class="form-control" >
                                        <option value="ESPECIAL ">ESPECIAL  </option>
                                        <option value="SISCOL">SISCOL </option>

              </select>
            </div>
          </div>
          <div class="col-xs-6">
          <label class="col-xs-4">Zona:</label>
          <div class="col-xs-8">
        	<select id="zona_u" name="zona" class="form-control" multiple="multiple">
          <?php
            $queryzona = "SELECT ID, ZONA_ABRV  FROM `TITAN_ZONAS` ";
            $res =  mysqli_query($cnn,$queryzona) ;
            //echo "<pre>"; print_r($query); echo "</pre>";
            while($row = mysqli_fetch_assoc($res)){$arreglozona[] = $row;}
                foreach ($arreglozona as $key => $value) {
            echo  '<option value="'.$value['ZONA_ABRV'].'" >'.$value['ZONA_ABRV'].' </option> ';
                }
          ?>
            </select>
          </div>
          </div>
  </div>

  <div class="form-group col-xs-12">
          <div class="col-xs-6">
              <label class="col-xs-4">Duración:</label>
              <div class="col-xs-4">
              <select id="desde" name="desde" class="form-control" >
                  <option value="1">1 </option>
                  <option value="2">2 </option>
                  <option value="3">3 </option>
                  <option value="4">4 </option>
                  <option value="1">5 </option>
                  <option value="1">6 </option>
                  <option value="1">7 </option>
                  <option value="1">8 </option>
                  <option value="1">9 </option>
                  <option value="1">10 </option>
                  <option value="1">11 </option>
                  <option value="1">12 </option>
                  <option value="1">13 </option>
                  <option value="1">14 </option>
                  <option value="1">15 </option>
                  <option value="1">16 </option>
                  <option value="1">17 </option>
                  <option value="1">18 </option>
                  <option value="1">19 </option>
                  <option value="1">20 </option>
                  <option value="1">21 </option>
                  <option value="1">22 </option>
                  <option value="1">23 </option>
                  <option value="1">24 </option>
                  <option value="1">25 </option>
                  <option value="1">26 </option>
                  <option value="1">27 </option>
                  <option value="1">28 </option>
                  <option value="1">29 </option>
                  <option value="1">30 </option>
                  </select>
              </div>
              <div class="col-xs-4">
            <select id="hasta" name="hasta" class="form-control">
                    <option value="dia"> DIA</option>
                    <option value="mes"> MES</option>
                    <option value="ano"> AÑO</option>
                  </select>
            </div>
          </div>
        <div class="col-xs-6">
            <label class="col-xs-4">POP:</label>
            <div class="col-xs-8">
            <input type="text" name="" id="pop" class="form-control input-sm">
          </div>
        </div>
  </div>


      <div class="form-group col-xs-12">
            <div class="col-xs-6">
            <label  class="col-xs-4">Documentos Requeridos:</label>
            <div class="col-xs-8">
            <select class="form-control" multiple="multiple" name="documentos" id="documentos" lang="es">
            <?php
            $query = "SELECT ID, NOMBRE, ACTIVO  FROM `TITAN_ACREDITACIONES_DOC_NOMBRE` ";
            $resultado =  mysqli_query($cnn,$query) ;
            //echo "<pre>"; print_r($query); echo "</pre>";
            while($row = mysqli_fetch_assoc($resultado)){$arreglo[] = $row;}
                foreach ($arreglo as $key => $value) {
            echo  '<option value="'.$value['ID'].'" >'.$value['NOMBRE'].' </option> ';
                }
          ?>
 </select>
            </div>
</div>
      </div>.
</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="   ingreso_ac();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>
<!-- fin del modal1 -->

  <!-- fin del modal1 -->

  <!-- Modal -->

asdasd
</body>
<?php
         function inpuer($hostGeret,$userGeret,$passGeret,$Aden){     
          $sql = "SELECT
          TITAN_ACREDITACIONES.NOMBRE,
          TITAN_ACREDITACIONES.ID,
          TITAN_ACREDITACION_REL_DOCUMENTOS.ID_NOMBRE_DOCUMENTO,
          TITAN_ACREDITACIONES_DOC_NOMBRE.NOMBRE as NOMBRE_DOC
          FROM
          TITAN_ACREDITACIONES
          INNER JOIN TITAN_ACREDITACION_REL_DOCUMENTOS ON TITAN_ACREDITACIONES.ID = TITAN_ACREDITACION_REL_DOCUMENTOS.ID_ACREDITACION
          INNER JOIN TITAN_ACREDITACIONES_DOC_NOMBRE ON TITAN_ACREDITACION_REL_DOCUMENTOS.ID_NOMBRE_DOCUMENTO = TITAN_ACREDITACIONES_DOC_NOMBRE.ID";
        

        $res = mysqli_query($cnn,$sql);
        $myArray = array();
        while($row = mysqli_fetch_assoc($res)){$myArray[] = $row;}

        return $myArray;
         echo "<pre>"; print_r($myArray); echo "</pre>";
        } 
        ?>
</html>
