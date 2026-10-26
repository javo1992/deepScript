   <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span> -->
           
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <!-- <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span>  -->
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
   

 </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../vendors/chart.js/Chart.min.js"></script>
  <script src="../vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="../vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="../js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="../js/dashboard.js"></script> -->
  <script src="../js/Chart.roundedBarCharts.js"></script>
  <script src="../vendors/select2/select2.min.js"></script>
  <script src="../js/select2.js"></script>
  <script src="../js/js_system/jquery-ui.js"></script>   
  <!-- End custom js for this page-->
</body>

</html>

<div class="modal" id="alertas" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-dialog-centered">  
      <!-- Modal body -->
      <div class="modal-body text-center">
        <img src="../img/facturando.gif" id="img_alerta" style="width: 30%;">
        <label id="tipo_alerta">Facturando..</label>
      </div>  
    </div>
  </div>
</div>

<div class="modal" id="notificacion">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">  
      <div class="modal-header">
        <h5 class="modal-title" id="lbl_titulo"></h5>
      </div> 
      <!-- Modal body -->
      <div class="modal-body">
          <div class="row">
            <input type="hidden" name="txt_id_noti" id="txt_id_noti">
            <div class="col-sm-12" id="lbl_cuerpo">
            </div>          
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="notificado_leido()">Cerrar</button>
      </div>  
    </div>
  </div>
</div>

<div class="modal fade" id="myModal_sri_error" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-xs-2"><b>Estado</b> </div>
          <div class="col-xs-10" id="sri_estado"></div>          
        </div>
        <div class="row">
          <div class="col-xs-6"><b>Codigo de error</b> </div>
          <div class="col-xs-6" id="sri_codigo"></div>          
        </div>
        <div class="row">
          <div class="col-xs-2"><b>Fecha</b></div>
          <div class="col-xs-10" id="sri_fecha"></div>          
        </div>
        <div class="row">
          <div class="col-xs-12"><b>Mensaje</b></div>
          <div class="col-xs-12" id="sri_mensaje"></div>          
        </div>
        <div class="row">
          <div class="col-xs-12"><b>Info Adicional</b></div>
          <div class="col-xs-12" id="sri_adicional"></div>          
        </div>
      </div>
      <input type="hidden" id="txtclave" name="">

      <div class="modal-footer p-1">
        <!-- <a type="button" class="btn btn-primary" href="#" id="doc_xml">Descargar xml</button>         -->
        <button type="button" class="btn btn-outline-secondary" onclick="location.reload();">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal_carga_masiva" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <b>Seleccione excel</b>
          <form id="excelForm" enctype="multipart/form-data">
              <input type="file" class="form-control" name="file_doc_excel" id="file_doc_excel" accept=".xlsx, .xls"> 
              <button type="button" id="uploadButton">Subir Excel</button>
          </form>

        </div>
       
      </div>
      <input type="hidden" id="txtclave" name="">

      <div class="modal-footer p-1">
        <button type="button" class="btn btn-primary" onclick="subir_datos()" id="doc_xml">Subir datos</button>        
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


    <script>
         function modal_error_seri(auto,carpeta)
          {
            var parametros = 
            {
                'clave':auto,
                'carpeta':carpeta,
            }
            $.ajax({
                data: {parametros:parametros},
                url:   '../controlador/lista_facturaC.php?error_sri=true',
                type:  'post',
                dataType: 'json',
                success:  function (data) { 
                $('#myModal_sri_error').modal('show');
                $('#sri_estado').text(data.estado[0]);
                $('#sri_codigo').text(data.codigo[0]);
                $('#sri_fecha').text(data.fecha[0]);
                $('#sri_mensaje').text(data.mensaje[0]);
                $('#sri_adicional').text(data.adicional[0]);
                        // $('#doc_xml').attr('href','')
                 console.log(data);
                 
                }
              });
          }

          function carga_masiva(tipo)
          {
            $('#myModal_carga_masiva').modal('show');
            
          }

          function subir_datos()
          {
              var formData = new FormData($('#excelForm')[0]);
              $.ajax({
                  url: '../controlador/funcionesSistema.php?carga_masiva=true',
                  type: 'POST',
                  data: formData,
                  processData: false, // Evita que jQuery procese los datos
                  contentType: false, // Evita que jQuery establezca el tipo de contenido
                  success: function (response) {
                      console.log('Respuesta del servidor:', response);
                  },
                  error: function (error) {
                      console.error('Error:', error);
                  }
              });
          }

    </script>   

