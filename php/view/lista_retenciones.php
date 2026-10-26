<?php include('header.php'); ?>
<script type="text/javascript">
$(document).ready(function () {
cargar_retenciones();
        
});

</script>
	<script src="../js/lista_retencion.js"></script>		
<!-- Begin Page Content -->
<main class="content">
    <div class="container-fluid p-0">    <!-- Page Heading -->
      <h1 class="h3 mb-3"><strong>Retenciones</strong></h1>
    <!-- <button onclick="eliminar_session()"> Cerrar</button> -->
    <div class="row">
    	<div class="col-sm-2">
    		<a class="btn btn-success btn-sm" href="retenciones.php"><i class="fa fa-plus"></i> Nuevo</a>
    	</div>
    </div>
     <div class="row">
    	<div class="col-sm-3">
    		<b>Cliente</b>
    		<input type="text" name="txt_query" id="txt_query" class="form-control form-control-sm" placeholder="Cliente" onkeyup="cargar_facturas()">
    	</div>
    	<div class="col-sm-2">
    		<b>No Retencion</b>
    		<input type="text" name="txt_num_fac" id="txt_num_fac" class="form-control form-control-sm" placeholder="No Retencion" onkeyup="cargar_facturas()">
    	</div>
    	<div class="col-sm-2">
    		<b>Desde</b>
    		<input type="date" name="txt_desde" id="txt_desde" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>" onblur="cargar_facturas()">
    	</div>
    	<div class="col-sm-2">
    		<b>Hasta</b>
    		<input type="date" name="txt_hasta" id="txt_hasta" class="form-control form-control-sm" onblur="cargar_facturas()">
    	</div>
    	<div class="col-sm-2">
    		<b>Serie</b>
    		<select class="form-select form-select-sm" id="ddl_serie" name="ddl_serie" onchange="cargar_facturas()">
    			<option value="">Serie</option>
    		</select>
    	</div>
    </div>
    <br>
    <div class="row">
         <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8">
                <div class="card-header">
                    <h5 class="card-title">Lista de retenciones</h5>
                </div>
                <div class="card-body" style="padding-top:0px">
                	<table class="table table-bordered dataTable table-sm" id="dataTable">
                        <thead>                            
                            <th width="15%"></th>
                        	<th>Cliente</th>
                        	<th>Fecha</th>
                        	<th>Retencion</th>
                        	<th>Serie</th>
                            <th>Factura</th>
                            <th>Serie Fac</th>
                            <th>Fecha Fac</th>
                        	<th width="8%">Estado</th>
                        </thead>
                        <tbody id="lista_retenciones">
                        	
                        </tbody>
                    </table>
                </div>
            </div>

        </div>                        
    </div>
</div>
</main>
<?php include('footer.php'); ?>
           