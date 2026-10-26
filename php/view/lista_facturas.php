<?php include('header.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
     series();
     cargar_facturas();
});

</script>
	<script src="../js/js_system/lista_facturas.js"></script>		
<!-- Begin Page Content -->
   <div class="row mb-3">
        <div class="col-sm-2">
            <a class="btn btn-success btn-sm" href="cliente_pedido.php?tipo=FA"><i class="fa fa-plus"></i> Nuevo</a>
        </div>
    </div>
<div class="card shadow mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <b>Cliente</b>
                <input type="text" name="txt_query" id="txt_query" class="form-control form-control-sm" placeholder="Cliente" onkeyup="cargar_facturas()">
            </div>
            <div class="col-sm-2">
                <b>No Factura</b>
                <input type="text" name="txt_num_fac" id="txt_num_fac" class="form-control form-control-sm" placeholder="No factura" onkeyup="cargar_facturas()">
            </div>
            <div class="col-sm-2">
                <b>Desde</b>
                <input type="date" name="txt_desde" id="txt_desde" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>" onblur="cargar_facturas()">
            </div>
            <div class="col-sm-2">
                <b>Hasta</b>
                <input type="date" name="txt_hasta" id="txt_hasta" class="form-control form-control-sm" onblur="cargar_facturas()">
            </div>
            <div class="col-sm-2">
                <b>Serie</b>
                <select class="form-control form-control-sm" id="ddl_serie" name="ddl_serie" onchange="cargar_facturas()">
                    <option value="">Serie</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="card-title">Lista de facturas</h5>               
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-sm" id="dataTable">
                    <thead>                            
                        <th width="15%"></th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Factura</th>
                        <th>Serie</th>
                        <th class="text-right">Total</th>
                        <th width="8%">Estado</th>
                    </thead>
                    <tbody id="lista_facturas">
                        
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
           