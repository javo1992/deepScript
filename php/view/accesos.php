<?php include('header.php');?>
<script type="text/javascript">
 $(document).ready(function () {
 	 lista_accesos();
 	 usuarios();
 	 modulos_ddl();
 	 // paginas();
 	 // modulos_ddl_b();
});

function lista_accesos()
{
	var parametros = 
	{
		'usuario':$('#ddl_usuarios').val(),
		'modulo':$('#ddl_modulos').val(),
	}

    $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/accesosC.php?lista_accesos=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#tbl_accesos').html(response); 
        }
      });

}

function usuarios()
{
	// var parametros = 
	// {
	// 	'usuario':$('#ddl_usuarios').val(),
	// 	'modulo':$('#ddl_modulos').val(),
	// }

    $.ajax({
        // data:  {parametros:parametros},
        url:    '../controlador/accesosC.php?usuarios=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#ddl_usuarios').html(response); 
        }
      });

}

function modulos_ddl()
{
	// var parametros = 
	// {
	// 	'usuario':$('#ddl_usuarios').val(),
	// 	'modulo':$('#ddl_modulos').val(),
	// }

    $.ajax({
        // data:  {parametros:parametros},
        url:    '../controlador/accesosC.php?modulos_codigo=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#ddl_modulos').html(response); 
        }
      });

}

function paginas()
{
	var parametros = 
	{
	  'modulo':$('#ddl_modulos').val(),
	}

    $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/accesosC.php?paginas=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#ddl_paginas').html(response); 
        }
      });

}

function add_acceso()
{
	if($('#ddl_usuarios').val()=='' || $('#ddl_paginas').val()=='')
	{
		Swal.fire('','Asegurese de seleccionar un usuario y una pagina','info');
		return false;
	}
	var parametros = 
	{
		'usuario':$('#ddl_usuarios').val(),
		'paginas':$('#ddl_paginas').val(),
	}

    $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/accesosC.php?add_acceso=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
           lista_accesos();
        }
      });

}

function eliminar_acceso(id)
{
	Swal.fire({
	  title: 'Eliminar Registro?',
	  text: "Esta seguro de eliminar este acceso?",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si'
	}).then((result) => {
	  if (result.value) {
	    eliminar(id);    
	  }
	})

}

function eliminar(id)
{
	  $.ajax({
        data:  {id:id},
        url:    '../controlador/accesosC.php?delete_acceso=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {
          	Swal.fire('','Acceso eliminado','success');
          }
          lista_accesos();
        }
      });

}



</script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Accesos</strong> ...</h1>

          <div class="row">
  	<div class="col-sm-4">
  		<b>Usuario</b>
  		<select class="form-select form-control" id="ddl_usuarios" name="ddl_usuarios" onchange="lista_accesos()">
  			<option value="">
  				Seleccione usuario
  			</option>
  		</select>
  	</div>  	
  	<div class="col-sm-3">
  		<b>Modulo</b>
  		<select class="form-select form-control" id="ddl_modulos" name="ddl_modulos" onchange="lista_accesos();paginas()">
  			<option value="">
  				Seleccione modulo
  			</option>
  		</select>
  	</div>  	
  	<div class="col-sm-3">
  		<b>Paginas</b>
  		<select class="form-select form-control" id="ddl_paginas" name="ddl_paginas">
  			<option>
  				Seleccione paginas
  			</option>
  		</select>
  	</div> 
  	<div class="col-sm-2"><br>
  		<button class="btn btn-sm btn-primary" onclick="add_acceso()"><i class="align-middle" data-feather="save"></i> Guardar</button>
  	</div> 	
  </div>
  <div class="row">
  	<div class="col-sm-12 col-12">
  		<table class="table">
	  		<thead>
	  			<th>Usuario</th>
	  			<th>modulo</th>
	  			<th>Pagina</th>
	  			<th></th>
	  		</thead>
	  		<tbody id="tbl_accesos">
	  			<tr>
	  				<td></td>
	  				<td></td>
	  				<td></td>
	  				<td><button class="btn btn-sm "><i class="fa fa-trash"></i></button></td>
	  			</tr>
	  		</tbody>
	  	</table>
  		
  	</div>
  	
  </div>
   
    </div>
</main>


<?php include('footer.php'); ?>