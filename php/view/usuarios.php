<?php include('header.php');?>
<script type="text/javascript">
  $( document ).ready(function() {
    consultar_datos();
});
     
  function consultar_datos()
  { 
     var parametros = 
    {
      'buscar':$('#txt_buscar').val(),
      'id':'',
    }

        var custodio='';
    $.ajax({
      data:  {parametros:parametros},
      url:   '../controlador/usuariosC.php?buscar=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {   
        console.log(response);
        $.each(response, function(i, item){
          // console.log(item);
        custodio+='<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">'+
              '<div class="card bg-light">'+
                '<div class="card-header text-muted border-bottom-0">Codigo: '+item.ci+'</div>'+
                '<div class="card-body pt-0">'+
                  '<div class="row">'+
                    '<div class="col-7">'+
                      '<h2 class="lead"><b>'+item.nombre+'</b></h2>'+
                      '<p class="text-muted text-sm"><b>sucursal: </b><br> '+item.sucursal+' </p>'+
                      '<ul class="ml-4 mb-0 fa-ul text-muted">'+
                        '<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Direccion:'+item.direccion+'</li>'+
                        '<li class="small"><span class="fa-li"><i class="align-middle" data-feather="phone"></i></span> TELEFONO :'+item.telefono+' </li>'+
                      '</ul>'+
                    '</div>'+
                    '<div class="col-5 text-center">'+
                      '<img src="'+item.foto+'" alt="" class="img-profile rounded-circle" style="width: 100%;height: 112px; border: 1px solid">'+
                    '</div>'+
                  '</div>'+
                '</div>'+
                '<div class="card-footer">'+
                  '<div class="text-right">'+                    
                    '<a href="detalle_usuario.php?id='+item.id+'" class="btn btn-sm btn-primary">'+
                      '<i class="fas fa-user"></i> Ver Perfil'+
                    '</a>'+
                  '</div>'+
                '</div>'+
              '</div>'+
            '</div>';

        });       

        console.log(custodio);
        $('#tbl_datos').html(custodio);        
      }
    });
  }

</script>

<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Usuarios</strong> </h1>

        <div class="row">
           <input type="hidden" id="txt_pag" name="" value="0-25">
              <input type="hidden" id="txt_pag1" name="" value="0-25">
              <input type="hidden" id="txt_numpag" name="">

          <div class="row">
            <div class="col-sm-12" id="btn_nuevo">
              <a href="detalle_usuario.php" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>  Nuevo</a>
               <!-- <a href="#" class="btn btn-default btn-sm" id="excel_custodios" title="Informe en excel del total de custodios"><i class="far fa-file-excel"></i> Total custodios</a> -->
            </div>            
          </div><br>
          <div class="row">
             <div class="col-sm-4">
                <input type="" name="" id="txt_buscar" onkeyup="consultar_datos()" class="form-control form-control-sm" placeholder="Buscar por nombre"> 
              </div>             
          </div>
          <div class="row">
            <div class="card card-solid col-12">
                <div class="card-body pb-0">
                  <div class="row d-flex align-items-stretch" id="tbl_datos">

                    
                            
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0" id="pag">
                      
                    </ul>
                  </nav>
                </div>
              </div>
          </div>

        </div>
    </div>
</main>


<?php include('footer.php'); ?>