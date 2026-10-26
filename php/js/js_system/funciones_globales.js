function num_caracteres(campo,num)
{
	var val = $('#'+campo).val();
	var cant = val.length;
	console.log(cant+'-'+num);

	if(cant>=num)
	{
		$('#'+campo).val(val.substr(0,num));
		return false;
	}

}

function validador_correo(campo)
{
    var campo = $('#'+campo).val();   
    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo)) {
      // alert("válido");
      return true;

    } else {
      Swal.fire('Email incorrecto','','info');
      console.log(campo);
      return false;
    }
}


function validar_ci_ruc(campo) {
        var cad = document.getElementById(campo).value.trim();
        var total = 0;
        var longitud = cad.length;
        var longcheck = longitud - 1;

        if (cad !== "" && longitud === 10){
          for(i = 0; i < longcheck; i++){
            if (i%2 === 0) {
              var aux = cad.charAt(i) * 2;
              if (aux > 9) aux -= 9;
              total += aux;
            } else {
              total += parseInt(cad.charAt(i)); // parseInt o concatenará en lugar de sumar
            }
          }

          total = total % 10 ? 10 - total % 10 : 0;

          if (cad.charAt(longitud-1) == total) {
          }else{
          	Swal.fire('Cedula invalida','revise su numero '+cad,'info');
          	$('#'+campo).val('');
          }
        }
      }
function generar_ceros(valor,num)
{
   var v = valor.length;
   var falt = num-v;
   let text = "0";
   let result = text.repeat(falt);

   return result+valor;
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

String.prototype.ucwords = function() {
  str = this.toLowerCase();
  return str.toUpperCase(); 
}

function mayusculas(campo,valor)
{
    $('#'+campo).val(valor.ucwords());
}


function validar_num_factura(id)
{
  var TxtSuma = 0;
  var le = $('#'+id).val().length;
  var v = $('#'+id).val();
   if($('#'+id).val() <= 0 || $('#'+id).val()=="")
    {
      $('#'+id).val("000000001");
    }else
    {

    while(v.length < 9)
    {
      v = '0'+v;
    }
    $('#'+id).val(v);
  }
}


function autorizacion_factura()
{
  if($('#TxtNumAutor').val()<=0 || $('#TxtNumAutor').val()=="")
  {
     $('#TxtNumAutor').val("0000000001");
  }
  factura_repetida();
}


function solo_9_numeros(id)
{  
  var v = $('#'+id).val();
  if(v.length >9)
  {
   val  = v.substr(0,9);
    $('#'+id).val(val);
  }else{
    $('#'+id).val(v);
  }
}

