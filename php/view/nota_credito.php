<?php include('header.php'); 
date_default_timezone_set('America/Guayaquil');
$id = '';
?>
<script type="text/javascript">
    var usu = '<?php echo $_SESSION['INICIO']['ID_USUARIO']; ?>' ;
    var empresa = '<?php echo $_SESSION['INICIO']['ID_EMPRESA']; ?>' ;
    var estadofac = '<?php echo $_GET['estado']; ?>' ;
</script>
<script src="../js/nota_credito.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
     var id = '<?php if(isset($_GET['id'])){ $id = $_GET['id']; echo $_GET['id']; };?>';        
     $('#txt_nota').val(id);
     if(id!='')
     {
    	cargar_nota_credito(id);
    	cargar_lineas_nota(id);
     }else
     {        
     	serie = '<?php echo $_SESSION['INICIO']['SERIE']; ?>';
     	codigo_secuencial(tipo='NC',campo='txt_Nonota',texto=1,autorizacion='lbl_autorizacion',texto2=1);
	 	$('#txt_serie').text(serie);
 	}
 	if(estadofac=='P' || estadofac=='' && id!='')
 	{
 		$('#btn_eliminar').css('display','initial');
 	}
});

</script>	
<!-- Begin Page Content -->
<main class="content">
    <div class="container-fluid p-0">    <!-- Page Heading -->
      <h1 class="h3 mb-3"><strong>Notas de credito </strong><strong id="lbl_anulado" style="display:none;"><u>ANULADO</u></strong></h1>
      <div class="row">
    	<div class="col-sm-10">    		
    		<a class="btn btn-default btn-sm" style="border: 1px solid;" href="lista_nota_credito.php"><i class="fa fa-arrow-left"></i> Regresar</a>
            <button class="btn btn-default btn-sm" style="border: 1px solid;" onclick="pdf_nota_credito()()"><i class="fa fa-print"></i> Imprimir</button>
            <button class="btn btn-info btn-sm" style="border: 1px solid;" onclick="modal_email()"><i class="fa fa-envelope"></i> Enviar</button>
            <button class="btn btn-warning btn-sm" style="border: 1px solid;" id="btn_autorizar" onclick="valida_nota()"><i class="fa fa-paper-plane"></i> Autorizar</button>
            <button class="btn btn-info btn-sm" style="border: 1px solid;" onclick="modal_email()"><i class="fa fa-envelope"></i> Enviar</button>
            <button class="btn btn-danger btn-sm" style="border: 1px solid;display: none;" id="btn_sri_error" onclick="modal_error_seri($('#lbl_autorizacion').text(),'NOTAS_CREDITO')"><i class="fa fa-eye"></i> Ver error en xml</button>      
    	</div>
        <div class="col-sm-2 text-end">
        <button class="btn btn-sm btn-danger" style="display:none;" id="btn_eliminar" onclick="eliminar_nota(<?php echo $id; ?>)"><i class="fa fa-trash"></i> Eliminar</button>    
        <button class="btn btn-sm btn-danger" style="display:none;" id="btn_anular" onclick="anular_nota(<?php echo $id; ?>)"><i class="fa fa-times-circle"></i> Anular</button>          
        </div> 
                  	
    </div>
    <hr>
    <form id="form_datos">
		<div class="row">
			<div class="col-sm-10">
				<div class="row">
					<div class="col-sm-2">
						Fecha de nota
						<input type="date" name="txt_fecha" id="txt_fecha" class="form-control form-control-sm" value="<?php echo date('Y-m-d')?>">
					</div>
					<div class="col-sm-5">
						cliente
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
						<label id="lbl_autorizacion"></label>
					</div>					
				</div>				
			</div>
			<div class="col-sm-2 text-center">
				<b>No nota de Credito</b><br>
				<label id="txt_serie">001-001</label>
				<h1 class="h3 mb-4 text-gray-800" id="txt_Nonota">0</h1>  				
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-sm-2">
				Fecha de documento
				<input type="date" name="txt_fecha_doc" id="txt_fecha_doc" class="form-control form-control-sm" value="<?php echo date('Y-m-d')?>">
			</div>
			<div class="col-sm-3">
				<b>Tipo de documento</b>
				<select class="form-select form-select-sm" id="ddl_tipo_doc" name="ddl_tipo_doc">
					<option value="1">Factura</option>
				</select>
			</div>			
			<div class="col-sm-2">
				<b>Serie de documento</b>
				<div class="row">
					<div class="col-sm-6" style="padding-right: 0px">
						<input type="text" name="txt_estab" id="txt_estab" class="form-control form-control-sm" placeholder="001">
					</div>
					<div class="col-sm-6" style="padding-left: 0px">
						<input type="text" name="txt_punto" id="txt_punto" class="form-control form-control-sm" placeholder="001">
					</div>
				</div>
			</div>
			<div class="col-sm-2">
				No. de Documento
				<input type="text" name="txt_num_doc" id="txt_num_doc" class="form-control form-control-sm" placeholder="0000000001">
			</div>	
			<div class="col-sm-3">
				Autorizacion
				<input type="text" name="txt_autorizacion_doc" id="txt_autorizacion_doc" class="form-control form-control-sm">
			</div>
			<div class="mb-3 row">
				<label class="col-form-label col-sm-1">Motivo</label>
				<div class="col-sm-11">
					<textarea class="form-control-sm form-control" style="resize:none;" rows="1" placeholder="Motivo de la nota de credito" id="txt_motivo" name="txt_motivo"></textarea>
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">						
                        <input type="hidden" name="txt_nota" id="txt_nota">
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
								<button type="button" class="btn btn-primary btn-sm" onclick="agregar_nota()">Agregar</button>
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

<?php include('footer.php'); ?>


