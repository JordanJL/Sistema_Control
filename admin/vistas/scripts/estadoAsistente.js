function listar_asistente(){
	var  fecha_inicio = $("#fecha_inicio").val();
	 var fecha_fin = $("#fecha_fin").val(); 
	
		tabla=$('#tbllistadoasistente').dataTable({
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
				url:'../ajax/pagoAsistente.php?op=listar_asistente',
				data:{fecha_inicio:fecha_inicio, fecha_fin:fecha_fin },
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