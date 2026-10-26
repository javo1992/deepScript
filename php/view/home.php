<?php include('header.php');?>
<script type="text/javascript">

    $(document).ready(function () {
        cantidad_documentos()
    })
</script>
      <!-- partial -->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Bienvenido</h3>
                 
                </div>
                <!-- <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="../images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal" id="saldo_empresa">$ 0</h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Saldo</h4>
                        <h6 class="font-weight-normal">Actual</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4" style="font-size: 20px;">Facturas generadas</p>                      
                      <p class="fs-30 mb-2"><i class="mdi mdi-file-outline"></i><span id="lbl_f">0</span></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4" style="font-size: 20px;">Reteneciones generadas</p>                      
                      <p class="fs-30 mb-2"><i class="mdi mdi-file-outline"></i><span id="lbl_r">0</span></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">                     
                      <p class="mb-4" style="font-size: 20px;">Notas de credito generadas</p>                      
                      <p class="fs-30 mb-2"><i class="mdi mdi-file-outline"></i><span id="lbl_n">0</span></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      
                      <p class="mb-4" style="font-size: 20px;">Guias de remision generadas</p>                      
                      <p class="fs-30 mb-2"><i class="mdi mdi-file-outline"></i><span id="lbl_g">0</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          
      
<?php include('footer.php'); ?>