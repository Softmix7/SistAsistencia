<?php 

ob_start();
session_start();

date_default_timezone_set('America/Lima');

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['reportes']==1){
      include 'headerIn.php';
?>


<style>
  .icons{
    font-size:18px;
  }

</style>

<div class="content-wrapper">

  <section class="content-header">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-4 col-sm-7 col-md-9">
         <button type="button" id="btnreturn" onclick="cancelform()" class="btn btn-outline-info btn-sm"><i class="fas fa-long-arrow-alt-left"></i> Atras</button>
       </div>



       <div class="col-8 col-sm-5 col-md-3">
        <div class="input-group input-group-sm" id="divcbo">
          <div class="input-group-prepend">
            <button type="button" class="btn btn-dark btn-sm">Periodo</button>
          </div>
          <select class="custom-select" id="cbanio" name="cbanio" >
          </select>                

          <input type="hidden"  id="anio_peo" name="anio_peo" >
          <input type="hidden" id="tipo_peo" name="tipo_peo" class="form-control form-control-sm">
          <input type="hidden" id="datos1_peo" name="datos1_peo" class="form-control form-control-sm">
          <input type="hidden" id="datos2_peo" name="datos2_peo" class="form-control form-control-sm">
        </div>
      </div>
    </div>
  </section>

  <section class="content text-sm">

    <div class="container-fluid" >
      <div class="card" style="background-color: #f8f9fa;" id="div-listgroup" name="div-listgroup">      
        <div class="card-body">
          <div class="row" id="group_list" name="group_list" > </div>
        </div>
      </div>
    </div>

    <div class="container-fluid" >
      <div class="card" style="background-color: #f8f9fa;" id="div-liststudent" name="div-liststudent">      
        <div class="card-body">
          <table id="table_groupstudent" name="table_groupstudent" class="table table-bordered table-hover table-sm">
          </table>
        </div>
      </div>
    </div>
  </section>

  <section class="content text-sm" id="listhoys" name="listhoys ">
    <div class="container-fluid" >

      <div class="card">
        <div class="card-header">
          <h3 class="card-title" id="lbltitle">Reportes Groups</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>


        <div class="card-body">
          <div class="row mb-2 mt-2">

            <div class="col-sm-4 mb-2">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text"> FECHA STAR</span>
                </div>
                <input type="date" class="form-control" id="date_star" name="date_star">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"> </i> </span>
                </div>
              </div>
            </div>

            <div class="col-sm-4 mb-2">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text"> FECHA END</span>
                </div>
                <input type="date" class="form-control" id="date_end" name="date_end">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"> </i> </span>
                </div>
              </div>
            </div>

            <div class="col-sm-4 mb-2">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text"> HORA INGRESO:</span>
                </div>
                <input type="time" class="form-control" id="timein" name="timein">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-clock"></i></span>
                </div>

              </div>

            </div>

          </div>

          <div class="row mb-2 ">
            <div class="col-md-3 offset-md-9">
              <div class="btn-group float-right">
                <button type="button" class="btn btn-default" onclick="reportPrinttime();"><i class="icons fas fa-print" style="color: black;"></i></button>
                <button type="button" class="btn btn-default" onclick="reportExceltime();"><i class="icons fas fa-file-excel" style="color: green;"></i></button>
                <button type="button" class="btn btn-default" onclick="reportWordtime();"><i class="icons fas fa-file-word" style="color: #1A3AA4;"></i></button>
                <button type="button" class="btn btn-default" onclick="reportPdftime();"><i class="icons fas fa-file-pdf" style="color: red;"></i></button>
              </div>
            </div>
          </div>     
          <div class="table-responsive" >
            <table  id="kt_table_1" name="kt_table_1" class="table table-bordered table-hover table-sm">
            </table>
          </div>
        </div>


      </div>

    </div>
  </section>

</div>

<div id="divprint" style="display: none; "></div>

<?php 
    require 'footerIn.php'; 
    }else{
        require 'error.php';
    } 
}
ob_end_flush();
?>

<script type="text/javascript" src="scripts/detalladogroup.js"></script>
