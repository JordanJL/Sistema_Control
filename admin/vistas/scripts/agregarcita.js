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