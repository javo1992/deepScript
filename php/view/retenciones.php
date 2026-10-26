<?php include('header.php'); 
$id = ''; $cli = '';$estado = 'P';
if(isset($_GET['id']))
{
	$id = $_GET['id'];
}

if(isset($_GET['estado']))
{
    $estado = $_GET['estado'];
}


?>
<script type="text/javascript">
    var usu = '<?php echo $_SESSION['INICIO']['ID_USUARIO']; ?>' ;
    var empresa = '<?php echo $_SESSION['INICIO']['ID_EMPRESA']; ?>' ;
</script>
<script src="../js/lista_retencion.js"></script>    
<script type="text/javascript">
$(document).ready(function () {
  DCTipoPago();
	id = '<?php echo $id; ?>';
    estado = '<?php echo $estado; ?>';
    if(estado=='A')
    {
        $("#panel_bienes_servicios").css('display','none');
        $("#panel_retenciones").css('display','none');
        $('#btn_autorizar').css('display','none');
    }
    if(estado=='P' || estado=='' && id!='')
    {
        $('#btn_eliminar').css('display','initial');
    }
	if(id!='')
	{
        $('#txt_idRET').val(id);
        $('#txt_estado').val(estado);
        lineas_impuestos(id);
        detalle_retencion(id);

	}else
	{
		$('#myModal_cliente').modal('show');
		serie = '<?php echo $_SESSION['INICIO']['SERIE']; ?>';
		$('#txt_serie').text(serie);
        codigo_secuencial('RE','txt_NoRet',1,'txt_autorizacionRET',1);
	}
});


function guardar()
{
	if($('#txt_ci').val()=='')
	{
		Swal.fire('Seleccione un cliente','','info');
		return false;
	}
	var datos = $('#form_cliente').serialize();
	$.ajax({
	  type: "POST",
	  url: '../controlador/clienteC.php?guardar_proveedor=true',
	  data: datos, 
	  dataType:'json',
	  success: function(data)
	  {
	  	$('#txt_id').val(data);
         cargar_cliente(data);
         $('#TxtNumSerieUno').focus();
	  }
	})
}



</script>	
<!-- Begin Page Content -->
<main class="content">
<div class="container-fluid p-0">
     <h1 class="h3 mb-3"><strong>RETENCION </strong><strong id="lbl_anulado" style="display:none;"><u>ANULADO</u></strong></h1>
    <div class="row">
    	<div class="col-sm-10">
            <a class="btn btn-default btn-sm" style="border: 1px solid;" href="lista_retenciones.php"><i class="fa fa-arrow-left"></i> Regresar</a>
            <button class="btn btn-default btn-sm" style="border: 1px solid;" onclick="pdf_retencion()"><i class="fa fa-print"></i> Imprimir</button>
             <button class="btn btn-info btn-sm" style="border: 1px solid;" onclick="modal_email()"><i class="fa fa-envelope"></i> Enviar</button>
             <button class="btn btn-warning btn-sm" onclick="autorizar()" id="btn_autorizar"><i class="fa fa-paper-plane"></i> Autorizar</button>
             <button class="btn btn-danger btn-sm" style="border: 1px solid;display: none;" id="btn_sri_error" onclick="modal_error_seri($('#txt_autorizacionRET').text(),'RETENCIONES')"><i class="fa fa-eye"></i> Ver error en xml</button>     
    	</div>
         <div class="col-sm-2 text-end">
        <button class="btn btn-sm btn-danger" style="display:none;" id="btn_eliminar" onclick="eliminar_retencion(<?php echo $id; ?>)"><i class="fa fa-trash"></i> Eliminar</button>    
        <button class="btn btn-sm btn-danger" style="display:none;" id="btn_anular" onclick="anular_retencion(<?php echo $id; ?>)"><i class="fa fa-times-circle"></i> Anular</button>          
        </div> 
    </div>
      <hr>
    <form id="form_bienes_servicios">
    <input type="hidden" name="txt_idRET" id="txt_idRET" class="form-control form-control-sm">  
    <div class="row">
        <div class="card cad-primary">
            <div class="card-header" style="padding: 11px;">
                <h5 class="card-title mb-0">Datos proveedor</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                       <b> Proveedor:</b>
                         <input type="hidden" name="txt_idCli" id="txt_idCli" class="form-control form-control-sm">
                         <h1 class="h3 mb-1 text-gray-800" id="lbl_proveedor" name="lbl_proveedor">Home</h1> 
                        <div class="row">
                            <div class="col-sm-6">
                               <b>C.I. / R.U.C</b><br>
                               <label  id="lbl_ci_ruc"  name="lbl_ci_ruc"></label>
                            </div>                
                        </div>            
                     </div>
                     <div class="col-sm-6">            
                        <div class="row">                             
                            <div class="col-sm-3" style="padding: 0px;">
                                <b>Telefono</b>
                                <input type="text" name="lbl_telefono" id="lbl_telefono" class="form-control form-control-sm">
                            </div> 
                            <div class="col-sm-5">
                                <b>Email:</b>
                                <input type="text" name="lbl_email" id="lbl_email" class="form-control form-control-sm">              
                            </div>
                            <div class="col-sm-4">
                                <b>Fecha Emision:</b>
                                <input type="date" name="txt_fecha" id="txt_fecha" class="form-control form-control-sm" value="<?php echo date('Y-m-d') ?>" >              
                            </div>                                                         
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="padding: 0px;">
                                <b>Autorizacion</b>
                                <label id="txt_autorizacionRET" name="txt_autorizacionRET">1234567891234</label>
                            </div>  
                        </div>
                       
                        <!-- <input type="date" name="" id="" class="form-control form-control-sm"> -->
                    </div>       
                    <div class="col-sm-2 text-center">
                        <input type="hidden" name="txt_estado" id="txt_estado" value="P">
                        <b>No. Retencion:</b><br>
                        <label id="txt_serie" name="txt_serie">001-001</label>
                         <h1 class="h3 mb-4 text-gray-800" id="txt_NoRet" name="txt_NoRet">0</h1>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-sm-2">
                        <b>Forma de pago</b>
                    </div>
                    <div class="col-sm-6">
                        <select class="" style="width: 100%;" id="DCTipoPago" name="DCTipoPago">
                            <option value="">Seleccione tipo de pago</option>
                        </select>
                    </div>
                </div>                   
            </div>
        </div>
    </div>
    
    <div class="row">        
      <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Documento objeto de retencion</h5>
          </div>
          <div class="card-body">
             <div class="row">
                    <div class="col-sm-5">
                        <b>Tipo de comprobate</b>
                        <select class="form-select form-select-sm" id="DCTipoComprobante" name="DCTipoComprobante" onchange="mostrar_panel()" onblur="selec_tipo_comp()">
                            <option value="1">Factura</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <b>Serie</b>
                        <div class="row">
                            <div class="col-sm-6" style="padding: 0px">
                                <input type="text" name="TxtNumSerieUno" class="form-control form-control-sm" id="TxtNumSerieUno" placeholder="001" onblur="autocompletar_serie_num(this.id)" onkeyup=" solo_3_numeros(this.id)"  autocomplete="off">
                            </div>
                            <div class="col-sm-6" style="padding: 0px">
                                <input type="text" name="TxtNumSerieDos" class="form-control form-control-sm" id="TxtNumSerieDos" placeholder="001" onblur="autocompletar_serie_num(this.id)" onkeyup=" solo_3_numeros(this.id)"  autocomplete="off">
                            </div>
                        </div>                                
                    </div>
                    <div class="col-sm-2">
                        <b>Numero</b>
                        <input type="text" name="TxtNumSerietres" class="form-control form-control-sm" id="TxtNumSerietres" onblur="validar_num_factura(this.id)" placeholder="000000001" onkeyup="solo_9_numeros(this.id)"  autocomplete="off">
                    </div>
                    <div class="col-sm-3">
                        <b>Autorizacion</b>
                        <input type="text" name="TxtNumAutor" class="form-control form-control-sm text-right" id="TxtNumAutor" onblur="autorizacion_factura()" placeholder="0000000001"  autocomplete="off"> <!--onkeyup="solo_10_numeros(this.id)"-->
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                     <b>Emision</b>
                        <input type="date" name="MBFechaEmi" class="form-control form-control-sm" value="<?php echo date('Y-m-d') ?>" id="MBFechaEmi" autocomplete="off">
                    </div>
                    <div class="col-sm-2">
                        <b>Registro</b>
                        <input type="date" name="MBFechaRegis" class="form-control form-control-sm" value="<?php echo date('Y-m-d') ?>" id="MBFechaRegis" onblur="validar_fecha()"  autocomplete="off">
                    </div>                                            
                 <div class="col-sm-2">
                        <b>Caducidad</b>
                        <input type="date" name="MBFechaCad" class="form-control form-control-sm" value="<?php echo date('Y-m-d') ?>" id="MBFechaCad"  autocomplete="off">
                    </div>
                 <div class="col-sm-2">
                        <b>No Obj. IVA</b>
                        <input type="text" name="TxtBaseImpoNoObjIVA" class="form-control form-control-sm text-right" value="0.00" id="TxtBaseImpoNoObjIVA"  autocomplete="off" onblur="calcular_valor_impo_ret()">
                    </div>
                    <div class="col-sm-1" style="padding-right: 5px;padding-left: 5px;">
                        <b>Tarifa 0</b>
                        <input type="text" name="TxtBaseImpo" class="form-control form-control-sm text-right" value="0.00" id="TxtBaseImpo"  autocomplete="off" onblur="calcular_valor_impo_ret()">
                    </div>
                    <div class="col-sm-1" style="padding-right: 5px;padding-left: 5px;">
                        <b>Tarifa 12</b>
                        <input type="text" name="TxtBaseImpoGrav" class="form-control form-control-sm text-right" value="0.00" id="TxtBaseImpoGrav"  autocomplete="off" onblur="cargar_valor();calcular_valor_impo_ret()">
                    </div>
                    <div class="col-sm-2">
                        <b>Valor ICE</b>
                     <input type="text" name="TxtBaseImpoIce" class="form-control form-control-sm  text-right" value="0.00"  id="TxtBaseImpoIce"  autocomplete="off">
                    </div>                    
             </div>


          </div>
      </div>        
    </div> 
    <div class="row">
         <div class="card" id="panel_bienes_servicios">
            <!-- Basic Card Example -->
            <div class="card-header py-3">
               <h5 class="card-title mb-0">Detalle de valores retenidos</h5>
            </div>
            <div class="card-body">
                <div class="row">                  
                    <div class="col-sm-2">
                        % I.V.A
                        <select class="form-select form-select-sm" id="ddl_tipo_iva" name="ddl_tipo_iva" onchange="cargar_valor()">
                            <option value="12">12</option>
                            <option value="8">8</option>
                        </select>
                         Valor I.V.A
                        <input class="form-control form-control-sm" name="txt_Valor_iva" id="txt_Valor_iva" readonly value="0.00">
                    </div>                                 
                    <div class="col-sm-4">
                        <label><input type="checkbox" name="rbl_bienes" id="rbl_bienes" onclick="bienes()"> Retencion iva por bienes</label>
                        <div id="panel_bienes" style="display:none;">
                            <input class="form-control form-control-sm" name="txtbaseimpobienes" id="txtbaseimpobienes" value="0.00" onblur="validar_valor_bienes()">
                            <select class="form-select form-select-sm" id="ddl_porbienes" name="ddl_porbienes" onchange="calcular_bienes()">
                                <option value="">Seleccione</option>
                            </select>                        
                           <div class="row">
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" name="txtvalorRetBie" id="txtvalorRetBie" value="0.00" readonly>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <!-- <button class="btn btn-primary btn-sm">Agregar</button> -->
                                </div>
                            </div>    
                        </div>                        
                    </div> 
                    <div class="col-sm-4">
                        <label><input type="checkbox" name="rbl_servicios" id="rbl_servicios" onclick="servicios()"> Retencion iva por servicios</label>
                        <div  id="panel_servicios" style="display:none;">
                            <input class="form-control form-control-sm" name="txtbaseimposervicios" id="txtbaseimposervicios" value="0.00" onblur="validar_valor_servicios()">
                            <select class="form-select form-select-sm" id="ddl_porservicios" name="ddl_porservicios" onchange="calcular_servicios()">
                                <option value="">Seleccione</option>
                            </select>
                            <div class="row">
                                <div class="col-sm-8">
                                    <input class="form-control form-control-sm" name="txtvalorRetSer" id="txtvalorRetSer" value="0.00" readonly>
                                </div>
                                <div class="col-sm-4 text-end">
                                    <!-- <button class="btn btn-primary btn-sm">Agregar</button> -->
                                </div>
                            </div>                        
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default" style="border:1px solid" onclick="agregar_impuesto()">Agregar</button>
                    </div>
                </div>    	
            </div>   
        </div>

         <div class="card">
            <!-- Basic Card Example -->
            <div class="card-header py-3">
               <h5 class="card-title mb-0">Detalle de valores retenidos</h5>
            </div>
            <div class="card-body">              
                <div class="row" id="panel_retenciones">
                    <b>Concepto de retencion</b>
                    <div class="col-sm-2">
                        Base Impo
                         <input class="form-control form-control-sm" name="txt_base_ret" id="txt_base_ret" readonly value="0.00">
                    </div>                     
                    <div class="col-sm-5">
                        concepto de retencion
                         <select class="form-select form-select-sm" id="ddl_porconcepto" name="ddl_porconcepto" onchange="calcular_porcentaje()">
                            <option value="">Seleccione</option>
                        </select>                        
                    </div>
                    <div class="col-sm-1">
                        %
                         <input class="form-control form-control-sm" name="TxtPorRetConA" id="TxtPorRetConA" readonly value="0.00">
                    </div>
                     <div class="col-sm-2">
                        Valor Ret
                         <input class="form-control form-control-sm" name="TxtValConA" id="TxtValConA" readonly value="0.00">
                    </div>
                    <div class="col-sm-2">
                        <br>
                        <button type="button" class="btn btn-default" style="border:1px solid" onclick="agregar_impuesto2()">Agregar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm table-hoper">
                            <thead>
                                <th></th>
                                <th>Codigo</th>
                                <th>Impuesto</th>
                                <th>Base imponible</th>
                                <th>% Retencion</th>
                                <th>Valor Retennido</th>
                            </thead>
                            <tbody id="tbl_datos">
                                <tr>
                                    <td colspan="4">sin registros</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>          
            </div>   
        </div>                          
    </div>
    </form> 
</div>




<div class="modal fade" id="myModal_cliente" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proveedor</h5>
            </div>
            <div class="modal-body m-3">
                 <div class="row">
                   	  <form id="form_cliente" class="col-sm-9">
	                   	 <div class="col-sm-12">
	                   	 	<div class="row">
	                   	 		<input type="hidden" name="txt_id" id="txt_id">
	                   	 		 <div class="col-sm-12">
			                   		<b>CI / RUC</b>
			                   		<input type="text" name="txt_ci" id="txt_ci" class="form-control-sm form-control" onkeyup="num_caracteres('txt_ci',13)" onblur="validar_ci_ruc('txt_ci')" placeholder="Ingrese numero de cedula">
			                   	</div>
			                   	<div class="col-sm-12">
			                   		<b>Nombre</b>
		                   			<input type="" name="txt_nombre" id="txt_nombre" class="form-control-sm form-control">
		                   		</div>
		                   		<div class="col-sm-6">
		                   			<b>Email</b>
		                   			<input type="text" id="txt_email" name="txt_email" class="form-control-sm form-control" onblur ="validador_correo('txt_email')" autocomplete="off">
		                   		</div>
		                   		<div class="col-sm-6">
		                   			<b>Telefono</b>
		                   			<input type="" name="txt_telefono" id="txt_telefono" class="form-control-sm form-control"  onkeyup="num_caracteres('txt_telefono',10)">
		                   		</div>
		                   		<div class="col-sm-12">
		                   			<b>Razon Social</b>
		                   			<input type="" name="txt_razon" id="txt_razon" class="form-control-sm form-control">
		                   		</div>
		                   		<div class="col-sm-12">
		                   			<b>Direccion</b>
		                   			<textarea class="form-control-sm form-control" style="resize:none;" rows="3" name="txt_direccion" id="txt_direccion" ></textarea>
		                   		</div>
	                   	 	</div>
	                   	 </div>
	                   	</form>	                   	 	                 
                   </div>
            </div>
            <div class="modal-footer">
                <a href="home.php" class="btn btn-default" style="border: 1px solid;">Cerrar</a>
                <button class="btn btn-secondary"  onclick="guardar()"> Continuar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="myModal_email" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enviar email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-3">
                <div class="row"> 
                  <form enctype="multipart/form-data" id="form_img" method="post" class="col-sm-12">
                    <div class="col-sm-12">
                        <div id="emails-input" name="emails-input" placeholder="añadir email"></div>
                        <input type="hidden" name="txt_to" id="txt_to">
                        <input type="hidden" name="txt_fac_ema" id="txt_fac_ema">
                    </div>
                    <div class="col-sm-12">
                        <textarea class="form-control" rows="3" style="resize:none" placeholder="Texto" id="txt_texto" name="txt_texto" ></textarea>
                    </div>                                                  
                    <div class="col-sm-8">
                        <input type="file" name="file_adjunto" id="file_adjunto" class="form-control">                       
                    </div> 
                    <div class="col-sm-3">
                        <label><input type="checkbox" name="cbx_factura" id="cbx_factura" checked>Enviar Factura</label>                        
                    </div>  
                  </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="enviar_email()" >Enviar</button>
            </div>
        </div>
    </div>
</div>
</main>


<?php include('footer.php'); ?>
           