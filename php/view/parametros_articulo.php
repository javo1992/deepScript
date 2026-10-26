<?php include('header.php');?>


        <div class="row">
            <div class="col-lg-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-8">
                <div class="card-body">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#nav-marca" role="tab"><i class="fa fa-clone"></i> Marca</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill"  href="#nav-estado" role="tab"> <i class="fa fa-edit"></i>Estado</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill"  href="#nav-genero" role="tab"> <i class="fa fa-clipboard-list"></i> Genero</a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="pill"  href="#nav-color" role="tab" > <i class="fa fa-palette"></i> Colores</a>
                  </li>              
                </ul>
                  <div class="" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-marca" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-iframe"> 
                          <iframe class="responsive-iframe" src="marcas.php"></iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-estado" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-iframe"> 
                          <iframe class="responsive-iframe" src="estado.php"></iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-genero" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-iframe"> 
                          <iframe class="responsive-iframe" src="genero.php"></iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-color" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="container-iframe"> 
                          <iframe class="responsive-iframe" src="colores.php"></iframe>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <b></b>
                    </div>




                </div>
            </div>

        </div>          
        </div>
<?php include('footer.php'); ?>