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

          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title" id="lbltitle"></h3>

                </div>

                <div class="card-body">

                   <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> FECHA STAR</span>
                    </div>
                    <input type="date" class="form-control" id="date_star" name="date_star">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"> </i> </span>
                    </div>
                  </div>

                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> FECHA END</span>
                    </div>
                    <input type="date" class="form-control" id="date_end" name="date_end">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"> </i> </span>
                    </div>
                  </div>

                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text"> HORA INGRESO:</span>
                    </div>
                    <input type="time" class="form-control" id="timein" name="timein">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    </div>
                  </div>

<hr>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Listar</span>
                    </div>
                        <select class="custom-select" id="tipodoc_search" name="tipodoc_search">
                          <option value="1">All</option>
                          <option value="2">Identificacion</option>
                        </select>
                   </div>

                  <div class="input-group input-group-sm div-id">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" id="txtid" name="txtid" placeholder="Example: 48583594" >
                    <input type="hidden" class="form-control" id="identificacion" name="identificacion">
                    <input type="hidden" id="txtdatos1_peo" name="txtdatos1_peo">
                    <input type="hidden" id="txtdatos2_peo" name="txtdatos2_peo">
                    <input type="hidden" id="txttipo_peo" name="txttipo_peo">
                  </div> 
                </div>


              </div>
            </div>

            <div class="col-md-8">
              <div class="card">
<!--                 <div class="card-header">
                  <h3 class="card-title"><i class="fas fa-eye"></i> VISTA PREVIA</h3>
                </div> -->

                <div class="card-body">
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
                      <thead class="table-sm">
                        <tr >
                          <th>#</th>
                          <th>Apellidos/Nombres</th>
                          <th>DATOS I</th>
                          <th>DATOS II</th>
                          <th>Fecha</th>
                          <th>Etrada</th>
                          <th>Salida</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>

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
<script type="text/javascript" src="scripts/listadogroupid.js"></script>
