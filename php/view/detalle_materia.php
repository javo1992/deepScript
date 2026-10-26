<?php include('header.php'); $id='';  ?>
<script src="../js/lista_materia_prima.js"></script> 
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

        <h1 class="h3 mb-3"><strong>Detalle de materia prima</strong></h1>
        <div class="row">
        	<div class="col-sm-6">
        		<a href="materia_prima.php" class="btn btn-sm btn-default" style="border:1px solid;"><i class="fa fa-arrow-left"></i> Regresar</a>
        		<a href="detalle_materia.php" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Nuevo</a>
        	</div>
        </div>
        <br>

					  	<div class="row">
					         <div class="col-lg-12">
					            <!-- Basic Card Example -->
					            <div class="card shadow mb-8">            	
					                <div class="card-header py-3">
					                <div class="row">
					                	<div class="col-sm-9">
					                		<!-- <button class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Guardar</button> -->
					                	</div>
					                	<div class="col-sm-3 text-end">
					                		<button class="btn btn-primary btn-sm" onclick="add_edit()"><i class="fa fa-save"></i> Guardar</button>
					                		<?php if($id!=''){echo '<button class="btn btn-danger btn-sm" onclick="eliminar()"><i class="fa fa-trash"></i> Eliminar</button>' ;} ?>
					                		
					                	</div>                	
					                </div>                	
					                    <!-- <h6 class="m-0 font-weight-bold text-primary" id="lbl_nombre">Name Basic Example</h6> -->
					                </div>
					                <div class="card-body">
					                   <div class="row">
					                   	<div class="col-sm-4">
					                   		 <form enctype="multipart/form-data" id="form_img" method="post" class="col-sm-12">
					                   		 	<input type="hidden" name="txt_id" id="txt_id">
						                   		<img src="../img/sistema/sin_imagen.jpg" style="border:1px solid; width: inherit;" id="img_articulo">
						                   		<br><br>
						                   		<input type="file" name="file_img" id="file_img" class="form-control form-control-sm">
						                   		<input type="hidden" name="txt_nom_img" id="txt_nom_img">
						                   		<button class="btn btn-primary btn-block" id="subir_imagen" type="button">Cargar imagen</button>
					                   		</form>                   		
					                   	</div>
					                   	<div class="col-sm-8">              
								                     <div class="row">
								                     	<div class="col-sm-8">
								                     		<b><code>*</code>Descripcion</b><br>
								                     		<input type="text" class="form-control form-control-sm" name="" id="txt_description">
								                     	</div>	
								                     	<div class="col-sm-4">
								                           <b>Codigo Barras </b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_barras">
								                         </div> 
								                     </div>
								                     <div class="row">
								                     	<div class="col-sm-8">
								                     		<b>Descripcion 2</b><br>
								                     		<input type="text" class="form-control form-control-sm" name="" id="txt_description2">	
								                     	</div>
								                     	 <div class="col-sm-4">
								                             <b>Codigo Auxiliar </b><br>
								                             <input type="text" class="form-control form-control-sm" name="" id="txt_tag_anti">
								                           </div>   							                     	
								                     	
								                     </div>
								                     <div class="row">
								                         <div class="col-sm-4">
								                           <b><code>*</code>Referencia </b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_asset">
								                         </div>
								                         <div class="col-sm-4">
								                             <b>Tag RFID </b><br>
								                             <input type="text" class="form-control form-control-sm" name="" id="txt_rfid">
								                         </div>
								                         <div class="col-sm-4">
								                           <b>Lleva iva </b><br>
								                           <label class="form-control-sm"><input type="radio" name="opc" id="opcsi" value="si"> Si</label>
								                           <label class="form-control-sm"><input type="radio" name="opc" id="opcno" value="no" checked> No</label>
								                        </div>  
								                                              
								                     </div>

								                      <div class="row" style="margin-top:3px; margin-bottom:3px">
								                     	<div class="col-sm-4">
								                     	<b><code>*</code>Descontar stock por:  </b>
								                     	</div>
								                     	<div class="col-sm-3">
								                     		<label><input type="radio" id="cbx_uni" name="cbx_stock" value="Uni" checked onclick="calcular_stock()"> Unidades</label>
								                     	</div>
								                     	<div class="col-sm-3">
								                     		<label><input type="radio" id="cbx_kg" name="cbx_stock" value="kg" onclick="calcular_stock()"> Kilo Gramos</label>	                     		
								                     	</div>
								                     	<div class="col-sm-2">
								                     		<!-- <label><input type="radio" name="cbx_stock" value="l"> litros</label>	                     		 -->
								                     	</div>								                   
								                     </div>

								                     <div class="row">
								                      <div class="col-sm-3">
								                           <b title="Cantidad de paquetes existentes"><code>*</code>Cant. de Paque.</b><br>
								                           <input type="text" class="form-control form-control-sm" title="Cantidad de paquetes existentes" name="" id="txt_cant_paq" onblur="calcular_stock()">
								                         </div>
								                          <div class="col-sm-3">
								                     		<b title="Peso en kilogramos"><code>*</code>Peso(kg) C/U</b><br>
								                     		<input type="text" class="form-control form-control-sm" name="" id="txt_peso" value="0">
								                     	</div>
								                         <div class="col-sm-3">
								                           <b title="Unidades por paquete"><code>*</code>Unidades x paque.</b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_cant_x_paq" onblur="calcular_stock()">
								                         </div>	 
								                         <div class="col-sm-3">
								                           <b title="Unidades sueltas" id="suelto"><code>*</code>Unidades sueltas.</b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_cant_sueltas" onblur="calcular_stock()">
								                         </div>	 

								                        
								                     	
								                          <div class="col-sm-3">
								                           <b id="to_canti"><code>*</code>Cantidad Total</b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_cant" readonly>
								                         </div>	 

								                         <div class="col-sm-3">
									                         <b title="Peso en kilogramos por cada uno"><code>*</code>Unidad medida  </b><br>
									                         <input type="text" class="form-control form-control-sm" name=""  title="Peso en kilogramos por cada uno" id="txt_unidad" disabled>
								                         </div>
								                        
								                          <div class="col-sm-3">
								                           <b><code>*</code>Valor actual </b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_valor">
								                         </div>	               
								                     </div>
								                    
								                     <div class="row">
								                     	<div class="col-sm-2">
								                           <b><code>*</code>Minimo </b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_min" value="0">
								                         </div>  
								                         <div class="col-sm-2">
								                           <b><code>*</code>Maximo </b><br>
								                           <input type="text" class="form-control form-control-sm" name="" id="txt_max" value="0">
								                         </div>
								                          <div class="col-sm-4">
								                              <b><code>*</code>Localizacion</b><br>
								                            <select class="form-control form-control-sm" id="ddl_localizacion">
								                              <option>Seleccione Custodio</option>
								                            </select>
								                          </div> 
								                           <div class="col-sm-4">
								                            <b><code>*</code>Estado</b> <br>
								                            <select class="form-control-sm form-select" id="ddl_estado">
								                              <option>Selecciones</option>
								                            </select>
								                         </div>                      
								                     </div>
								                     
								                     <div class="row">
								                     
								                         <div class="col-sm-3">
								                         <b>Modelo </b><br>
								                         <input type="text" class="form-control form-control-sm" name="" id="txt_modelo">
								                         </div>
								                          <div class="col-sm-3">
								                         <b>Serie </b><br>
								                         <input type="text" class="form-control form-control-sm" name="" id="txt_serie">
								                         </div>
								                         <div class="col-sm-3">
								                           <b>Fecha de Ingreso </b><br>
								                           <?php if(isset($_GET['id'])){?>
								                           <input type="date" class="form-control form-control-sm" name="" id="txt_fecha" readonly>
								                       		<?php }else{?>
								                       			<input type="date" class="form-control form-control-sm" name="" id="txt_fecha" readonly value="<?php echo date('Y-m-d')?>">
								                       		<?php }?>
								                         </div>                       
								                     </div>
								                     <div class="row">
								                         <div class="col-sm-4">
								                             <b><code>*</code>Marca</b><br>
								                             <select class="form-control form-control-sm" id="ddl_marca">
								                               <option>Selecciones</option>
								                             </select>
								                         </div>								                        
								                         <div class="col-sm-4">
								                           <b><code>*</code>Genero</b> <br>
								                           <select class="form-control form-control-sm" id="ddl_genero">
								                             <option>Selecciones</option>
								                           </select>
								                         </div>  
								                         <div class="col-sm-4">
								                            <b><code>*</code>Color </b><br>
								                            <select class="form-control form-control-sm" id="ddl_color">
								                              <option>seleccione</option>
								                            </select>
								                         </div>  
								                     </div>
								                     <div class="row">
								                      <div class="col-sm-12">
								                         <b>Caracteristica </b><br>
								                         <textarea class="form-control" rows="3"  id="txt_carac"></textarea>
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