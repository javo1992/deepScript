<?php include('header.php');?>
<script src="../js/lista_materia_prima.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        list_articulos();
        categorias();
     });
</script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Materia prima</strong> </h1>
        <div class="row">
                		<div class="col-sm-3">
                			<a href="detalle_materia.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Nuevo</a>
                            <button class="btn btn-sm btn-default" style="border:1px solid;"><i class="fa fa-file-pdf"></i> Informe</button>
                		</div>
                		<div class="col-sm-1">
                		</div>
                		<div class="col-sm-2">
                			<!-- <button class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Ingresar materia prima</button> -->
                		</div>
                	</div>
        <div class="row">
            <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8">
                <div class="card-body">
                	<div class="row">
                    	<div class="col-sm-4">
                    		<b>Buscar producto</b>
                    		<input type="" name="txt_query" id="txt_query" class="form-control form-control-sm" placeholder="Buscar por nombre" onkeyup="list_articulos()">
                    	</div>
                    </div>
                	
                	<div class="row">
                		<table class="table table-hover">
                			<thead>
                				<th>Referencia</th>
                				<th>Cod. Auxiliar</th>
                				<th>Producto</th>
                				<th>Stock</th>
                				<th>Medida</th>
                				<th>Peso</th>
                				<th>Localizacion</th>
                				<th>Minimo</th>
                				<th>Maximo</th>
                				<th></th>
                			</thead>
                			<tbody id="tbl_productos">
                				<tr>
                					<td></td>
                					<td></td>
                					<td></td>
                					<td></td>
                					<td></td>
                					<td></td>
                					<td></td>
                					<td></td>
                					<td></td>
                					<td></td>
                				</tr>
                				
                			</tbody>
                		</table>
                	</div>
                    <!-- <img src="https://erp.diskcoversystem.com/~diskcover/php/app1_php/img/articulos/logo.png"> -->
                   <!--  The styling for this basic card example is created by using default Bootstrap
                    utility classes. By using utility classes, the style of the card component can be
                    easily modified with no need for any custom CSS! -->
                    <?php 
                    // print_r($_SESSION['INICIO']);
                    ?>
                </div>
            </div>

        </div>          
        </div>
    </div>
</main>


<?php include('footer.php'); ?>