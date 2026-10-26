<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../img/empresa/logo.png" /> <!-- 48-48px -->

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <!-- <title>Sign In | AdminKit Demo</title> -->

    <link href="../css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">


    <script src="../js/jquery-3.6.0.min.js"></script>   
    <script src="../js/app.js"></script>
    <script src="../js/login.js"></script>  
    <script src="../js/sweetalert2.js"></script>

     <script type="text/javascript">
        $(document).ready(function () {
        	

        });



    </script>

</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2" id="empresa_nom">Bienvenido, Nueva empresa</h1>
                           <!--  <p class="lead">
                                Sign in to your account to continue
                            </p> -->
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-8">                                                   
                                     <form class="" id="datos_empresa" enctype="multipart/form-data">
                                     	<div class="row">
                                     		<div class="col-sm-4">    
									       	   	<b>Logo</b>   <br>            	   		
								       	   		 	<input type="hidden" name="id" id="id" class="form-control"> 
								                 	<div class="">
										            	<img class="img-profile rounded-circle" src="../img/sistema/sin_imagen.jpg" alt="User Avatar" id="img_foto" name="img_foto" style="width: 96%;">
										             </div>
										             <br>
								               		<input type="file" name="file_img" id="file_img" class="form-control form-control-sm">
								               		<input type="hidden" name="txt_nom_img" id="txt_nom_img">
								               		
									       	</div>									     
									       	<div class="col-sm-8">
									       		<div class="row">
								       	   			<div class="col-sm-12">
								       	   				<b>Nombre comecial</b>
								       	   				<input type="text" name="txt_nom_comercial" id="txt_nom_comercial" class="form-control form-control-sm">				       	   		
								       	   			</div>
								       	   			<div class="col-sm-12">
								       	   				<b>Razon social</b>       	   		
								       	   				<input type="text" name="txt_razon" id="txt_razon" class="form-control form-control-sm">   				
								       	   			</div>
								       	   			<div class="col-sm-6">
								       	   				<b>CI / RUC </b>
								       	   				<input type="text" name="txt_ci_ruc" id="txt_ci_ruc" class="form-control form-control-sm">
								       	   		       	   				
								       	   			</div>
								       	   			<div class="col-sm-6">
								       	   				<b>Telefono</b>
								       	   				<input type="text" name="txt_telefono" id="txt_telefono" class="form-control form-control-sm">
								       	   		
								       	   			</div>
								       	   			<div class="col-sm-6">
								       	   				<b>Email</b>
								       	   				<input type="text" name="txt_Email" id="txt_Email" class="form-control form-control-sm">
								       	   			</div>
								       	   			<div class="col-sm-6">
											  			<b>Valor de iva</b>      
											  			<input type="text" name="txt_iva" id="txt_iva" class="form-control form-control-sm"> 
											  		</div>
								       	   		</div>									       		
									       	</div>
									       	<div class="col-sm-12">
									       		<div class="col-sm-12">
							       	   				<b>Direccion</b>
							       	   				<textarea class="form-control-sm form-control" style="resize:none" cols="3" name="txt_direccion" id="txt_direccion"></textarea>
							       	   			</div>									       		
									       	</div>
									       	<div class="col-sm-12">
									       		<div class="row">
											  		<div class="col-sm-4">
											  			<b>Ambiente</b>       	   		
												  		<div class="custom-control custom-checkbox small">
											                <input type="radio" class=""  name="rbl_ambi" disabled id="rbl_ambiente_1" value="1" checked>
											                <label class="" for="rbl_ambiente_1">Pruebas</label>

											                <input type="radio" class="" name="rbl_ambi" disabled  id="rbl_ambiente_2" value="2">
											                <label class="" for="rbl_ambiente_2">Produccion</label>
											            </div>           
											  		</div>
											  		<div class="col-sm-4">
											  			<b>Lleva contabilidad</b>       	   		
												  		<div class="custom-control custom-checkbox small">
											                <input type="radio" class=""  name="rbl_conta" disabled id="rbl_conta_no" value="0" checked>
											                <label class="" for="rbl_conta_no">No</label>

											                <input type="radio" class="" name="rbl_conta" disabled  id="rbl_conta_si" value="1">
											                <label class="" for="rbl_conta_si">Si</label>
											            </div>           
											  		</div>
											  		<div class="col-sm-4">
								       	   				<b>Facturacion Electronica</b>       	   		
												  		<div class="custom-control custom-checkbox small">
											                <input type="radio" class="" disabled  name="rbl_fac" id="rbl_fac_no" value="0" >
											                <label class="" for="rbl_fac_no">No</label>

											                <input type="radio" class="" name="rbl_fac" checked disabled id="rbl_fac_si" value="1">
											                <label class="" for="rbl_fac_si">Si</label>
											            </div>              	   				
								       	   			</div>											  		
											  	</div>									       		
									       	</div>
									       	<div class="col-sm-12">
									       		<label class="small text-danger">* Estas opciones podran ser cambiadas una vez dentro del sistem en em apartado de empresa</label>
									       	</div>
									       	
                                     	</div>				 
                                    </form>
                                    <hr>
                                    <div class="form-group text-end">
                                            <button type="button" class="btn btn-lg btn-primary" onclick="nueva_empresa()">Guardar Empresa</button>
                                        </div>  
                                                                       

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


</body>

</html>