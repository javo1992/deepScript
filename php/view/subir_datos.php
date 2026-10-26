<?php include('header.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
    
});

</script>
	<script src="../js/nota_credito.js"></script>		
<!-- Begin Page Content -->
<main class="content">
    <div class="container-fluid p-0">    <!-- Page Heading -->
      <h1 class="h3 mb-3"><strong>Subir datos</strong></h1>
    <!-- <button onclick="eliminar_session()"> Cerrar</button> -->
    
    <div class="row">
         <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8">
                <div class="card-header">
                    <h5 class="card-title">Carga de datos por:</h5>
                </div>
                <div class="card-body" style="padding-top: 0px;">
                	<table class="table table-bordered table-sm table-striped " id="dataTable">
                        <thead>                            
                            <th width="20%"></th>
                        	<th>Detalle</th>
                        	<th width="15%"></th>
                        </thead>
                        <tbody>
                        	<tr>
                        		<td><button class="btn btn-primary btn-sm"><i class="fa fa-cloud-download-alt"></i> Descargar formato</button></td>
                        		<td>
                        			<p>Carga de datos para Articulos</p>
                        			<input type="file" name="">
                        		</td>
                        		<td><button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Subir archivo</button></td>
                        	</tr>
                        	<tr>
                        		<td><button class="btn btn-primary btn-sm"><i class="fa fa-cloud-download-alt"></i> Descargar formato</button></td>
                        		<td>
                        			<p>Carga de datos para Clientes</p>
                        			<input type="file" name="">
                        		</td>
                        		<td><button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Subir archivo</button></td>
                        	</tr>
                        	<tr>
                        		<td><button class="btn btn-primary btn-sm"><i class="fa fa-cloud-download-alt"></i> Descargar formato</button></td>
                        		<td>
                        			<p>Carga de datos para provedores</p>
                        			<input type="file" name="">
                        		</td>
                        		<td><button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Subir archivo</button></td>
                        	</tr>
                        	
                        </tbody>
                    </table>
                </div>
            </div>

        </div>                        
    </div>
</div>
</main>
<?php include('footer.php'); ?>
           