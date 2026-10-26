<?php include('header.php'); ?>
<!--  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="../css/leaflet-routing-machine.css" /> 
    <script src="../js/mesas.js"></script>

   <script type="text/javascript">
        $(document).ready(function () {
            envios_ruta();
            // setInterval(onLocationFound,10000);
    // $('#sidebarToggleTop').click();
            // estados();
        });
       

        function buscar_puntos(punto)
        {
           $('#modal_espera').modal('show');
            elimina();
         
                var puntos =[];
                var mark =[] ;
                var nu = response.length;    
               

                  puntos.push(L.latLng(data.la, data.lo));


                
                pintar_puntos(puntos,mark);     

                $('#modal_espera').modal('hide');         
           
        }


function entregado_cliente()
{
  var parametros = 
  {
    'envio':$('#ddl_envios').val(),
  }
  if($('#ddl_envios').val()=='')
  {
    Swal.fire('','Seleccione un pedido','warning');
    return false;
  }
  // console.log(parametros);
   $.ajax({
        data:  {parametros:parametros},
        url:   '../controlador/mesasC.php?entregado_cli=true',      
        type:  'post',
        dataType: 'json',
        success:  function (response) { 
          if(response==1)
          {
           Swal.fire('','Pedido entregado','success');     
          }
        }
      });

  // alert(parametros);
  }



     
    </script>
   </script>
  
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        #map {
            width: 100%;
            height: 450px;
        }
    </style>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Rutas de entrega</strong></h1>

        <div class="row">
            <div class="col-lg-12">
                <div class="row"> 
                        <div class="col-sm-2 col-md-1">                            
                            <button class="btn btn-sm btn-primary" onclick="actualizar_pedidos()">Actualizar</button>
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control form-control-sm" id="ddl_envios" name="ddl_envios" onchange="generar_ruta()">
                                <option>Seleccione estado de contenedor</option>
                            </select>
                        </div>
                        <div class="col-sm-2 col-md-1">                            
                            <button  type="button" class="btn btn-sm btn-success" onclick="entregado_cliente()">Entregado</button>
                        </div>
                    </div>
                    <div id="map"></div>
            </div>          
        </div>
    </div>
</main>
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="../js/leaflet-routing-machine.js"></script>
<script src="../js/rutas.js"></script>



<?php include('footer.php'); ?>