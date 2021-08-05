var tabla;

//funcion que se ejecuta al inicio
function init(){
  // listar();
      listaru();
$("#formulario").on("submit",function(e){
   	guardaryeditar(e);
   })

    //cargamos los items al select cliente
   $.post("../ajax/asistencia.php?op=selectPersona", function(r){
   	$("#idcliente").html(r);
   	$('#idcliente').selectpicker('refresh');
   });

}

 

//funcion listar
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listar',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}

function listaru(){
	tabla=$('#tbllistadou').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listaru',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}



function listar_asistencia(){
var  fecha_inicio = $("#fecha_inicio").val();
 var fecha_fin = $("#fecha_fin").val();
 var idcliente = $("#idcliente").val();

	tabla=$('#tbllistado_asistencia').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listar_asistencia',
			data:{fecha_inicio:fecha_inicio, fecha_fin:fecha_fin, idcliente: idcliente},
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}

function listar_clientes(){
	var  fecha_inicio = $("#fecha_inicio").val();
	 var fecha_fin = $("#fecha_fin").val();
	 var idcliente = $("#idcliente").val();
	
		tabla=$('#tbllistado').dataTable({
			"aProcessing": true,//activamos el procedimiento del datatable
			"aServerSide": true,//paginacion y filrado realizados por el server
			dom: 'Bfrtip',//definimos los elementos del control de la tabla
			buttons: [
					  'copyHtml5',
					  'excelHtml5',
					  'csvHtml5',
					  'pdf'
			],
			"ajax":
			{
				url:'../ajax/asistencia.php?op=listar_clientes',
				data:{fecha_inicio:fecha_inicio, fecha_fin:fecha_fin, idcliente: idcliente},
				type: "get",
				dataType : "json",
				error:function(e){
					console.log(e.responseText);
				}
			},
			"bDestroy":true,
			"iDisplayLength":10,//paginacion
			"order":[[0,"desc"]]//ordenar (columna, orden)
		}).DataTable();
	}


	function asignar_asistente(idcalendario){
		$("#getCodeModal2").modal('show');
		  
		$("#idcanderio").val(idcalendario);

			$.post("../ajax/asistencia.php?op=selectPersona2",{idcalendario : idcalendario}, function(r){
				$("#idasistente").html(r);
				$('#idasistente').selectpicker('refresh');
			});
	}


	function UpdateCalendar ()
	{
		
		var idasistente = $("#idasistente").val();
		var idcalendario = $("#idcanderio").val();

		$.post("../ajax/asistencia.php?op=UpdateCalendar",{idasistente : idasistente,idcalendario:idcalendario }, function(r){
			
		$("#getCodeModal2").modal('hide');
			listar_clientes();
			

		}); 

	}


function listar_asistenciau(){
var  fecha_inicio = $("#fecha_inicio").val();
 var fecha_fin = $("#fecha_fin").val();

	tabla=$('#tbllistado_asistenciau').dataTable({
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/asistencia.php?op=listar_asistenciau',
			data:{fecha_inicio:fecha_inicio, fecha_fin:fecha_fin},
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			}
		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
	}).DataTable();
}



init();