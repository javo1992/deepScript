$(document).ready(function() {

});

function listar_ordenes_trabajo()
{
    var desde = $('#txt_desde').val();
    var hasta = $('#txt_hasta').val();

    var parametros = 
    {
        'desde': desde,
        'hasta': hasta,
    }
    console.log(parametros);
    $.ajax({
        data: {parametros:parametros},
        url: '../controlador/ordenes_trabajoC.php?lista_ordenes_trabajo=true',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            $('#lista_ordenes_trabajo').html(response);
        }
    });
}

function detalle_orden_trabajo(nro_orden){
    location.href="detalle_orden_trabajo.php?Nro="+nro_orden;
}

function cargar_orden(nro_orden){
    var parametros =
    {
        'nro_orden': nro_orden
    }
    console.log(parametros);
    $.ajax({
        data: {parametros:parametros},
        url: '../controlador/ordenes_trabajoC.php?cargar_orden=true',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            $('#txt_nombre').text(response.encargado);
            $('#txt_fecha').val(response.fecha);
            $('#txt_telefono').val(response.telefono_encargado);
            $('#txt_autorizacion').text(response.Autorizacion);
            $('#txt_NoOrd').text(response.num_orden);
            $('#txt_serie').val(response.serie);
            $('#txt_placas').val(response.placa);
            $('#txt_modelo').val(response.modelo_marca);
            $('#txt_sub').val(parseFloat(response.subtotal).toFixed(2));
            $('#txt_iva').val(parseFloat(response.iva).toFixed(2));
            $('#txt_dcto').val(parseFloat(response.descuento).toFixed(2));
            $('#txt_total').val(parseFloat(response.total).toFixed(2));
            $('#txt_detalle').val(response.datos_adicionales);
        }
    });
}