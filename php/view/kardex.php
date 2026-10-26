<?php include('header.php');?>
<script type="text/javascript">
$(document).ready(function () {
	lista_materia_prima_ddl();
	lista_kardex();
});


function lista_kardex()
{
	parametros = 
	{
		'arti':$('#ddl_materia').val(),
		'desde':$('#txt_desde').val(),
		'hasta':$('#txt_hasta').val(),
	}

    $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/kardexC.php?lista=true',      
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

</script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Movimientos</strong> kardex</h1>

        <div class="row">
            <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8">
            	<div class="card-body" style="padding-top: 9px;padding-bottom: 0px;">
            		<div class="col-sm-12">
            			<button class="btn btn-sm btn-default" style="border: 1px solid" id="excel_kardex"><i class="fa fa-file-excel"></i> Imprimir</button>
            		</div>
            	</div>
              
                <div class="card-body">
                    <form id="form_parametros">
                   <div class="row">
                   	 <div class="col-sm-4">
                   	 	<b>Producto</b>
                   	 	<div class="input-group">                   			
                   			<select class="form-select" id="ddl_materia" name="ddl_materia" style="width:90%" onchange="lista_kardex()">
                   				<option value="">Seleccione Producto</option>
                   			</select>                	                   			
							<button class="btn btn-secondary btn-sm" type="button" title="Limpiar articulo" onclick="$('#ddl_materia').empty();lista_kardex()"><i class="fa fa-brush"></i></button>
						</div>      
                   	 </div>
                   	 <div class="col-sm-2">
                   	 	<b>Desde</b>
                   	 	<input type="date" name="txt_desde" id="txt_desde" class="form-control form-control-sm" onblur="lista_kardex()">
                   	 </div>
                   	 <div class="col-sm-2">
                   	 	<b>Hasta</b>
                   	 	<input type="date" name="txt_hasta" id="txt_hasta" class="form-control form-control-sm" onblur="lista_kardex()">
                   	 </div>
                   </div>                   
                     </form>
                   <br>
                   <div class="row">
                   	<div class="col-sm-12 table-responsive">
                   		<table class="table table-striped table-sm table-bordered">
                   			<thead>
                   				<th style="width: 30%;">Producto</th>
                   				<th style="width:23%">Fecha</th>
                   				<th>Entrada</th>
                   				<th>salida</th>
                   				<th>Existe</th>
                   				<th>Prec_Uni</th>
                   				<th>Total_iva</th>
                   				<th>Subtotal</th>
                   				<th>Total</th>
                   				<th>Costo</th>
                   				<th>Factura</th>
                   				<th style="width: 30%;">Detalle</th>
                   			</thead>
                   			<tbody id="tbl_kardex">
                   				
                   			</tbody>
                   		</table>
                   	</div>
                   </div>
                </div>
            </div>

        </div>          
        </div>
    </div>
</main>


<?php include('footer.php'); ?>