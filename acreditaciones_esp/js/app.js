$(document).ready(function() {
    $('#documentos').multiselect({
        columns: 1,
         enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        selectedClass: null,
         nonSelectedText: "Seleccionar",
        includeSelectAllOption: true,
        buttonWidth: "100%",
        maxHeight: 250,
        allSelectedText: "Seleccionar todo",
        nSelectedText  : "Elegidas",

    });
   
    $('#acre').multiselect({
        columns: 1,
         enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        selectedClass: null,
         nonSelectedText: "Seleccionar",
        includeSelectAllOption: true,
        buttonWidth: "100%",
        maxHeight: 250,
        allSelectedText: "Seleccionar todo",
        nSelectedText  : "Elegidas",

    });

    $('#zona_u').multiselect({
        columns: 1,
         enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        selectedClass: null,
         nonSelectedText: "Seleccionar",
        includeSelectAllOption: true,
        buttonWidth: "100%",
        maxHeight: 250,
        allSelectedText: "Seleccionar todo",
        nSelectedText  : "Elegidas",

    });

    $('#tabla').load('./acreditaciones_esp/tabla.php');
    $('#examplea').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel'
        ],
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        "paging":   false,
        "scrollX": true,
        responsive: true,
        scrollY:        '50vh',
        scrollCollapse: true,
        "order": [[ 1, "asc" ]]
    });
    });

function ingreso(){
    $('#modalNuevo').modal('hide');
    var nombres = $("#nombres").val();
    var apellidos = $('#apellidos').val();
    var rut = $('#rut').val();
    var telefono = $('#telefono').val();
    var email = $('#email').val();
    var zona = $('#zona').val();
    var empresa = $('#empresa').val();
    var fecha_ingreso = $('#fecha_ingreso').val();
    var proyecto = $('#proyecto').val();
    $.ajax({
        "url":"./acreditaciones_esp/ingresa.php",
        type:'POST',
        data:{
        nombres:nombres,
        apellidos:apellidos,
        rut:rut,
        telefono:telefono,
        email:email,
        zona:zona,
        empresa:empresa,
        fecha_ingreso:fecha_ingreso,
        proyecto:proyecto
        }
        }).done(function(resp){
        console.log('done');
        }).error(function(a,b,c){
        console.log(a);
        console.log(b);
        console.log(c);
        }).success(function(resp){
          $('#tabla').load('./acreditaciones_esp/tabla.php');
            alert('registro ingresado');
        console.log('success');
        console.log(resp);
        }) ;
  }

  function ingreso_ac(){
    $('#modal2').modal('hide');
    var nombre = $("#nombre").val();
    var tipo = $('#tipo').val();
    var clasificacion = $('#clasificacion').val();
    var zona = $('#zona_u').val();
    var documentos = $('#documentos').val();
    var desde = $('#desde').val();
    var hasta = $('#hasta').val();
    var pop = $('#pop').val();

    $.ajax({
        "url":"./acreditaciones_esp/ac.php",
        type:'POST',
        data:{
        nombre:nombre,
        tipo:tipo,
        clasificacion:clasificacion,
        zona:zona,
        documentos:documentos,
        desde:desde,
        hasta:hasta,
        pop:pop
        }
        }).done(function(resp){
        console.log('done');
        }).error(function(a,b,c){
        console.log(a);
        console.log(b);
        console.log(c);
        }).success(function(resp){
            $('#tabla').load('./acreditaciones_esp/tabla.php');
            alert('registro ingresado');
        console.log('success');
        console.log(resp);
        }) ;
  }

  function asociacion(){
    $('#exampleModal').modal('hide');
   // var Form = new FormData($('#formularioasoc')[2]);
    var tec = $("#tec").val();
    var acre = $('#acre').val();   
    var file = $('#file').val();   
    var star = $('#start').val();   
    var end = $('#end').val();   

    

    $.ajax({
        "url":"./acreditaciones_esp/asoc.php",
        type:'POST',
    
        data:{
        tec:tec,
        acre:acre,
        file:file,
        star:star,
        end:end
        
        },
        }).done(function(resp){
        console.log('done');
        }).error(function(a,b,c){
        console.log(a);
        console.log(b);
        console.log(c);
        }).success(function(resp){
            $('#tabla').load('./acreditaciones_esp/tabla.php');
            alert('registro ingresado');
        console.log('success');
        console.log(resp);
        }) ;
  }

  function subir()
  {

      var Form = new FormData($('#formularioasoc')[0]);
      $.ajax({

          url: "./acreditaciones_esp/files.php",
          type: "post",
          data : Form,
          processData: false,
          contentType: false,
          success: function(data)
          {
              alert('Archivos Agregados!');
          }
      });
  }

  function inputs(){
    //alert('hola');
   var acre = $("#acre").val();
  
   //valor del registro
    $.ajax({
        "url":"./acreditaciones_esp/input.php",
        type:'POST',
        data:{
           acre:acre
        }}).done(function(resp){
          $('#demo').html(resp);
        })
}

  function tabla(){

     $.ajax({
         "url":"./acreditaciones_esp/tabla.php",
         type:'POST',
         data:{

         }
         }).done(function(resp){
         $('#tabla').html(resp);
         //replaceWith
         console.log('done');
         }).fail(function(){
        alert('hubo un error');
         }) ;
 }
 $('#btn').on('click',function(){
     $('#formu').validate({
         rules:
         {
             email:{required: true, email:true, minlegth:8, maxlength:80},
         },
             messages:
             {
                 email:{required:'el campo es requerido', email:'el formato es incorrecto'}
             }
         
     });
 })

 jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#formu" ).validate({
  rules: {
    nombres: {
      required: true
    }
  }
});
  /* function valida() {
	nv = document.f2.nombre.value ;
    if(nv == "")
    {   alert('escribe algo');
    document.f2.nombre.select();
    //coloco otra vez el foco
    document.f2.nombre.focus();

    }

  } */
