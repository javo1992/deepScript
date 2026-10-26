$(document).ready(function () { 
	DCTipoPago();
	clientes_ruc();    
  lista_series_FA('FA','DCSerieFac');

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
            $('#LblSerieGuiaR').text(response.Serie);
            $('#LblGuiaR').text(response.numero);
            $('#LblAutGuiaRem').text(response.autorizacion);
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

function agregar_guia()
{
    var id = $('#txt_guia').val();
    var parametros = $('#form_guia').serialize();
    parametros = parametros+'&serie='+$('#LblSerieGuiaR').text()+'&autorizacion='+$('#LblAutGuiaRem').text()+
    '&RazonSocial='+$('#DCRazonSocial option:selected').text()+'&EmpresaEntrega='+$('#DCEmpresaEntrega option:selected').text()
    if($('#txt_idpro').val()=='')
    {
        Swal.fire('Seleccione un producto','','info');
        return false
    }
     $.ajax({
        data:  parametros,
        url:   '../controlador/guia_remisionC.php?add_articulo=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 

	        if(id=='' && response.respuesta==1)
	        {
	        	location.href = 'detalle_guia.php?id='+response.id;
	        }else if(id!='' && response.respuesta ==1)
	        {
	            limpiar();
	            id = $('#txt_guia').val();
	            cargar_lineas_guia(id)

	        }else
	        {
	        	console.log('algo sallio mal');
	        }      
        }
      });
}

function lista_guia_remision()
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
        url:   '../controlador/guia_remisionC.php?lista_guia_remision=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#lista_guias').html(response);          
        }
      });

}

function cargar_detalle(id,estado)
{
    location.href="detalle_guia.php?id="+id+"&estado="+estado;
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

function pdf_guia()
{
	var idgr = $('#txt_guia').val();
	 var url1= '../controlador/guia_remisionC.php?reporte_guia=true&empresa='+empresa+'&usu='+usu+'&guia='+idgr;
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


function detalle_guia(id)
{
    $.ajax({
        data: {id,id},
        url:   '../controlador/guia_remisionC.php?datos_guia_remision=true',
        dataType:'json',      
        type:  'post',
        // dataType: 'json',
        success:  function (response) { 
            if(response.length>0)
            {
            	console.log(response);

                $('#txt_guia').val(response[0].ID);
                $('#ddl_cliente').append($('<option>',{value: response[0].id_cliente, text:response[0].nombre,selected: true }));
                

                $('#txt_ci').val(response[0].ci_ruc);
                $('#txt_telefono').val(response[0].telefono);
                $('#txt_email').val(response[0].mail);
                $('#txt_direccion').val(response[0].direccion);

                $('#MBoxFechaGRE').val(response[0].FechaGRE.substring(0,10));
                $('#LblSerieGuiaR').text(response[0].Serie_GR);
                $('#LblGuiaR').text(response[0].Remision);
                $('#LblAutGuiaRem').text(response[0].Autorizacion_GR);
                $('#MBoxFechaGRI').val(response[0].FechaGRI.substring(0,10));
                $('#MBoxFechaGRF').val(response[0].FechaGRF.substring(0,10));
                $('#lbl_ciudadini').val(response[0].CiudadGRI);
                $('#lbl_ciudadfin').val(response[0].CiudadGRF);
                $('#lbl_razon').val(response[0].Comercial);
                $('#lbl_entrega').val(response[0].Entrega);
                $('#TxtPlaca').val(response[0].Placa_Vehiculo);
                $('#TxtPedido').val(response[0].Pedido);
                $('#TxtZona').val(response[0].Zona);
                $('#TxtLugarEntrega').val(response[0].Lugar_Entrega);

                $('#DCCiudadI').append($('<option>',{value: response[0].CiudadGRI, text: response[0].CiudadGRI,selected: true }));
                $('#DCCiudadF').append($('<option>',{value: response[0].CiudadGRF, text: response[0].CiudadGRF,selected: true }));
                 
                $('#DCRazonSocial').append($('<option>',{value: response[0].CIRUC_Comercial, text:response[0].Comercial,selected: true }));
                $('#DCEmpresaEntrega').append($('<option>',{value: response[0].CIRUC_Entrega, text:response[0].Entrega,selected: true }));
                
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

            // datos de factur
            if(response[0]['id_fac_interna']!='' && response[0]['id_fac_interna']!=null)
            {
            	$('#btn_ver_factura').css('display','initial');
            	$('#id_factura').val(response[0]['id_fac_interna']);
            	if(response[0]['estado_factura']=='A')
            	{
            		$('#pane_factura').css('display','flex');
            		$('#v-pills-profile-tab').css('display','none')
            	}
           }else
           {           	
            	$('#estado_fac').text('Factura de terceros');            	
            	$('#estado_fac').addClass('text-warning');
           }

            	$('#lbl_fecha_fac').text(response[0].Fecha.substring(0,10));
	            $('#lbl_serie_fac').text(response[0].Serie);
	            $('#lbl_numero_fac').text(generar_ceros(response[0].Factura,9));
	            $('#lbl_autorizacion_fac').text(response[0].AutorizacionGR_F);
            

            if(response[0]['estado_factura']=='A')
            {
            	$('#estado_fac').text('Autorizado');            	
            	$('#estado_fac').addClass('text-success');
            	$('#btn_cargar_datos_fac_guia').css('display','initial');
            }

	            
            // $('#LblGuiaR').val(response);     
        	}
    	}
      });
}

function cargar_datos_fac()
{
	$('#fecha_fac').val($('#lbl_fecha_fac').text());
	serie = $('#lbl_serie_fac').text()
	serie = serie.split('-');
	$('#estab').val(serie[0]);
	$('#punto').val(serie[1]);
	$('#numero_fac').val($('#lbl_numero_fac').text());
	$('#auto_fac').val($('#lbl_autorizacion_fac').text());
}
function ver_factura()
{
	location.href = "detalle_factura.php?id="+$('#id_factura').val();
}

function cargar_lineas_guia(id)
{
	$.ajax({
	    data:  {id,id},
	    url:   '../controlador/guia_remisionC.php?lineas_guia_remision=true',      
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
	    url:   '../controlador/guia_remisionC.php?eliminar_linea=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	if(response==1)
	    	{
	    		cargar_lineas_guia(id);
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

function eliminar_guia(id)
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
	    url:   '../controlador/guia_remisionC.php?eliminar_guia=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	if(response==1)
	    	{
	    		
                location.href='lista_guia.php';
	    	}
	    }
	  });
}

function anular_guia(id)
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
	    url:   '../controlador/guia_remisionC.php?anular_guia=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	if(response==1)
	    	{	    		
                location.href='lista_guia.php';
	    	}
	    }
	  });
}


function DCCiudadI() {
    $('#DCCiudadI').select2({
        placeholder: 'Seleccione la ciudad',
        ajax: {
            url: '../controlador/facturar.php?DCCiudadI=true',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

function DCCiudadF() {
    $('#DCCiudadF').select2({
        placeholder: 'Seleccione la ciudad',
        ajax: {
            url: '../controlador/facturar.php?DCCiudadF=true',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

function AdoPersonas() {
    $('#DCRazonSocial').select2({
        placeholder: 'Seleccione un Grupo',
        ajax: {
            url: '../controlador/facturar.php?DCRazonSocial=true',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}

function DCEmpresaEntrega() {
    $('#DCEmpresaEntrega').select2({
        placeholder: 'Seleccione la Empresa',
        ajax: {
            url: '../controlador/facturar.php?DCEmpresaEntrega=true',
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });
}
function generar_guia()
{
	fecha = $('#fecha_fac').val();
	fac = $('#numero_fac').val();
	estab = $('#estab').val();
	punto = $('#punto').val();
	auto_fac = $('#auto_fac').val();
	guia = $('#txt_guia').val();
	if(fecha=='' || fac=='' || estab=='' || punto=='' || auto_fac=='')
	{
		Swal.fire('','Llene todo los campos', 'info');   
		return false;
	}

    $('#modal_auto').modal('hide');    
    $('#alertas').modal('show');    
    $('#tipo_alerta').text('Autorizando Guia de remision');
    
	var parametros = 
	{
		'fecha':fecha,
		'factura':fac,
		'estab':estab,
		'punto':punto,
		'auto_fac':auto_fac,
		'guia':guia,
		'fecha_guia':$('#MBoxFechaGRE').val(),
		'fecha_inicio':$('#MBoxFechaGRI').val(),
		'fecha_fin':$('#MBoxFechaGRF').val(),
	}
	 $.ajax({
	    data:  {parametros,parametros},
	    url:   '../controlador/guia_remisionC.php?generar_guia=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	$('#alertas').modal('hide');
          // console.log(response);
          // limpiar_cliente();
          if(response==2){
            Swal.fire('','XML devuelto', 'error').then(function(){
              location.reload();
            });  
          }else if(response==3)
          {                
            Swal.fire('','Este documento electronico ya esta autorizado', 'info');                    
          }else if(response==1)
          {           
            Swal.fire('','Guia de remision autorizada', 'success').then(function(){
              location.reload();
            });  
          }else if(response==4)
          {
            Swal.fire('','Guia de remision Generada', 'success').then(function(){
              location.reload();
            }); 
          }else{
            Swal.fire('','Conexion con SRI inestable','info')
          }
	    }
	  });
}

function MBoxFechaGRE_LostFocus()
{
	$('#MBoxFechaGRI').val($('#MBoxFechaGRE').val());
	$('#MBoxFechaGRF').val($('#MBoxFechaGRE').val());
	Swal.fire('','Aseurese de que las fechas de incio y fin de traslado esten bien','info');
}


function generar_guia_fac()
{	
     $('#modal_auto').modal('hide');    
    $('#alertas').modal('show');    
    $('#tipo_alerta').text('Autorizando Guia de remision');
   

    guia = $('#txt_guia').val();
	pago = $('#DCTipoPago').val();
    serie = $('#DCSerieFac').val();
	var parametros = 
	{
		'guia':guia,
		'pago':pago,
        'serie':serie,
	}
	 $.ajax({
	    data:  {parametros,parametros},
	    url:   '../controlador/guia_remisionC.php?generar_guia_fac=true',      
	    type:  'post',
	    dataType: 'json',
	    success:  function (response) { 
	    	$('#alertas').modal('hide');

	    	if(response.factura==1 && response.guia==1)
	    	{
	    		Swal.fire('','Guia de remision y Factura autorizados', 'success').then(function(){
	              location.reload();
	            });  

	    	}else if(response.factura==2 && response.guia==1)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-check text-success"></i> Guia de remision Autorizado</td></tr>'+
					'<tr><td><i class="fa fa-close text-danger"></i> Factura devuelta </td></tr>'+
				 '</table>', 'success');

	    	}else if(response.factura==1 && response.guia==2)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-check text-danger"></i> Guia de remision Autorizado</td></tr>'+
					'<tr><td><i class="fa fa-close text-success"></i> Factura devuelta </td></tr>'+
				 '</table>', 'info')

	    	}else if(response.factura==2 && response.guia==2)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-close text-danger"></i> Guia de remision devuelta</td></tr>'+
					'<tr><td><i class="fa fa-close text-danger"></i> Factura devuelta </td></tr>'+
				 '</table>', 'error')

	    	}else if(response.factura==3 && response.guia==1)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-check text-success"></i> Guia de remision Autorizado</td></tr>'+
					'<tr><td><i class="fa fa-check-double text-success"></i> Factura ya Autorizada </td></tr>'+
				 '</table>', 'info')

	    	}else if(response.factura==3 && response.guia==2)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-close text-danger"></i> Guia de remision Autorizado</td></tr>'+
					'<tr><td><i class="fa fa-check-double text-success"></i> Factura ya autorizada </td></tr>'+
				 '</table>', 'info')

	    	}else if(response.factura==1 && response.guia==3)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-check-double text-success"></i> Guia de remision ya Autorizado</td></tr>'+
					'<tr><td><i class="fa fa-check text-success"></i> Factura Autorizada </td></tr>'+
				 '</table>', 'info')

	    	}else if(response.factura==2 && response.guia==3)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-check-double text-success"></i> Guia de remision ya Autorizado</td></tr>'+
					'<tr><td><i class="fa fa-close text-danger"></i> Factura devuelta </td></tr>'+
				 '</table>', 'info')

	    	}else if(response.factura==3 && response.guia==3)
	    	{
	    		Swal.fire('','<table class="col-12">'+
					'<tr><td><i class="fa fa-check-double text-danger"></i> Guia de remision ya Autorizado</td></tr>'+
					'<tr><td><i class="fa fa-check-double text-danger"></i> Factura ya autorizada </td></tr>'+
				 '</table>', 'info')

	    	}else{
            	Swal.fire('','Conexion con SRI inestable','info')
          	}



/*
          // console.log(response);
          // limpiar_cliente();
          if(response==2){
            Swal.fire('','XML devuelto', 'error').then(function(){
              location.reload();
            });  
          }else if(response==3)
          {                
            Swal.fire('','Este documento electronico ya esta autorizado', 'info');                    
          }else if(response==1)
          {           
            Swal.fire('','Guia de remision autorizada', 'success').then(function(){
              location.reload();
            });  
          }else if(response==4)
          {
            Swal.fire('','Guia de remision Generada', 'success').then(function(){
              location.reload();
            }); 
          }else{
            Swal.fire('','Conexion con SRI inestable','info')
          }*/
	    }
	  });
}
function DCTipoPago() {
    var opcion = '<option value="">Seleccione tipo de pago</option>';
    $.ajax({
      //data:  {parametros:parametros},
      url:   '../controlador/lista_facturaC.php?DCTipoPago=true',
      type:  'post',
      dataType: 'json',
        success:  function (response) {
            //console.log(response);
            $.each(response,function(i,item){
                opcion+='<option value="'+item.Codigo+'">'+item.CTipoPago+'</option>';
            })
            $('#DCTipoPago').html(opcion);
          $('#DCTipoPago').val("01");
                    // console.log(response);
      }
    }); 
}

      
function lista_series_FA(tipo,campo)
{
    actual = $('#'+campo).text();
    console.log(actual);
    var parametros = 
    {
        'tipo':tipo,
    }
    $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/funcionesSistema.php?lista_series=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            // console.log(response)
            var option = '';
            response.forEach(function(item,i){
                if(item.Serie!=actual)
                {
                    option+='<option value="'+item.Serie+'">'+item.Serie+'</option>';
                }
            
            })
            // console.log(option)
            $('#DCSerieFac').html(option);
            console.log(response);           
        }
      });

}