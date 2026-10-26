<?php include('header3.php'); @session_start(); //print_r($_SESSION['INICIO']);die(); ?>

 <script src="../js/supermercado.js"></script>
 <script type="text/javascript">
     var mesa = 'PVS'+'<?php echo $_SESSION['INICIO']['ID_USUARIO']; ?>' ;
     var usu = '<?php echo $_SESSION['INICIO']['ID_USUARIO']; ?>' ;
     var empresa = '<?php echo $_SESSION['INICIO']['ID_EMPRESA']; ?>' ;
    limpiar_mesa(mesa);
    var lis = [];
     $(document).ready(function () {
        numero_factura()
        var mesa = 'PVS'+'<?php echo $_SESSION['INICIO']['ID_USUARIO']; ?>' ;
        limpiar_mesa(mesa);
        cargar_mesa(mesa);    
        revisar_monto_inicial();
    });

//      $(document).keydown(function(event) {
//       event.preventDefault();
//         if (event.keyCode == 122) { // 122 es el código de F11
//           // event.originalEvent.keyCode = 1;
//           // window.alert("no dejo maximizar");
//           return false;
//         }
// });
    </script>
    <script> 
   // Iniciar pantalla completa
    function kaishi()  
    {  
        $('#Button1').css('display','none');
        var docElm = document.documentElement;  
        //W3C   
        if (docElm.requestFullscreen) {  
            docElm.requestFullscreen();  
        }  
            //FireFox   
        else if (docElm.mozRequestFullScreen) {  
            docElm.mozRequestFullScreen();  
        }  
                         // Chrome, etc.   
        else if (docElm.webkitRequestFullScreen) {  
            docElm.webkitRequestFullScreen();  
        }  
            //IE11   
        else if (elem.msRequestFullscreen) {  
            elem.msRequestFullscreen();  
        }  
    }  


           // Salir de pantalla completa
    function guanbi() {  
  
  
        if (document.exitFullscreen) {  
            document.exitFullscreen();  
        }  
        else if (document.mozCancelFullScreen) {  
            document.mozCancelFullScreen();  
        }  
        else if (document.webkitCancelFullScreen) {  
            document.webkitCancelFullScreen();  
        }  
        else if (document.msExitFullscreen) {  
            document.msExitFullscreen();  
        }  
    }  


      // oyente de eventos
  
    document.addEventListener("fullscreenchange", function () {  
          
        fullscreenState.innerHTML = (document.fullscreen) ? "" : "not ";  
    }, false);  
      
    document.addEventListener("mozfullscreenchange", function () {  
         
        fullscreenState.innerHTML = (document.mozFullScreen) ? "" : "not ";  
    }, false);  
     
    document.addEventListener("webkitfullscreenchange", function () {  
          
        fullscreenState.innerHTML = (document.webkitIsFullScreen) ? "" : "not ";  
    }, false);  
      
    document.addEventListener("msfullscreenchange", function () {  
          
        fullscreenState.innerHTML = (document.msFullscreenElement) ? "" : "not ";  
    }, false);  
 

  </script>
 
<main class="content">
    <div class="container-fluid p-0">
    	<div class="row">
    		<div class="col-sm-10">
    			<div class="row">
    				<div class="col-sm-2">

		        		<input type="hidden" name="txt_id_usuario" id="txt_id_usuario" value="<?php echo $_SESSION['INICIO']['ID_USUARIO']; ?>">
		        		<b>Fecha</b>
		        		<input type="date" name="txt_fecha" id="txt_fecha" value="<?php echo date('Y-m-d');?>" class="form-control form-control-sm" readonly>
		        	</div>
		        	<div class="col-sm-5">
		        		<b>Cliente</b>
		        		<input type="hidden" name="txt_id" id="txt_id" value="">
		        	
		        		<div class="input-group mb-3">
							<select class="form-select flex-grow-1" name="ddl_cliente" id="ddl_cliente">
								<option value="">Seleccione cliente</option>								
							</select>
							<button class="btn btn-secondary btn-sm" type="button"><i class="fa fa-user-plus" onclick="$('#new_cliente_modal').modal('show')"></i></button>
						</div>
		        	</div>
		        	<div class="col-sm-2">
		        		<b>CI / RUC</b>
		        		<input type="" name="txt_ci_ruc" id="txt_ci_ruc" class="form-control form-control-sm" readonly>
		        	</div>
		        	<div class="col-sm-3">
		        		<b>Telefono</b>
		        		<input type="" name="txt_telefono" id="txt_telefono" class="form-control form-control-sm" readonly>
		        	</div>
		        	<div class="col-sm-4 row">
						<label class="col-form-label col-sm-2 text-sm-end"><b>Email</b></label>
						<div class="col-sm-10">
							<input type="" name="txt_email" id="txt_email" class="form-control form-control-sm" readonly>
						</div>
					</div>		        	
		        	<div class="col-sm-8 row">
		        		<label class="col-form-label col-sm-2 text-sm-end"><b>Direccion</b></label>
		        		<div class="col-sm-10">
			        		<input type="" name="txt_direccion" id="txt_direccion" class="form-control form-control-sm" readonly>
			        	</div>
		        	</div>
    			</div>    			
    		</div>
    		<div class="col-sm-2 text-center">
    			<b>Factura</b><br>
    			<label><?php echo $_SESSION['INICIO']['SERIE'];?></label>
    			<h1 id="num_fac">0</h1>
    		</div>        	
        </div> 
        <hr>
        <div class="row">
        	<div class="col-sm-10">
        		<div class="row">
        			<div class="col-sm-2">
		        		<b>Referencia</b>
		        		<input type="" name="txt_ref" id="txt_ref" value="" class="form-control" readonly>
		        	</div>
		        	<div class="col-sm-4">
		        		<b>Producto</b>
		        		<select class="form-select form-control-sm" id="ddl_producto" name="ddl_producto">
		        			<option value="">Seleccione</option>
		        		</select>
		        	</div>
		        	<div class="col-sm-1">
		        		<b>Stock</b>
		        		<input type="" name="txt_stock" id="txt_stock" value="0" class="form-control" readonly>
		        	</div>
		        	<div class="col-sm-1">
		        		<b>Cant</b>
		        		<input type="" name="txt_cant" id="txt_cant" value="1" class="form-control" onblur="validar_cantidad()">
		        	</div>
		        	<div class="col-sm-2">
		        		<b>PVP</b>
		        		<input type="" name="txt_pvp" id="txt_pvp" value="0.00" class="form-control" onblur="validar_pvp()">
		        		<input type="hidden" name="txt_iva" id="txt_iva" value="0" class="form-control">
		        	</div>
		        	<div class="col-sm-2">
		        		<b>Total</b>
		        		<input type="" name="txt_total" id="txt_total" value="0.00" class="form-control" readonly onblur="add_articulo();iniciar()">
		        	</div>
		        			
        		</div>
        	</div>
        	<div class="col-sm-2" style="display: none;">
        		  <label class="form-check form-check-inline btn btn-default" style="border:1px solid;">
                    <input class="form-check-input" type="radio" name="rbl_llevar" checked value="0">
                    <span class="form-check-label">
                      Para Restaurante
                    </span>
                  </label>
                  <label class="form-check form-check-inline btn btn-default" style="border:1px solid;">
                    <input class="form-check-input" type="radio" name="rbl_llevar" value="1">
                    <span class="form-check-label">
                      Para llevar
                    </span>
                  </label>
        	</div>

        	
        </div>
         <div id="totales">
                        
                    </div>   
        <div class="row">
        	<div class="col-sm-9">
        		<table class="table table-hover">
        			<thead>
        				<th>CANT</th>
        				<th>PRODUCTO</th>
        				<th>P.UNI</th>
        				<th>DCTO</th>
        				<th>IVA</th>
        				<th>SUBTOTAL</th>
        				<th>TOTAL</th>
        			</thead>
        			<tbody id="tbl_lineas">
        				<tr class="text-center">
        					<td colspan="7">Sin articulos</td>
        					<!-- <td></td>
        					<td></td>
        					<td></td>
        					<td></td>
        					<td></td>
        					<td></td> -->
        				</tr>
        			</tbody>
        		</table>
        	</div>
        	<div class="col-sm-3">
        		<h3>TOTAL</h3>
        		<input type="" name="txt_total_mesa" id="txt_total_mesa" readonly class="form-control text-end" value="0.00" style="font-size:50px;color: coral;">
        		<div class="row">
        			<div class="col-sm-6">
        				<h4>SUBTOTAL</h4>
        			</div>
        			<div class="col-sm-6">
        				<input type="" name="txt_subtotal" id="txt_subtotal" class="form-control text-end" readonly value="0.00">
        			</div>
        		</div>      
        		<!-- <div class="row">
        			<div class="col-sm-6">        				
        				<h3>TOT. SIN IVA</h3>
        			</div>
        			<div class="col-sm-6">
        				<input type="" name="txt_sin_iva" id="txt_sin_iva" class="form-control text-end" readonly value="0.00">
        			</div>
        		</div>       -->
        		<div class="row">
        			<div class="col-sm-6">        				
        				<h4>TOTAL IVA <?php echo $_SESSION['INICIO']['IVA'];?>%</h4>
        			</div>
        			<div class="col-sm-6">
        				<input type="" name="total_iva" id="total_iva" class="form-control text-end" readonly value="0.00">
        			</div>
        		</div>      
        		<div class="row">
        			<div class="col-sm-6">        				
        				<h4>TOTAL DCTO</h4>
        			</div>
        			<div class="col-sm-6">
        				<input type="" name="txt_descuento" id="txt_descuento" class="form-control text-end" readonly value="0.00">
        			</div>
        		</div> 
        		<br>
        		<div class="col-sm-12 d-grid">
        			<button class="btn btn-block btn-primary" style="font-size:40px" onclick="facturar_mesa()">
        				<img src="../img/sistema/bill.png"> Facturar </button>             			
        		</div>
        		
        				
        	</div>
        </div>     

        <div class="row">
            <!-- <input type="text" name="txt_ci" id="txt_ci" class="form-control form-control-sm" onkeyup="num_caracteres('txt_ci',10)" onblur="validar_ci('txt_ci');validar_ci_ruc('txt_ci');">        --> 
            <div class="col-lg-12">
            <!-- Basic Card Example -->
            <input type="hidden" name="txt_nmesas" id="txt_nmesas">                 
            <div class="row col-sm-12" id="mesas">
                       
            </div>
            </div>               
        </div>
    </div>
</main>


   <div class="modal" id="cliente_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
      <div class="modal-content">  
        <!-- Modal body -->
        <div class="modal-header" style="padding-bottom: 5px;">
            <div class="col-sm-6">
                <h5>Cliente </h5>
            </div>
            <div class="col-sm-6">
                <!-- <h5>Forma de pago </h5> -->
            </div>             
        </div>
        <div class="modal-body ui-front">
            <div class="row">
                <div class="col-sm-5">
                    <input type="hidden" name="txt_id_cliente" id="txt_id_cliente">
                    <div class="row">
                        <div class="col-sm-12">
                            <b>C.I / R.U.C</b>
                            <input type="text" name="txt_ci_modal" id="txt_ci_modal" class="form-control form-control-sm" onkeyup="num_caracteres('txt_ci_modal',13)" onblur="validar_ci('txt_ci_modal');validar_ci_ruc('txt_ci_modal');">                    
                        </div>  
                        <div class="col-sm-12">
                            <b>NOMBRE</b>
                            <input type="text" name="txt_nombre_modal" id="txt_nombre_modal" class="form-control form-control-sm" autocomplete="off" onblur="validar_nombre()">                    
                        </div>  
                        <div class="col-sm-12">
                            <b>TELEFONO</b>
                            <input type="text" name="txt_telefono_modal" id="txt_telefono_modal" class="form-control form-control-sm" autocomplete="off" onkeyup="num_caracteres('txt_telefono_modal',10)">                    
                        </div>      
                        <div class="col-sm-12">
                            <b>EMAIL</b>
                            <input type="text" name="txt_email_modal" id="txt_email_modal" class="form-control form-control-sm" autocomplete="off" onblur="validador_correo('txt_email_modal')">                    
                        </div> 
                        <div class="col-sm-12">
                            <b>RAZON SOCIAL</b>
                            <input type="text" name="txt_razon_modal" id="txt_razon_modal" class="form-control form-control-sm" readonly="">                    
                        </div>   
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
                            <b>DIRECCION</b>
                            <textarea class="form-control" cols="4" style="resize:none" name="txt_direccion_modal" id="txt_direccion_modal"></textarea>                   
                        </div>                  
                    </div>
                </div>
                <div class="col-sm-7">                  

                    <div class="row">
                        <div class="col-sm-6">
                             <h4>FORMA DE PAGO:</h4>
                            <select class="form-select mb-3" id="formas_pago">
                                <option value="">Forma de pago</option>
                            </select>
                        </div>
                         <div class="col-sm-3">
                             <h4>VALOR:</h4>
                            <input type="text" name="txt_valor" id="txt_valor" class="form-control text-right" style="font-size: 20px;" value="0.00">
                        </div>
                         <div class="col-sm-3"><br>
                            <button type="button" class="btn btn-primary btn-block" onclick="agregar_pago()"><i class="icon fa fa-plus"></i>Agregar</button>
                        </div>                       
                    </div>

                     <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable">
                                <thead class="text-primary">
                                    <th width="50%">Forma de pago</th>
                                    <th>Valor</th>
                                    <th></th>
                                </thead>
                                <tbody id="tbl_pagos">
                                    
                                </tbody>
                                
                            </table>                           
                        </div>
                       
                    </div>
                    <div class="row">  
                     <div class="col-sm-6">                           
                        </div>                      
                       
                    </div>
                     <hr style="margin: 5px;">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>TOTAL:</h2>
                        </div>
                        <div class="col-sm-6 text-right">
                            <h2 id="total">0.00</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>CAMBIO:</h2>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="txt_cambio" id="txt_cambio" class="form-control text-right" style="font-size: 30px;" readonly="" value="0.00">
                        </div>
                    </div>

                </div>
             </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="generar_facturar()"> Facturar mesa</button>
          <button type="button" class="btn btn-default" onclick="cancelar_fac()">Cerrar</button>
        </div>                      
      </div>
    </div>
  </div>

<div class="modal" id="alertas" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-dialog-centered">  
        <!-- Modal body -->
        <div class="modal-body text-center">
          <img src="../img/facturando.gif" id="img_alerta" style="width: 30%;">
          <label id="tipo_alerta">Facturando..</label>
        </div>  
      </div>
    </div>
  </div>

  <div class="modal" id="imprimir_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
      <div class="modal-header" style="padding-bottom: 5px;">
          <h5>Lista de facturas</h5>           
      </div>  
        <!-- Modal body -->
        <div class="modal-body">
            <div id="iframeticket" style="display:none;">
                
            </div>
            <div class="row">
            <div class="col-sm-6">
                <b>Cliente</b>
                <input type="text" name="txt_nom" id="txt_nom" class="form-control form-control-sm" onkeyup="lista_facturas()">                
            </div>
            <div class="col-sm-6">
                <b>Numero Factura</b>
                <input type="text" name="txt_numfac" id="txt_numfac" class="form-control form-control-sm" onkeyup="lista_facturas()">                
            </div>
            <div class="col-sm-12" style="height:300px; overflow-y: scroll;">
               <table class="table table-bordered dataTable" style="font-size: small;">
                   <thead class="text-primary">
                       <th>Factura</th>
                       <th>Fecha</th>
                       <th>Cliente</th>
                       <th></th>
                   </thead>
                   <tbody id="tbl_facturas">
                       
                   </tbody>
               </table>
            </div>
         </div>
        </div>
        <div class="modal-footer">          
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
        </div>    
      </div>
    </div>
  </div>


  <div class="modal fade" id="config"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Configuracion inicial</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="col-sm-6">
                       <b>Valor Caja inicial</b>       
                       <input type="" name="txt_caja_inicial" id="txt_caja_inicial" class="form-control" value="0.00" placeholder="0.00">          
                    </div>
                    <div class="col-sm-6">
                    <div class="row">                       
                        <div class="col-sm-12  text-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-success" style="width: 100%;height: 200%;" onclick="add_caja()">
                                      <img src="../img/sistema/caja.png">
                                    </button>                                   
                                </div>
                                <div class="col-sm-6">
                                     <a href="home.php" type="button" class="btn btn-danger" style="width: 100%;height: 200%;">
                                        <img src="../img/sistema/close.png">
                                    </a>                                       
                                </div>
                            </div>                                              
                        </div>
                        
                    </div>              
                    <br>
                </div>

                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

 <div class="modal fade" id="transacciones"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_caja">Abonos para caja</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body m-3">
                <div class="row">
                    <div class="col-sm-6">
                       <b>Monto</b>                              
                       <input type="hidden" name="txt_tipo_caja" id="txt_tipo_caja" class="form-control" value="A">
                       <input type="" name="txt_caja_trans" id="txt_caja_trans" class="form-control" value="0.00" placeholder="0.00">
                       <b>Descripcion</b> 
                       <textarea  rows="3" style="resize:none" id="txt_detalle_caja" name="txt_detalle_caja" class="form-control"></textarea>      
                               
                    </div>
                    <div class="col-sm-6">
                    <div class="row">                       
                        <div class="col-sm-12  text-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-success" style="width: 100%;height: 200%;" onclick="transaccion_caja()">
                                      <img src="../img/sistema/caja.png">
                                    </button>                                   
                                </div>
                                <div class="col-sm-6">
                                     <a href="home.php" type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 100%;height: 200%;">
                                        <img src="../img/sistema/close.png">
                                    </a>                                       
                                </div>
                            </div>                                              
                        </div>
                        
                    </div>              
                    <br>
                </div>

                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cuentas"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cuadre de caja</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body m-3">
                <form id="form_cuadre_caja">
                <div class="row">
                     <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <b>BILLETES 20</b>
                                <input type="text" class="form-control" name="txt_20" id="txt_20" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                            <div class="col-sm-6">
                                <b>BILLETES 10</b>
                                <input type="text" class="form-control" name="txt_10" id="txt_10" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <b>BILLETES 5</b>
                                <input type="text" class="form-control" name="txt_5" id="txt_5" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                            <div class="col-sm-6">
                                <b>MONEDAS DE 1 DOLAR</b>
                                <input type="text" class="form-control" name="txt_1" id="txt_1" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <b>MONEDAS DE 50 CENT</b>
                                <input type="text" class="form-control" name="txt_50c" id="txt_50c" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                            <div class="col-sm-6">
                                <b>MONEDAS DE 25 CENT</b>
                                <input type="text" class="form-control" name="txt_25c" id="txt_25c" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <b>MONEDAS DE 10 CENT</b>
                                <input type="text" class="form-control" name="txt_10c" id="txt_10c" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                            <div class="col-sm-6">
                                <b>MONEDAS DE 5 CENT</b>
                                <input type="text" class="form-control" name="txt_5c" id="txt_5c" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <b>MONEDAS DE 1 CENT</b>
                                <input type="text" class="form-control" name="txt_1c" id="txt_1c" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                            <div class="col-sm-6">
                                <b>TOTAL TARJETAS</b>
                                <input type="text" class="form-control" name="txt_tarjeta" id="txt_tarjeta" value="0.00" onblur="cuadre_caja()">                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <b>CAJA INICIAL</b>
                        <input type="" name="txt_total_dia_ini" id="txt_total_dia_ini" class="form-control" value="0.00" readonly>
                         <b>TOTAL DEL INGRESOS</b>
                        <input type="" name="txt_total_ing" id="txt_total_ing" class="form-control" value="0.00" readonly>
                         <b>TOTAL RETIROS</b>
                        <input type="" name="txt_total_dia_re" id="txt_total_dia_re" class="form-control" value="0.00" readonly>
                        <b>TOTAL DEL DIA</b>
                        <input type="" name="txt_total_dia" id="txt_total_dia" class="form-control" value="0.00" readonly>
                        <b>TOTAL EN CAJA</b>
                        <input type="" name="txt_total_caja" id="txt_total_caja" class="form-control" value="0.00" readonly>
                        <div class="row">
                            <div class="col-sm-6" style="padding: 0px;">
                                <b>Faltante</b>
                                <input type="" name="txt_faltante" id="txt_faltante" class="form-control" value="0.00" readonly>
                                
                            </div>
                             <div class="col-sm-6" style="padding: 0px;">
                                <b>Sobrante</b>
                                <input type="" name="txt_sobrante" id="txt_sobrante" class="form-control" value="0.00" readonly>
                                
                            </div>
                        </div>
                        
                    </div>

                </div>
             </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="cuadre_caja_save()">Cerrar caja</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_adicionales"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border: 1px solid;">
            <div class="modal-header">
                <h5 class="modal-title">Adicionales</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form id="form_adicionales">
                <div class="row" id="view_adisionales">
                   
                   

                </div>
             </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="add_adicionales()">Añadir</button>
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button> -->
            </div>
        </div>
    </div>
</div>


  <div class="modal" id="new_cliente_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">  
        <!-- Modal body -->
        <div class="modal-header" style="padding-bottom: 5px;">
            <div class="col-sm-6">
                <h5>Cliente </h5>
            </div>
            <div class="col-sm-6">
                <!-- <h5>Forma de pago </h5> -->
            </div>             
        </div>
        <div class="modal-body ui-front">
            <div class="row">
                <form id="form_new_cliente">
                    <input type="hidden" name="txt_id_cliente_n" id="txt_id_cliente_n">
                    <div class="row">
                        <div class="col-sm-12">
                            <b>C.I / R.U.C</b>
                            <input type="text" name="txt_ci_modal_n" id="txt_ci_modal_n" class="form-control form-control-sm" onkeyup="num_caracteres('txt_ci_modal',13)" onblur="validar_ci('txt_ci_modal');validar_ci_ruc('txt_ci_modal');">                    
                        </div>  
                        <div class="col-sm-12">
                            <b>NOMBRE</b>
                            <input type="text" name="txt_nombre_modal_n" id="txt_nombre_modal_n" class="form-control form-control-sm" autocomplete="off" onblur="validar_nombre_n('txt_nombre_modal_n','txt_razon_modal_n')">                    
                        </div>  
                        <div class="col-sm-12">
                            <b>TELEFONO</b>
                            <input type="text" name="txt_telefono_modal_n" id="txt_telefono_modal_n" class="form-control form-control-sm" autocomplete="off" onkeyup="num_caracteres('txt_telefono_modal',10)">                    
                        </div>      
                        <div class="col-sm-12">
                            <b>EMAIL</b>
                            <input type="text" name="txt_email_modal_n" id="txt_email_modal_n" class="form-control form-control-sm" autocomplete="off" onblur="validador_correo('txt_email_modal')">                    
                        </div> 
                        <div class="col-sm-12">
                            <b>RAZON SOCIAL</b>
                            <input type="text" name="txt_razon_modal_n" id="txt_razon_modal_n" class="form-control form-control-sm">                    
                        </div>   
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
                            <b>DIRECCION</b>
                            <textarea class="form-control" cols="4" style="resize:none" name="txt_direccion_modal_n" id="txt_direccion_modal_n"></textarea>                   
                        </div>                  
                    </div>
                </form>
             </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="guardar_cliente()"> Guardar</button>
          <button type="button" class="btn btn-default" onclick="$('#new_cliente_modal').modal('hide')">Cerrar</button>
        </div>                      
      </div>
    </div>
  </div>





<?php include('footer.php'); ?>