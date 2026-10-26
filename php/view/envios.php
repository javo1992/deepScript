<?php include('header.php'); ?>
<script src="../js/mesas.js"></script>
<script type="text/javascript">
     $(document).ready(function () {
    $(".select2").select2();

        envios();
        envios_asignados();
        envios_entregados();
        setInterval(envios,10000);
        setInterval(envios_asignados,5000);
        setInterval(envios_entregados,6000);
    });


</script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Entregas</strong> </h1>
            <div class="row">
         <div class="col-lg-7" style="height:400px">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8" style="height: 100%;">
                <div class="card-header py-3">
                    <h6 class="card-title">Lista de entregas</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Encargado de entrega</th>
                        </thead>
                        <tbody id="tbl_envios">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                  
                </div>
                
            </div>

        </div>        
        <div class="col-lg-5" style="height:400px">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8" style="height: 100%;">
                <div class="card-header py-3">
                    <h6 class="card-title">Envios procesados</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </thead>
                        <tbody id="tbl_envios_asig">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                  
                </div>
            </div>

        </div>                        
    </div>
    <br>
    <div class="row">
         <div class="col-lg-12" style="height:450px">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8" style="height: 100%;">
                <div class="card-header py-3">
                    <h6 class="card-title">Entregados</h6>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>EStado pedido</th>
                        </thead>
                        <tbody id="tbl_envios_entregados">
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                  
                </div>
                
            </div>

        </div>        
    </div>
    </div>
</main>



<div class="modal fade" id="envio_factura"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pedido</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body m-3">
                <div class="row" id="visor_factura">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="document.getElementById('ticket').contentWindow.print();">Imprimir</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>



<?php include('footer.php'); ?>