<?php 
ob_start();
session_start();

date_default_timezone_set('America/Lima');

if (!isset($_SESSION["nombre"])){
    header("Location: login.html");
}else{
    if ($_SESSION['asistencias']==1){
      include 'headerIn.php';
?>


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
              </select>                <input type="hidden"  id="anio_peo" name="anio_peo" >
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
        <h3 class="card-title">Check Out</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      
    <form  name="formulario" id="formulario" method="POST">

        <div class="card-body">
          <div class="row mb-2">
            <div class="col-sm-2">
             <label>Seleccionar Fecha:</label>
           </div>
           <div class="col-sm-6 mb-2">
            <div class="input-group input-group-sm">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-calendar-check"></i></span>
              </div>

              <input type="hidden" id="tipo_peo" name="tipo_peo" class="form-control form-control-sm">
              <input type="hidden" id="datos1_peo" name="datos1_peo" class="form-control form-control-sm">
              <input type="hidden" id="datos2_peo" name="datos2_peo" class="form-control form-control-sm">

              <input type="date" class="form-control" id="datesearch" name="datesearch" value="<?php echo date("Y-m-d");?>">
              <div class="input-group-prepend">
               <button type="button" class="btn btn-info" id="btncopy" onclick="bntcopy()"><i class="fa fa-angle-right"></i> Cerrar</button>
             </div>
           </div>
         </div>
       </div>

       <table  id="table_assistance" name="table_assistance" class="table table-bordered table-hover table-sm">
       </table>
       <button  type="submit" id="btnsave" class="btn btn-sm btn-primary btn-wide" hidden="hidden"><i class="flaticon2-check-mark" aria-hidden="true" style="color: #FFFFFF"></i></button>
     </div>
  </form>

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
<script type="text/javascript" src="scripts/checkout.js"></script>
