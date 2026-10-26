$(document).ready(function () {
	clientes_ruc();

	$('#ddl_cliente').on('select2:select',function(e){
		var data = e.params.data.datos;
		$('#txt_ci').val(data.ci_ruc);
		$('#txt_email').val(data.mail);
		$('#txt_telefono').val(data.telefono);
		$('#txt_direccion').val(data.direccion);
		// console.log(e);
		console.log(data)
	})

})


function cambio_serie(tipo,serie)
{
     var parametros = 
    {
        'serie':serie,
        'tipo':tipo,
    }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/funcionesSistema.php?serie_selected=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#txt_serie').text(response.Serie);
            $('#txt_Nonota').text(response.numero);
            $('#lbl_autorizacion').text(response.autorizacion);
            // $('#btn_guardar_serie').css('display','initial');
            // $('#btn_recargar').css('display','initial');

            console.log(response);         
        }
      });

}


function clientes_ruc(){
      $('#ddl_cliente').select2({
        placeholder: 'Seleccione una cliente',
        ajax: {
          url: '../controlador/clienteC.php?buscar_proveedor_x_ci_get=true',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });
  }


function abrir_productos(de)
{
    if($('#txt_idpro').val()=='')
    {
        $('#myModal_productos').modal('show');
    }
    if(de=='ref')
    {
        $('#txt_ref').focus()
    }else
    {
        $('#txt_query').focus()
    }
    lista_articulos();
}

function lista_articulos()
{
    var parametros = 
    {
        'query':$('#txt_query').val(),
        'ref':$('#txt_ref').val(),
        'cate':$('#ddl_categoria').val(),
        'tipo':$('input:radio[name=opc]:checked').val()
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_facturaC.php?buscar_articulo=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#tbl_productos').html(response);          
        }
      });
}


function calcular()
{
    var cant = $('#txt_can').val();
    var por_iva = $('#lbl_iva').text();

    var lleva = $('#txt_llevaiva').val();

    if(cant=='' || cant==0)
    {
        $('#txt_can').val(1);
    }
    var cant = $('#txt_can').val();
    var dcto = $('#txt_dcto').val();
    if(dcto=='')
    {
        $('#txt_dcto').val(0);
    }    
    var dcto = $('#txt_dcto').val();
    var pvp = $('#txt_pvp').val();
    if(pvp=='')
    {
        $('#txt_pvp').val(0);
    }
    var pvp = $('#txt_pvp').val();

    var sub = cant*pvp;
    if(lleva==1)
    {
      var iva = parseFloat((sub*parseFloat(por_iva))/100);
    }else
    {
        iva = 0;
        $('#txt_iva').attr('readonly');   
    }
    var des = parseFloat((sub*parseFloat(dcto))/100);
    var total = sub-des+iva;

    $('#txt_sub').val(sub.toFixed(2));
    $('#txt_iva').val(iva.toFixed(2));    
    $('#txt_total').val(total.toFixed(2));
}

function agregar_nota()
{
    var id = $('#txt_nota').val();
    var parametros = $('#form_datos').serialize();
    parametros = parametros+'&serie='+$('#txt_serie').text()+'&autorizacion='+$('#lbl_autorizacion').text()
    if($('#txt_idpro').val()=='')
    {
        Swal.fire('Seleccione un producto','','info');
        return false
    }
     $.ajax({
        data:  parametros,
        url:   '../controlador/nota_CreditoC.php?add_articulo=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 

	        if(id=='' && response.respuesta==1)
	        {
	        	location.href = 'nota_credito.php?id='+response.id;
	        }else if(id!='' && response.respuesta ==1)
	        {
	            limpiar();
	            id = $('#txt_nota').val();
	            cargar_lineas_nota(id)

	        }else
	        {
	        	console.log('algo sallio mal');
	        }      
        }
      });
}

function lista_nota_credito()
{
    var query = $('#txt_query').val();
    var num = $('#txt_num_fac').val();
    var desde = $('#txt_desde').val();
    var hasta = $('#txt_hasta').val();
    var serie = $('#ddl_serie').val();

    var parametros = 
    {
        'query':query,
        'numfac':num,
        'desde':desde,
        'hasta':hasta,
        'serie':serie,
    }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/nota_CreditoC.php?lista_nota_credito=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#lista_notas').html(response);          
        }
      });

}

function cargar_detalle(id,estado)
{
    location.href="nota_credito.php?id="+id+"&estado="+estado;
}

function limpiar()
{
    $('#txt_total').val('0.00');
    $('#txt_articulo').val('')
    $('#txt_sub').val('0.00');
    $('#txt_dcto').val('0.00');
    $('#txt_can').val('1');
    $('#txt_pvp').val('0.00');
    $('#txt_iva').val('0.00');
    $('#txt_idpro').val('');
    $('#txt_codigo').val('')
}

function pdf_nota_credito()
{
    var id= $('#txt_nota').val();
    var parametros = 
    {
        'empresa':empresa,
        'fac':id,
        'usu':usu,
    }
     var url1= '../controlador/nota_CreditoC.php?reporte_nota=true&empresa='+empresa+'&id='+id+'&usu='+usu;
     window.open(url1,'_blank');
   
}
function usar(id,ref,det,pvp,iva)
{
    $('#myModal_productos').modal('hide');
    $('#txt_can').val(1);
    $('#txt_codigo').val(ref);
    $('#txt_articulo').val(det);
    $('#txt_pvp').val(pvp);
    $('#txt_idpro').val(id);
    $('#txt_can').focus();

    $('#txt_query').val('');
    $('#txt_ref').val('');
    $('#ddl_categoria').val(0);
    $('#txt_llevaiva').val(iva);
}

function cargar_nota_credito(id)
{    
	 $.ajax({
	    data:  {id,id},
	    url:   '../controlador/nota_CreditoC.php?datos_nota_credito=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	console.log(response)
	    	$('#txt_serie').text(response[0].serie_nc);
	    	$('#txt_Nonota').text(response[0].numero_nc);	    	
	    	$('#txt_nota').text(response[0].id_nota_credito);
	    	$('#txt_fecha').val(response[0].fecha_nc);
	    	$('#txt_fecha_doc').val(response[0].fecha_doc);
	    	$('#txt_motivo').val(response[0].motivo);
	    	$('#txt_num_doc').val(response[0].numero_doc);
	    	$('#txt_autorizacion_doc').val(response[0].autorizacion_doc);
	    	$('#lbl_autorizacion').text(response[0].autorizacion_nc);

	    	punto = response[0].serie_doc.split('-');
	    	$('#txt_estab').val(punto[0]);
	    	$('#txt_punto').val(punto[1]);

	    	$('#txt_email').val(response[0].mail);
	    	$('#txt_ci').val(response[0].ci_ruc);
	    	$('#txt_telefono').val(response[0].telefono);
	    	$('#txt_direccion').val(response[0].direccion);
	    	$('#ddl_cliente').append($('<option>', { value: response[0].id_cliente,text: response[0].nombre,selected: true }));
	    	
	    	if(response[0].estado=='A')
            {
                 $('#txt_estado').text('Factura Autorizada');
                 $('#txt_estado').css('background','greenyellow');
                 $('#form_add_producto').css('display','none');
                 $('#btn_autorizar').css('display','none');
                 $('#btn_eliminar').css('display','none');
                 $('#btn_anular').css('display','initial');

            }else if(response[0].estado=='R')
            {
                 $('#txt_estado').text('Factura rechazada');
                  $('#txt_estado').css('background','coral');
                  $('#txt_estado').css('color','white');
                  $('#btn_sri_error').css('display','initial');
            }else if(response[0].estado=='AN'){

                 $('#btn_autorizar').css('display','none');
                 $('#form_add_producto').css('display','none');
                 $('#lbl_anulado').css('display','initial');
            }else
            {
                 $('#txt_estado').text('Factura pendiente');
            }
	        console.log(response);  
	    }
	  });
}

function cargar_lineas_nota(id)
{
	$.ajax({
	    data:  {id,id},
	    url:   '../controlador/nota_CreditoC.php?lineas_nota_credito=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	$('#tbl_datos').html(response.tr); 
	    	$("#lbl_totDcto").text(response.descuento);  
            $("#lbl_totIva").text(response.iva);   
            $("#lbl_subtot").text(response.sub);     
            $("#lbl_tot").text(response.total);
	    }
	  });
}

function eliminar_linea(id)
{
	nota = $('#txt_nota').val();
	 $.ajax({
	    data:  {id,id},
	    url:   '../controlador/nota_CreditoC.php?eliminar_linea=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	if(response==1)
	    	{
	    		cargar_lineas_nota(nota);
	    	}
	    }
	  });

}

function valida_nota()
{
	cli = $('#ddl_cliente').val();
	fecha = $('#txt_fecha').val();
	fecha2 = $('#txt_fecha_doc').val();
	estab = $('#txt_estab').val();
	punto = $('#txt_punto').val();
	num_doc = $('#txt_num_doc').val();
	auto = $('#txt_autorizacion_doc').val();
	moti = $('#txt_motivo').val();
	if(cli=='')
	{
		Swal.fire('','Seleccione una cliente','info');
		return false;
	}
	if(fecha=='')
	{
		Swal.fire('','Fecha de nota de venta invalida','info');
		return false;
	}if(fecha2=='')
	{
		Swal.fire('','Fecha de documento invalido','info');
		return false;
	}if(estab=='')
	{
		Swal.fire('','Serie de documento invalido','info');
		return false;
	}if(punto=='')
	{
		Swal.fire('','Serie de documento invalido','info');
		return false;
	}if(num_doc=='')
	{
		Swal.fire('','Numero de documento invalido','info');
		return false;
	}if(moti=='')
	{
		Swal.fire('','Ingrese un motivo','info');
		return false;
	}
	autorizar();
}

function autorizar()
{
	$('#tipo_alerta').text('Autorizando nota de credito');
    $('#alertas').modal('show');
 	id = $('#txt_nota').val();
	dato = $('#form_datos').serialize();
	$.ajax({
	    data:  dato,
	    url:   '../controlador/nota_CreditoC.php?autorizar_nc=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
          $('#alertas').modal('hide');
          // console.log(response);
          // limpiar_cliente();
          if(response==2){
          	// cargar_nota_credito(id);
            Swal.fire('','XML devuelto', 'error').then(function(){
              location.reload();
            });  
          }else if(response==-1)
          {                
            Swal.fire('','XML devuelto', 'error').then(function(){
              location.reload();
            });                  
          }else if(response==3)
          {                
            Swal.fire('','Este documento electronico ya esta autorizado', 'info').then(function(){
              location.reload();
            });                  
          }else if(response==1)
          {           
            Swal.fire('','Nota de credito autorizada', 'success').then(function(){
              location.href = 'nota_credito.php?id='+id+'&estado=A';
            });  
          }else if(response==4)
          {
            Swal.fire('','Factura Generada', 'success').then(function(){
              location.reload();
            }); 
            imprimir(factura);
            limpiar_mesa(mesa);
          }else if(response==6){
          	Swal.fire('','El cliente seleccionado debe poseer un RUC', 'error')
          }else{
            Swal.fire('','Conexion con SRI inestable','info')
          }
        },
        error: function(xhr, textStatus, error){
            $('#alertas').modal('hide');
              $('#lbl_mensaje').text(xhr.statusText);
              alert(xhr.statusText);
              alert(textStatus);
              alert(error);
            }
	});
}

function eliminar_nota(id)
{
	Swal.fire({
	  title: 'Esta seguro de eliminar?',
	  text: "Este proceso no se podra revertir",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si'
	}).then((result) => {
	  if (result.isConfirmed) {
	  	 eliminar(id);	    
	  }
	})
}

function eliminar(id)
{
	 $.ajax({
	    data:  {id,id},
	    url:   '../controlador/nota_CreditoC.php?eliminar_nota=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	if(response==1)
	    	{
	    		
                location.href='lista_nota_credito.php';
	    	}
	    }
	  });
}

function anular_nota(id)
{
	Swal.fire({
	  title: 'esta seguro de anular este documento?',
	  text: "Este proceso no se podra revertir",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si'
	}).then((result) => {
	  if (result.isConfirmed) {
	  	 anular(id);	    
	  }
	})
}

function anular(id)
{
	 $.ajax({
	    data:  {id,id},
	    url:   '../controlador/nota_CreditoC.php?anular_nota=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	if(response==1)
	    	{	    		
                location.href='lista_nota_credito.php';
	    	}
	    }
	  });
}

