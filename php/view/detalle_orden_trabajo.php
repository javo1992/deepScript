<?php
@session_start(); 
include('header.php');  
$id='';?>

<script src="../js/js_system/ordenes_trabajo.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        cargar_orden(<?php echo $_GET['Nro'];?>);    
    });
</script>
<!-- Begin Page Content -->
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Detalle del Orden de Trabajo</h3>
                <!-- <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6> -->
            </div>
            <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white" type="button" id="dropdownMenuDate2" title="Saldo y precio por cada documento">
                        <i class="mdi mdi-calendar"></i>Saldo: $<span id="lbl_saldo"></span> - c/d $<span id="lbl_pvpdoc"></span>
                        </button>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-10">         
        <a class="btn btn-default btn-sm" style="border: 1px solid;" href="ordenes_trabajo.php"><i class="fa fa-arrow-left"></i> Regresar</a>
    </div>
    <div class="col-sm-2 text-right">      
    </div>                      
</div>

<div class="card shadow mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
            <div class="row">
                    <div class="col-sm-5">
                        <b> Encargado:</b>
                        <h1 class="h3 mb-1 text-gray-800" id="txt_nombre">Encargado</h1>                                    
                    </div>
                <div class="col-sm-3">
                    <b>Fecha Emision:</b>
                    <input type="date" name="txt_fecha" id="txt_fecha" class="form-control form-control-sm">              
                </div>
                <div class="col-sm-2">
                    <b>Telefono</b>
                    <input type="text" name="txt_telefono" id="txt_telefono" class="form-control form-control-sm">
                </div> 
            </div>
            <div class="row mb-1">
                <div class="col-sm-7">
                    <b>Autorizacion:</b><br>
                    <label id="txt_autorizacion"></label>                        
                </div>   
            </div>                  
        </div>
            <div class="col-sm-2">
                <div class="row">
                     <div class="col-sm-12 text-center">
                        <b>No. Orden:</b><br>
                        <h1 class="h3 mb-2 text-gray-800" id="txt_NoOrd">0</h1>            
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-8">
    <!-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
    </div> -->
    <div class="card-body">
        <div class="row mb-3" id="form_add_producto">
            <div class="col-sm-2">
                <b>Serie</b>
                <input type="text" name="txt_serie" id="txt_serie" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-sm-2">
                <b>Placas</b>
                <input type="text" name="txt_placas" id="txt_placas" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-sm-3">
                <b>Modelo Marca</b>
                <input type="text" name="txt_modelo" id="txt_modelo" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-sm-1" style="padding-left: 0px;">
                <b>SubTot</b>
                <input type="text" name="txt_sub" id="txt_sub" class="form-control form-control-sm" readonly value="0.00">
            </div>
            <div class="col-sm-1" style="padding: 0px;">
                <b>Iva <label id="lbl_iva" style="padding:0px;margin: 0px;"></label></b>
                <input type="text" name="txt_iva" id="txt_iva" class="form-control form-control-sm" readonly value="0.00">
            </div>
            <div class="col-sm-1" style="padding: 0px;">
                <b>% Dscto</b>
                <input type="text" name="txt_dcto" id="txt_dcto" class="form-control form-control-sm" value="0.00">
            </div>
            <div class="col-sm-6">
                <b>Datos adicionales</b>
                <input type="text" class="form-control form-control-sm" placeholder="" id="txt_detalle" name="txt_detalle">
            </div>
            <div class="col-sm-2">    
            </div>
            <div class="col-sm-2">
                <b>Total</b>
                <input type="text" name="txt_total" id="txt_total" class="form-control form-control-sm" onblur="calcular(true)" value="0.00">
            </div>                      
        </div>
</div>
</div>                        

<?php include('footer.php');?>