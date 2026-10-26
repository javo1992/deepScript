<?php include('./header.php'); $id='';if(isset($_GET['id'])){ $id = $_GET['id'];} ?>
<script type="text/javascript">
    
  $( document ).ready(function() {
    var id = '<?php echo $id; ?>';
    sucursales();
    tipo_usuario();
    if(id!='')
    {
      datos_col(id);
    }


    $("#subir_imagen").on('click', function() {
        if($('#id').val()=='')
        {
            Swal.fire('Asegurese de guardar los datos primero','','warning');
            return false;

        }
     var fileInput = $('#file_img').get(0).files[0];
  console.info(fileInput);
  
      if(fileInput=='')
      {
        Swal.fire('','Seleccione una imagen','warning');
        return false;
      }

        var formData = new FormData(document.getElementById("form_img"));
         $.ajax({
            url: '../controlador/usuariosC.php?cargar_imagen=true',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            dataType:'json',
         // beforeSend: function () {
         //        $("#foto_alumno").attr('src',"../../img/gif/proce.gif");
         //     },
            success: function(response) {
               if(response==-1)
               {
                 Swal.fire(
                  '',
                  'Algo extraño a pasado intente mas tarde.',
                  'error')

               }else if(response ==-2)
               {
                  Swal.fire(
                  '',
                  'Asegurese que el archivo subido sea una imagen.',
                  'error')
               }else
               {
                $('#file_img').empty();
                var id = '<?php echo $id; ?>';
                datos_col(id);                
               } 
            }
        });
    });
    // --------------------------
});
     
 
  function datos_col(id)
  { 
    $('#titulo').text('Editar custodio');
    $('#op').text('Editar');
    var parametros=
    {
        'buscar':'',
        'id':id,
    }

    $.ajax({
      data:  {parametros:parametros},
      url:   '../controlador/usuariosC.php?listar=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {
          console.log(response);
           $('#txt_nombre').val(response[0].nombre); 
           $('#txt_per_no').val(response[0].id); 
           $('#txt_ci').val(response[0].ci); 
           $('#txt_email').val(response[0].email);
           $('#txt_nick').val(response[0].nick); 
           $('#txt_pass').val(response[0].pass); 
           $('#txt_direccion').val(response[0].direccion); 
           $('#txt_telefono').val(response[0].telefono); 
           $('#ddl_sucursales').val(response[0].ids); 
           $('#ddl_tipo_usuario').val(response[0].idt); 
           $('#img_foto').attr('src',response[0].foto+'?'+Math.random()); 
           $('#id').val(response[0].id); 
      }
    });
  }

function sucursales()
  { 
   
    $.ajax({
      // data:  {parametros:parametros},
      url:   '../controlador/usuariosC.php?sucursales=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {
          console.log(response);
           $('#ddl_sucursales').html(response);
      }
    });
  }

function tipo_usuario()
  { 
   
    $.ajax({
      // data:  {parametros:parametros},
      url:   '../controlador/usuariosC.php?tipo_usuario=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {
          var op = '';
         response.forEach(function(item,i)
         {
             op+='<option value="'+item.id_tipo_usuario+'">'+item.tipo_usuario+'</option>'
         })
         $('#ddl_tipo_usuario').html(op);
      }
    });
  }


  function delete_datos()
  {
    var id = '<?php echo $id; ?>';
    Swal.fire({
  title: 'Eliminar Registro?',
  text: "Esta seguro de eliminar este registro?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si'
}).then((result) => {
  if (result.value) {
    eliminar(id);    
  }
})

  }

 
  
  function insertar(parametros)
  {
     $.ajax({
      data:  {parametros:parametros},
      url:   '../controlador/usuariosC.php?insertar=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {  
        if(response == 1)
        {
          $('#myModal').modal('hide');
          Swal.fire(
            '',
            'Operacion realizada con exito.',
            'success'
          )
          consultar_datos();
        }
        else if(response==-2)
        {
            Swal.fire('','CI repetido.','warning');
        }
        else
        {
            Swal.fire('','Usuario agregado.','success').then(function(){ location.href = 'detalle_usuario.php?id='+response});           
        }  
               
      }
    });

  }
  function limpiar()
  {
      $('#txt_nombre').val(''); 
      $('#txt_per_no').val(''); 
      $('#txt_ci').val(''); 
      $('#txt_email').val('');
      $('#txt_puesto').val(''); 
      $('#txt_unidad').val(''); 
      $('#id').val(''); 
      $('#titulo').text('Nuevo custodio');
      $('#op').text('Guardar');
           

  }
  function eliminar(id)
  {
     $.ajax({
      data:  {id:id},
      url:   '../controlador/usuariosC.php?eliminar=true',
      type:  'post',
      dataType: 'json',
      /*beforeSend: function () {   
           var spiner = '<div class="text-center"><img src="../../img/gif/proce.gif" width="100" height="100"></div>'     
         $('#tabla_').html(spiner);
      },*/
        success:  function (response) {  
        if(response == 1)
        {
         Swal.fire(
      'Eliminado!',
      'Registro Eliminado.',
      'success'
    ).then(function(){
        location.href = 'usuarios.php';
    })
        }  
               
      }
    });

  }
  function editar_insertar()
  {
     var nom = $('#txt_nombre').val(); 
     var ci = $('#txt_ci').val(); 
     var email= $('#txt_email').val();
     var pue = $('#txt_nick').val(); 
     var uni = $('#txt_pass').val(); 
     var per = $('#txt_per_no').val(); 
     var tel = $('#txt_telefono').val(); 
     var dir = $('#txt_direccion').val(); 
     var suc = $('#ddl_sucursales').val(); 
     var tip = $('#ddl_tipo_usuario').val(); 
     var id = $('#id').val();
    
      var parametros = {
        'nombre':nom,
        'ci':ci,
        'email':email,
        'nick':pue,
        'pass':uni,
        'id':id,
        'per':per,
        'tel':tel,
        'dir':dir,
        'suc':suc,
        'tip':tip,
      }
      if(id=='')
        {
          if(nom == '' || ci == '' || email == '' || pue == '' || uni == '' || tel == '' || dir == '' || suc == '' || tip == '')
            {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Asegurese de llenar todo los campos',
               })
            }else
            {
             insertar(parametros)
          }
        }else
        {
            if(nom == '' || ci == '' || email == '' || pue == '' || uni == '' || tel == '' || dir == '' || suc == ''|| tip == '')
            {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Asegurese de llenar todo los campos',
               })
            }else
            {
              insertar(parametros);
            }
        }
  }
   function paginacion(num)
{
  $('#txt_pag').val(num);
  var pag = $('#txt_pag').val().split('-');
  var pos = pag[1]/25;
  consultar_datos();
  // alert(pos);
}
function guias_pag(tipo)
{

  var m1 =  $('#txt_pag').val().split('-');
  var m =  $('#txt_pag1').val().split('-');
  var pos = m1[1]/25;
  if (tipo=='+')
  {
    if(pos >= 10)
    {
       var fin =  m[1]*(pos+1);
       var ini = fin-m[1];
       $('#txt_pag').val(ini+'-'+fin);
       consultar_datos();

    }else{
    var fin =  m[1]*(pos+1);
    var ini = fin-m[1];
    $('#txt_pag').val(ini+'-'+fin);
    consultar_datos();
   }

  }else
  {
    if(pos == 1)
    {
      alert('esta en el inicio');
    }else
    {
       var fin =  m[1]*(pos-1);
       var ini = fin-m[1];
       $('#txt_pag').val(ini+'-'+fin); 
       consultar_datos();  
    }
  }
}

function guardar_tipo_user()
{
  var tusu = $('#txt_tipo_usu').val();
  if(tusu=='')
  {
    Swal.fire('Llene el campo','','error');
    return false;
  }
  var parametros = 
  {
    'tipo':tusu,
  }
   $.ajax({
      data:  {parametros:parametros},
      url:   '../controlador/usuariosC.php?add_tipo_usu=true',
      type:  'post',
      dataType: 'json',     
        success:  function (response) {  
        if(response == 1)
        {
          tipo_usuario();
         Swal.fire('Guardado','Tipo de usuario guardado', 'success').then(function(){
            $('#modal_tipo').modal('hide');
          })
        }  
               
      }
    });



}
</script>

<main class="content">
    <div class="container-fluid p-0">

             <input type="hidden" id="txt_pag" name="" value="0-25">
              <input type="hidden" id="txt_pag1" name="" value="0-25">
              <input type="hidden" id="txt_numpag" name="">

          <div class="row">
            <div class="col-sm-12" id="btn_nuevo">
                <a href="usuarios.php" class="btn btn-default btn-sm"><i class="align-middle" data-feather="arrow-left"></i> Regresar</a>
                <a href="#" class="btn btn-success btn-sm" onclick="location.href = 'detalle_usuario.php'"><i class="fa fa-plus"></i>  Nuevo</a>              
            </div>
          </div>
              <div class="row">
                <div class="col-sm-4">
                    <form enctype="multipart/form-data" id="form_img" method="post" class="col-sm-12">
                        <input type="hidden" name="id" id="id" class="form-control"> 
                     <div class="widget-user-image text-center">
                            <img class="img-profile rounded-circle" src="../img/sistema/sin_imagen.jpg" alt="User Avatar" id="img_foto" name="img_foto" style="width: 300px;height: 250px;">
                         </div><br>
                        <input type="file" name="file_img" id="file_img" class="form-control form-control-sm">
                        <input type="hidden" name="txt_nom_img" id="txt_nom_img">
                        <button class="btn btn-primary btn-block" id="subir_imagen" type="button">Cargar imagen</button>
                    </form>                         
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-8">
                             Nombre <br>
                            <input type="input" name="txt_nombre" id="txt_nombre" class="form-control">
                        </div>
                        <div class="col-sm-4">                  
                            CI <br>
                            <input type="input" name="txt_ci" id="txt_ci" class="form-control">                 
                        </div>                  
                        <div class="col-sm-6">   
                            Correo <br>
                        <input type="input" name="txt_email" id="txt_email" class="form-control"> 
                            
                        </div>
                        <div class="col-sm-6">   
                            Telefono <br>
                        <input type="input" name="txt_telefono" id="txt_telefono" class="form-control"> 
                            
                        </div>
                        <div class="col-sm-6">
                            Nick <br>
                        <input type="input" name="txt_nick" id="txt_nick" class="form-control">
                            
                        </div>
                        <div class="col-sm-6">   
                            password <br>
                            <input type="input" name="txt_pass" id="txt_pass" class="form-control">
                        </div>
                        <div class="col-sm-6">   
                            Sucursal<br>
                            <select class="form-select" id='ddl_sucursales' name="ddl_sucursales">
                                <option value="">Seleccione sucursal</option>
                            </select>
                        </div>
                  <div class="col-sm-6">   
                        Tipo usuario<br>
                        <div class="input-group mb-3">
                            <select class="form-select flex-grow-1"  id='ddl_tipo_usuario' name="ddl_tipo_usuario">
                              <option value="">Seleccione tipo usuario</option>
                            </select>
                            <button class="btn btn-secondary btn-sm" type="button" onclick="$('#modal_tipo').modal('show')"><i class="fa fa-users"></i></button>
                        </div>
                  </div>
                        <div class="col-sm-12">   
                              Direccion <br>
                              <textarea class="form-control" style="resize:none" cols="2" id="txt_direccion" name="txt_direccion"></textarea>
                            
                        </div>
                    </div>
                </div> 
             </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-primary" id="btn_editar" onclick="editar_insertar()">Guardar</button>
           <button type="button" class="btn btn-danger" id="btn_eliminar" onclick="delete_datos()">Eliminar</button>
        </div>
    </div>
</main>



<div class="modal fade" id="modal_tipo"  data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content" style="border: 1px solid;">
            <div class="modal-header">
                <h5 class="modal-title">Tipo usuario</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
               <div class="row">
                 <div class="col-sm-12">
                   Tipo Usuario
                   <input type="" name="txt_tipo_usu" id="txt_tipo_usu" class="form-control">
                 </div>
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="guardar_tipo_user()">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>






<?php include('footer.php'); ?>