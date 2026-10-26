<?php include('header.php'); ?>
<script src="../js/lista_articulos.js"></script> 
<script type="text/javascript">
    $(document).ready(function () {
        list_trasferencias();
        categorias();
        cargar_transferencias();
     });
</script>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Transferencia de Articulos</h1>
    <!-- <button onclick="eliminar_session()"> Cerrar</button> -->
    <div class="row">
         <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Lista de Articulos</h6> -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal_transferencia"><i class="fa fa-eye"></i> Ver lista de transferencia</button>
                    <span class="badge badge-danger badge-counter" id="noti" style="display:none">Pendiente</span>
                </div>
                <div class="card-body">
                    <div class="row">
            <div class="col-sm-2" style="display: none;">
                <label><input type="radio" name="opc" id="OpcP" checked value="P"  onclick="list_trasferencias();">Producto</label><br>
                <label><input type="radio" name="opc" id="OpcS" value="S" onclick="list_trasferencias();">Servicio</label>
            </div>
            <div class="col-sm-3">
                <b>Referencia</b>
                <input type="text" name="txt_ref" id="txt_ref" class="form-control form-control-sm" onkeyup="list_trasferencias();">
            </div>
            <div class="col-sm-4">
                <b>Producto</b>
                <input type="text" name="txt_query" id="txt_query" class="form-control form-control-sm" onkeyup="list_trasferencias();">
            </div>
            <div class="col-sm-3">
                <b>Categoria</b><br>
                <select class="form-control-sm form-control" style="width:100%" id="ddl_categoria" name="ddl_categoria" onchange="list_trasferencias();">
                    <option value="">Categoria</option>
                </select>
            </div>            
        </div>
                    <div class="row" style="overflow-y: scroll; height:450px">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable">
                                <thead class="text-primary">
                                	<th></th>
                                	<th width="10%">Referencia</th>
                                	<th width="10%">Cod Auxi</th>
                                    <th width="30%">Producto</th>
                                    <th width="7%">Stock</th>
                                    <th width="7">Medida</th>
                                    <th width="7%">Peso</th>
                                    <th>Localizacion</th>  
                                    <th>Categoria</th>                                    
                                </thead>
                                <tbody id="tbl_productos">
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>                        
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal_transferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lista de transferencias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-sm-6">
      		    <a class="btn btn-success btn-sm" style="border: 1px solid;" href="detalle_articulos.php"><i class="fa fa-plus"></i> Vaciar lista</a>
      		</div>
      		<div class="col-sm-6">
      			<b>Enviar a (Destino)</b>
      			<select class="form-control-sm form-control" style="width:100%" id="ddl_localizacion">
      				<option value="">Seleccione Destino</option>
      			</select>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-sm-12">
      			<table class="table">
                    <thead>
          				<th>Codigo</th>
          				<th>Articulo</th>
          				<th>Cantidad</th>
          				<th>Categoria</th>  
                    </thead>
                    <tbody id="tbl_trans">
                        
                    </tbody>    				
      			</table>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="tranferencia()"><i class="fa fa-exchange-alt"></i> Transferir</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_cantidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cantidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<input type="hidden" name="txt_id" id="txt_id">
      		<input type="hidden" name="txt_stock" id="txt_stock">
     		<input type="text" name="txt_cant" id="txt_cant" class="form-control form-control-sm" value="1" placeholder="0">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary btn-sm" onclick="agregar_trasnferencia()">Agregar a transferencia</button>
      </div>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>
           