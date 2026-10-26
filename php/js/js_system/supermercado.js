$(document).ready(function () {
	  categorias();
  	formas_pago();
  	buscar_cliente();
  	buscar_producto();

    $('#ddl_cliente').on('select2:select', function (e) {
      var detalle = e.params.data.data;
      $('#txt_ci_ruc').val(detalle.ci_ruc);
      $('#txt_telefono').val(detalle.telefono);
      $('#txt_email').val(detalle.mail);
      $('#txt_id').val(detalle.id_cliente);
      $('#txt_direccion').val(detalle.direccion);
      // $('#').val(detalle.);
      console.log(detalle);


      $("#txt_id_cliente").val(detalle.id_cliente);
      $("#txt_ci_modal").val(detalle.ci_ruc);
      $("#txt_nombre_modal").val(detalle.nombre);
      $("#txt_telefono_modal").val(detalle.telefono);
      $("#txt_email_modal").val(detalle.mail);
      $("#txt_direccion_modal").val(detalle.direccion);
      $("#txt_razon_modal").val(detalle.Razon_Social);
      

    });
     $('#ddl_producto').on('select2:select', function (e) {
      var detalle = e.params.data.data;
      $('#txt_ref').val(detalle.referencia);
      $('#txt_stock').val(detalle.stock);
      $('#txt_pvp').val(parseFloat(detalle.precio_uni).toFixed(2));
      $('#txt_iva').val(detalle.iva);
      $('#txt_stock').select();

      console.log(detalle);
    });

	
});


function buscar_cliente()
  {
    $('#ddl_cliente').select2({
      // width: 'resolve',
      placeholder: 'Seleccione cliente',
      ajax: {
        url:   '../controlador/mesasC.php?buscar_cliente_select2=true',  
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

function numero_factura()
  {
      $.ajax({
      // data:  {parametros:parametros},
      url:  '../controlador/mesasC.php?numero_factura=true',      
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
        $('#num_fac').text(response);
        // $('#txt_nmesas').val(response.n_mesas);
      }
    });
  }

  function buscar_producto()
  {
    $('#ddl_producto').select2({
      // width: 'resolve',
      placeholder: 'Articulos',
      ajax: {
        url:   '../controlador/mesasC.php?buscar_articulos_select2=true',  
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


function validar_cantidad()
{
	var can =  $('#txt_cant').val();
	if(can==0 || can =='')
	{
		Swal.fire('Cantidad invalida','','error').then(function(){
			  $('#txt_cant').val('1');
			  $('#txt_cant').select();
		});
	}
}

function validar_pvp()
{
	var pvp =  $('#txt_pvp').val();
	var can =  $('#txt_cant').val();
	var iva =  $('#txt_iva').val();
	var iva_val = 0;
	if(pvp =='')
	{
		Swal.fire('Precio invalida','','error').then(function(){
			  $('#txt_pvp').val('0');
			  $('#txt_pvp').focus();
		});
	}

	var subtotal = parseFloat(pvp)* parseFloat(can);
	if(iva==1)
	{
	  iva_val = parseFloat(subtotal*( parseFloat(iva_porcentaje)/100)).toFixed(2);
	}
	var total = parseFloat(subtotal)+parseFloat(iva_val);


	// console.log(subtotal);
	// console.log(iva_val);
	// console.log(iva_porcentaje);
	// console.log(total);

	$('#txt_total').val(total.toFixed(2));
}



function generar_comanda()
{
  // var mesa = '';
  // for (var i = 1; i < 31; i++) {
  //  mesa+='<div class="col-lg-2 mb-3" onclick="modal_peido('+i+')"><div class="card bg-success text-white shadow"><div class="card-body">MESA '+i+'<div class="text-white-50 small">#1cc88a</div></div></div></div>'; 
  // }
  // $('#mesas').html(mesa);
  // console.log(mesa);

  $.ajax({
    // data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?generar_comanda=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
      $('#mesas').html(response.mesas);
      $('#txt_nmesas').val(response.n_mesas);
    }
  });

}

function formas_pago()
{
 
  $.ajax({
    // data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?formas_pago=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
      $('#formas_pago').html(response);
    }
  });

}


function modal_peido(id)
{
	// $('#pedido').modal('show');
	// $('#txt_mesa').text(id);
	categorias();
	cargar_mesa(id);

}

function categorias()
{

	$('#btn_regresar').css('display','none');
	var parametros = 
	{
		'query':$('#query_ca').val(),
	}
    $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?categorias=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
      $('#categorias').html(response);
    }
  });
}

function productos(id)
{
	$('#btn_regresar').css('display','block');
	var parametros = 
	{
		'query':$('#query_ca').val(),
		'cate':id,
	}
    $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?buscar_articulo=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
      $('#categorias').html(response);
    }
  });
}


function iniciar()
{
  $('#ddl_producto').select2('open');
}

function add_articulo()
{
	if($('#txt_cant').val()=='' || $('#txt_cant').val()==0)
	{
		Swal.fire('Cantidad invalida','','info');
		return false;
	}

  if($('#ddl_producto').val()=='')
  {
    Swal.fire('Seleccione un producto','','info');
    return false;
  }

	var id = 'PVS'+$('#txt_id_usuario').val();
	var parametros = 
	{
		'articulo':$('#ddl_producto').val(),
		'cantidad':$('#txt_cant').val(),
    'pvp':$('#txt_pvp').val(),
		'mesa': id,
    'llevar':$('input[name="rbl_llevar"]:checked').val(),
	}
	 $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?add_mesa_super=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
     if(response==1)
     {
     	 // $('#cantidad_modal').modal('hide');
         // adicionales($('#txt_id_art').val(),$('#txt_can').val());
     	 $('#txt_can').val('1');
     	 cargar_mesa(id);
     }
    }
  });
}

function adicionales(articulo,cantidad)
{
    var parametros = 
    {
      'idarticulo':articulo,
      'canti':cantidad,
    }
     $.ajax({
      data:  {parametros:parametros},
      url:  '../controlador/mesasC.php?cargar_adicionales=true',      
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
        if(response!=-1)
        {
          $('#modal_adicionales').modal('show');
          $('#view_adisionales').html(response);
        }
       
      }
    });
}

function cargar_mesa(id)
{
	var parametros = 
	{
		'mesa':id,
	}
	 $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?cargar_mesa_super=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
      $('#tbl_lineas').html(response.tbl);
      $("#txt_total_mesa").val(response.totales.total);
      $("#txt_subtotal").val(response.totales.subtotal); 
      // $("#txt_sin_iva").val(response.totales.);
      $("#total_iva").val(response.totales.iva);
      $("#txt_descuento").val(response.totales.descuento);
      // console.log(response.totales);
      // $('#totales').html(response.totales);
    }
  });

}
function eliminar_linea(linea,mesa)
{
	 $.ajax({
    data:  {linea:linea},
    url:  '../controlador/mesasC.php?eliminar_linea=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
       cargar_mesa(mesa);
    }
  });
}

function liberar_mesa()
{
	var mesa = $('#txt_mesa').text();
	 Swal.fire({
    title: 'Esta seguro de Liberar la mesa No '+mesa+'?',
    text: "Esta a punto de borrar todos los registro de la mesa "+mesa,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
    }).then((result) => {
        if (result.isConfirmed) {
          limpiar_mesa(mesa);
        }
    })
}

function limpiar_mesa(mesa)
{
	 $.ajax({
    data:  {mesa:mesa},
    url:  '../controlador/mesasC.php?limpiar_mesa=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
    }
  });

}
function cambiar_mesa_btn()
{
	var mesa = $('#txt_mesa').val();
	var n_mesas =  $('#txt_nmesas').val();
	var parametros = 
	{
		'mesa':mesa,
	}
	 $.ajax({
    // data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?mesas_dispo=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
    	$('#ddl_mesas_disponibles').html(response);
    	$('#cambiar_modal').modal('show');
    }
  });

}

function cambiar_mesa()
{
	var mesa = $('#txt_mesa').text();
	var mesa_cambio =  $('#ddl_mesas_disponibles').val();
	var parametros = 
	{
		'mesa':mesa,
		'cambio':mesa_cambio,
	}
	 $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?cambiar_mesa=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
    	generar_mesas();
    	 $('#txt_mesa').text(mesa_cambio);
       $('#cambiar_modal').modal('hide');
    }
  });
}
function facturar_mesa()
{  
  var mesa = 'PVS'+$('#txt_id_usuario').val();
  var cliente = $('#ddl_cliente').val();
  var to = $('#txt_total_mesa').val();
  if(to==0)
  {
    Swal.fire('No se puede Facturar','Ingrese productos a la factura','error');
    return false;
  }
   if(cliente=='')
  {
    Swal.fire('No se puede Facturar','Seleccione un cliente','error');
    return false;
  }
  borrar_pago('',mesa);
  $('#total').text(to);
  // $('#lbl_fac').text(mesa);
  $('#cliente_modal').modal('show');
  // $('#pedido').modal('hide');
}

function cancelar_fac()
{
  $('#cliente_modal').modal('hide');
  var mesa = 'PVS'+$('#txt_id_usuario').val();
  borrar_pago('',mesa);
  modal_peido(mesa);
}

function generar_facturar()
{
  if($('#txt_cambio').val()<0)
  {
    Swal.fire('Debe cancelar la totalidad de la factura','','info')
    return false;
  }
  if($('#txt_ci_modal').val()=='')
  {
    Swal.fire('Ingrese o seleccione un cliente','','info')
    return false;
  }
  var mesa = 'PVS'+$('#txt_id_usuario').val();

      $('#alertas').modal('show');
      $('#cliente_modal').modal('hide');
  var parametros = 
  {
    'mesa':mesa,
    'idc':$('#txt_id_cliente').val(),
    'ci':$('#txt_ci_modal').val(),
    'nom':$('#txt_nombre_modal').val(),
    'tel':$('#txt_telefono_modal').val(),
    'ema':$('#txt_email_modal').val(),
    'raz':$('#txt_razon_modal').val(),
    'dir':$('#txt_direccion_modal').val(),
    'des':$('#txt_descuento').val(),
    'iva':$('#total_iva').val(),
    'sub':$('#txt_subtotal').val(),
    'tot':$('#txt_total_mesa').val(),
  }
   $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?facturar_mesa=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) {      
        autorizar_facturar(response);
      
    }
  });

}

function agregar_pago()
{
  var mesa = 'PVS'+$('#txt_id_usuario').val();
  var t = $('#total').text();
  var val = $('#txt_valor').val();
  if($('#formas_pago').val()=='')
  {
    Swal.fire('Seleccione una forma de pago','','info');
    return false;
  }
  if($('#txt_valor').val()==0)
  {
    Swal.fire('Ingrese un valor mayor a 0','','info');
    return false;
  }
 
  var parametros = 
  {
    'mesa':mesa,
    'forma':$('#formas_pago').val(),
    'valor':$('#txt_valor').val(),
    'total':t,
    'cambio':$('#txt_cambio').val(),
  }
   $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?agregar_pago=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
     pagos_agregados();      
    }
  });
}

function borrar_pago(id,mesa)
{
  var parametros=
  {
    'id':id,
    'mesa':mesa,
  }
   $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?borrar_pago=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
      pagos_agregados()
    }
  });

}
function pagos_agregados()
{
  var mesa = 'PVS'+$('#txt_id_usuario').val();
  var parametros = 
  {
    'mesa':mesa,
  }
   $.ajax({
    data:  {parametros:parametros},
    url:  '../controlador/mesasC.php?pagos_agregados=true',      
    type:  'post',
    dataType: 'json',
    success:  function (response) { 
      var t = $('#total').text();
      var cam = response.total-t;
      $('#tbl_pagos').html(response.tr);
      $('#txt_cambio').val(cam.toFixed(2));
      
    }
  });

}


  function autorizar_facturar(factura)
    {
      // $('#tipo_alerta').text('Enviando a SRI...');
      // $('#img_alerta').attr('src','../img/file-transfer.gif');
      var mesa = 'PVS'+$('#txt_id_usuario').val();
      var parametros = 
    {
        'fac':factura,
    }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/facturar.php?facturar=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#alertas').modal('hide');
          // console.log(response);
          limpiar_cliente();
          if(response==2){
            Swal.fire('','XML devuelto', 'error');  
          }else if(response==3)
          {                
            Swal.fire('','Este documento electronico ya esta autorizado', 'info');                    
          }else if(response==1)
          {           
            Swal.fire('','Factura autorizada', 'success').then(function(){
              location.reload();
            });  
            imprimir(factura);
            limpiar_mesa(mesa);
          }else if(response==4)
          {
            Swal.fire('','Factura Generada', 'success').then(function(){
              location.reload();
            }); 
            imprimir(factura);
            limpiar_mesa(mesa);
          }else{
            Swal.fire('','Conexion con SRI inestable','info')
          }
        }
      });
      
    }

function imprimir_modal()
{
   lista_facturas();
  $('#imprimir_modal').modal('show');

}

function lista_facturas()
{
  var parametros = {
    'nombre':$('#txt_nom').val(),
    'numfac':$('#txt_numfac').val(),
  }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?lista_facturas=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#tbl_facturas').html(response);
          
        }
      });
  }

  function imprimir(id)
  {
    var url = '../controlador/mesasC.php?reimprimir=true&factura='+id;
    var html='<iframe style="width:100%; height:50vw;" src="'+url+'" frameborder="0" allowfullscreen id="ticket"></iframe>';
    $('#iframeticket').html(html);
    document.getElementById('ticket').contentWindow.print();
  }

  function pdf_factura(id)
  {

    var parametros = 
    {
        'empresa':empresa,
        'fac':id,
        'usu':usu,
    }
     var url1= '../controlador/facturar.php?reporte_factura=true&empresa='+empresa+'&fac='+id+'&usu='+usu;
     window.open(url1,'_blank');
   
     // $.ajax({
     //    data:  {parametros:parametros},
     //    url:   url1,      
     //    type:  'post',
     //    dataType: 'json',
     //    success:  function (response) { 
     //      // console.log(url_temp+'/'+response);
     //      //  window.open( url_temp+'/'+response,'_blank'); 
     //       openBrowser(url_temp+'/'+response)
     //    }
     //  });
  }

function validar_ci(campo)
{
  var ci = $('#'+campo).val();
  if(ci=='')
  {
    limpiar_cliente();
  }

}
function validar_nombre()
{
  var nombre = $('#txt_nombre').val();
  $('#txt_razon').val(nombre);

}
function validar_nombre_n(campo1,campo2)
{
  var nombre = $('#'+campo1).val();
  $('#'+campo2).val(nombre);

}

function limpiar_cliente()
{
  $('#txt_id_cliente').val('');
  $('#txt_ci').val('');
  $('#txt_nombre').val('');
  $('#txt_telefono').val('');
  $('#txt_email').val('');
  $('#txt_razon').val('');
  $('#txt_direccion').val('');
}

function teclado(numero)
{
  var num  =$('#txt_can').val();

  $('#txt_can').val(num+numero);
  $('#txt_can').focus();
 
}
function borrar_cantidad()
{
   $('#txt_can').focus();
  var num  =$('#txt_can').val();
  var nuevo = num.slice(0,-1);
  $('#txt_can').val(nuevo);
}

function servir(id)
{
  $('#icono'+id).removeClass('fa-comments');
  $('#linea'+id).css('background-color','wheat');
  var parametros = {
    'id':id,
  }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?servir_producto=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#tbl_facturas').html(response);
          
        }
      });
}

function procesar_manual()
{
  mesa = $('#txt_mesa').text();
  //volver a cargar mesa
  cargar_mesa(mesa);
  var parametros = {
    'mesa':mesa,
  }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?procesar_manual=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 

          cargar_mesa(mesa);
          
        }
      });
}

function envios()
{
  // mesa = $('#txt_mesa').text();
  // var parametros = {
  //   'mesa':mesa,
  // }
    $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?envios=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#tbl_envios').html(response);          
        }
      });
}

function envios_asignados()
{
  // mesa = $('#txt_mesa').text();
  // var parametros = {
  //   'mesa':mesa,
  // }
    $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?envios_asignados=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#tbl_envios_asig').html(response);          
        }
      });
}


function envios_entregados()
{
  // mesa = $('#txt_mesa').text();
  // var parametros = {
  //   'mesa':mesa,
  // }
    $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?envios_entregados=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#tbl_envios_entregados').html(response);          
        }
      });
}


function envios_ruta()
{
  // mesa = $('#txt_mesa').text();
  // var parametros = {
  //   'mesa':mesa,
  // }
    $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?envios_ruta=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#ddl_envios').html(response);          
        }
      });
}

function asignar(id)
{
  var parametros = 
  {
    'id':id,
    'moto':$('#ddl_moto'+id).val(),
  }
   $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?asignar_motorizado=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          // $('#ddl_envios').html(response);  
          Swal.fire('','Motorizado agregado','success')        
        }
      });
  }


function actualizar_pedidos(id)
{
  elimina();

  envios_ruta();
  location.reload();
  // onLocationFound();
  // onLocationFound();
}

function revisar_monto_inicial()
{
   $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?revisar_caja_inicio=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==-1)
          {
           
            $('#config').modal('show');
          }       
        }
      });
}

function add_caja()
{
  var valor = $('#txt_caja_inicial').val();
  if(valor==0 || valor=='')
  {
    Swal.fire('Ingrese un monto valido','','error')
    return false;
  }
  var parametros = 
  {
    'valor':valor,
  }
   $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?add_caja=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {
            $('#config').modal('hide');
          }       
        }
      });
}

function validar_cierre()
{
   $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?valida_cierre=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
         if(response==1)
         {
            cerrar_caja();
         }else
         {
          Swal.fire('No se puede Cerrar caja','Asegurese de que todas las mesas esten Cerradas','info');
         }
        }
      });
}

 function cerrar_caja()
 {
    Swal.fire({
    title: 'Esta seguro de cerrar caja',
    text: "Una vez cerrada caja se eliminaran todas las transacciones realizadas en el dia ",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
    }).then((result) => {
        if (result.isConfirmed) {
          calcular_total();
        }
    })
 }

 function transacciones(tipo)
 {
   $('#txt_tipo_caja').val('A');
   if(tipo=='R')
   {
     $('#title_caja').text('Retiros de caja');
     $('#txt_tipo_caja').val('R');
   }
   $('#transacciones').modal('show');
 }

 function transaccion_caja()
 {
   var monto = $('#txt_caja_trans').val();   
   var detalle = $('#txt_detalle_caja').val();
   var tipo = $('#txt_tipo_caja').val();
   if(monto=='' || monto==0 || detalle=='')
   {
     Swal.fire('Asegurese de que el monto y el detalle esten llenos','','info');
     return false;
   }
   var parametros = 
   {
     'monto':monto,
     'detalle':detalle,
     'tipo':tipo,
   }

   $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?transacciones_caja=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {
            Swal.fire('transaccion realizada','','info').then(function(){ 
              $('#txt_caja_trans').val('0.00');   
              $('#txt_detalle_caja').val('');
              $('#transacciones').modal('hide');
            })
          }       
        }
      });
 }

 function calcular_total()
 {
   $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?total_caja=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
         
            $("#txt_total_dia_ini").val(response.inicio);
            $("#txt_total_dia").val(response.total_dia);
            $("#txt_total_dia_re").val(response.total_retiro);
            $("#txt_total_ing").val(response.total_ingreso);
            $('#cuentas').modal('show');   
        }
      });
 } 

 function cuadre_caja()
 {
   $('#txt_faltante').val('0.00');
   $('#txt_sobrante').val('0.00');
    var b20= $("#txt_20").val();
    var b10= $("#txt_10").val(); 
    var b5 = $("#txt_5").val(); 
    var b1 = $("#txt_1").val(); 
    var c50= $("#txt_50c").val(); 
    var c25= $("#txt_25c").val(); 
    var c10= $("#txt_10c").val();
    var c5 = $("#txt_5c").val();
    var c1 = $("#txt_1c").val();
    var ta = $("#txt_tarjeta").val();
    var total_dia = $("#txt_total_dia").val();
    var total = (b20*20)+(b10*10)+(b5*5)+(b1*1)+(c50*0.50)+(c25*0.25)+(c10*0.10)+(c5*0.05)+(c1*0.01)+(ta*1);

    total_dia = parseFloat(total_dia).toFixed(2);
    total = parseFloat(total).toFixed(2);

    total_dia = parseFloat(total_dia);
    total = parseFloat(total);
    


    if(total<total_dia)
    {
       var fal = total_dia-total;
       $('#txt_faltante').val(fal.toFixed(2));
       $('#txt_faltante').css('background','darksalmon');
       $('#txt_sobrante').css('background','#ced4da');
    }else if(total>total_dia)
    {
       var sob = total-total_dia;
       $('#txt_sobrante').val(sob.toFixed(2)); 
       $('#txt_sobrante').css('background','yellowgreen');
       $('#txt_faltante').css('background','gray');
    }else if(total==total_dia)
    {
      $('#txt_faltante').val('0.00');
      $('#txt_sobrante').val('0.00'); 
      $('#txt_sobrante').css('background','#ced4da');
      $('#txt_faltante').css('background','#ced4da');

    }

    $('#txt_total_caja').val(total);  
 }

 function cuadre_caja_save()
 {
   var dato = $('#form_cuadre_caja').serialize();
    $.ajax({
        data:  dato,
        url:   '../controlador/mesasC.php?cuadre_caja_save=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {
            Swal.fire('Caja Cerrada','','success').then(function(){
              location.href= 'home.php';
            });
          }
         
            // $("#txt_total_dia_ini").val(response.inicio);
            // $("#txt_total_dia").val(response.total_dia);
            // $("#txt_total_dia_re").val(response.total_retiro);
            // $("#txt_total_ing").val(response.total_ingreso);
            // $('#cuentas').modal('show');   
        }
      });
 }

 function ver_factura(id)
 {
    var url = '../controlador/mesasC.php?reimprimir=true&factura='+id;
    var html='<iframe style="width:100%; height:50vw;" src="'+url+'" frameborder="0" allowfullscreen id="ticket"></iframe>';
    $('#visor_factura').html(html);
    $('#envio_factura').modal('show');
 }

 function lista_check(idadd)
 {
   if($('#rbl_adi_'+idadd).prop('checked'))
   {
      $('#txt_adi_'+idadd).prop('readonly',false);
      $('#txt_adi_'+idadd).select();
      lis.push(idadd);
   }else
   {
    $('#txt_adi_'+idadd).prop('readonly',true);
    $('#txt_adi_'+idadd).val(0);
    var myIndex = lis.indexOf(idadd);
    if (myIndex !== -1) {
        lis.splice(myIndex, 1);
    }
   }

   console.log(lis);
 }


 function cantidad_selec()
 {
    var c = 0;
    lis.forEach(function(item,i){
       c = c+ parseInt( $('#txt_adi_'+item).val());
       // console.log(i);
    })
    $('#txt_total_adi').val(c);
 }

 function add_adicionales()
 {
   ca = $('#txt_canti_adi').val();
   tot = $('#txt_total_adi').val();
   canti = 0;
   if(ca>1)
   {
    if(ca!=tot)
    {
      Swal.fire('Cantidad incorrecta','','info');
      return false;
    }else
    {
       lis.forEach(function(item,i){
         c = $('#txt_adi_'+item).val();
         guardar_adi_pedido(item,c);
      })
       lis=[];
    }
     
   }else
   {
    select = $('input[name="rbl_adi"]:checked').val();
    console.log(select);
    guardar_adi_pedido(select,1);
   }
 }


 function guardar_adi_pedido(idp,canti=false)
 {
    var id =$('#txt_mesa').text();
    var parametros = 
    {
      'articulo':idp,
      'cantidad':canti,
      'mesa':id,
      'llevar':$('input[name="rbl_llevar"]:checked').val(),
    }
     $.ajax({
      data:  {parametros:parametros},
      url:  '../controlador/mesasC.php?add_adi_mesa=true',      
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
       if(response==1)
       {        
         cargar_mesa(id);
         $('#modal_adicionales').modal('hide');
       }
      }
    });
 }

  function guardar_cliente()
  {
   
     if($('#txt_ci_modal_n').val()=='' ||  $('#txt_nombre_modal_n').val()=='' ||  $('#txt_telefono_modal_n').val()=='' ||
     $('#txt_email_modal_n').val()=='' ||    $('#txt_razon_modal_n').val()=='' ||    $('#txt_direccion_modal_n').val()=='' )
     {
      Swal.fire('Llene todo los campos','','info')
      return false;
     }

      var datos = $('#form_new_cliente').serialize();
      $.ajax({
      data:  datos,
      url:  '../controlador/mesasC.php?add_new_cliente=true',      
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
       if(response==1)
       {
         Swal.fire('Cliente guardado','','success').then(function()
         {
           $('#new_cliente_modal').modal('hide');
         })
       }
      }
    });

  }
