<?php include('header.php'); ?>
<script type="text/javascript">
    $(document).ready(function () {
    	lista_proveedores();
});

</script>
	<script src="../js/js_system/cliente.js"></script>		


  <h1 class="h3 mb-3"><strong>Proveedores</strong></h1>
<div class="card shadow mb-3">
    <div class="card-body">
         <div class="row mb-3">
            <div class="col-sm-2">
                <a class="btn btn-success btn-sm" href="detalle_cliente.php?tipo=P"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
          </div>
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" name="query" id="query" class="form-control form-control-sm" onkeyup="lista_proveedores()" placeholder="Nombre / CI / RUC">
                </div>
            </div>        
    </div>
    
</div>
 


    <div class="row" id="lista_proveedores">
    	    	
    </div>
<?php include('footer.php'); ?>
           