<?php include('./header2.php'); ?>
<script type="text/javascript">
  $( document ).ready(function() {
    consultar_datos();
});
     
  function consultar_datos(id='')
  { 
    var estado='';

    $.ajax({
      data:  {id:id},
      url:   '../controlador/estadoC.php?lista=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {    
        // console.log(response);   
        $.each(response, function(i, item){
          console.log(item);
        estado+='<tr><td>'+item.CODIGO+'</td><td><a href="detalle_estado.php?id='+item.ID_ESTADO+'"><u>'+item.DESCRIPCION+'</u></a></td><td>';

      estado+='</td></tr>';
        });       
        $('#tbl_datos').html(estado);        
      }
    });
  }



  function buscar(buscar)
  {
     var estado='';

    $.ajax({
      data:  {buscar:buscar},
      url:   '../controlador/estadoC.php?buscar=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {    
        // console.log(response);   
        $.each(response, function(i, item){
          console.log(item);
       estado+='<tr><td>'+item.CODIGO+'</td><td><a href="detalle_estado.php?id='+item.ID_ESTADO+'"><u>'+item.DESCRIPCION+'</u></a></td><td>';

      estado+='</td></tr>';
        });       
        $('#tbl_datos').html(estado);     
      }
    });
  }
  

  function limpiar()
  {
      $('#codigo').val('');
      $('#descripcion').val('');
      $('#id').val('');
       $('#titulo').text('Nuevo Estado');
        $('#op').text('Guardar');
           

  }

</script>
<div >
    <!-- Content Header (Page header) -->
    <br>
    <section class="content">
      <div class="container-fluid">

          <div class="row">
            <div class="col-sm-12" id="btn_nuevo">
              <a href="detalle_estado.php?" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>   Nuevo</a>
               <a href="#" class="btn btn-default btn-sm" id="excel_estados" title="Informe en excel del total de estados"><i class="far fa-file-excel"></i> Total Estados</a>
            </div>  
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4">
                <input type="" name="" id="txt_buscar" onkeyup="buscar($('#txt_buscar').val())" class="form-control form-control-sm" placeholder="Buscar estado"> 
              </div> 
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th></th>
                </tr>
              </thead>
              <tbody id="tbl_datos">
               
              </tbody>
            </table>
          </div>
        </div>

        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="titulo">Nuevo Estado</h3>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="id" class="form-control">
        Codigo <br>
        <input type="input" name="codigo" id="codigo" class="form-control">
        Descripcion <br>
        <input type="input" name="descripcion" id="descripcion" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="op" onclick="editar_insertar()">Guardar</button>
      </div>
    </div>
  </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


        <?php // include('./footer.php'); ?>
     