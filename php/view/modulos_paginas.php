<?php include('header.php'); ?>
<script type="text/javascript">
 $(document).ready(function () {
 	 modulos();
 	 paginas();
 	 modulos_ddl();
 	 modulos_ddl_b();
});

function modulos()
{
	// var parametros = 
	// {
	// 	'empresa':localStorage.getItem('ID_EMPRESA'),
	// 	'usuario':localStorage.getItem('ID_USUARIO'),
	// }

    $.ajax({
        // data:  {parametros:parametros},
        url:    '../controlador/modulos_paginasC.php?modulos=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#tbl_datos').html(response); 
        }
      });

}

function modulos_ddl_b()
{
	// var parametros = 
	// {
	// 	'empresa':localStorage.getItem('ID_EMPRESA'),
	// 	'usuario':localStorage.getItem('ID_USUARIO'),
	// }

    $.ajax({
        // data:  {parametros:parametros},
        url:    '../controlador/modulos_paginasC.php?modulos_ddl=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
        	$('#ddl_modulos_ddl_b').html(response);
        }
      });

}

function modulos_ddl()
{
	// var parametros = 
	// {
	// 	'empresa':localStorage.getItem('ID_EMPRESA'),
	// 	'usuario':localStorage.getItem('ID_USUARIO'),
	// }

    $.ajax({
        // data:  {parametros:parametros},
        url:    '../controlador/modulos_paginasC.php?modulos_ddl=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
        	$('#ddl_modulos_ddl').html(response);
        }
      });

}


function paginas()
{
	var parametros = 
	{
		'modulo':$('#ddl_modulos_ddl_b').val(),
	}
    $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/modulos_paginasC.php?paginas=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
            $('#tbl_paginas').html(response); 
        }
      });

}


function guardar_editar(id='')
{
  let nombre = $('#txt_modulo'+id).val(); 
  let link  =  $('#txt_link'+id).val(); 
  let icono  =  $('#txt_icono'+id).val(); 
  let codigo  =  $('#txt_codigo'+id).val(); 
  if(nombre=='' || codigo=='')
  {
  	Swal.fire('Campo de codigo o nombre no ingresado','','info');
  }
  	var parametros = 
	{
		'id':id,
		'nombre':nombre,
		'link':link,
		'icono':icono,
		'codigo':codigo,
	}

    $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/modulos_paginasC.php?guardar_editar=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
        	if(response ==1)
        	{
        		Swal.fire('Proceso realizado','','success');
            	modulos();
            	menu_lateral();
            }else if(response==-2)
            {
            	Swal.fire('El codigo ingresado ya esta en uso','','warning')
            }
        }
      });


}

function guardar_editar_pag(id='')
{
  let nombre = $('#txt_pag'+id).val(); 
  let link  =  $('#txt_lin'+id).val(); 
  let modulo  =  $('#ddl_modulos_ddl'+id).val(); 
  if(nombre=='' || modulo=='' || link=='')
  {
  	Swal.fire('Ingrese todo los campos','','info');
  }
  	var parametros = 
	{
		'id':id,
		'nombre':nombre,
		'link':link,
		'modulo':modulo,
	}

    $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/modulos_paginasC.php?guardar_editar_pag=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
        	if(response ==1)
        	{
        		Swal.fire('Proceso realizado','','success');
            	paginas();
            	menu_lateral();
            }else if(response==-2)
            {
            	Swal.fire('El codigo ingresado ya esta en uso','','warning')
            }
        }
      });


}

function delete_datos(id,cod=false)
{
    Swal.fire({
	  title: 'Eliminar Registro?',
	  text: "Esta seguro de eliminar este registro?",
	  icon: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si'
	}).then((result) => {
	  if (result.value) {
	    eliminar(id,cod);    
	  }
	})

  }

  function eliminar(id,cod=false)
  {
  	parametros = 
  	{
  		'id':id,
  		'cod':cod,
  	}
  	 $.ajax({
        data:  {parametros:parametros},
        url:    '../controlador/modulos_paginasC.php?eliminar=true',           
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
        	if(response ==1)
        	{
        		Swal.fire('Proceso realizado','','success');
            	modulos();
            	paginas();
            	menu_lateral();
            }else if(response==-2)
            {
            	Swal.fire('No se pudo eliminar','El modulo tiene paginas ligadas','warning')
            }
        }
      });


  }


</script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Modulos y paginas</strong> </h1>

        
        <div class="row">
            <div class="col-lg-12">
            	<ul class="nav nav-pills">
				  <li class="nav-item">
				    <a class="nav-link active" data-bs-toggle="pill" href="#home">Modulos</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-bs-toggle="pill" href="#menu1">Paginas</a>
				  </li>				  
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
				  <div class="tab-pane container active" id="home">
				  	<table class="table table-hover">
				  		<thead>			
				  			<th>codigo</th>		  			
				  			<th>Nombre</th>
				  			<th>Link</th>
				  			<th>Icono</th>
				  			<th></th>
				  		</thead>
				  		<tr>
				  			<td><input type="" name="txt_codigo" id="txt_codigo" class="form-control form-control-sm" placeholder="Cod"></td>
				  			<td><input type="" name="txt_modulo" id="txt_modulo" class="form-control form-control-sm" placeholder="Nombre de modulo"></td>
				  			<td><input type="" name="txt_link" id="txt_link" class="form-control form-control-sm" placeholder="Link"></td>
				  			<td><input type="" name="txt_icono" id="txt_icono" class="form-control form-control-sm" placeholder='<i class="fas fa-circle"></i>'></td>
				  			<td><button class="btn btn-primary btn-sm" onclick="guardar_editar()"><i class="fa fa-save"></i> Guardar</button></td>
				  		</tr>
				  		<tbody id="tbl_datos">
				  			<tr>
				  				<td></td>
				  				<td>
				  					<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
				  					<button class="btn btn-sm btn-primary"><i class="fa fa-save"></i></button>
				  				</td>
				  			</tr>
				  		</tbody>
				  	</table>
				  </div>

			  <div class="tab-pane container fade" id="menu1">
				  	<div class="row">
				  		<div class="col-sm-9">
				  			<b>Pagina</b>
				  			<input type="" name="" class="form-control form-control-sm">			  			
				  		</div>
				  		<div class="col-sm-3">
				  			<b>Modulo</b>
				  			<select class="form-control-sm form-select" id="ddl_modulos_ddl_b" name="ddl_modulos_ddl_b" onchange="paginas()">
				  				<option value="">Modulos</option>
				  			</select>
				  		</div>
				  	</div>
				  	<div class="row col-sm-12">
				  		<table class="table ">
				  			<thead>
				  				<th>Pagina</th>
				  				<th>Modulos</th>
				  				<th>Link</th>
				  				<th></th>
				  			</thead>
				  			<tr>
				  				<td><input type="" name="" class="form-control form-control-sm" id="txt_pag"></td>
				  				<td>
				  					<select class="form-control-sm form-select" id="ddl_modulos_ddl" name="ddl_modulos_ddl">
						  				<option value="">Modulos</option>
						  			</select>
				  					
				  				</td>
				  				<td><input type="" name="txt_lin" class="form-control form-control-sm" id="txt_lin"></td>
				  				<td><button class="btn btn-primary btn-sm" onclick="guardar_editar_pag()"><i class="fa fa-save"></i> Guardar</button></td>	
				  			</tr>
				  			<tbody id="tbl_paginas">			  				
				  				
				  			</tbody>
				  		</table>
				  	</div>
				  </div>
				</div>
        </div>
    </div>
</main>


<?php include('footer.php'); ?>