<?php
include_once ('../../allware/conexion.php');
$conOT       =   new mysqli('192.168.110.131','cpacheco','pLvVr4t&a#4d1r3');
$cnn = mysqli_connect($hostGeret,$userGeret,$passGeret,"Aden");

$query = "SELECT * FROM `TITAN_ACREDITACIONES_TECNICOS`";

$result = mysqli_query($cnn,$query) or die(" error $query");

$tabla .= '
                <table id="tt" class="table table-striped table-bordered" style="width:100% margin-top:20px;">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Rut</th>
                        <th>Zona</th>
                        <th>Acreditaciones Zona</th>
                        <th>Documentos</th>
                    </tr>
                </thead>
                <tbody> ';

                while($row = mysqli_fetch_assoc($result))  {$myArray[] = $row;

                    $tabla .= '
                    <tr>

                    <td><center>'.$row['NOMBRES'].'<center></td>
                    <td><center>'.utf8_encode($row['APELLIDOS']).'<center></td>
                    <td><center>'.utf8_encode($row['RUT']).'<center></td>
                    <td><center>'.utf8_encode($row['ZONA']).'<center></td>
                    <td><center>'.utf8_encode($final).'<center></td>
                    <td><center> '.$s.'<center></td>

                </tr>
               ';
                }
    $tabla .= ' </tbody> </table>';
    echo $tabla;
?>

<script>
$(document).ready(function(){
$('#tt').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
             ,
   language:{
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
        
    }
}

});
});
            </script>
