<?php include('header3.php'); ?>
    <script src="../js/mesas.js"></script>
    <script type="text/javascript">
     $(document).ready(function () {
        generar_comanda();
        setInterval(generar_comanda,3000);
    });

   // Iniciar pantalla completa
    function kaishi()  
    {  
        $('#Button1').css('display','none');
        var docElm = document.documentElement;  
        //W3C   
        if (docElm.requestFullscreen) {  
            docElm.requestFullscreen();  
        }  
            //FireFox   
        else if (docElm.mozRequestFullScreen) {  
            docElm.mozRequestFullScreen();  
        }  
                         // Chrome, etc.   
        else if (docElm.webkitRequestFullScreen) {  
            docElm.webkitRequestFullScreen();  
        }  
            //IE11   
        else if (elem.msRequestFullscreen) {  
            elem.msRequestFullscreen();  
        }  
    }  


           // Salir de pantalla completa
    function guanbi() {  
  
  
        if (document.exitFullscreen) {  
            document.exitFullscreen();  
        }  
        else if (document.mozCancelFullScreen) {  
            document.mozCancelFullScreen();  
        }  
        else if (document.webkitCancelFullScreen) {  
            document.webkitCancelFullScreen();  
        }  
        else if (document.msExitFullscreen) {  
            document.msExitFullscreen();  
        }  
    }  


      // oyente de eventos
  
    document.addEventListener("fullscreenchange", function () {  
          
        fullscreenState.innerHTML = (document.fullscreen) ? "" : "not ";  
    }, false);  
      
    document.addEventListener("mozfullscreenchange", function () {  
         
        fullscreenState.innerHTML = (document.mozFullScreen) ? "" : "not ";  
    }, false);  
     
    document.addEventListener("webkitfullscreenchange", function () {  
          
        fullscreenState.innerHTML = (document.webkitIsFullScreen) ? "" : "not ";  
    }, false);  
      
    document.addEventListener("msfullscreenchange", function () {  
          
        fullscreenState.innerHTML = (document.msFullscreenElement) ? "" : "not ";  
    }, false);  
  
  
</script>  
  
<main class="content">
    <div class="container-fluid p-0">

        <!-- <h1 class="h3 mb-3"><strong>Bienvenido</strong> ...</h1> -->

        <div class="row">
             <input type="hidden" name="txt_nmesas" id="txt_nmesas">                 
                    <div class="row" id="mesas">
                               
                    </div>

        </div>
    </div>
</main>


<?php include('footer.php'); ?>