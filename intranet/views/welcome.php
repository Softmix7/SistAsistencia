<?php 
ob_start();
session_start();

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
   
    if ($_SESSION['escritorio']==1){
      include 'headerIn.php';
?>


  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-4 col-sm-7 col-md-9" id="totalpeople" name="totalpeople">

          </div>

          <div class="col-8 col-sm-5 col-md-3">
            <div class="input-group input-group-sm mt-1">
              <div class="input-group-prepend">
                <button type="button" class="btn btn-dark btn-sm">Periodo</button>
              </div>
              <select class="custom-select" id="cbanio" name="cbanio" >
              <input type="hidden" class="form-control" id="anio_peo" name="anio_peo">
              </select>
            </div>
          </div>
        </div>
      </div>
    </section>



  <section class="content text-sm">
    <div class="container-fluid">
      <div class="row" id="lisgroup" name="lisgroup" >

      </div>
    </div>
  </section>

  <section class="content text-sm">
    <div class="container-fluid">


      <div class="row" id="graphicsbar" name="graphicsbar">

      </div>
    </div>
  </section>

  </div>

<?php 
    
    require 'footerIn.php'; 
    }else{
        require 'error.php';
    }
     
}
ob_end_flush();
?>


<script type="text/javascript" src="scripts/welcome.js"></script>
