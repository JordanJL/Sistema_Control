//console.error('insertando');
//funcion que se ejecuta al inicio
function init(){ 
    $("#formulario").on("submit",function(e){
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

function GuardarCita(){
    $.ajax({
      type: 'POST',
      url: '../ajax/agendarcita.php',
      data: { 
        key: 'GuardarCita',
        titulo: document.getElementById('titulo').value,
        descripcion: document.getElementById('descripcion').value,
        fechadesde: document.getElementById('fechadesde').value,
        fechahasta: document.getElementById('fechahasta').value
      }
      
    }).done(function( datos ) {
     // $("#tablaTareas tbody").empty;
     alert(datos);
     console.error(document.getElementById('fechadesde').value);
      //$("#tablaTareas tbody").html(datos);
    }).fail(function (jqXHR, textStatus, errorThrow){
      alert("Error al ingresar");
    }); 
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