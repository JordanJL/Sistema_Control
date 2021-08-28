$(document).ready(function(){  

  horasAcumuladas();
 }) 

//console.error('insertando');
//funcion que se ejecuta al inicio
function init() {
  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  })
}
/*

//funcion para guardaryeditar
function guardaryeditar(e){
    e.preventDefault();//no se activara la accion predeterminada 
    $("#btnGuardar").prop("disabled",true);
    var formData=new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/agendarcita.php?op=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos){
           // bootbox.alert(datos);
            //mostrarform(false);
            //tabla.ajax.reload();
        }
    });

    //limpiar();
}
*/
  
function horasAcumuladas(){   
  var a = $(".fc-toolbar-title").text();
  
var separa = a.split(" ");
var mes = separa[0] ;
var ano = separa[2] ;  
var fecha = ano+'-'+ convertir(mes)+'-01';  

if (mes != ""){
 
 
      $.ajax({
        type: 'POST',
        url: '../ajax/agendarcita.php',
        data: {
          key: 'ConsultaHorasAcumuladas',
          fecha_inicial: fecha 
        }

      }).done(function (datos) {
        // $("#tablaTareas tbody").empty;
        //alert(datos);

        //alert(  datos.substring(21, 1000).replace('"}', "") ); 

          $("#horasAcum").text(datos.substring(21, 1000).replace('"}', ""));
        
        // alert("refrescar");
        //console.error(document.getElementById('fechadesde').value);
        //$("#tablaTareas tbody").html(datos);
      }).fail(function (jqXHR, textStatus, errorThrow) {
        alert("Error al ingresar");
      });


} 
}  

function convertir(month) {
  var mes ="";
  if ( month == "enero"){
    mes = "01";
  }else if ( month == "febrero"){
    mes = "02";
  }else if ( month == "marzo"){
    mes = "03";
  }else if ( month == "abril"){
    mes = "04";
  }else if ( month == "mayo"){
    mes = "05";
  }else if ( month == "junio"){
    mes = "06";
  }else if ( month == "julio"){
    mes = "07";
  }else if ( month == "agosto"){
    mes = "08";
  }else if ( month == "septiembre"){
    mes = "09";
  }else if ( month == "octubre"){
    mes = "10";
  }else if ( month == "noviembre"){
    mes = "11";
  }else if ( month == "diciembre"){
    mes = "12";
  } 

  return mes
}

function GuardarCita() {

  var a = document.getElementById('descripcion').value;
  var b = document.getElementById('fechadesde').value;
  var c = document.getElementById('fechahasta').value;

  if (a != "" & b != "" & c != "") {
    if (Date.parse(b) < Date.parse(c)) {
      $.ajax({
        type: 'POST',
        url: '../ajax/agendarcita.php',
        data: {
          key: 'GuardarCita',
          descripcion: document.getElementById('descripcion').value,
          fechadesde: document.getElementById('fechadesde').value,
          fechahasta: document.getElementById('fechahasta').value
        }

      }).done(function (datos) {
        // $("#tablaTareas tbody").empty;
        //alert(datos);
        if(datos.substring(0, 1)=="N"){//datos=="N"
          alert(datos);
        }else{
          alert(datos);
          document.getElementById("descripcion").value = "";
          document.getElementById("fechahasta").value = "";
          document.getElementById("fechadesde").value = "";
          $('#modal-default').modal('hide');
          location.reload();
        }
        // alert("refrescar");
        //console.error(document.getElementById('fechadesde').value);
        //$("#tablaTareas tbody").html(datos);
      }).fail(function (jqXHR, textStatus, errorThrow) {
        alert("Error al ingresar");
      });
    } else {
      alert("Fecha hasta no puede ser menor a fecha desde");
    }
  } else {
    alert("Llenar los datos requeridos descripción, fecha desde, fecha hasta");
  }
}

/*
$titulo=isset($_POST["titulo"])? limpiarCadena($_POST["titulo"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$fechadesde=isset($_POST["fechadesde"])? limpiarCadena($_POST["fechadesde"]):"";
$fechahasta=isset($_POST["fechahasta"])? limpiarCadena($_POST["fechahasta"]):"";
*/





/*function mensaje(){
    guardaryeditar();
}*/