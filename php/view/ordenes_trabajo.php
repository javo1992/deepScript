<?php include('header.php'); ?>
<script src="../js/js_system/ordenes_trabajo.js"></script>		
<script type="text/javascript">
    $(document).ready(function () {
     // series();
     cargar_ordenes_trabajo();
});

</script>
<!-- Begin Page Content -->
<main class="content">
    <div class="card shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <b>Desde</b>
                    <input type="date" name="txt_desde" class="form-control form-control-sm" value="<?php echo date('Y-m-d');?>" onblur="cargar_ordenes_trabajo()">
                </div>
                <div class="col-sm-2">
                    <b>Hasta</b>
                    <input type="date" name="txt_hasta" id="txt_hasta" class="form-control form-control-sm" onblur="cargar_ordenes_trabajo()">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="card shadow mb-8">
			<div class="card-header">
                <h5 class="card-title">Ordenes de Trabajo</h5>
            </div>
            <div class="card-body" style="padding-top: 0px;">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody id="lista_ordenes_trabajo">
                </tbody>
            </div>
		</div>
	</div>
</main>
<?php include('footer.php'); ?>
           