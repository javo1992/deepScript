<?php include('header.php'); $id='';  ?>
<script src="../js/js_system/lista_articulos.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        var id = '<?php if(isset($_GET['id'])){ echo $_GET['id']; $id= $_GET['id']; };?>';
        lista_articulos_adicionales();
        categorias();
        if(id!='')
        {
        	detalle_articulo(id);
        	tamanio_lista(id);
        	adicionales_lista(id);
        	materia_prima(id);
        }
     });
</script>

<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Detalle de articulo</strong></h1>
        <div class="row">
        	<div class="col-sm-2">
        		<a href="lista_articulos.php" class="btn btn-sm btn-default" style="border:1px solid;"><i class="fa fa-arrow-left"></i> Regresar</a>
        	</div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            	<ul class="nav nav-pills">
				  <li class="nav-item">
				    <a class="nav-link active" data-toggle="pill" href="#home">Detalle de producto</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="pill"  href="#menu1">KIT / Recetas</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" data-toggle="pill"  href="#menu2">Adicionales</a>
				  </li>				 
				</ul>
				<!-- Tab panes -->
				<div class="tab-content" style="border:none; padding: 1rem 0rem;">
				  <div class="tab-pane active" id="home">
					  	<div class="row">
					         <div class="col-lg-12"  style="padding: 0px;">
					            <!-- Basic Card Example -->
					            <div class="card shadow mb-8">   
					                <div class="card-body">
					                	<div class="row">
					                		<div class="col-lg-9 col-sm-6">
					                		<!-- <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button> -->
					                	</div>
					                	<div class="col-lg-3 col-sm-6  text-right">
					                		<button class="btn btn-primary btn-sm" onclick="add_edit()"><i class="fa fa-save"></i> Guardar</button>
					                		<?php if($id!=''){echo '<button class="btn btn-danger btn-sm" onclick="eliminar()"><i class="fa fa-trash"></i> Eliminar</button>' ;} ?>
					                		
					                	</div>  
					                		
					                	</div>
					                   <div class="row">
					                   	<div class="col-lg-4 col-sm-6">
					                   		 <form enctype="multipart/form-data" id="form_img" method="post" class="col-sm-12">
					                   		 	<input type="hidden" name="txt_id" id="txt_id">
						                   		<img src="../img/sistema/sin_imagen.jpg" style="border:1px solid; width: inherit;" id="img_articulo">
						                   		<br><br>
						                   		<input type="file" name="file_img" id="file_img" class="form-control form-control-sm">
						                   		<input type="hidden" name="txt_nom_img" id="txt_nom_img">
						                   		<button class="btn btn-primary btn-block" id="subir_imagen" type="button">Cargar imagen</button>
					                   		</form>                   		
					                   	</div>
					                   	<div class="col-lg-8 col-sm-6">              
						                     <div class="row">
						                     	<div class=" col-lg-8 col-sm-12">
						                     		<b><code>*</code>Descripcion</b><br>
						                     		<input type="text" class="form-control form-control-sm" name="" id="txt_description">
						                     	</div>			                     	
						                     	<div class=" col-lg-4 col-sm-12">
						                     		<b>Tipo</b><br>
						                      		<label  class="form-control-sm"><input type="radio" name="opcT" id="opcp" value="P" checked> Producto</label>
						                      		<label  class="form-control-sm"><input type="radio" name="opcT" id="opcs" value="S"> Servicio</label>
						                     			                     		
						                     	</div>
						                     </div>
						                     <div class="row">
						                     	<div class="col-lg-8 col-sm-12">
						                     		<b>Descripcion 2</b><br>
						                     		<input type="text" class="form-control form-control-sm" name="" id="txt_description2">	
						                     	</div>
						                     	<div class="col-lg-4 col-sm-12">
						                           <b>Codigo Barras </b><br>
						                           <input type="text" class="form-control form-control-sm" name="" id="txt_barras">
						                         </div> 
						                     	
						                     </div>
						                     <div class="row">
						                         <div class="col-lg-4 col-sm-12">
						                           <b><code>*</code>Referencia </b><br>
						                           <input type="text" class="form-control form-control-sm" name="" id="txt_asset">
						                         </div>
						                         <div class="col-lg-4 col-sm-12">
						                             <b>Tag RFID </b><br>
						                             <input type="text" class="form-control form-control-sm" name="" id="txt_rfid">
						                           </div>
						                           <div class="col-lg-4 col-sm-12">
						                             <b>Codigo Auxiliar </b><br>
						                             <input type="text" class="form-control form-control-sm" name="" id="txt_tag_anti">
						                           </div>                       
						                     </div>
						                     <div class="row">
						                      <div class=" col-lg-3 col-sm-6">
						                           <b>Cantidad </b><br>
						                           <input type="text" class="form-control form-control-sm" name="" id="txt_cant">
						                         </div>
						                         <div class=" col-lg-3 col-sm-6">
						                     		<b>Peso</b><br>
						                     		<input type="text" class="form-control form-control-sm" name="" id="txt_peso" value="0">                   		
						                     	</div>  
						                         <div class=" col-lg-3 col-sm-6">
						                         <b>Unidad medida  </b><br>
						                         <input type="text" class="form-control form-control-sm" name="" id="txt_unidad">
						                         </div>
						                          <div class=" col-lg-3 col-sm-6">
						                           <b><code>*</code>Valor actual </b><br>
						                           <input type="text" class="form-control form-control-sm" name="" id="txt_valor">
						                         </div>	               
						                     </div>
						                     <div class="row">
						                     	<div class="col-lg-2 col-sm-6">
						                           <b>Minimo </b><br>
						                           <input type="text" class="form-control form-control-sm" name="" id="txt_min" value="0">
						                         </div>  
						                         <div class="col-lg-2 col-sm-6">
						                           <b>Maximo </b><br>
						                           <input type="text" class="form-control form-control-sm" name="" id="txt_max" value="0">
						                         </div>  
                    

						                          <div class="col-lg-5 col-sm-12">

								                         <div class="form-group">
								                            <b><code>*</code>Categoria</b><br>
										                   		<div class="d-flex input-group">
										                            <select class="form-select flex-grow-1" id="ddl_categoria">
										                              <option>Seleccione Categoria</option>
										                            </select>
										                             <div class="input-group-append">
											                            <button class="btn btn-secondary btn-sm" type="button" title="Nuevo Articulos" onclick="$('#nueva_categoria').modal('show');"><i class="fa fa-plus"></i></button>
											                        </div>
										                        </div>
                  										</div>
						                          </div>
						                          <div class=" col-lg-3 col-sm-12">
						                           <b>Lleva iva </b><br>
						                           <label class="form-control-sm"><input type="radio" name="opc" id="opcsi" value="si"> Si</label>
						                           <label class="form-control-sm"><input type="radio" name="opc" id="opcno" value="no" checked> No</label>
						                        </div> 
						                     </div>								                     
						                     <div class="row">
						                     	<div class="col-lg-6 col-sm-12">
						                              <b><code>*</code>Localizacion</b><br>
						                            <select class="form-select form-control-sm" id="ddl_localizacion" style="width: 100%;">
						                              <option>Seleccione Custodio</option>
						                            </select>
						                          </div>    
						                         <div class="col-lg-3 col-sm-12">
						                         <b>Modelo </b><br>
						                         <input type="text" class="form-control form-control-sm" name="" id="txt_modelo">
						                         </div>
						                          <div class="col-lg-3 col-sm-12">
						                         <b>Serie </b><br>
						                         <input type="text" class="form-control form-control-sm" name="" id="txt_serie">
						                         </div>         
						                     </div>
						                     <div class="row">
						                     	 <div class="col-lg-4 col-sm-6">
						                           <b>Fecha de Ingreso </b><br>
						                           <input type="date" class="form-control form-control-sm" name="" id="txt_fecha" readonly>
						                         </div>  
						                         <div class="col-lg-4 col-sm-6">
						                     		<b>Controlar inventario</b><br>
						                      		<label  class="form-control-sm"><input type="radio" name="opcInv" id="opcInv1" value="1"> Si</label>
						                      		<label  class="form-control-sm"><input type="radio" name="opcInv" id="opcInv0" value="0" checked> No</label>
						                     	</div>

						                         <div class="col-lg-4 col-sm-12">
						                             <b><code>*</code>Marca</b><br>
						                             <select class="form-select form-control-sm" id="ddl_marca" style="width: 100%;">
						                               <option>Selecciones</option>
						                             </select>
						                         </div>
						                          <div class="col-lg-4 col-sm-12">
						                           <b><code>*</code>Genero</b> <br>
						                           <select class="form-select form-control-sm" id="ddl_genero" style="width: 100%;">
						                             <option>Selecciones</option>
						                           </select>
						                         </div>  
						                         <div class="col-lg-4 col-sm-12">
						                            <b><code>*</code>Estado</b> <br>
						                            <select class="form-control-sm form-select" id="ddl_estado" style="width: 100%;">
						                              <option>Selecciones</option>
						                            </select>
						                         </div>
						                        
						                         <div class="col-lg-4 col-sm-12">
						                            <b><code>*</code>Color </b><br>
						                            <select class="form-select form-control-sm" id="ddl_color" style="width: 100%;">
						                              <option>seleccione</option>
						                            </select>
						                         </div>  
						                     </div>
						                    <div class="row">
						                      <div class="col-sm-12">
						                         <b>Caracteristica </b><br>
						                         <input type="text" class="form-control form-control-sm" name="" id="txt_carac">
						                         </div>                                                     
						                     </div>	

								            </div>                 	
					                   </div>
					                </div>
					            </div>

					        </div>                        
					  </div>
					</div>		
				

				 <div class="tab-pane fade card" id="menu1">
					<div class="card">
				 		<div class="card-body">		
						 	<div class="row">
						 		<div class="col-sm-12">				 			
							  		<h1 class="h3 mb-4" id="">Agregar Materia prima</h1>
						 		</div>
						 	</div>	  		
							<div class="row">
								<div class="col-lg-9 col-sm-12">
							  		<div class="row">
							  			<div class="col-sm-6">
									  		<label class="mb-0"><b>Materia prima</b></label>
									  		<select class="form-select" id="ddl_materia" name="ddl_materia" onchange="" style="width: 100%;">
									  			<option value="">Seleccione materia prima</option>
									  		</select>					  				
									  	</div>
							  			<div class="col-sm-2">
								            <b>cantidad</b>
									  		<input type="" name="txt_cant_materia" id="txt_cant_materia" class="form-control form-control-sm" value="0">
									  	</div>
									  	<div class="col-sm-2">								                  
								            <b>Peso(kg)</b>
									  		<input type="" name="txt_peso_materia" id="txt_peso_materia" class="form-control form-control-sm" value="0">
									  	</div>	
									  	<div class="col-sm-2"><br>
									  		<button class="btn btn-primary btn-sm" onclick="materia_prima_add()"><i class="fa fa-arrow-down"></i> Agregar</button>
									  	</div>					  					
							  		</div>
							  	</div>
							  	<div class="col-lg-9 col-sm-12">
							  		<div class="row">
							  			<table class="table table-hover">
							  				<thead>
							  					<th>Materia prima</th>
							  					<th>Canti</th>
							  					<th>Peso(Kg)</th>
							  					<th></th>
							  				</thead>
							  				<tbody id="tbl_materia">
							  					<tr>
							  						<td></td>
							  						<td></td>
							  						<td></td>
							  						<td></td>
							  					</tr>
							  				</tbody>					  						
							  			</table>
							  		</div>
							  	</div>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="menu2">
					<div class="card">
						<div class="card-body">
							<div class="row">
					  			<div class=" col-lg-8 col-sm-12 mb-2">
					  				<div class="row">
					  					<div class="col-sm-8 text-left">
					  						<b>Producto Adicional</b>
					  						<select class="form-select" id="ddl_producto_add" name="ddl_producto_add">
					  							<option>Seleccione producto</option>
					  						</select>
					  					</div>
					  					<div class="col-sm-4">
					  						<br>
					  						<button class="btn btn-sm btn-primary" onclick="adicionales_add()"><i class="fa fa-plus"></i> Agregar</button>
					  					</div>		  					
					  				</div>
					  			</div>
					  			<div class="col-lg-8 col-sm-12">
					  				<table class="table table-hover">
					  					<thead>
					  						<th>Producto</th>
					  						<th></th>
					  					</thead>
					  					<tbody id="tbl_adicional">
					  						<tr>
					  							<td colspan="3">No se encontraron adicionales</td>
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
</main>

<div class="modal fade" id="nueva_categoria"  data-backdrop="static" data-keyboard="false" style="overflow-y: none;">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva categoria</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
            	<b>Nombre de categoria</b>
            	<input type="" name="txt_new_cate" id="txt_new_cate" class="form-control-sm form-control">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_categoria()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>



<?php include('footer.php'); ?>