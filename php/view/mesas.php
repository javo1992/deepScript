<?php include('header3.php'); @session_start(); ?>

 <script src="../js/mesas.js"></script>
 <script type="text/javascript">
    var lis = [];
     $(document).ready(function () {
        revisar_monto_inicial();
        generar_mesas();
        setInterval(generar_mesas,3000)
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


 <div class="modal" id="pedido" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
      <div class="modal-content">  
        <!-- Modal body -->
        <div class="modal-header" style="padding-bottom: 5px;">
            <div class="col-sm-6">
                <h5>Mesa No <label id="txt_mesa"></label> </h5>
            </div>
            <div class="col-sm-6 text-end">
                 <button type="button" class="btn btn-success btn-sm" onclick="facturar_mesa()"><i class="fas fa-file-invoice-dollar"></i><b> Facturar</b></button>
                 <button type="button" class="btn btn-danger btn-sm" onclick=" liberar_mesa()"><i class="fas fa-broom"></i><b> liberar mesa</b></button>
                 <button type="button" class="btn btn-info btn-sm" onclick="cambiar_mesa_btn()"><i class="fas fa-exchange-alt"></i><b> Cambiar mesa</b></button>
                <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal"><i class="fa fa-times"></i><b> Cerrar</b></button>
            </div>
        </div>
        <div class="modal-body">
           <div class="row">
                <div class="col-sm-6">
               
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
            <div class="row">
                <div class="col-sm-6 d-grid">
                    <?php  if($_SESSION['INICIO']['PROCESAR_AUTO']==0){ ?>
                     <button class="btn btn-warning" onclick="procesar_manual()"><b>PROCESAR PEDIDO</b></button>
                    <?php  } ?>
                    <div style="height:350px;overflow-y: scroll;">
                        <table class="table table-responsive table-sm" style="font-size: small;">
                            <thead class="text-primary">
                                <th>CANT</th>
                                <th>ARTICULO</th>
                                <th>PRECIO</th>
                                <th>TOTAL</th>
                                <th></th>
                            </thead>
                            <tbody id="tbl_lineas">
                                
                            </tbody>
                        </table>
                    </div>
                    <div id="totales">
                        
                    </div>                  
                </div>
                <div class="col-sm-6">
                        <div class="row" id="btn_regresar" style="display:none">
                            <div class="col-sm-12 text-end">
                                <button class="btn btn-block btn-primary btn-sm" type="button" onclick="categorias()"> 
                                <i class="fa fa-chevron-left"></i>  Regresar a categorias </button>
                            </div>                      
                            <hr>
                        </div>
                        <div class="input-group">
                            <input type="" name="query_ca" id="query_ca" autocomplete="off" class="form-control form-control-sm" onkeyup="categorias();">   
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="button" disabled="">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                        </div>              
                        <br>            
                        <div class="row" id="categorias" style="overflow-y: scroll;height: 400px;"></div>
                        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="update()">Editar</button>
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
        </div>   -->
                    
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="cantidad_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered  modal-md">
      <div class="modal-content"  style="border:1px solid">  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4 d-grid" style="padding: 5px;"><button class="btn btn-primary" onclick="teclado(1)">1</button></div>     
                        <div class="col-sm-4 d-grid" style="padding: 5px;"><button class="btn btn-primary" onclick="teclado(2)">2</button></div>     
                        <div class="col-sm-4 d-grid" style="padding: 5px;"><button class="btn btn-primary" onclick="teclado(3)">3</button></div> 
                    </div>                  
                    <div class="row">    
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"><button class="btn btn-primary btn-block" onclick="teclado(4)">4</button></div>     
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"><button class="btn btn-primary btn-block" onclick="teclado(5)">5</button></div>     
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"><button class="btn btn-primary btn-block" onclick="teclado(6)">6</button></div> 
                    </div>                  
                    <div class="row">    
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"><button class="btn btn-primary btn-block" onclick="teclado(7)">7</button></div>    
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"><button class="btn btn-primary btn-block" onclick="teclado(8)">8</button></div>    
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"><button class="btn btn-primary btn-block" onclick="teclado(9)">9</button></div>
                    </div>                  
                    <div class="row">      
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"></div>                      
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"><button class="btn btn-primary btn-block" onclick="teclado(0)">0</button></div>                  
                        <div class="col-sm-4 d-grid"  style="padding: 5px;"></div>                 
                    </div>                  
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <input type="hidden" name="" id="txt_id_art" name="txt_id_art">
                        <div class="col-sm-12">
                            <div class="input-group">                            
                            <input type="number" name="txt_can" id="txt_can" class="form-control form-control-lg" value="1" onfocus="">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" onclick="borrar_cantidad()">
                                    <i class="fas fa-backspace fa-sm"></i>
                                </button>
                            </div>
                        </div>                              
                        </div>
                        <div class="col-sm-12  text-center">
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-success" style="width: 100%;height: 200%;" onclick="add_articulo()">
                                      <img src="../img/sistema/add.png">
                                    </button>                                   
                                </div>
                                <div class="col-sm-6">
                                     <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="width: 100%;height: 200%;">
                                        <img src="../img/sistema/close.png">
                                    </button>                                       
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


 <div class="modal" id="cambiar_modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered  modal-sm">
      <div class="modal-content" style="border:1px solid;">  
        <!-- Modal body -->
        <div class="modal-header">
            <h4>Cambiar de mesa</h4>
        </div>
        <div class="modal-body">
            <div class="row">                
                <div class="col-sm-12">
                    <select class="form-select mb-3" id="ddl_mesas_disponibles" onchange="cambiar_mesa()">
                        <option value="">Mesas Disponibles</option>
                    </select>
                </div>                
            </div>            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
        </div>                                     
      </div>
    </div>
  </div>

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
                            <input type="text" name="txt_ci" id="txt_ci" class="form-control form-control-sm" onkeyup="num_caracteres('txt_ci',10)" onblur="validar_ci('txt_ci');validar_ci_ruc('txt_ci');">                    
                        </div>  
                        <div class="col-sm-12">
                            <b>NOMBRE</b>
                            <input type="text" name="txt_nombre" id="txt_nombre" class="form-control form-control-sm" autocomplete="off" onblur="validar_nombre()">                    
                        </div>  
                        <div class="col-sm-12">
                            <b>TELEFONO</b>
                            <input type="text" name="txt_telefono" id="txt_telefono" class="form-control form-control-sm" autocomplete="off" onkeyup="num_caracteres('txt_telefono',10)">                    
                        </div>      
                        <div class="col-sm-12">
                            <b>EMAIL</b>
                            <input type="text" name="txt_email" id="txt_email" class="form-control form-control-sm" autocomplete="off" onblur="validador_correo('txt_email')">                    
                        </div> 
                        <div class="col-sm-12">
                            <b>RAZON SOCIAL</b>
                            <input type="text" name="txt_razon" id="txt_razon" class="form-control form-control-sm" readonly="">                    
                        </div>   
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
                            <b>DIRECCION</b>
                            <textarea class="form-control" cols="4" style="resize:none" name="txt_direccion" id="txt_direccion"></textarea>                   
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
          <button type="button" class="btn btn-primary" onclick="generar_facturar()"> Facturar mesa <label id="lbl_fac"></label></button>
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




<?php include('footer.php'); ?>