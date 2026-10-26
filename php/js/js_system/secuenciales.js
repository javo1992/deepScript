$(document).ready(function () {	
	lista_secuenciales();	
})

function lista_secuenciales()
{
	var parametros = 
	{
		'query':'',
	}
	$.ajax({
	  type: "POST",
	  url: '../controlador/secuencialesC.php?lista=true',
	  data: {parametros:parametros}, 
	  dataType:'json',
	  success: function(data)
	  {
	  	$('#tbl_datos').html(data);	  
	  }
	})

}

function editar(id=false)
{
	if(id==false)
	{
		punto = $('#punto').val();
		estab = $('#estab').val();
		numero = $('#numero').val();
		 parametros = 
		{
			'id':'',
			'tipo':$('#ddl_tipo').val(),
			'estab':$('#estab').val(),
			'punto':$('#punto').val(),
			'numero':$('#numero').val(),
			'autorizacion':$('#autorizacion').val(),
		}
		if(punto.length >3 || punto.length <3  || estab.length >3 || estab.length <3 )
		{
	  		Swal.fire('','Serie Incorrecta','error');
			return false;
		}
		if(numero<1 || numero =='')
		{
			Swal.fire('','Numero incorecto','error');
			return false;
		}
	}else
	{
		punto = $('#punto_'+id).val();
		estab = $('#estab_'+id).val();
		numero = $('#numero_'+id).val();
		 parametros = 
		{
			'id':id,
			'estab':$('#estab_'+id).val(),
			'punto':$('#punto_'+id).val(),
			'numero':$('#numero_'+id).val(),			
			'tipo':$('#ddl_tipo_'+id).val(),
		}
		if(punto.length >3 || punto.length <3  || estab.length >3 || estab.length <3 )
		{
	  		Swal.fire('','Serie Incorrecta','error');
			return false;
		}
		if(numero<1 || numero =='')
		{
			Swal.fire('','Numero incorecto','error');
			return false;
		}

	}

	$.ajax({
	  type: "POST",
	  url: '../controlador/secuencialesC.php?guardar_editar=true',
	  data: {parametros:parametros}, 
	  dataType:'json',
	  success: function(data)
	  {
	  		if(data==1)
	  		{
	  			lista_secuenciales();
	  			Swal.fire('','Guardado','success');
	  		}else if(data ==-2)
	  		{
	  			Swal.fire('','El tipo de documento y la serie ya esta registrado','info');	  			
	  		}  
	  }
	})

}

function eliminar(id)
{      
  var id = id;
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "Esta a punto de borrar un registro",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
        }).then((result) => {
            if (result.isConfirmed) {
              delete_secuencial(id);
            }
        })
}

function delete_secuencial(id)
{     
  var parametros=
  {
    'id':id,
  }
  $.ajax({
    data:  {parametros:parametros},
    url:   '../controlador/secuencialesC.php?delete_secuencial=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
     if(response==1)
     {
      Swal.fire('','Eliminada', 'success');
       lista_secuenciales();
     }               
    }
  });

}

