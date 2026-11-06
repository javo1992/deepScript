function listar_inventario() {
    var desde = $('#txt_desde').val();
    var hasta = $('#txt_hasta').val();

    var parametros =
    {
        'desde': desde,
        'hasta': hasta
    }
    console.log(parametros);
    $.ajax({
        data: {parametros:parametros},
        url: '../controlador/inventarioC.php?listar_inventario=true',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            $('#lista_inventario').html(response);
        }
    });
}