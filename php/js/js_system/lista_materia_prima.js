$(document).ready(function () {
    autocmpletar_color();
    autocmpletar_marca();
    autocmpletar_genero();
    estado();
    sucursales();
// ----------------------------
 $("#subir_imagen").on('click', function() {
 	var f = $('#file_img').val();
 	if(f==''){Swal.fire('Carge una imagen','','info'); return false;}
        var formData = new FormData(document.getElementById("form_img"));
        var files = $('#file_img')[0].files[0];
        formData.append('file',files);
       // formData.append('curso',curso);
        $.ajax({
            url: '../controlador/lista_articulosC.php?cargar_imagen_materia=true',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType:'json',
         // beforeSend: function () {
         //        $("#foto_alumno").attr('src',"../../img/gif/proce.gif");
         //     },
            success: function(response) {
               if(response==-1)
               {
                 Swal.fire(
                  '',
                  'Algo extraño a pasado intente mas tarde.',
                  'error')

               }else if(response ==-2)
               {
                  Swal.fire(
                  '',
                  'Asegurese que el archivo subido sea una imagen.',
                  'error')
               }else
               {
                var id = $('#txt_id').val();
                if(id!='')
                {
                 detalle_articulo(id);
                }else
                {
                    location.href = 'detalle_materias.php?id='+response
                }
               } 
            }
        });
    });
    // --------------------------
});

function detalle_articulo(id)
{

     $.ajax({
        data:  {id:id},
        url:   '../controlador/lista_articulosC.php?detalle_articulo=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
        console.log(response); 
            $('#txt_id').val(response.id);
            $('#lbl_nombre').text(response.nombre);  
            $('#txt_description').val(response.nombre);
            $('#txt_asset').val(response.referencia);
            $('#txt_nom_img').val(response.referencia);
            $('#txt_rfid').val(response.RFID);
            $('#txt_tag_anti').val(response.codigo_aux);
            $('#txt_cant').val(response.stock);
            $('#txt_unidad').val(response.uni_medida);
            if(response.uni_medida=='kg')
            {
                $('#cbx_kg').prop('checked',true);
            }
            $('#txt_valor').val(parseFloat(response.precio).toFixed(2));
            $('#txt_modelo').val(response.modelo);
            $('#ddl_estado').val(response.idEs);
            $('#txt_fecha').val(response.fecha_creacion);
            $('#ddl_marca').append($('<option>',{value: response.idMa, text: response.marca,selected: true }));
            $('#ddl_color').append($('<option>',{value: response.idCo, text: response.color,selected: true }));
            $('#ddl_genero').append($('<option>',{value: response.idGe, text: response.genero,selected: true })); 
            $('#ddl_localizacion').append($('<option>',{value: response.idSu, text: response.sucursal,selected: true })); 
            if(response.inventario==1)
            {
                $('#opcp').prop('checked',true);
            }else
            {
                $('#opcs').prop('checked',true);
            }
            if(response.iva==1)
            {
                $('#opcsi').prop('checked',true);
            }else
            {
                $('#opcno').prop('checked',true);
            }
            $('#txt_tag_anti').val(response.codigo_aux);
            $('#txt_barras').val(response.codigo_bar);
            $('#txt_description2').val(response.des2);
            $('#txt_max').val(response.max);
            $('#txt_min').val(response.min);
            $('#txt_serie').val(response.serie_pro);
            $('#txt_peso').val(parseFloat(response.peso).toFixed(2));
            $('#txt_cant_paq').val(response.paquetes);
            $('#txt_cant_x_paq').val(response.xpaquetes);
            $('#txt_cant_sueltas').val(response.sueltos);
            titulos_unidades();


            if(response.foto!='' && response.foto!=null)
            {          
             $("#img_articulo").attr("src",response.foto+'?'+Math.random());
            }

        }
      });

}

function add_edit()
{
    if($('#txt_description').val()==''  || $('#txt_max').val()=='' ||$('#txt_min').val()=='' || $('#txt_cant').val()=='' || 
    	$('#txt_unidad').val()=='' || $('#txt_asset').val()=='' || $('#txt_valor').val()=='' ||  $('#ddl_color').val()=='' || $('#ddl_genero').val()=='' || 
    	$('#ddl_marca').val()=='' ||$('#ddl_estado').val()=='' || $('#ddl_localizacion').val()=='' || $('#txt_peso').val()=='')
    {

        Swal.fire('','llene todo los campos obligatorios','info');
        return false;
    }
    var parametros = {
    'id':$('#txt_id').val(),
    'nombre':$('#txt_description').val(),
    'referencia':$('#txt_asset').val(),
    'rfid':$('#txt_rfid').val(),
    'codAuxiliar':$('#txt_tag_anti').val(),
    'stock':$('#txt_cant').val(),
    'uni':$('#txt_unidad').val(),
    'precio':$('#txt_valor').val(),
    'peso':$('#txt_peso').val(),
    'modelo':$('#txt_modelo').val(),
    'estado':$('#ddl_estado').val(),
    'fechaC':$('#txt_fecha').val(),
    'barras':$('#txt_barras').val(),
    'marca':$('#ddl_marca').val(),
    'color':$('#ddl_color').val(),
    'genero':$('#ddl_genero').val(),
    'des2':$('#txt_description2').val(),
    'sucu':$('#ddl_localizacion').val(),
    'serie':$('#txt_serie').val(),
    'max':$('#txt_max').val(),
    'min':$('#txt_min').val(),
    'paquetes':$('#txt_cant_paq').val(),
    'xpaquetes':$('#txt_cant_x_paq').val(),
    'sueltos':$('#txt_cant_sueltas').val(),
    'lleva':$('input:radio[name=opc]:checked').val(),
   }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?add_edit_materia=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            if(response==1 && $('#txt_id').val()!='')
            { 
               Swal.fire('Producto Editado','','success'); 
            }else if(response!=-1 && $('#txt_id').val()=='')
            {
                Swal.fire('Producto Ingresado','','success'); 
                location.href = 'detalle_materia.php?id='+response
            }else
            {
                Swal.fire('algo salio mal =C','','error'); 
            }          
        }
      });

}

function list_articulos()
{
    var parametros = 
    {
        'query':$('#txt_query').val(),
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?buscar_articulo_materia=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#tbl_productos').html(response);          
        }
      });
}

function list_trasferencias()
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
        url:   '../controlador/lista_articulosC.php?buscar_transferencias=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#tbl_productos').html(response);          
        }
      });
}

function categorias()
  {
    $('#ddl_categoria').select2({
      // width: 'resolve',
      placeholder: 'categoria',
      ajax: {
        url:   '../controlador/lista_facturaC.php?categorias=true',  
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

  function sucursales()
  {
    $('#ddl_localizacion').select2({
      // width: 'resolve',
      placeholder: 'Seleccione',
      ajax: {
        url:   '../controlador/sucursalesC.php?sucursales=true',  
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



function autocmpletar_color(){
  $('#ddl_color').select2({
    placeholder: 'Seleccione un color',
    ajax: {
      url:  '../controlador/coloresC.php?colores=true',
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

 function autocmpletar_marca(){
      $('#ddl_marca').select2({
        placeholder: 'Seleccione una marca',
        ajax: {
          url: '../controlador/marcasC.php?marca=true',
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
  function autocmpletar_genero(){
      $('#ddl_genero').select2({
        placeholder: 'Seleccione una custodio',
        ajax: {
          url: '../controlador/generoC.php?genero=true',
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

 function estado()
  { 
    var id='';
    var estado = '<option value="">Seleccione Estado</option>';

    $.ajax({
      data:  {id:id},
      url:   '../controlador/estadoC.php?lista=true',
      type:  'post',
      dataType: 'json',
        success:  function (response) {    
        // console.log(response);   
        $.each(response, function(i, item){
            estado+="<option value='"+item.ID_ESTADO+"''>"+item.DESCRIPCION+"</option>";

          // console.log(item);
        });       
        $('#ddl_estado').html(estado);        
      }
    });
  }

function eliminar()
  {
     Swal.fire({
      title: 'Quiere eliminar este registro?',
      text: "Si elimina este articulo no podra ser usado en un futuro!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
           eliminar_articulo();
        }
      });
   }


  function eliminar_articulo()
  {
     var parametros = 
    {
        'id':$('#txt_id').val(),
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?eliminar=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==2)
          {
            Swal.fire('No se puedo eliminar','Este articulo esta ligado a 1 o mas registros','info');
          }else if(response==1)
          {
            Swal.fire('Registro eliminado','','success');  
            location.href = 'materia_prima.php';          
          }else
          {
             Swal.fire('No se pudo eliminar','','error');       
          }      
        }
      });

  }

  function cantidad_transferencia(id,stock)
  {
    $('#txt_id').val(id);
    $('#modal_cantidad').modal('show');
    $('#txt_stock').val(stock);
  }

  function agregar_trasnferencia()
  {
    var stock = parseFloat($('#txt_stock').val());
    var cant = parseFloat($('#txt_cant').val());
     if(cant>stock)
     {
        Swal.fire('cantidad supera a Stock','','info');
        return false;
     }
     var parametros = 
    {
        'id':$('#txt_id').val(),
        'cant':$('#txt_cant').val(),
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?agregar_trasnferencia=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            if(response==1)
            {
                Swal.fire('','Agregado a transferencias','success');
                $('#txt_stock').val(0);
                $('#txt_cant').val(1);
                $('#modal_cantidad').modal('hide');
                cargar_transferencias();
            }         
        }
      });
  }

  function cargar_transferencias()
  {
      $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?lista_trasnferencia=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            console.log(response);
            if(response!=null)
            {
                $('#noti').css('display','initial');              
            }else
            {                
                $('#noti').css('display','none'); 
            }
            
                $('#tbl_trans').html(response);          
        }
      });
  }

  function eliminar_trans(id)
  {
     Swal.fire({
      title: 'Quiere eliminar este registro?',
      text: "Si elimina este articulo no podra ser transferido!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
          eliminar_articulo_transferencia(id);
        }
      });
   }


  function eliminar_articulo_transferencia(id)
  {
     var parametros = 
    {
        'id':id,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?eliminar_transferencia=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==2)
          {
            Swal.fire('No se puedo eliminar','Este articulo esta ligado a 1 o mas registros','info');
          }else if(response==1)
          {
            Swal.fire('Registro eliminado','','success');
            cargar_transferencias();   
          }else
          {
             Swal.fire('No se pudo eliminar','','error');       
          }      
        }
      });

  }

  function tranferencia()
  {
    var entrada = $('#ddl_localizacion').val();
    console.log(entrada);
    if(entrada=='')
    {
        Swal.fire('Seleccione destino','','info');
    }
    var parametros = 
    {
        'destino':entrada,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?transferencia=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
           
        }
      });
  }
function tamanio_lista(id)
{
   
    var parametros = 
    {
        'id':id,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?kit_tamanio=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            if(response!='')
            {
                $('#tbl_tama').html(response);
            }
        }
    });
}
function editar_tama(id)
{  
    var parametros = 
    {
        'id':id,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?kit_tamanio_datos=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            if(response!='')
            {
                $('#txt_tama').val(response[0].nombre);
                $('#txt_precio_ta').val(response[0].precio);
                $('#txt_id_tama').val(response[0].id);
            }
        }
    });
}

function tamanio_add()
{
    var ta = $('#txt_tama').val();
    var pre = $('#txt_precio_ta').val();
    var id = $('#txt_id_tama').val();
    var id_p = $('#txt_id').val();
    if(ta=='' || pre == '')
    {
        Swal.fire('Llene todo los campos','','success');
        return false;
    }
    var parametros = 
    {
        'id':id,
        'nombre': ta,
        'precio': pre,
        'producto': id_p,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?kit_tamanio_add=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            console.log(response);
            if(response==1)
            {
                Swal.fire('Guardado','','success');
                $('#txt_tama').val('');
                $('#txt_precio_ta').val('');
                $('#txt_id_tama').val('');
                tamanio_lista(id_p);
            }
        }
    });
}

function eliminar_tama(id)
{
     Swal.fire({
      title: 'Quiere eliminar este registro?',
      text: "Si elimina este articulo no podra ser usado en un futuro!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
           eliminar_tamanio(id);
        }
      });
}


  function eliminar_tamanio(id)
  {
     
    var id_p = $('#txt_id').val();
     $.ajax({
        data:  {id:id},
        url:   '../controlador/lista_articulosC.php?eliminar_tama=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {           
            Swal.fire('Registro eliminado','','success');  
            tamanio_lista(id_p);
          }else
          {
             Swal.fire('No se pudo eliminar','','error');       
          }      
        }
      });

}

function lista_articulos_adicionales()
  {
    $('#ddl_producto_add').select2({
      width: '100%',
      placeholder: 'Productos adicionales',
      ajax: {
        url:   '../controlador/lista_articulosC.php?detalle_articulo_ddl=true',  
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


function adicionales_lista(id)
{
   
    var parametros = 
    {
        'id':id,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?adicionales=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            if(response!='')
            {
                $('#tbl_adicional').html(response);
            }
        }
    });
}
function editar_adicionales(id)
{  
    var parametros = 
    {
        'id':id,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?adicionales_datos=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            if(response!='')
            {
                $('#txt_tama').val(response[0].nombre);
                $('#txt_precio_ta').val(response[0].precio);
                $('#txt_id_tama').val(response[0].id);
            }
        }
    });
}

function adicionales_add()
{
    var id =  $('#txt_id').val();
    var id_p = $('#ddl_producto_add').val();
    if(id== '')
    {
        Swal.fire('Seleccione un producto a adicionar','','success');
        return false;
    }
    var parametros = 
    {
        'id':id,
        'producto': id_p,       
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?adicionales_add=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            console.log(response);
            if(response==1)
            {
                Swal.fire('Guardado','','success');
                $('#ddl_producto_add').empty();
                adicionales_lista(id);
            }
        }
    });
}

function eliminar_adicionales(id)
{
     Swal.fire({
      title: 'Quiere eliminar este registro?',
      text: "Si elimina este articulo no podra ser usado en un futuro!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
           eliminar_adi(id);
        }
      });
}


  function eliminar_adi(id)
  {
     
    var id_p = $('#txt_id').val();
     $.ajax({
        data:  {id:id},
        url:   '../controlador/lista_articulosC.php?eliminar_adicionales=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {           
            Swal.fire('Registro eliminado','','success');  
            adicionales_lista(id_p);
          }else
          {
             Swal.fire('No se pudo eliminar','','error');       
          }      
        }
      });

  }




function materia_prima(id)
{
    var parametros = 
    {
        'id':id,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?kit_materia_prima=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
            console.log(response);
        }
    });
}

function calcular_stock()
{
    cantPaq = $('#txt_cant_paq').val();
    if(cantPaq=='' || $.isNumeric(cantPaq)==false)
    {
         $('#txt_cant_paq').val('0');
         cantPaq  = 0;
    }
    cantxPaq =  $('#txt_cant_x_paq').val(); 
    if(cantxPaq=='' || $.isNumeric(cantxPaq)==false)
    {
         $('#txt_cant_x_paq').val('0');
         cantxPaq  = 0;
    }

    cantSueltas =  $('#txt_cant_sueltas').val(); 
    if(cantSueltas=='' || $.isNumeric(cantSueltas)==false)
    {
         $('#txt_cant_sueltas').val('0');
         cantSueltas  = 0;
    }

    peso =  $('#txt_peso').val(); 
    if(peso=='' || $.isNumeric(peso)==false)
    {
         $('#txt_peso').val('0');
         peso  = 0;
    }


    tipo = $('input[name="cbx_stock"]:checked').val();
    $('#txt_unidad').val(tipo);
    if(tipo=='Uni')
    {
         total = parseFloat(( parseFloat(cantPaq)* parseFloat(cantxPaq))+parseFloat(cantSueltas));
        $('#suelto').html('<code>*</code>Unidades sueltas.');
        $('#txt_cant').val(total.toFixed(0));
        $('#to_canti').html('<code>*</code>Cantidad Total');
        
    }else
    {
        total = parseFloat(( parseFloat(cantPaq)*parseFloat(peso))+parseFloat(cantSueltas));
        $('#suelto').html('<code>*</code>Peso sueltas(Kg).');
        $('#to_canti').html('<code>*</code>Cantidad Total (Kg)');
        $('#txt_cant').val(total.toFixed(2));
    }

}

function titulos_unidades()
{    
    tipo = $('input[name="cbx_stock"]:checked').val();
    if(tipo=='Uni')
    {
        $('#suelto').html('<code>*</code>Unidades sueltas.');
        $('#to_canti').html('<code>*</code>Cantidad Total');
        
    }else
    {
        $('#suelto').html('<code>*</code>Peso sueltas(Kg).');
        $('#to_canti').html('<code>*</code>Cantidad Total (Kg)');
    }
}