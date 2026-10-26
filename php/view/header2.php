<?php   @session_start(); $mesa=0; if(isset($_GET['mesa'])){$mesa=1;}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/feather/feather.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />


    <!-- js externos-->
    <link href="../vendors/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../js/js_system/jquery-3.5.1.min.js"></script>  <!-- funciona selec2 bien -->
    <script src="../js/js_system/sweetalert2.js"></script>    
    <script src="../js/js_system/inicio.js"></script>     
    <script src="../js/js_system/funciones_globales.js"></script>    
    <!-- <script src="../js/js_system/select2.min.js"></script>          -->
    <script src="../js/js_system/jquery-ui.js"></script>   
    <script src="../js/js_system/informes.js"></script>  



    <!-- css externos-->
    <link rel="stylesheet" href="../css/css_system/email.css" type="text/css">
    <!-- <link rel="stylesheet" href="../css/multiple_email.css" type="text/css"> -->
    <!-- <link href="../css/css_system/select2.min.css" rel="stylesheet"> -->
    <link href="../css/css_system/jquery-ui.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

  
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">

    <style type="text/css">
    .responsive-iframe {
            position: initial;
           top: 0;
           width: 100%;
           height: 500px;
       }
    </style>

   

    <script type="text/javascript">
        var em = '<?php echo $_SESSION['INICIO']['ID_EMPRESA']?>';
        var us = '<?php echo $_SESSION['INICIO']['ID_USUARIO']?>';
        $(document).ready(function () {
            validar_session();
             menu_lateral();
       
        });
                    
    function validar_session() 
    {
        const id_empresa = "<?php echo isset($_SESSION['INICIO']['ID_EMPRESA']); ?>";
        const empresa = '<?php echo isset($_SESSION["INICIO"]["EMPRESA"]);?>';
        const usuario = '<?php echo isset($_SESSION["INICIO"]["USUARIO"]); ?>';
        const id_usuario = '<?php echo isset($_SESSION["INICIO"]["ID_USUARIO"]); ?>';   
        if(empresa==null || id_usuario==null || empresa=='' || id_usuario=='')
        {
            window.location.href = 'login.php';
        }
    }

    function eliminar_session()
    {
        $.ajax({
            // data:  {parametros:parametros},
            url:   '../controlador/funcionesSistema.php?cerrar_session=true',           
            type:  'post',
            dataType: 'json',
            success:  function (response) { 
               if(response==1)
               {
                 window.location.href='login.php';
               }
            }
          });

    }


    </script>



</head>


<body>
    <div class="wrapper">      

        <div class="main">
           