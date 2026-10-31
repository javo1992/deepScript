$(document).ready(function() {

});

function cargar_ordenes_trabajo()
{
    var desde = $('#txt_desde').val();
    var hasta = $('#txt_hasta').val();

    var parametros = 
    {
        'desde': desde,
        'hasta': hasta,
    }
    $.ajax({
        data: {parametros:parametros},
        url: '../controlador/orden_trabajoC.php?lista_ordenes_trabajo=true',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            $('lista_ordenes_trabajo').html(response);
        }
    });
}