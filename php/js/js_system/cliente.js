
$(document).ready(function () {

    $("#btn_upload").on('click', function() {

        var formData = new FormData();
        var files = $('#file_img')[0].files[0];
        var id = $('#txt_id').val();
        var tipo = $('#txt_tipo').val();

    	if(id==''){Swal.fire('','Guarde datos de Cliente primero','info'); return false;}
    	if($('#file_img').val()==''){Swal.fire('','Seleccione una imagen','info'); return false;}
        formData.append('file',files);
        $.ajax({
            url: '../controlador/clienteC.php?guardar_foto=true&id='+id,
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response == 2) {                	
	  			Swal.fire('','Asegurese de subir una imagen valida','error');
                }else if(response==-1) {
	  			Swal.fire('','No se pudo cargar la foto','error');
                }else if(response==1)
                {
                	if(tipo=='C')
                	{
                		detalle_cliente(id);
                	}else
                	{
                		detalle_proveedor(id);
                	}
                }
            }
        });
        return false;
    });

    $("#btnExportar").on('click', function() {

    	window.open("../lib/Reporte_excel.php?ListaCliente=true", "_blank");
    });
	
});
function lista_cliente()
{
	parametros = 
	{
		'query':$('#query').val(),
	}
	$.ajax({
	  type: "POST",
	  url: '../controlador/clienteC.php?lista_clientes=true',
	  data: {parametros:parametros}, 
	  dataType:'json',
	  success: function(data)
	  {
	  	$('#lista_clientes').html(data);
	  }
	})

}

function lista_proveedores()
{
	parametros = 
	{
		'query':$('#query').val(),
	}
	$.ajax({
	  type: "POST",
	  url: '../controlador/clienteC.php?lista_proveedores=true',
	  data: {parametros:parametros}, 
	  dataType:'json',
	  success: function(data)
	  {
	  	$('#lista_proveedores').html(data);
	  }
	})

}

function detalle_cliente(id)
{
	$.ajax({
	  type: "POST",
	  url: '../controlador/clienteC.php?detalle_cliente=true',
	  data: {id:id}, 
	  dataType:'json',
	  success: function(data)
	  {
	  	if(data=='-1')
	  	{
	  		location.href = 'cliente.php';
	  	}else
	  	{
	  		$('#txt_id').val(data.id);
	  		$('#foto_cliente').attr('src','../img/clientes/'+data.foto+'?'+Math.random());
	  		$('#txt_ci').val(data.ci_ruc);
	  		$('#txt_nombre').val(data.nombre);
	  		$('#lbl_nombre').text(data.nombre);
	  		$('#txt_email').val(data.mail);
	  		$('#txt_telefono').val(data.telefono);
	  		$('#txt_razon').val(data.razon);
	  		$('#txt_direccion').val(data.direccion);
	  		if(data.estado=='A')
	  		{
	  			$('#btn_inactivar').css('display','block');	  			
	  			$('#btn_activar').css('display','none');
	  		}else
	  		{
	  			$('#btn_activar').css('display','block');
	  			$('#btn_inactivar').css('display','none');
	  		}
	  		console.log(data);
	  	}
	  }
	})
}

function detalle_proveedor(id)
{
	$.ajax({
	  type: "POST",
	  url: '../controlador/clienteC.php?detalle_proveedor=true',
	  data: {id:id}, 
	  dataType:'json',
	  success: function(data)
	  {
	  	if(data=='-1')
	  	{
	  		location.href = 'cliente.php';
	  	}else
	  	{
	  		$('#txt_id').val(data.id);
	  		$('#foto_cliente').attr('src','../img/clientes/'+data.foto+'?'+Math.random());
	  		$('#txt_ci').val(data.ci_ruc);
	  		$('#txt_nombre').val(data.nombre);
	  		$('#lbl_nombre').text(data.nombre);
	  		$('#txt_email').val(data.mail);
	  		$('#txt_telefono').val(data.telefono);
	  		$('#txt_razon').val(data.razon);
	  		$('#txt_direccion').val(data.direccion);
	  		if(data.estado=='A')
	  		{
	  			$('#btn_inactivar').css('display','block');	  			
	  			$('#btn_activar').css('display','none');
	  		}else
	  		{
	  			$('#btn_activar').css('display','block');
	  			$('#btn_inactivar').css('display','none');
	  		}
	  		console.log(data);
	  	}
	  }
	})
}

function guardar_editar()
{
	parametros = $('#form_datos').serialize();
	$.ajax({
	  type: "POST",
	  url: '../controlador/clienteC.php?guardar_editar=true',
	  data: parametros, 
	  dataType:'json',
	  success: function(data)
	  {
	  	if(data=='-2')
	  	{
	  		Swal.fire('','Cedula / RUC registrado','error');
	  	}else
	  	{
	  		if($('#txt_id').val()=='')
	  		{
	  			if($('#txt_tipo').val()=='C')
	  			{
		  			Swal.fire('','Cliente registrado','success').then(function(){
		  				location.href = 'detalle_cliente.php?id='+data;
		  			});
	  			}else
	  			{
	  				Swal.fire('','Proveedor registrado','success').then(function(){
		  				location.href = 'detalle_proveedor.php?id='+data;
		  			});
	  			}
	  		}else
	  		{
	  			Swal.fire('','Datos modificados','success');
	  		}
	  	}
	  }
	})
}

function cambiar_estado(estado)
{
	id= $('#txt_id').val();
	parametros = 
	{
		'id':id,
		'estado':estado,
	}
	$.ajax({
	  type: "POST",
	  url: '../controlador/clienteC.php?editar_estado=true',
	  data: {parametros:parametros}, 
	  dataType:'json',
	  success: function(data)
	  {
	  	if(data==1)
	  	{
	  		detalle_cliente(id);
	  	}
	  }
	})

}