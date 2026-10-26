<?php include('header.php');?>
 <script src="../js/Promociones.js"></script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Promociones</strong></h1>

        <div class="row">
            <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6> -->
                </div>
                <div class="card-body">
                    <div class="row">
			            <div class="col-lg-12">
			            	<ul class="nav nav-pills">
							  <li class="nav-item">
							    <a class="nav-link active" data-bs-toggle="pill" href="#home">Articulos en Promociones</a>
							  </li>
							  <li class="nav-item">
							    <a class="nav-link" data-bs-toggle="pill"  href="#menu1">Categorias en promocion</a>
							  </li>							  		 
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane container active" id="home">
							  	<div class="row">
							  		<div class="col-sm-5">
							  			<br>
							  			<div class="row">
							  				<div class="col-sm-10">
							  					<b>Producto Adicional</b>
						  						<select class="form-control" id="ddl_producto_add" name="ddl_producto_add">
						  							<option value="">Seleccione producto</option>
						  						</select>
							  				</div>
							  				<div class="col-sm-2">
							  					<br>
							  					<button class="btn btn-primary btn-sm" onclick="guardar_producto()">Guardar</button>
							  				</div>
							  			</div>
							  		</div>
							  		<div class="col-sm-7">
							  			<div class="card-body">
							  				<table class="table table-hover">
								  				<thead>
								  					<th>Producto</th>
								  					<th>Precio</th>
								  					<th></th>								  					
								  				</thead>
								  					<tbody id="tbl_productos">
								  						<tr>
								  							<td>
								  								
								  							</td>
								  							<td>
								  								
								  							</td>
								  							<td>
								  								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
								  							</td>
								  						</tr>
								  					</tbody>
								  			</table>
							  				
							  			</div>
							  		</div>
							  		
							  	</div>
							  </div>
							  <div class="tab-pane container" id="menu1">
							  	 <div class="row">
							  		<div class="col-sm-5">
							  			<br>
							  			<div class="row">
							  				<div class="col-sm-10">
							  					 <b>Categoria</b><br>
					                            <select class="form-select form-control-sm" id="ddl_categoria">
					                              <option value="">Seleccione Categoria</option>
					                            </select>
							  				</div>
							  				<div class="col-sm-2"><br>
							  					<button class="btn btn-primary btn-sm" onclick="guardar_categoria()">Guardar</button>
							  				</div>
							  			</div>
							  		</div>
							  		<div class="col-sm-7">							  			
							  			<div class="card-body">
								  			<table class="table table-hover">
								  				<thead>
								  					<th>Categoria</th>
								  					<th>Precio</th>
								  					<th></th>								  					
								  				</thead>
								  				<tbody id="tbl_cate">
								  						<tr>
								  							<td>
								  								
								  							</td>
								  							<td>
								  								
								  							</td>
								  							<td>
								  								<button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
								  							</td>
								  						</tr>
								  					</tbody>
								  			</table>
								  		</div>							  			
							  		</div>
							  		
							  	</div>
							  </div>							  
							</div>
						</div>
					</div>
					 
                </div>
            </div>

        </div>          
        </div>
    </div>
</main>


<?php include('footer.php'); ?>