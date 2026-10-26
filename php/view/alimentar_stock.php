<?php include('header.php'); //print_r($_SESSION["INICIO"]);die();?>
<script src="../js/js_system/alimentar_stock.js"></script> 
<script type="text/javascript">
    var val_iva = '<?php echo $_SESSION["INICIO"]["IVA"]; ?>';
$(document).ready(function () { 
    categorias();
	lista_materia_prima_ddl();
	lista_prove_ddl();
	listar_kardex();
})
</script>
<style type="text/css">
 .select2-container--open{
    z-index:9999999
}
</style>


<div class="card shadow mb-4">               
    <div class="card-body">
       <div class="row">
           	<div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <b>Proveedor</b><br>
                    <div class="d-flex input-group">
                        <select class="form-select  flex-grow-1" id="ddl_prove" style="width:90%">
                            <option value="">Seleccione Proveedor</option>
                        </select>  
                         <div class="input-group-append">
                            <button class="btn btn-primary btn-sm p-2" type="button" title="Nuevo Proveedor" onclick="$('#modal_nuevo_proveedor').modal('show')"><i class="fa fa-user-plus"></i></button>
                        </div>
                    </div>
                </div>                  		
			</div>
           	<div class=" col-lg-2 col-sm-4">
           		<b>Fecha</b>
           		<input type="date" name="txt_fecha" id="txt_fecha" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>" readonly>
           	</div>
           	<div class="col-lg-2 col-sm-3">
           		<b>Factura</b>
           		<input type="text" name="txt_Factura" id="txt_Factura" class="form-control form-control-sm" placeholder="0">
           	</div>                   
           	<div class="col-lg-2 col-sm-3">
           		<b>Serie</b>
           		<input type="text" name="txt_serie" id="txt_serie" class="form-control form-control-sm" placeholder="001-001">
           	</div>
           	<div class="col-lg-6 col-sm-12">
           		<b>Producto</b>
           		<div class=" d-flex input-group">                   			
           			<select class="form-select flex-grow-1" id="ddl_materia" style="width:90%">
           				<option value="">Seleccione Producto</option>
           			</select>    
                    <div class="input-group-append">            	                   			
					 <button class="btn btn-primary btn-sm p-2" type="button" title="Nuevo Articulos" onclick="$('#modal_nuevo_producto').modal('show')"><i class="fa fa-box"></i></button>
                    </div>
				</div>
			</div>
			<div class="col-lg-2 col-sm-4">
           		<b>Fecha Fab</b>
           		<input type="date" name="txt_fecha_f" id="txt_fecha_f" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>">
           	</div>
           	<div class="col-lg-2 col-sm-4">
           		<b>Fecha Exp</b>
           		<input type="date" name="txt_fecha_e" id="txt_fecha_e" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>">
           	</div>
           	<div class="col-lg-2 col-sm-4">
           		<b>lleva iva</b><br>
           		<label><input type="radio" name="rbl_iva" id="rbl_si" value="si" onclick="calcular()"> Si</label>
           		<label><input type="radio" name="rbl_iva" id="rbl_no" value="no" onclick="calcular()" checked=""> No</label>
           	</div>
           	<div class="col-lg-1 col-sm-3">
           		<b>Stock</b>
           		<input type="text" name="txt_stock" id="txt_stock" class="form-control form-control-sm" readonly>
           	</div>    
           	<div class="col-lg-2 col-sm-3">
           		<b>Pvp Ref</b>
           		<input type="text" name="txt_pvp_ref" id="txt_pvp_ref" class="form-control form-control-sm" readonly>
           	</div>     
           	<div class="col-lg-1 col-sm-3">
           		<b id="titulo_cant">Cant.</b>
           		<input type="text" name="txt_cantidad" id="txt_cantidad" class="form-control form-control-sm" onblur="calcular()" placeholder="0">
           	</div>
           	<div class="col-lg-2 col-sm-3">
           		<b>PVP</b>
           		<input type="text" name="txt_precio" id="txt_precio" class="form-control form-control-sm" onblur="calcular()" placeholder="0">
           	</div>
           	<div class="col-lg-2 col-sm-3">
           		<b>SubTotal.</b>
           		<input type="text" name="txt_sub" id="txt_sub" class="form-control form-control-sm" readonly value="0">
           	</div>
           	<div class="col-lg-2 col-sm-3">
           		<b>Total IVA</b>
           		<input type="text" name="txt_iva" id="txt_iva" class="form-control form-control-sm" readonly value="0">
           	</div>
           	<div class="col-lg-2 col-sm-3">
           		<b>Total</b>
           		<input type="text" name="txt_total" id="txt_total" class="form-control form-control-sm" readonly value="0">
           	</div>                   	              
           	<div class="col-lg-12 col-sm-3 text-right"> <br>
           		<button class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-save"></i> Guardar</button>
           	</div>
       </div>
   </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <head>
                        <th>Codigo</th>
                        <th>Producto</th>
                        <th>Cant</th>
                        <th>PvP</th>
                        <th>Subtotal</th>
                        <th>Iva</th>
                        <th>Total</th>
                    </head>
                    <tbody id="tbl_kardex">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
           <div class="col-sm-12 text-end">
               <button class="btn btn-primary btn-sm" onclick="generar_ingresos()">Generar Ingreso</button>
           </div>
       </div>       
    </div>
</div>

            

<div class="modal fade" id="modal_nuevo_proveedor"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo proveedor</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="col-sm-7">
                        <b>Nombre</b>
                        <input type="" name="txt_nombre_pro" id="txt_nombre_pro" class="form-control form-control-sm" onkeyup="mayusculas('txt_nombre_pro',this.value)" />
                    </div>
                     <div class="col-sm-5">
                        <b>CI / RUC</b>
                        <input type="" name="txt_ci_pro" id="txt_ci_pro" class="form-control form-control-sm" onkeyup=" num_caracteres('txt_ci_pro',13)">
                    </div>
                     <div class="col-sm-12">
                        <b>Razon social</b>
                        <input type="" name="txt_razon_pro" id="txt_razon_pro" class="form-control form-control-sm" onkeyup="mayusculas('txt_razon_pro',this.value)" />
                    </div>
                     <div class="col-sm-6">
                        <b>Telefono</b>
                        <input type="" name="txt_telefono_pro" id="txt_telefono_pro" class="form-control form-control-sm" onkeyup="num_caracteres('txt_telefono_pro',10)">
                    </div>
                     <div class="col-sm-6">
                        <b>Email</b>
                        <input type="" name="txt_email_pro" id="txt_email_pro" class="form-control form-control-sm">
                    </div>
                     <div class="col-sm-12">
                        <b>Direccion</b>
                        <textarea class="form-control-sm form-control" style="resize:none" id="txt_dir_pro" name="txt_dir_pro"></textarea>
                    </div>                    
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="guardar_nuevo_proveedor()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick=" limpiar_prove_new();">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_nuevo_producto"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Producto</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="col-sm-3">
                        <b>Referencia</b>
                        <input type="" name="txt_referencia" id="txt_referencia" class="form-control">
                    </div>
                     <div class="col-sm-7">
                        <b>Producto</b>
                        <input type="" name="txt_nombre_art" id="txt_nombre_art" class="form-control">
                    </div>
                     <div class="col-sm-2">
                        <b>Precio uni</b>
                        <input type="" name="txt_precio_art" id="txt_precio_art" class="form-control">
                    </div>
                     <div class="col-sm-2">
                        <b>Lleva iva</b>
                        <label><input type="radio" name="rbl_iva_art" id="rbl_iva_art" value="si">Si</label>
                        <label><input type="radio" name="rbl_iva_art" id="rbl_iva_art_no" value="no" checked="">No</label>
                    </div>
                     <div class="col-sm-2">
                        <b>Inventario</b>
                        <label><input type="radio" name="rbl_inventario" id="rbl_inventario" value="si">Si</label>
                        <label><input type="radio" name="rbl_inventario" id="rbl_inventario_no" value="no" checked="">No</label>
                    </div>
                     <div class="col-sm-8">
                         <b>Categoria</b>
                         <div class="input-group">
                            <select class="form-select" id="ddl_categoria" style="width:85%">
                              <option value="">Seleccione Categoria</option>
                            </select>
                            <button class="btn btn-secondary btn-sm" type="button" title="Nuevo Articulos" onclick="$('#nueva_categoria').modal('show');"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                     <div class="col-sm-4">
                         <b>Unidad Medida</b><br>
                        <label><input type="radio" name="rbl_medida" id="rbl_medida_uni" value="uni" class="" checked="">Uni</label>
                        <label><input type="radio" name="rbl_medida" id="rbl_medida_kg" value="kg" class="" >KG</label>
                    </div>
                    <div class="col-sm-2">
                        <b>Max</b>
                        <input type="" name="txt_max_art" id="txt_max_art" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <b>Min</b>
                        <input type="" name="txt_min_art" id="txt_min_art" class="form-control">
                    </div>

                    
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="guardar_art()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpiar_art_new()">Cancelar</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="nueva_categoria"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content" style="border: 1px solid;" >
            <div class="modal-header">
                <h5 class="modal-title">Nueva categoria</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body m-3">
                <b>Nombre de categoria</b>
                <input type="" name="txt_new_cate" id="txt_new_cate" class="form-control-sm form-control">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_categoria()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>




<?php include('footer.php'); ?>