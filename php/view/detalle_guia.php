<?php include('header.php'); 
date_default_timezone_set('America/Guayaquil');
$id = '';
?>
<script type="text/javascript">
    var usu = '<?php echo $_SESSION['INICIO']['ID_USUARIO']; ?>' ;
    var empresa = '<?php echo $_SESSION['INICIO']['ID_EMPRESA']; ?>' ;
    var estado = '<?php if(isset($_GET['estado'])){ echo $_GET['estado'];}else{echo 'P';} ?>' ;
</script>
<script src="../js/guias_remision.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
     var id = '<?php if(isset($_GET['id'])){ $id = $_GET['id']; echo $_GET['id']; };?>';        
     $('#txt_nota').val(id);
     if(id!='')
     {
     	detalle_guia(id)
    	cargar_lineas_guia(id);
    	AdoPersonas()
		DCEmpresaEntrega()
     }else
     {        
     	serie = '<?php echo $_SESSION['INICIO']['SERIE']; ?>';
     	codigo_secuencial(tipo='GR',campo='LblGuiaR',texto=1,autorizacion='LblAutGuiaRem',texto2=1);
	 	$('#LblSerieGuiaR').text(serie);
	 	DCCiudadI();
	 	DCCiudadF();
	 	AdoPersonas();
	 	DCEmpresaEntrega();
 	}
 	if(estado=='P' || estado=='' && id!='')
 	{
 		$('#btn_eliminar').css('display','initial');
 	}
});

</script>	
<!-- Begin Page Content -->
<main class="content">
    <div class="container-fluid p-0">    <!-- Page Heading -->
      <h1 class="h3 mb-3"><strong>Guia de remision </strong><strong id="lbl_anulado" style="display:none;"><u>ANULADO</u></strong></h1>
      <div class="row">
    	<div class="col-sm-10">    		
    		<a class="btn btn-default btn-sm" style="border: 1px solid;" href="lista_guia.php"><i class="fa fa-arrow-left"></i> Regresar</a>
            <button class="btn btn-default btn-sm" style="border: 1px solid;" onclick="pdf_guia()"><i class="fa fa-print"></i> Imprimir</button>
            <button class="btn btn-info btn-sm" style="border: 1px solid;" onclick="modal_email()"><i class="fa fa-envelope"></i> Enviar</button>
            <button class="btn btn-warning btn-sm" style="border: 1px solid;" id="btn_autorizar" onclick="$('#modal_auto').modal('show')"><i class="fa fa-paper-plane"></i> Autorizar</button>
            <button class="btn btn-danger btn-sm" style="border: 1px solid;display: none;" id="btn_sri_error" onclick="modal_error_seri($('#LblAutGuiaRem').text(),'GUIA_REMISION')"><i class="fa fa-eye"></i> Ver error en xml guia</button>    
             <button class="btn btn-danger btn-sm" style="border: 1px solid;display: none;" id="btn_sri_error_fac" onclick="modal_error_seri($('#lbl_autorizacion_fac').text(),'FACTURAS')"><i class="fa fa-eye"></i> Ver error en xml guia</button>      
    	</div>
        <div class="col-sm-2 text-end">
        <button class="btn btn-sm btn-danger" style="display:none;" id="btn_eliminar" onclick="eliminar_nota(<?php echo $id; ?>)"><i class="fa fa-trash"></i> Eliminar</button>    
        <button class="btn btn-sm btn-danger" style="display:none;" id="btn_anular" onclick="anular_nota(<?php echo $id; ?>)"><i class="fa fa-times-circle"></i> Anular</button>          
        </div> 
                  	
    </div>
    <hr>
    <form id="form_guia">
        <div class="row">
        	<div class="col-sm-10">
        		<div class="row">
        			<div class="col-sm-2">
		            	<b style="padding: 0px">Fecha de guia</b>                          
		            	<input type="date" name="MBoxFechaGRE" id="MBoxFechaGRE" class="form-control form-control-sm"value="<?php echo date('Y-m-d'); ?>" onblur="MBoxFechaGRE_LostFocus()">
		          	</div>
		          	<div class="col-sm-5">
						Cliente
						<select class="form-select form-select-sm" id="ddl_cliente" name="ddl_cliente">
							<option value="">Seleccione cliente</option>
						</select>
					</div>
					<div class="col-sm-3">
						CI/RUC 
						<input type="text" name="txt_ci" id="txt_ci" class="form-control form-control-sm" readonly>
					</div>	
					<div class="col-sm-2">
						Telefono
						<input type="text" name="txt_telefono" id="txt_telefono" class="form-control form-control-sm">
					</div>				
					<div class="col-sm-3">
						Email
						<input type="text" name="txt_email" id="txt_email" class="form-control form-control-sm">
					</div>
					
					<div class="col-sm-5">
						Direccion
						<input type="text" name="txt_direccion" id="txt_direccion" class="form-control form-control-sm">
					</div>
					<div class="col-sm-3">
						Autorizacion
						<label id="LblAutGuiaRem" name="LblAutGuiaRem"></label>
					</div>				            
        		</div>        		
        	</div>
        	<div class="col-sm-2 text-center">
				<b>No Guia remision</b><br>
				<label id="LblSerieGuiaR">001-001</label>
				<h1 class="h3 mb-4 text-gray-800" id="LblGuiaR">0</h1>  				
			</div>          	
		</div>
		<hr>
		<div class="row" id="pane_factura">
			<div class="col-sm-2">
				<b>Fecha factura</b>
				<label id="lbl_fecha_fac"></label>
			</div>
			<div class="col-sm-1">
				<b>Serie</b>
				<label id="lbl_serie_fac"></label>
			</div>
			<div class="col-sm-1">
				<b>Factura</b><br>
				<label id="lbl_numero_fac"></label>
				<input type="hidden" name="id_factura" id="id_factura">
			</div>
			<div class="col-sm-1">
				<b>Estado</b><br>				
				<label id="estado_fac"></label>
			</div>
			<div class="col-sm-5">
				<b>Autorizacion factura</b>
				<label id="lbl_autorizacion_fac"></label>
			</div>
			<div class="col-sm-2 text-end">
				<br>
				<button type="button" class="btn btn-primary btn-sm" id="btn_ver_factura" style="display:none;" onclick="ver_factura()"><i class="fa fa-eye"></i>Ver factura</button>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-2">
                <b  style="padding: 0px">Inicio del traslados</b>
                <input type="date" name="MBoxFechaGRI" id="MBoxFechaGRI" class="form-control form-control-sm"value="<?php echo date('Y-m-d'); ?>">
    	    </div>
	       	<div class="col-sm-4">
            	<b style="padding: 0px">Ciudad</b>                          
                <select class="form-select form-select-sm" id="DCCiudadI" name="DCCiudadI" style="width:100%">
                	<option value=""></option>
                </select>
          	</div>
            <div class="col-sm-2">
                <b style="padding: 0px">Fin del traslados</b>
                <input type="date" name="MBoxFechaGRF" id="MBoxFechaGRF" class="form-control form-control-sm"value="<?php echo date('Y-m-d'); ?>">
            </div>
	        <div class="col-sm-4">
	       	   <b  style="padding: 0px">ciudad</b>
	           <select class="form-select form-select-sm" id="DCCiudadF" name="DCCiudadF" style="width:100%">
	                <option value=""></option>
	           </select>
	        </div>
	        <div class="col-sm-6">
            	<b>Nombre o razon socila (Transportista)</b>
              	<select class="form-select form-select-sm" id="DCRazonSocial" name="DCRazonSocial" style="width:100%">
                  	<option value=""></option>
              	</select>
          	</div>
          	<div class="col-sm-6">
            	<b>Empresa de Transporte</b>
              	<select class="form-select form-select-sm" id="DCEmpresaEntrega" name="DCEmpresaEntrega" style="width:100%">
                <option value=""></option>
              	</select>
          	</div>
	        <div class="col-sm-2">
	            <b>Placa</b>
	            <input type="text" name="TxtPlaca" id="TxtPlaca" class="form-control form-control-sm"
	                  value="XXX-999">
	        </div>
	        <div class="col-sm-2">
	            <b>Pedido</b>
	            <input type="text" name="TxtPedido" id="TxtPedido" class="form-control form-control-sm">
	        </div>
	        <div class="col-sm-3">
	            <b>Zona</b>
	            <input type="text" name="TxtZona" id="TxtZona" class="form-control form-control-sm">
	        </div>
	        <div class="col-sm-5">
	            <b>Lugar entrega</b>
	            <input type="text" name="TxtLugarEntrega" id="TxtLugarEntrega" class="form-control form-control-sm">
	        </div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">						
                        <input type="hidden" name="txt_guia" id="txt_guia">
                        <input type="hidden" name="txt_llevaiva" id="txt_llevaiva">
                        <input type="hidden" name="txt_idpro" id="txt_idpro">
						<div class="row" id="form_add_producto">
							<div class="col-sm-2" style="padding-right: 0px;">
								referencia
								<input type="text" name="txt_codigo" id="txt_codigo" class="form-control form-control-sm" onfocus="abrir_productos('ref')">
							</div>			
							<div class="col-sm-3">
								Producto
								<input type="text" name="txt_articulo" id="txt_articulo" class="form-control form-control-sm" onfocus="abrir_productos('det')">
							</div>
							<div class="col-sm-1">
								Cant
								<input type="text" name="txt_can" id="txt_can" class="form-control form-control-sm" value="0" onblur="calcular()">
							</div>
							<div class="col-sm-1">
								P.v.p
								<input type="text" name="txt_pvp" id="txt_pvp" class="form-control form-control-sm" value="0.00" onblur="calcular()">
							</div>
							<div class="col-sm-1" style="padding: 0px;">
								<b>Iva <label id="lbl_iva" style="padding:0px;margin: 0px;"><?php echo $_SESSION['INICIO']['IVA']?></label>%</b>
								<input type="text" name="txt_iva" id="txt_iva" class="form-control form-control-sm" readonly>
							</div>
							<div class="col-sm-1" style="padding: 0px;">
								Dstc.
								<input type="text" name="txt_dcto" id="txt_dcto" class="form-control form-control-sm" value="0.00" onblur="calcular()">
							</div>
							<div class="col-sm-1" style="padding: 0px;">
								SubTotal
								<input type="text" name="txt_sub" id="txt_sub" class="form-control form-control-sm" readonly value="0.00">
							</div>		
							<div class="col-sm-1" style="padding: 0px;">
								Total
								<input type="text" name="txt_total" id="txt_total" class="form-control form-control-sm" readonly value="0.00">
							</div>
							<div class="col-sm-1">
								<br>
								<button type="button" class="btn btn-primary btn-sm" onclick="agregar_guia()">Agregar</button>
							</div>
						</div>
						<div class="row">
							<table class="table table-hover">
								<thead>
									<th></th>
									<th>Referencia</th>
									<th>Articulo</th>
									<th>Cant</th>
									<th>Pvp</th>
									<th>Dscto</th>
									<th>iva</th>
									<th>subtotal</th>
									<th>Total</th>
								</thead>
								<tbody id="tbl_datos">
									<tr>
										<td colspan="6">Sin items</td>
									</tr>
								</tbody>
							</table> 
						</div>
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-bordered dataTable table-sm text-center">
                                    <tr class="text-primary">
                                        <td colspan="5" width="60%"></td>
                                        <td>TOTAL DCTO</td>
                                        <td>TOTAL IVA</td>
                                        <td>SUBTOTAL</td>
                                        <td>TOTAL</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>                                            
                                        <td><label style="margin:0px" id="lbl_totDcto">0.00</label> </td>
                                        <td><label style="margin:0px" id="lbl_totIva">0.00</label></td>
                                        <td><label style="margin:0px" id="lbl_subtot">0.00</label></td>
                                        <td><label style="margin:0px" id="lbl_tot">0.00</label></td>
                                    </tr>                                             
                                </table>
                           
							</div>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
</main>

<div class="modal" id="myModal_productos" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="padding:1%">
        <h5 class="modal-title">Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-2">
                <label><input type="radio" name="opc" id="OpcP" checked value="P"  onclick="lista_articulos()">Producto</label>
                <label><input type="radio" name="opc" id="OpcS" value="S" onclick="lista_articulos()">Servicio</label>
            </div>
            <div class="col-sm-3">
                <b>Referencia</b>
                <input type="text" name="txt_ref" id="txt_ref" class="form-control form-control-sm" onkeyup="lista_articulos()">
            </div>
            <div class="col-sm-4">
                <b>Producto</b>
                <input type="text" name="txt_query" id="txt_query" class="form-control form-control-sm" onkeyup="lista_articulos()">
            </div>
            <div class="col-sm-3">
                <b>Categoria</b><br>
                <select class="form-control-sm form-control" style="width:100%" id="ddl_categoria" name="ddl_categoria" onchange="lista_articulos()">
                    <option value="">Categoria</option>
                </select>
            </div>            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered dataTable table-sm">
                    <thead class="text-primary">
                        <th>Referencia</th>
                        <th>Producto</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Peso</th>
                        <th>Medida</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Categoria</th>
                    </thead>
                    <tbody id="tbl_productos">
                       
                        
                    </tbody>
                </table>
            </div>       
            
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="limpiar()">Close</button>
      </div>

    </div>
  </div>
</div>


<div class="modal" tabindex="-1" id="modal_auto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Autorizar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<div class="d-flex align-items-start">
		  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Guia de remision</button>
		    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Guia de remision y factura</button>
		  </div>
		  <div class="tab-content col-7" id="v-pills-tabContent">
		    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
		    	<div class="row">
		    		<div class="col-sm-7">
		    			<br>
		    			<button class="btn btn-primary btn-sm" id="btn_cargar_datos_fac_guia" style="display:none;" onclick="cargar_datos_fac()">Tomar datos de guia</button>
		    		</div>
		    		<div class="col-sm-5">
		    			<b>Fecha</b>
		    			<input type="date" name="fecha_fac" id="fecha_fac" class="form-control form-control-sm">
		    		</div>		    		
		    		<div class="col-sm-6">
		    			<b>Serie</b>
		    			<div class="row">
		    				<div class="col-sm-6" style="padding-right: 0px;">
		    					<input type="" name="estab" id="estab" class="form-control form-control-sm" placeholder="001">	
		    				</div>
		    				<div class="col-sm-6" style="padding-left: 0px;">
		    					<input type="" name="punto" id="punto" class="form-control form-control-sm" placeholder="001">	
		    				</div>
		    			</div>
		    		</div>
		    		<div class="col-sm-6">
		    			<b>Factura</b>
		    			<input type="" name="numero_fac" id="numero_fac" class="form-control form-control-sm" placeholder="numero">
		    		</div>		    		
		    		<div class="col-sm-12">
		    			<b>Autorizacion</b>
		    			<input type="" name="auto_fac" id="auto_fac" class="form-control form-control-sm" style="font-size: 10px;" placeholder="1234567890">
		    		</div>		    		 
		    	</div>
		    	<div class="row">
		    		<div class="text-end">
		    			<br>
		    			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			    	    <button type="button" class="btn btn-primary" onclick="generar_guia()">Generar</button>
			    		    			
		    		</div>
			    </div>
		    </div>
		    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
		    	<div class="row">
		    		<div class="text-end">
				        <div class="col-sm-12">
				            <b>Forma de pago de factura</b>
				            <select class="" style="width: 100%;" id="DCTipoPago">
				                <option value="">Seleccione tipo de pago</option>
				            </select>
				        </div>
		    			<br>
		    			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			    	    <button type="button" class="btn btn-primary" onclick="generar_guia_fac()">Generar</button>			    		    			
		    		</div>
			    </div>		    	
		    </div>
		  </div>
		</div>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>


