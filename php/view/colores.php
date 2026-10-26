<?php include('./header2.php'); ?>
<script type="text/javascript">
  $( document ).ready(function() {
    consultar_datos();
});
     
  function consultar_datos(id='')
  { 
    var colores='';

    $.ajax({
      data:  {id:id},
      url:   '../controlador/coloresC.php?lista=true',
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
         colores+='<tr><td>'+item.CODIGO+'</td><td><a href="detalle_colores.php?id='+item.ID_COLORES+'"><u>'+item.DESCRIPCION+'</u></a></td><td>';
       
        colores+='</td></tr>';
        });       
        $('#tbl_datos').html(colores);        
      }
    });
  }

  function buscar(buscar)
  {
     var colores='';

    $.ajax({
      data:  {buscar:buscar},
      url:   '../controlador/coloresC.php?buscar=true',
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
        colores+='<tr><td>'+item.CODIGO+'</td><td><a href="detalle_colores.php?id='+item.ID_COLORES+'"><u>'+item.DESCRIPCION+'</u></a></td><td>';
      
        colores+='</td></tr>';
        });       
        $('#tbl_datos').html(colores);             
      }
    });
  }
  
 
  function limpiar()
  {
      $('#codigo').val('');
      $('#descripcion').val('');
      $('#id').val('');
       $('#titulo').text('Nuevo color');
        $('#op').text('Guardar');
           

  }

</script>

<div>
    <!-- Content Header (Page header) -->
    <section class="content">
      <div class="container-fluid">

          <div class="row">
            <div class="col-sm-12" id="btn_nuevo">
              <a href="detalle_colores.php" class="btn btn-success btn-sm"><i class=" fa fa-plus"></i> Nuevo</a>
               <a href="#" class="btn btn-default btn-sm" id="excel_colores" title="Informe en excel del total de Colores"><i class="far fa-file-excel"></i> Total Colores</a>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-4">
                  <input type="" name="" id="txt_buscar" onkeyup="buscar($('#txt_buscar').val())" class="form-control form-control-sm" placeholder="Buscar color">    
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

   </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="titulo">Nuevo Color</h3>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="id" class="form-control" hidden="">
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
</div>

        <?php //include('./footer.php'); ?>
     