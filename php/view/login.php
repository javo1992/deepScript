
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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />


    <script src="../js/js_system/jquery-3.6.0.min.js"></script>   
    <script src="../js/js_system/app.js"></script>
    <script src="../js/js_system/login.js"></script>  
    <script src="../js/js_system/sweetalert2.js"></script>

     <script type="text/javascript">
        $(document).ready(function () {
            recordar();
        });
    </script>


</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-right">
                <!-- <img src="../img/sistema/logo-script.png" alt="logo"> -->
                <h3><u>Deep-Script</u></h3>
              </div>
              <div class="row">
                <div class="col-sm-3">
                     <img src="../img/empresa/logo.png" alt="Charles Hall" class="img-fluid rounded-circle" id="logo_emp" style="display: none;" />                    
                </div>     
                <div class="col-sm-9">
                    <h6 id="empresa_nom" style="display:none">Hello! let's get started</h6>   
                    <p style="color:green;display: none;" id="validar_emp">Empresa validad</p>                          
                </div>
                             
              </div>           
                 <form class="user">
                    <div class="">                                            
                        <label class="form-label">Ruc de empresa</label>
                        <input type="text" class="form-control form-control-user" id="txt_empresa" placeholder="RUC de empresa" onblur="busca_empresa()">
                          <input type="text" class="form-control form-control-user" id="txt_id_empresa" style="display:none">
                    </div>
                    <div class="">
                        <label class="form-label">Usuario</label>
                        <input type="text" class="form-control form-control-user" id="txt_usuario" placeholder="Usuario">
                    </div>                                        
                    <div class="">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control form-control-user"
                            id="txt_password" placeholder="Password">
                    </div>
                   <!--  <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                        </div>
                    </div> -->
                    <br>
                    <div class="form-group">
                        <button type="button" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" onclick="login()">Continuar</button>
                    </div>                                      
                    <hr>
                </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>

