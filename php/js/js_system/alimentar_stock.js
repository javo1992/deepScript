$(document).ready(function () {

	 $('#ddl_materia').on('select2:select', function (e) {
	  var data = e.params.data.data; 
	  costo_stock(data.id_productos);
	   titulos(data.uni_medida);
	  // console.log(data);
	});

})


function eliminar_adicionales(id)
{
     Swal.fire({
      title: 'Quiere eliminar este registro?',
      text: "Esta seguro de eliminar este registro!",
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
     $.ajax({
        data:  {id:id},
        url:   '../controlador/alimentar_stockC.php?eliminar=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {           
            Swal.fire('Registro eliminado','','success');  
            listar_kardex();
          }else
          {
             Swal.fire('No se pudo eliminar','','error');       
          }      
        }
      });

  }



function listar_kardex()
{
     $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/alimentar_stockC.php?listar=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
        	$('#tbl_kardex').html(response);
        }
    });
}

function lista_materia_prima_ddl()
  {
    $('#ddl_materia').select2({
      width: '90%',
      placeholder: 'Productos adicionales',
      ajax: {
        url:   '../controlador/lista_articulosC.php?ddl_articulos_inventario=true',  
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
  function lista_prove_ddl()
  {
    $('#ddl_prove').select2({
      width: '90%',
      placeholder: 'Productos adicionales',
      ajax: {
        url:   '../controlador/alimentar_stockC.php?prove=true',  
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


  function titulos(tipo)
  {
  	if(tipo=='kg')
  	{
  		$('#titulo_cant').html('Cant(KG)');
	}else{
  		$('#titulo_cant').html('Cant');
  	}
  }

  function costo_stock(id)
  {
  	var parametros = 
  	{
  		'id':id,
  	}
  	 $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/alimentar_stockC.php?costo_stock=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
        	console.log(response);
        	$('#txt_stock').val(response.stock);
        	$('#txt_pvp_ref').val(response.precio);
        }
    });

  }

  function add()
  {
  	pro =$('#ddl_prove').val();
  	fec =$('#txt_fecha').val();  	
  	fac =$('#txt_Factura').val();
  	ser =$('#txt_serie').val();
  	mat =$('#ddl_materia').val();
  	fef =$('#txt_fecha_f').val();
  	fee =$('#txt_fecha_e').val();
  	can =$('#txt_cantidad').val();
  	pre =$('#txt_precio').val();
  	sub =$('#txt_sub').val();
  	iva =$('#txt_iva').val();
  	tot =$('#txt_total').val();
  	if(pro=='' || fac=='' || ser=='' || mat=='' || fef=='' || fee=='' || can=='' || pre=='')
  	{
  		Swal.fire('','Ingrese todos los datos','info');
  		return false;
  	}

  	var parametros = 
  	{
  		'pro':pro,
	  	'fec':fec, 	
	  	'fac':fac,
	  	'ser':ser,
	  	'mat':mat,
	  	'fef':fef,
	  	'fee':fee, 
	  	'can':can, 
	  	'pre':pre,
	  	'sub':sub, 
	  	'iva':iva, 
	  	'tot':tot,
  	}
  	 $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/alimentar_stockC.php?add_ingreso=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
        	if(response==1)
        	{
        		Swal.fire('','Agregado','success');
        		listar_kardex();
        	}
        }
    });

  }

  function guardar_nuevo_proveedor()
  {
    nom =$('#txt_nombre_pro').val();
    ci  =$('#txt_ci_pro').val();   
    raz =$('#txt_razon_pro').val();
    ema =$('#txt_email_pro').val();
    tel =$('#txt_telefono_pro').val();
    dir =$('#txt_dir_pro').val();   
    if(nom=='' || ci=='' || raz=='' || ema=='' || tel=='' || dir=='')
    {
      Swal.fire('','Ingrese todos los datos','info');
      return false;
    }

    var parametros = 
    {
      'nom':nom,
      'ci':ci,  
      'raz':raz,
      'ema':ema,
      'tel':tel,
      'dir':dir,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/alimentar_stockC.php?add_proveedor=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
          if(response==1)
          {
            Swal.fire('','Agregado','success');
             limpiar_prove_new();
           
          }
        }
    });
  }

  function limpiar_prove_new()
  {
    $('#modal_nuevo_proveedor').modal('hide');
    $('#txt_nombre_pro').val('');
    $('#txt_ci_pro').val('');   
    $('#txt_razon_pro').val('');
    $('#txt_email_pro').val('');
    $('#ddl_telefono_pro').val('');
    $('#txt_dir_pro').val('');   

  }



  function calcular()
  {
    iva = $('input[name="rbl_iva"]').prop('checked');
    cant = $('#txt_cantidad').val();
    pre = $('#txt_precio').val();
    if(pre==0){$('#txt_precio').val(0); pre=0;}
    if(cant==0){$('#txt_cant').val(0); cant=0;}

    console.log(iva);
    console.log(cant);
    console.log(pre);

    if(iva==false)
    {
      total = cant*pre;
      $('#txt_total').val(total.toFixed(4));
      $('#txt_sub').val(total.toFixed(4));
    }else
    {
      total = cant*pre;
      total_iva = (val_iva/100)*total;
      $('#txt_total').val((total+total_iva).toFixed(4));
      $('#txt_iva').val(total_iva.toFixed(4));
      $('#txt_sub').val(total.toFixed(4));
    }
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


function add_categoria()
{
    cat = $('#txt_new_cate').val();
    if(cat=='')
    {
        Swal.fire('Llene el nombre','','info');
        return false;
    } 
    var parametros =
    {
        'categoria':cat,
    }
    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/lista_articulosC.php?add_categoria=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {           
             Swal.fire('Registro guardado','','success');  
             $('#nueva_categoria').modal('hide');
             materia_prima(id_p);
          }else if(response==-2)
          {
             Swal.fire('Nombre de categoria encontrada','','error');       
          }else
          {
             Swal.fire('No se pudo insertar','','error'); 
          }      
        }
      });
}

function guardar_art()
{

    ref =$('#txt_referencia').val();
    pro =$('#txt_nombre_art').val();  
    pre =$('#txt_precio_art').val();   
    inv =$('input[name="rbl_inventario"]:checked').val();
    iva = $('input[name="rbl_iva_art"]:checked').val();
    cat =$('#ddl_categoria').val();
    med =$('input[name="rbl_medida"]:checked').val();
    max =$('#txt_max_art').val();   
    min =$('#txt_min_art').val();   
    if(ref=='' || pro=='' || pre=='' || cat=='' || max=='' || min=='')
    {
      Swal.fire('','Ingrese todos los datos','info');
      return false;
    }

    var parametros = 
    {
      'ref':ref,
      'pro':pro,
      'pre':pre,
      'inv':inv,
      'iva':iva,
      'cat':cat,
      'med':med,
      'max':max,
      'min':min,
    }
    console.log(parametros)
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/alimentar_stockC.php?add_articulo=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) {
          if(response==1)
          {
            Swal.fire('','Agregado','success');
             limpiar_art_new();
           
          }
        }
    });

}

function limpiar_art_new()
{
  $('#modal_nuevo_producto').modal('hide');
  $('#txt_referencia').val('');
  $('#txt_nombre_art').val('');  
  $('#txt_precio_art').val('');   
  $('#ddl_categoria').empty();
  $('#txt_max_art').val('');   
  $('#txt_min_art').val('');   
}

function generar_ingresos()
{

    $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/alimentar_stockC.php?generar_ingresos=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {           
             Swal.fire('Ingreso generado','','success');  
            listar_kardex();
          }      
        }
      });

}
