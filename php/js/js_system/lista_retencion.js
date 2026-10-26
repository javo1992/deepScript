$(document).ready(function () { 

    porbienes();
    porservicios();
    porconcepto();

    $( "#txt_ci" ).autocomplete({
      source: function( request, response ) {
                
            $.ajax({
                url: '../controlador/clienteC.php?buscar_all_x_ci=true',
                type: 'post',
                dataType: "json",
                data: {
                    q: request.term
                },
                success: function( data ) {
                  // console.log(data);
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            $('#txt_ci').val(ui.item.label); // display the selected text
            $('#txt_nombre').val(ui.item.nombre); // save selected id to input
            $('#txt_email').val(ui.item.email); // save selected id to input
            $('#txt_telefono').val(ui.item.telefono); // save selected id to input
            $('#txt_razon').val(ui.item.razon); // save selected id to input
            $('#txt_direccion').val(ui.item.direccion); // save selected id to input
            $('#txt_id').val(ui.item.value); // save selected id to input
            $('#txt_idCli').val(ui.item.value);
            return false;
        },
        focus: function(event, ui){
            $( "#txt_ci" ).val( ui.item.label);
            return false;
        },
    });

    $( "#txt_nombre" ).autocomplete({
      source: function( request, response ) {
                
            $.ajax({
                url: '../controlador/clienteC.php?buscar_all_x_nombre=true',
                type: 'post',
                dataType: "json",
                data: {
                    q: request.term
                },
                success: function( data ) {
                  // console.log(data);
                    response( data );
                }
            });
        },
        select: function (event, ui) {
            $('#txt_ci').val(ui.item.ci); // display the selected text
            $('#txt_nombre').val(ui.item.label); // save selected id to input
            $('#txt_email').val(ui.item.email); // save selected id to input
            $('#txt_telefono').val(ui.item.telefono); // save selected id to input
            $('#txt_razon').val(ui.item.razon); // save selected id to input
            $('#txt_direccion').val(ui.item.direccion); // save selected id to input
            $('#txt_id').val(ui.item.value); // save selected id to input
            $('#txt_idCli').val(ui.item.value);
            return false;
        },
        focus: function(event, ui){
            $( "#txt_nombre" ).val( ui.item.label);
            return false;
        },
    });


});

function modal_email()
  {
    $('#myModal_email').modal('show');
    $('#emails-input').html('<div class="emails emails-input"><span role="email-chip" class="email-chip"><span>'+$('#lbl_email').val()+'</span><a href="#" class="remove">×</a></span><input type="text" role="emails-input" placeholder="añadir email ...">       </div>')
    $('#txt_to').val($('#lbl_email').val()+',');
    $('#txt_fac_ema').val($('#txt_idRET').val());
  
  }


  function enviar_email()
  {
    $('#myModal_espera').modal('show');

    var to = $('#emails-input').val();
    var cuerpo = $('#txt_texto').val();
    var pdf_fac = $('#cbx_factura').prop('checked');
    var adjunto =  new FormData(document.getElementById("form_img"));

    console.log(to);
    parametros = 
    {
        'to':to,
        'cuerpo':cuerpo,
        'pdf_fac':pdf_fac,
        'adjunto':adjunto,
    }
     $.ajax({
        data: adjunto,
        url:   '../controlador/lista_retencionC.php?enviar_email_detalle=true',
        contentType: false,
        processData: false,
        dataType:'json',      
        type:  'post',
        // dataType: 'json',
        success:  function (response) { 
            if(response==1)
            {
                Swal.fire('Email enviado','','success').then(function(){
                    $('#myModal_email').modal('hide');
                })
            }else
            {
                Swal.fire('Email no enviado','Revise que sea un correo valido','info');
            }
         
        }
      });

  }

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
            $('#txt_NoRet').text(response.numero);
            $('#txt_autorizacionRET').text(response.autorizacion);
            // $('#btn_guardar_serie').css('display','initial');
            // $('#btn_recargar').css('display','initial');

            console.log(response);         
        }
      });

}

function cargar_retenciones()
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
        url:   '../controlador/lista_retencionC.php?lista_retencion=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#lista_retenciones').html(response);          
        }
      });

}

function cargar_detalle(id,estado)
{
    location.href="retenciones.php?id="+id+"&estado="+estado;
}

function cargar_cliente(id)
{
    var parametros = 
    {
        'id':id,
    }
    $.ajax({
      type: "POST",
      url: '../controlador/clienteC.php?buscar_proveedor=true',
      data: {parametros:parametros}, 
      dataType:'json',
      success: function(data)
      {
        $('#txt_idCli').text(data[0].id);
        $('#lbl_proveedor').text(data[0].nombre);
        $('#lbl_ci_ruc').text(data[0].ci_ruc);
        $('#lbl_telefono').val(data[0].telefono);
        $('#lbl_email').val(data[0].mail);
        // $('#txt_id').val(data);
        console.log(data);
        $('#myModal_cliente').modal('hide');
      }
    })
}

function porbienes()
{
    $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?porbienes=true',
      // data: datos, 
      dataType:'json',
      success: function(data)
      {
        data.forEach(function(item,i){
            $('#ddl_porbienes').append('<option value="' + item.porcentaje +'">' + item.detalle + '</option>');
        })        
      }
    })
}

function porservicios()
{
    $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?porservicios=true',
      // data: datos, 
      dataType:'json',
      success: function(data)
      {
        data.forEach(function(item,i){
            $('#ddl_porservicios').append('<option value="' + item.porcentaje +'">' + item.detalle + '</option>');
        })        
      }
    })
}

function porconcepto()
{
    datos = {
        'fecha':$('#MBFechaEmi').val(),
    }
    $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?porconcepto=true',
      data: {parametros:datos}, 
      dataType:'json',
      success: function(data)
      {
        data.forEach(function(item,i){
            $('#ddl_porconcepto').append('<option value="' + item.Porcentaje +'">' + item.Codigo +' - '+item.Concepto+'</option>');
        })        
      }
    })
}

function bienes()
{
    // console.log($('#rbl_bienes').prop('checked'));
    if($('#rbl_servicios').prop('checked')==false)
    {        
       var valor = $('#txt_Valor_iva').val();
       $('#txtbaseimpobienes').val(valor);
    }else
    {
        var base_s = $('#txtbaseimposervicios').val();
        var valor = $('#txt_Valor_iva').val();
        var tots = parseFloat(valor)-parseFloat(base_s);
        $('#txtbaseimpobienes').val(tots.toFixed(2));
    }

    if($('#rbl_bienes').prop('checked'))
    {
        $('#panel_bienes').css('display','block');
    }else
    {
        $('#panel_bienes').css('display','none');
         $('#txtbaseimpobienes').val('0.00'); 
         $('#txtvalorRetBie').val('0.00');        
        $('#ddl_porbienes').val('');     
       servicios();
       calcular_servicios();
    }
}
function servicios()
{
    // console.log($('#rbl_servicios').prop('checked'));
    if($('#rbl_bienes').prop('checked')==false)
    {
         var valor = $('#txt_Valor_iva').val();
         $('#txtbaseimposervicios').val(valor);
    }else
    {
        var base_b = $('#txtbaseimpobienes').val();
        var valor = $('#txt_Valor_iva').val();
        var tots = parseFloat(valor)-parseFloat(base_b);
        $('#txtbaseimposervicios').val(tots.toFixed(2));
    }
    if($('#rbl_servicios').prop('checked'))
    {
        var valor = $('#txt_Valor_iva').val();
        $('#panel_servicios').css('display','block');
    }else
    {
        $('#panel_servicios').css('display','none');   
        $('#txtbaseimposervicios').val('0.00');       
        $('#txtvalorRetSer').val('0.00');        
        $('#ddl_porservicios').val('');     
        bienes();
        calcular_bienes();
    }
}

function cargar_valor()
{
    var valor_iva = $('#TxtBaseImpoGrav').val();
    var iva = $('#ddl_tipo_iva').val();
    var total_iva = (valor_iva * (iva/100))
    $('#txt_Valor_iva').val(total_iva.toFixed(2));
}

function validar_valor_bienes()
{
    var iva = $('#txt_Valor_iva').val();
    var base_b = $('#txtbaseimpobienes').val();
    var base_s = $('#txtbaseimposervicios').val();
    var tot = parseFloat(base_b)+parseFloat(base_s);

    console.log(iva+'-'+base_b)
    if(base_b=='')
    {
        $('#txtbaseimpobienes').val(0);
    }
    if(tot> parseFloat(iva))
    {
         var sug = iva-base_s;
        Swal.fire('Valores incorrecto','El valor no debe superior al valor iva (valor a ingresar:'+sug.toFixed(2)+')','info').then(function(){
            $('#txtbaseimpobienes').select();
        });
    }
    var ddl = $('#ddl_porbienes').val();
    if(ddl!='')
    {
        calcular_bienes();
    }

}
function validar_valor_servicios()
{
    var iva = $('#txt_Valor_iva').val();
    var base_b = $('#txtbaseimpobienes').val();
    var base_s = $('#txtbaseimposervicios').val();
    var tot = parseFloat(base_b)+parseFloat(base_s);
    if(base_s=='')
    {
        $('#txtbaseimposervicios').val(0);
    }
    if(tot>parseFloat(iva))
    {
        var sug = iva-base_b;
        Swal.fire('Valores incorrecto','El valor no debe superior al valor iva (valor a ingresar:'+sug.toFixed(2)+')','info').then(function(){
            $('#txtbaseimposervicios').select();
        });
    }
     var ddl = $('#ddl_porservicios').val();
    if(ddl!='')
    {
        calcular_bienes();
    }

}

function calcular_bienes()
{
    var iva = $('#txt_Valor_iva').val();
    var base_b = $('#txtbaseimpobienes').val();
    var base_s = $('#txtbaseimposervicios').val();
   
    var porcentaje = $('#ddl_porbienes').val();
    var valor = (base_b *(porcentaje/100));
    $('#txtvalorRetBie').val(valor.toFixed(2));
}

function calcular_servicios()
{
    var base = $('#txtbaseimposervicios').val();
    var porcentaje = $('#ddl_porservicios').val();
    var valor = (base *(porcentaje/100));
    $('#txtvalorRetSer').val(valor.toFixed(2));
}

function autocompletar_serie_num(id)
{
  var v = $('#'+id).val();
  if($('#'+id).val()<=0 || $('#'+id).val()=="")
  {
     $('#'+id).val("001");
  }else
  {
     while(v.length < 3 )
    {
      v = '0'+v;
    }
    $('#'+id).val(v);
  }
}

function solo_3_numeros(id)
{  
  var v = $('#'+id).val();
  if(v.length >3)
  {
   val  = v.substr(0,3);
    $('#'+id).val(val);
  }else{
    $('#'+id).val(v);
  }
}

function agregar_impuesto()
{
    base_iva = $('#txt_Valor_iva').val();
    impuesto_s = $('#txtvalorRetSer').val(); 

    if( parseFloat(base_iva)==0)
    {
        Swal.fire('No se puede agregar','Valor de iva es 0','info');
        return false;
    }
    if($('#rbl_bienes').prop('checked'))
    {
        impuesto_b = $('#txtbaseimpobienes').val();
        if(parseFloat(impuesto_b)==0)
        {
            var iva = $('#txt_Valor_iva').val();
            var base_b = $('#txtbaseimpobienes').val();
            var base_s = $('#txtbaseimposervicios').val();   
            var sug = iva-base_s;

            Swal.fire('','base imponible bienes no puede ser cero (0) (valor suguerido:'+sug.toFixed(2)+')','info').then(function(){
                $('#txtbaseimpobienes').select();
                return false;
            });
        }
        por_ret_bie = $('#ddl_porbienes').val();
        if(por_ret_bie=='')
        {
            Swal.fire('','Seleccione Porcentaje de retencion bienes','info').then(function(){
                 $('#ddl_porbienes').select();
                 return false;
            });
        }
    }
    if($('#rbl_servicios').prop('checked'))
    {
        impuesto_s = $('#txtbaseimposervicios').val();
        if(parseFloat(impuesto_s)==0)
        {
            var iva = $('#txt_Valor_iva').val();
            var base_b = $('#txtbaseimpobienes').val();
            var base_s = $('#txtbaseimposervicios').val();   
            var sug = iva-base_b;

            Swal.fire('','base imponible servicios no puede ser cero (0) (valor sugerido:'+sug.toFixed(2)+')','info').then(function(){
                $('#txtbaseimposervicios').select();
                return false;
            });
        }
        por_ret_ser = $('#ddl_porservicios').val();
        if(por_ret_ser=='')
        {
            Swal.fire('','Seleccione Porcentaje de retencion servicios','info').then(function(){
                 $('#ddl_porservicios').select();
                 return false;
            });
        }

    }


    var datos = $('#form_bienes_servicios').serialize();
    detalle_bienes = $('#ddl_porbienes option:selected').text();
    detalle_servicios = $('#ddl_porservicios option:selected').text(); 
    serie = $('#txt_serie').text();
    numRet = $('#txt_NoRet').text();
    AutoRET = $('#txt_autorizacionRET').text();    
    AutoRET = $('#txt_autorizacionRET').text();
    datos = datos+'&detalle_bienes='+detalle_bienes+'&detalle_servicios='+detalle_servicios+'&serie='+serie+'&NoRet='+numRet+'&AutoRET='+AutoRET;
    console.log(datos);   
    $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?impuesto_bienes_servicios=true',
      data: datos, 
      dataType:'json',
      success: function(data)
      {
        Swal.fire('Impuesto ingresado','','success');
        console.log(data);
        if(data.IDRET!='')
        {
            $('#txt_idRET').val(data.IDRET);
            $('#txt_NoRet').text(data.NoRET);
            location.href='retenciones.php?id='+data.IDRET;              
        }        
        lineas_impuestos();
      }
    })
}


function agregar_impuesto2()
{
    calcular_porcentaje();
    var concepto =  $('#ddl_porconcepto').val();
    if(concepto=='')
    {
        Swal.fire('Seleccione concepto de retencion','','info')
        return false;
    }
    var datos = $('#form_bienes_servicios').serialize();
    detalle_bienes = $('#ddl_porbienes option:selected').text();
    detalle_servicios = $('#ddl_porservicios option:selected').text(); 
    detalle_concepto = $('#ddl_porconcepto option:selected').text(); 
    serie = $('#txt_serie').text();
    numRet = $('#txt_NoRet').text();
    AutoRET = $('#txt_autorizacionRET').text();
    valcon = $('#TxtValConA').val();
    base = $('#txt_base_ret').val();
    datos = datos+'&detalle_bienes='+detalle_bienes+'&detalle_servicios='+detalle_servicios+'&serie='+serie+'&NoRet='+numRet+'&AutoRET='+AutoRET+'&concepto='+detalle_concepto;
    console.log(datos);   

    $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?agregar_impuesto2=true',
      data: datos, 
      dataType:'json',
      success: function(data)
      {
        if(data.IDRET!='')
        {
            Swal.fire('Impuesto agregado','','success')
            $('#txt_idRET').val(data.IDRET);
            $('#txt_NoRet').text(data.NoRET);    

            location.href='retenciones.php?id='+data.IDRET;          
        }
        lineas_impuestos();
      }
    })
}




function detalle_retencion(id=false)
{
    if(id){  id = id; }else  { id=$('#txt_idRET').val(); }
    parametros = 
    {
        'id':id,
    }

     $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?detalle_retencion=true',
      data: {parametros:parametros}, 
      dataType:'json',
      success: function(data)
      {
        console.log(data);
        $('#txt_NoRet').text(data[0].numero);
        $('#txt_idRET').text(data[0].id_retenciones); 
        // serie = data[0]['serie'].substr(0,3)+'-'+data[0]['serie'].substr(3,6);  
                           
        $('#txt_serie').text(data[0]['serie']);
        $('#lbl_proveedor').text(data[0].nombre);
        $('#lbl_ci_ruc').text(data[0].ci_ruc);
        $('#lbl_telefono').val(data[0].telefono);
        $('#lbl_email').val(data[0].mail);
        $('#txt_fecha').val(data[0].fechaEmision)        
        $('#txt_idCli').val(data[0].id_cliente)
        $('#txt_autorizacionRET').text(data[0].autorizacion)

        //datos documento de retencion

        $('#TxtNumSerieUno').val(data[0].EstablecimientoFac);
        $('#TxtNumSerieDos').val(data[0].puntoventa_Fac);
        $('#TxtNumSerietres').val(data[0].numeroFac);
        $('#TxtNumAutor').val(data[0].autorizacionFac);
        $('#MBFechaEmi').val(data[0].emisionFac);
        $('#MBFechaRegis').val(data[0].registroFac);
        $('#MBFechaCad').val(data[0].VencimientoFac);
        $('#TxtBaseImpoNoObjIVA').val(data[0].No_IVA);
        $('#TxtBaseImpo').val(data[0].tarifa0);
        $('#TxtBaseImpoGrav').val(data[0].tarifa12);
        $('#TxtBaseImpoIce').val(data[0].valor_ICE);

        if(data[0].estadoRet=='A')
            {
                 $('#txt_estado').text('Factura Autorizada');
                 $('#txt_estado').css('background','greenyellow');
                 $('#form_add_producto').css('display','none');
                 $('#btn_autorizar').css('display','none');
                  $('#btn_anular').css('display','initial');

            }else if(data[0].estadoRet=='R')
            {
                 $('#txt_estado').text('Factura rechazada');
                  $('#txt_estado').css('background','coral');
                  $('#txt_estado').css('color','white');
                  $('#btn_sri_error').css('display','initial');
            }else if(data[0].estadoRet=='AN'){

                 $('#btn_autorizar').css('display','none');
                 $('#form_add_producto').css('display','none');
                 $('#lbl_anulado').css('display','initial');
            }else
            {
                 $('#txt_estado').text('Factura pendiente');
            }
        cargar_valor();
        calcular_valor_impo_ret();
        calcular_porcentaje();

      }
    })
}


function lineas_impuestos(id=false)
{
    if(id){  id = id; }else  { id=$('#txt_idRET').val(); }
    var estadoret = $('#txt_estado').val();

    // console.log(estadoret)

    parametros = 
    {
        'id':id,
        'serie':$('#txt_serie').text(),
        'numero':$('#txt_NoRet').text(),
        'cliente':$('#txt_idCli').val(),
    }

     $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?lineas_impuestos=true',
      data: {parametros:parametros}, 
      dataType:'json',
      success: function(data)
      {
        tr = '';
        data.forEach(function(item,i){
            tr+='<tr>'+
            '<td>';
            if(estadoret!='A' && estadoret!='AN')
            {
                tr+='<button type="button" class="btn btn-sm btn-danger" onclick="eliminar_impuesto('+item.id_impuesto+')" ><i class="fa fa-trash"></i></button>';
            }
            tr+='</td>'+
            '<td>'+
            item.codigo_retencion+
            '</td>'+            
             '<td>'+
            item.detalle_impuesto+
            '</td>'+
            '<td>'+
            item.base_imponible+
            '</td>'+
             '<td>'+
             item.porcentajeRet+'%'+
            '</td>'+
            '<td>'+
             '$'+item.valorRetenido+
            '</td>'+
            '</tr>';
        })

        $('#tbl_datos').html(tr);
      }
    })
}

function eliminar_impuesto(id)
{
    parametros = 
    {
        'id':id,
    }

     $.ajax({
      type: "POST",
      url: '../controlador/lista_retencionC.php?eliminar_impuesto=true',
      data: {parametros:parametros}, 
      dataType:'json',
      success: function(data)
      {         
        lineas_impuestos();
      }
    })
}


function calcular_valor_impo_ret()
{
    no_iva = $('#TxtBaseImpoNoObjIVA').val();
    if(no_iva==''){no_iva = 0;}
    tarifa_0 = $('#TxtBaseImpo').val();
    if(tarifa_0==''){tarifa_0 = 0;}
    tarifa_12 = $('#TxtBaseImpoGrav').val();
    if(tarifa_12==''){tarifa_12 = 0;}

    var total = parseFloat(no_iva)+parseFloat(tarifa_12)+parseFloat(tarifa_0); 
    $('#txt_base_ret').val(total.toFixed(2));
}
function calcular_porcentaje()
{
    var porc = $('#ddl_porconcepto').val();
    if(porc=='')
    {
        porc =0;
    }
    $('#TxtPorRetConA').val(porc);

    tot = $('#txt_base_ret').val();

    valor_por = parseFloat((tot*porc)/100);
    $('#TxtValConA').val(valor_por.toFixed(2))
}


function autorizar(fac=false)
{
    $('#alertas').modal('show');
    $('#tipo_alerta').text('Autorizando retencion');
    if(fac)
    {
        var f = fac;
    }else
    {
        var f = $('#txt_idRET').val();
    } 
    var parametros = 
    {
        'ret':f,
        'fecha':$('#txt_fecha').val(),
        'pago':$('#DCTipoPago').val(),
    }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_retencionC.php?autorizarRET=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#alertas').modal('hide');
          console.log(response);
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
            Swal.fire('','Retencion  autorizada', 'success').then(function(){
              location.href = 'lista_retenciones.php'; 
            });  
            imprimir(factura);
            limpiar_mesa(mesa);
          }else if(response==4)
          {
            Swal.fire('','Retencion generada Generada', 'success').then(function(){
               location.href = 'lista_retenciones.php'; 
            }); 
            imprimir(factura);
            limpiar_mesa(mesa);
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

function pdf_retencion()
{
    var id= $('#txt_idRET').val();
    var pago = $('#DCTipoPago').val();
    var parametros = 
    {
        'empresa':empresa,
        'ret':id,
        'usu':usu,
        // 'pago':pago,
    }
     var url1= '../controlador/lista_retencionC.php?reporte_retencion=true&empresa='+empresa+'&ret='+id+'&usu='+usu+'&pago='+pago;
     window.open(url1,'_blank');
}

function eliminar_retencion(id)
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
        url:   '../controlador/lista_retencionC.php?eliminar_retencion=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            if(response==1)
            {
                location.href='lista_retenciones.php';
            }
        }
      });
}

function anular_retencion(id)
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
        url:   '../controlador/lista_retencionC.php?anular_retencion=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            if(response==1)
            {                
                location.href='lista_retenciones.php';
            }
        }
      });
}



