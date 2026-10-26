$(document).ready(function () {

  $('#file_img').change(function(){
        readImg(this);
      })

      function readImg(input)
      {
        if(input.files && input.files[0])
        {
          var reader = new FileReader();
          reader.onload = function(e)
          {
            $('#img_foto').attr('src',e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }

});
function login()
{
  $('#modal_loader').modal('show');
  $('#lbl_mensaje').text('inicio');
	var usu = $('#txt_usuario').val();
	var pass = $('#txt_password').val();
	var emp = $('#txt_empresa').val();
  var idemp = $('#txt_id_empresa').val();
  var rem = $('#customCheck').prop('checked');
  // console.log(rem);
  // return false;
  if(idemp=='')
  {
    Swal.fire('Espere que se compruebe la empresa','','warning');
    return false;
  }
   if(idemp=='-1')
  {
    Swal.fire('Empresa inexistente','','warning');
    return false;
  }
  if(rem==true)
  {
    // localStorage.setItem('RECORDAR','1');
  }else
  {
    // localStorage.setItem('RECORDAR','0');
  }  
   	var parametros = 
   	{
   	  'usu':usu,
   	  'pass':pass,
      'emp':emp,
      'idEmp':idemp,
   	}
    // return false;
     $.ajax({
      data:  {parametros:parametros},
      url:   '../controlador/funcionesSistema.php?login=true',
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
        $('#modal_loader').modal('hide');
        $('#lbl_mensaje').text(response);
        if(response.res==true)
        {          
        	window.location.href = "../view/home.php";
        }else
        {
        	Swal.fire('','Usuario o contraseña incorrecto','info');
        }
      },
     error: function(xhr, textStatus, error){
        $('#modal_loader').modal('hide');

      $('#lbl_mensaje').text(xhr.statusText);
      alert(xhr.statusText);
      alert(textStatus);
      alert(error);
  }
    });
}

function registrarse()
{
  var datos = $("#form_registro").serialize();
  if($('#txt_lon').val()=='' && $('#txt_lon').val()=='')
  {
    navigator.geolocation.watchPosition(onSuccess, onError, { timeout: 5000 });
  }
   if($('#txt_email').val()=='' || $('#txt_pass').val() =='' || $('#txt_fecha_na').val()=='' || $('#txt_usuario').val()=='')
  {
    Swal.fire('','Llene todo los campos','info');
    return false;
  }
     $.ajax({
      data:  datos,
      url:   url_s+'registrarse=true',
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
        if(response==1)
        {
          Swal.fire('','Usuario creado','success');
          window.location.href = "../pages/inicio.html";
        }else
        {
          Swal.fire('','No se pudo registrar intente mas tarde','error');
        }
      }
    });

}

function recuperar_pass()
{
  if($('#txt_email').val()=='')
  {

    Swal.fire('','Ingrese un email valido','error');
     return false;
  }
  var parametros = 
  {
    'usu':$('#txt_email').val(),
  }
     $.ajax({
      data:  {parametros,parametros},
      url:   url_s+'recuperar=true',
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
        if(response==1)
        {
          Swal.fire('','Su clave termporal se a enviado a su correo','success');
          // window.location.href = "../pages/login.html";
        }else if(response==-2)
        {
          Swal.fire('','No se pudo enviar email','error');
        }
        else
        {
          Swal.fire('','Email no encontrado','error');
        }
      }
    });


}

function recordar()
{  
  const REC = localStorage.getItem('RECORDAR');
  if(REC==1)
  {
    var ruc = localStorage.getItem('RUC_EMPRESA');
    var usu = localStorage.getItem('USUARIO');
    var pas = localStorage.getItem('PASS');
    $('#txt_empresa').val(ruc);
    $('#txt_usuario').val(usu);
    $('#txt_password').val(pas);   
    $('#customCheck').prop('checked',true);
  }

}


function crear_sesion(usuario,empresa,pass)
{
  // var directorio = "file:///storage/emulated/0";
  var texto = [];
  texto.push(usuario+'\n');
  texto.push(pass+'\n');
  texto.push(empresa);

  var blob = new Blob(texto,{type: "text/plain;charset=utf-8"});
  saveAs(blob, "session.txt","C:\\Apps\\");
}

function busca_empresa()
{
    var ruc = $('#txt_empresa').val();
    if(ruc=='')
    {
      Swal.fire('Ingrese ID de empresa','','error');
      return false;
    }
     $.ajax({
      data:  {ruc,ruc},
      url:   '../controlador/funcionesSistema.php?buscar_empresa=true',
      type:  'post',
      dataType: 'json',
      success:  function (response) { 
        console.log(response);
        if(response!=-1)
        {
          $('#empresa_nom').text(response.Nombre_Comercial);
          $('#empresa_nom').css('display','initial');
          if(response.logo!=null)
          {

            $('#logo_emp').css('display','initial');
            $('#logo_emp').attr('src',response.logo+'?'+Math.random());
            $('#logo_emp').css('width','90%');
          }
          $('#validar_emp').css('display','block');
        }else
        {

          $('#validar_emp').css('display','none');
        }
        $('#txt_id_empresa').val(response.id_empresa);
      }
    });
}


function nueva_empresa()
{
   var datos = $('#datos_empresa').serialize();
   var formData = new FormData();
    var files = $('#file_img')[0].files[0];
    formData.append('file',files);
    $.ajax({
        url: '../controlador/funcionesSistema.php?nueva_empresa=true&'+datos,
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          if(response==1)
          {
            Swal.fire('Empresa Creada','Sus credenciales de acceso son Su ruc en los 3 campos del login','success').then(function()
              {
                location.href = 'login.php'  
              });
          }
        }
    });
    return false;

}

// window.resolveLocalFileSystemURL(directorio, function(dir) {
// 	dir.getFile(nombreArchivo, {create:true}, function(fileEntry) {
// 		// el archivo ha sido creado satisfactoriamente.
// 		// Usa fileEntry para leer el contenido o borrar el archivo
// 	});
// });