<?php include('header.php'); ?>
<script src="../js/js_system/inventario.js"></script>		
<script type="text/javascript">
    $(document).ready(function () {
        listar_inventario();
    });

</script>
<!-- Begin Page Content -->
<main class="content">
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <b>Desde</b>
                    <input type="date" name="txt_desde" id="txt_desde" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>" onblur="listar_inventario()">
                </div>
                <div class="col-sm-2">
                    <b>Hasta</b>
                    <input type="date" name="txt_hasta" id="txt_hasta" class="form-control form-control-sm" onblur="listar_inventario()">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm mb-3">
                <div class="card-header py-2">
                    <h6 class="card-title mb-0">Inventario</h6>
                </div>

                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover
                                    align-middle mb-0 ordenes-tabla"
                            id="Tbl_inventario">

                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Valor unitario</th>
                                    <th>Total IVA</th>
                                    <th>Subtotal</th>
                                    <th>existencia</th>
                                    <th>Costo</th>
                                    <th>Valor total</th>
                                    <th>Detalle</th>
                                    <th>Fabricación</th>
                                    <th>Expiración</th>
                                    <th>Serie</th>
                                </tr>
                            </thead>

                            <tbody id="lista_inventario">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
<?php include('footer.php'); ?>
           