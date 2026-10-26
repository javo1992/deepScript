$(document).ready(function () {
	lista_articulos_adicionales();
	categorias();
	lista_promociones_categoria();
	lista_promociones_producto();

})


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

  function categorias()
  {
    $('#ddl_categoria').select2({
      width: '100%',
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

function lista_promociones_categoria()
{
    
     $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/promocionesC.php?lista_cate=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
         $('#tbl_cate').html(response);
        }
      });


}

function lista_promociones_producto()
{
     
     $.ajax({
        // data:  {parametros:parametros},
        url:   '../controlador/promocionesC.php?lista_productos=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          $('#tbl_productos').html(response);
        }
      });


}
function eliminar_reg(id)
{
	 Swal.fire({
      title: 'Quiere eliminar este registro?',
      text: "esta seguro de eliminar este registro!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
           eliminar(id);
        }
      });
}
function eliminar(id)
{

     var parametros = 
    {
        'id':id,
    }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/promocionesC.php?eliminar=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==2)
          {
            Swal.fire('No se puedo eliminar','Este articulo esta ligado a 1 o mas registros','info');
          }else if(response==1)
          {
            Swal.fire('Registro eliminado','','success');  
            lista_promociones_categoria();
			lista_promociones_producto();
          }else
          {
             Swal.fire('No se pudo eliminar','','error');       
          }      
        }
      });
}

function guardar_producto()
{
	ddl = $('#ddl_producto_add').val();
	if(ddl=='')
	{
		Swal.fire('No se pudo guardar','Seleccione un articulo','info');
		return false;
	}
     var parametros = 
     {
     	'id':ddl,
     }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/promocionesC.php?add_productos=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
			if(response==1)
			{
				Swal.fire('Guardado','','success');
				lista_promociones_producto();
        	}
        }
      });


}

function guardar_categoria()
{
	ddl = $('#ddl_categoria').val();
	if(ddl=='')
	{
		Swal.fire('No se pudo guardar','Seleccione una categoria','info');
		return false;
	}
     var parametros = 
     {
     	'id':ddl,
     }
     $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/promocionesC.php?add_categoria=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
           if(response==1)
           {
           	Swal.fire('Guardado','','success');
           	lista_promociones_categoria();
           }
        }
      });


}