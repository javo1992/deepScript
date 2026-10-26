<?php include('header.php'); 
//print_r($_SESSION['INICIO']);
?>
<script type="text/javascript">
    $(document).ready(function () {
    
});

</script>
	<script src="../js/js_system/secuenciales.js"></script>		
<!-- Begin Page Content -->
        <div class="row">
            <div class="col-md-12 mb-4">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">secuenciales</h3>                 
                </div>
              </div>
            </div>
        </div>
        <div class="card shadow mb-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <b>Tipo de documento</b>
                        <select class="form-control form-control-sm" id="ddl_tipo" name="ddl_tipo">
                            <option value="FA">Factura</option>
                            <option value="LC">Liquidacion de compras</option>
                            <option value="RE">Rerencion</option>
                            <option value="NC">Nota de credito</option>
                            <option value="GR">Guia de remision</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <b>Serie</b>
                        <div class="row">
                            <div class="col-sm-5"  style="padding-right:0px">
                                <input type="" name="estab" id="estab" class="form-control form-control-sm" placeholder="001">
                            </div>
                            <div class="col-sm-1" style="padding: 9px 0px 0px 0px;">
                                -
                            </div>
                            <div class="col-sm-6"  style="padding-left:0px">
                                <input type="" name="punto" id="punto" class="form-control form-control-sm" placeholder="001">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <b>Autorizacion</b>
                        <input type="" name="autorizacion" id="autorizacion" class="form-control form-control-sm" value="<?php echo $_SESSION['INICIO']['RUC_EMPRESA']; ?>" readonly >
                    </div>
                    <div class="col-sm-2">
                        <b>Numero</b>
                         <input type="" name="numero" id="numero" class="form-control form-control-sm" value="1">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btn-sm mt-4" onclick="editar()">Guardar <i class="fa fa-save"></i></button>
                    </div>
                </div>               
            </div>
        </div>
         <div class="card shadow mb-2">
            <div class="card-body">
                 <div class="row">
                     <div class="col-lg-12">                    
                        <table class="table table-hover">
                            <thead>
                                <th width="30%">Tipo</th>
                                <th>Detalle</th>
                                <th>Autorizacion</th>
                                <th width="20%">Serie</th>
                                <th>Numero</th>
                                <th></th>
                            </thead>
                            <tbody id="tbl_datos">
                                
                            </tbody>
                        </table>

                    </div>                        
                </div>

            </div>
        </div>
    
        

<?php include('footer.php'); ?>
           