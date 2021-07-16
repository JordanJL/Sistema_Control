$('#formLogin').submit(function(e){
   e.preventDefault();
   var usuario = $.trim($("#usuario").val());    
   var password =$.trim($("#password").val());    
    
   if(usuario.length == "" || password == ""){
      Swal.fire({
          type:'warning',
          title:'Debe ingresar un usuario y/o password213',
      });
      return false; 
    }else{
alert("mierda");
        $.ajax({
            url:"ajax/usuario.php?op=verificar",
            type:"POST",
            datatype: "json",
            data: {"logina":usuario, "clavea":password}, 
            success:function(data){               
                if(data == "null"){
                    Swal.fire({
                        type:'error',
                        title:'Usuario y/o password incorrecta',
                    });
                }else{
                    Swal.fire({
                        type:'success',
                        title:'¡Conexión exitosa!',
                        confirmButtonColor:'#3085d6',
                        confirmButtonText:'Ingresar'
                    }).then((result) => {
                        if(result.value){
                            //window.location.href = "vistas/pag_inicio.php";
                            //window.location.href = "dashboard/index.php";
                            $(location).attr("href","escritorio.php");   
                        }
                    })
                    
                }
            }    
         }); 
    }     
});