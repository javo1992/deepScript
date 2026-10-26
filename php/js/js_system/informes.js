$( document ).ready(function() {


      $('#excel_custodios').click(function(){
      var url = '../lib/Reporte_excel.php?reporte_custodio';                 
         window.open(url, '_blank');
      });

      $('#excel_proyectos').click(function(){
      var url = '../lib/Reporte_excel.php?reporte_proyecto';                 
         window.open(url, '_blank');
      });

      $('#excel_localizacion').click(function(){
      var url = '../lib/Reporte_excel.php?reporte_emplazamiento';                 
         window.open(url, '_blank');
      });

      $('#excel_marcas').click(function(){
      var url = '../lib/Reporte_excel.php?reporte_marca';                 
         window.open(url, '_blank');
      });

      $('#excel_estados').click(function(){
      var url = '../lib/Reporte_excel.php?reporte_estado';                 
         window.open(url, '_blank');
      });

      $('#excel_generos').click(function(){
      var url = '../lib/Reporte_excel.php?reporte_genero';                 
         window.open(url, '_blank');
      });

      $('#excel_colores').click(function(){
      var url = '../lib/Reporte_excel.php?reporte_colores';                 
         window.open(url, '_blank');
      });

      $('#excel_kardex').click(function(){
       para = $('#form_parametros').serialize();
      var url = '../lib/Reporte_excel.php?reporte_kardex&'+para;                 
         window.open(url, '_blank');
      });


});

