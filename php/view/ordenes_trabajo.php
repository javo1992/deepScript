<?php include('header.php'); ?>
<script src="../js/js_system/ordenes_trabajo.js"></script>		
<script type="text/javascript">
    $(document).ready(function () {
        listar_ordenes_trabajo();
    });

</script>
<!-- Begin Page Content -->
<main class="content">
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <b>Desde</b>
                    <input type="date" name="txt_desde" id="txt_desde" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>" onblur="listar_ordenes_trabajo()">
                </div>
                <div class="col-sm-2">
                    <b>Hasta</b>
                    <input type="date" name="txt_hasta" id="txt_hasta" class="form-control form-control-sm" onblur="listar_ordenes_trabajo()">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-3">
                <div class="card-header py-2">
                    <h6 class="card-title mb-0">Órdenes de Trabajo</h6>
                </div>

                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover
                                    align-middle mb-0 ordenes-tabla"
                            id="Tbl_ordenes">

                            <thead>
                                <tr>
                                    <th>N.º Orden</th>
                                    <th>Fecha</th>
                                    <th>Encargado</th>
                                    <th>Teléfono</th>
                                    <th>Subtotal</th>
                                    <th>Desc.</th>
                                    <th>IVA</th>
                                    <th>Total</th>
                                    <th>Serie</th>
                                    <th>Estado</th>
                                    <th>Placa</th>
                                    <th>Pago</th>
                                </tr>
                            </thead>

                            <tbody id="lista_ordenes_trabajo">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
<?php include('footer.php'); ?>
           